<?php

namespace app\scripts\INACTIFS_DIOCESE_RELANCES\v1\controllers;

use Yii;
use app\models\NixxisParameters;
use app\models\NixxisQualifications;
use app\components\NrtLogger;

class DefaultController extends \app\controllers\ScriptController {

    private function AffectScenario($NixxisQualificationId, &$model, &$model_qualifications) {
        /* @var $model \app\scripts\INACTIFS_DIOCESE_RELANCES\v1\models\DATA3da9b560fec24bdb906e138cca99681c */
        /* @var $model_qualifications \app\models\NixxisQualifications */

        switch ($NixxisQualificationId) {
            case '391d0558aaaf4ab2964f48557422d4b3': //REFUS AUTRE A RENSEIGNER
                $model->scenario = 'REFUS_AUTRE';
                $model_qualifications->nextstep = 'qualifications';
                break;
            case 'e35d55a794774beabbb5015481197eea': //PAS RECU R1
                $model->scenario = 'PROMESSE';
                $model_qualifications->nextstep = 'qualifications';
                break;
            case 'dc85e346b25f4292b9443b92646554f9': //PAS RECU R2
                $model->scenario = 'PROMESSE';
                $model_qualifications->nextstep = 'qualifications';
                break;
            case 'd7378f7e871c416db874c6c091473c8f': //VA ENVOYER R1
                $model->scenario = 'VA/DEJAENVOYE';
                $model_qualifications->nextstep = 'qualifications';
                break;
            case 'bcfda06c711c47689c196e6cadea3a34': //VA ENVOYER R2
                $model->scenario = 'VA/DEJAENVOYE';
                $model_qualifications->nextstep = 'qualifications';
                break;
            case '6b4da7ee3fed45bea6bbc37b4d801608': //DEJA ENVOYE R1
                $model->scenario = 'VA/DEJAENVOYE';
                $model_qualifications->nextstep = 'qualifications';
                break;
            case 'a7b3c1aa04ee4e589b31a411f06c6927': //DEJA ENVOYE R2
                $model->scenario = 'VA/DEJAENVOYE';
                $model_qualifications->nextstep = 'qualifications';
                break;
        }

        if ($this->NixxisQualifications[$NixxisQualificationId]['Description'] == 'A RAPPELER' || $this->NixxisQualifications[$NixxisQualificationId]['Description'] == 'RAPPEL PERSO') {
            $model_qualifications->scenario = 'CALLBACK';
        }
    }

    public function actionListPeriodicites($id) {
        /* @var $model \app\scripts\INACTIFS_DIOCESE_RELANCES\v1\models\DATA3da9b560fec24bdb906e138cca99681c */
        /* @var $model_qualifications \app\models\NixxisQualifications */
        $data = \app\scripts\INACTIFS_DIOCESE_RELANCES\v1\models\DATA3da9b560fec24bdb906e138cca99681c::getPeriodicite($id);

        if (count($data)) {
            foreach ($data as $key => $description) {
                echo "<option value='" . $key . "'>" . $description . "</option>";
            }
        } else {
            echo "<option value=''> - </option>";
        }
    }

    public function actionIndex() {
        /* @var $model \app\scripts\INACTIFS_DIOCESE_RELANCES\v1\models\DATA3da9b560fec24bdb906e138cca99681c */
        /* @var $model_qualifications \app\models\NixxisQualifications */

        $start = microtime(true);
        $model_qualifications = new NixxisQualifications();
        $NixxisParameters = Yii::$app->session->get('NixxisParameters');
        if (!$NixxisParameters instanceof NixxisParameters) {
            die('Session Error');
        }
        $model = $this->findModel($NixxisParameters->diallerReference);
        $this->NixxisQualifications = Yii::$app->session->get('NixxisQualifications');

        NrtLogger::log($NixxisParameters->sessionid, $NixxisParameters, $this->module, (microtime(true) - $start), "ScriptIndex");
        return $this->render('index', [
                    'model' => $model,
                    'NixxisParameters' => $NixxisParameters,
                    'model_qualifications' => $model_qualifications,
                    'NixxisQualifications' => $this->NixxisQualifications,
                    'Module' => $this->module,
        ]);
    }

    public function actionStep2($Internal__id__) {
        /* @var $model \app\scripts\INACTIFS_DIOCESE_RELANCES\v1\models\DATA3da9b560fec24bdb906e138cca99681c */
        /* @var $model_qualifications \app\models\NixxisQualifications */

        $start = microtime(true);
        $model = $this->findModel($Internal__id__);
        $Script = Yii::$app->session->get('Script');

        $model_qualifications = new NixxisQualifications();
        $model_qualifications->load(Yii::$app->request->post());

        $NixxisParameters = Yii::$app->session->get('NixxisParameters');
        $this->NixxisQualifications = Yii::$app->session->get('NixxisQualifications');


        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $this->AffectScenario($model_qualifications->qualificationId, $model, $model_qualifications);

            if ($model_qualifications->scenario == 'CALLBACK') {
                $model->scenario = 'RO';
                return $this->render('callback', [
                            'model' => $model,
                            'model_qualifications' => $model_qualifications,
                            'NixxisParameters' => $NixxisParameters,
                            'NixxisQualifications' => $this->NixxisQualifications,
                            'Module' => $this->module,
                ]);
            }

            if ($model_qualifications->nextstep == '') {
                if ($model_qualifications->load(Yii::$app->request->post()) && $model_qualifications->validate()) {
                    NrtLogger::log($NixxisParameters->sessionid, $NixxisParameters, $this->module, (microtime(true) - $start), "ScriptQualify");

                    $NixxisDirectLink = new \app\components\NixxisDirectLink(Yii::$app->params['Nixxis_Url'], $NixxisParameters->sessionid);
                    $NixxisDirectLink->setContactid($NixxisParameters->contactid);
                    $NixxisDirectLink->setContactlistid($NixxisParameters->diallerReference);
                    $NixxisDirectLink->setInternalId();
                    $NixxisDirectLink->setQualification($model_qualifications->qualificationId, $model_qualifications->getCallbackNixxisformat(), $model_qualifications->callbackPhone);
                    $NixxisDirectLink->nextContact();
                    echo $NixxisDirectLink->printr($NixxisDirectLink->getStatus());
                }
            } else {
                return $this->render($model_qualifications->nextstep, [
                            'model' => $model,
                            'NixxisParameters' => $NixxisParameters,
                            'model_qualifications' => $model_qualifications,
                            'NixxisQualifications' => $this->NixxisQualifications,
                            'Module' => $this->module,
                ]);
            }
        }
        $model->scenario = 'default';
        return $this->render('index', [
                    'model' => $model,
                    'model_qualifications' => $model_qualifications,
                    'NixxisParameters' => $NixxisParameters,
                    'NixxisQualifications' => $this->NixxisQualifications,
                    'Module' => $this->module,
        ]);
    }

    public function actionQualify($Internal__id__) {
        /* @var $model \app\scripts\INACTIFS_DIOCESE_RELANCES\v1\models\DATA3da9b560fec24bdb906e138cca99681c */
        /* @var $model_qualifications \app\models\NixxisQualifications */

        $start = microtime(true);
        $model = $this->findModel($Internal__id__);
        $model_qualifications = new NixxisQualifications();
        $model_qualifications->load(Yii::$app->request->post());

        $this->NixxisQualifications = Yii::$app->session->get('NixxisQualifications');

        $NixxisParameters = Yii::$app->session->get('NixxisParameters');
        $this->AffectScenario($model_qualifications->qualificationId, $model, $model_qualifications);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            if ($model_qualifications->load(Yii::$app->request->post()) && $model_qualifications->validate()) {
                NrtLogger::log($NixxisParameters->sessionid, $NixxisParameters, $this->module, (microtime(true) - $start), "ScriptQualify");

                $NixxisDirectLink = new \app\components\NixxisDirectLink(Yii::$app->params['Nixxis_Url'], $NixxisParameters->sessionid);
                $NixxisDirectLink->setContactid($NixxisParameters->contactid);
                $NixxisDirectLink->setContactlistid($NixxisParameters->diallerReference);
                $NixxisDirectLink->setInternalId();
                $NixxisDirectLink->setQualification($model_qualifications->qualificationId, $model_qualifications->getCallbackNixxisformat(), $model_qualifications->callbackPhone);
                $NixxisDirectLink->nextContact();
                echo $NixxisDirectLink->printr($NixxisDirectLink->getStatus());
            }
        } else {

            return $this->render(($model_qualifications->nextstep != '' ? $model_qualifications->nextstep : 'index'), [
                        'model' => $model,
                        'model_qualifications' => $model_qualifications,
                        'NixxisParameters' => $NixxisParameters,
                        'NixxisQualifications' => $this->NixxisQualifications,
                        'Module' => $this->module,
            ]);
        }
    }

}

<?php

namespace app\scripts\DUPA_DIOCESE_RELANCES\v1\controllers;

use Yii;
use app\models\NixxisParameters;
use app\models\NixxisQualifications;
use app\components\NrtLogger;

class DefaultController extends \app\controllers\ScriptController {

    private function AffectScenario($NixxisQualificationId, &$model, &$model_qualifications) {
        /* @var $model \app\scripts\DUPA_DIOCESE_RELANCES\v1\models\DATA505157c22e9c4e83818a62751daa9862 */
        /* @var $model_qualifications \app\models\NixxisQualifications */

        switch ($NixxisQualificationId) {
            case 'e1a18cb5d46647e497fa5ff3904475e5': //REFUS AUTRE A RENSEIGNER
                $model->scenario = 'REFUS_AUTRE';
                $model_qualifications->nextstep = 'qualifications';
                break;
            case 'f64b15a75bf948c5805612e1f2aa6a96': //PAS RECU R1
                $model->scenario = 'PROMESSE';
                $model_qualifications->nextstep = 'qualifications';
                break;
            case 'b34a326a74964f8da0f648c734e81358': //PAS RECU R2
                $model->scenario = 'PROMESSE';
                $model_qualifications->nextstep = 'qualifications';
                break;
            case 'd61b73308b694f7981dd4c651cc1ca7d': //VA ENVOYER R1
                $model->scenario = 'VA/DEJAENVOYE';
                $model_qualifications->nextstep = 'qualifications';
                break;
            case '8391a9a5b6054822ae6e29e99cad0f74': //VA ENVOYER R2
                $model->scenario = 'VA/DEJAENVOYE';
                $model_qualifications->nextstep = 'qualifications';
                break;
            case 'ea3b799073b0428181591fcb00ce0fe9': //DEJA ENVOYE R1
                $model->scenario = 'VA/DEJAENVOYE';
                $model_qualifications->nextstep = 'qualifications';
                break;
            case '62ae84d50c5d47c2aa1a128a04a7dabf': //DEJA ENVOYE R2
                $model->scenario = 'VA/DEJAENVOYE';
                $model_qualifications->nextstep = 'qualifications';
                break;
            case '4f1960b3b7b54fcab4d1c2c619ae5523': //NOUVELLE PROMESSE R1
                $model->scenario = 'PROMESSE';
                $model_qualifications->nextstep = 'qualifications';
                break;
            case 'cd4709924e5445c6b4de93420b10b062': //NOUVELLE PROMESSE R2
                $model->scenario = 'PROMESSE';
                $model_qualifications->nextstep = 'qualifications';
                break;
        }

        if ($this->NixxisQualifications[$NixxisQualificationId]['Description'] == 'A RAPPELER' || $this->NixxisQualifications[$NixxisQualificationId]['Description'] == 'RAPPEL PERSO') {
            $model_qualifications->scenario = 'CALLBACK';
        }
    }

    public function actionIndex() {
        /* @var $model \app\scripts\DUPA_DIOCESE_RELANCES\v1\models\DATA505157c22e9c4e83818a62751daa9862 */
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
        /* @var $model \app\scripts\DUPA_DIOCESE_RELANCES\v1\models\DATA505157c22e9c4e83818a62751daa9862 */
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
        /* @var $model \app\scripts\DUPA_DIOCESE_RELANCES\v1\models\DATA505157c22e9c4e83818a62751daa9862 */
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

<?php

namespace app\scripts\CONSOLIDATION\v1\controllers;

use Yii;
use app\models\NixxisParameters;
use app\models\NixxisQualifications;
use app\components\NrtLogger;

class DefaultController extends \app\controllers\ScriptController {

    private function AffectScenario($NixxisQualificationId, &$model, &$model_qualifications) {
        /* @var $model \app\scripts\CONSOLIDATION\v1\models\DATA1ef032b0751d46c1a7f8b29a935a5156 */
        /* @var $model_qualifications \app\models\NixxisQualifications */

        switch ($NixxisQualificationId) {
            case '61c137927a1e412cbaabccb2c27a26f8': //APPARTENANCE AUTRE RELIGION
                $model->scenario = 'APPARTENANCE_AUTRE_RELIGION';
                $model_qualifications->nextstep = 'qualifications';
                break;
            case '8116000af28d4d4990802ad11aa00ff6': //DECU PAR L'EGLISE
                $model->scenario = 'DECU_PAR_EGLISE';
                $model_qualifications->nextstep = 'qualifications';
                break;
            case '8d2acb4c98f2427a8d81269acf6b5766': //DON RECENT A UN AUTRE ORGANISME
                $model->scenario = 'DON_AUTRE_ORGANISME';
                $model_qualifications->nextstep = 'qualifications';
                break;
            case 'f339c8486a414c56acae1fa0bfb5d5e2': //DON AUTRE DIOCESE
                $model->scenario = 'DON_AUTRE_DIOCESE';
                $model_qualifications->nextstep = 'qualifications';
                break;
            case '00ceaff6fa7e4b48aa722edf2bc83fe5': //PAS CONCERNE
                $model->scenario = 'PAS_CONCERNE';
                $model_qualifications->nextstep = 'qualifications';
                break;
            case 'f12e542eec394bb6a06022d6bf3bbd7f': //RICHESSE SUPPOSEE DE L'EGLISE
                $model->scenario = 'RICHESSE_EGLISE';
                $model_qualifications->nextstep = 'qualifications';
                break;
            case 'e064adfa29be45228120198d3348cbb9': //DEJA DONNE AU DIOCESE CETTE ANNEE
                $model->scenario = 'DEJA_DONNE';
                $model_qualifications->nextstep = 'qualifications';
                break;
            case 'd09dfdb9c06b4761a641142df81b29de': //REFUS AUTRE A RENSEIGNER
                $model->scenario = 'REFUS_AUTRE';
                $model_qualifications->nextstep = 'qualifications';
                break;
            case '209360b6839947d9b37c46f11a7de3d1': //PAM
                $model->scenario = 'PAM';
                $model_qualifications->nextstep = 'qualifications';
                break;
            case '376b2bafd74947d4874d53ca447882b7': //PA
                $model->scenario = 'PA';
                $model_qualifications->nextstep = 'qualifications';
                break;
            case '48a9fb46ae8e4be9afa76c1d42f64b39': //DSM
                $model->scenario = 'DSM';
                $model_qualifications->nextstep = 'qualifications';
                break;
            case '5cd73df192944dd1b9ac6b7cdacba4ee': //DS
                $model->scenario = 'DS';
                $model_qualifications->nextstep = 'qualifications';
                break;
        }

        if ($this->NixxisQualifications[$NixxisQualificationId]['Description'] == 'A RAPPELER' || $this->NixxisQualifications[$NixxisQualificationId]['Description'] == 'RAPPEL PERSO') {
            $model_qualifications->scenario = 'CALLBACK';
        }
    }

    public function actionIndex() {
        /* @var $model \app\scripts\CONSOLIDATION\v1\models\DATA1ef032b0751d46c1a7f8b29a935a5156 */
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
        /* @var $model \app\scripts\CONSOLIDATION\v1\models\DATA1ef032b0751d46c1a7f8b29a935a5156 */
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
        /* @var $model \app\scripts\CONSOLIDATION\v1\models\DATA1ef032b0751d46c1a7f8b29a935a5156 */
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

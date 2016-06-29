<?php

namespace app\scripts\CONQUETE_TULLE\v1\controllers;

use Yii;
use app\models\NixxisParameters;
use app\models\NixxisQualifications;
use app\components\NrtLogger;

class DefaultController extends \app\controllers\ScriptController {

    private function AffectScenario($NixxisQualificationId, &$model, &$model_qualifications) {
        /* @var $model \app\scripts\CONQUETE_TULLE\v1\models\DATAd23ae816bcf9448da425439c18f6d52b */
        /* @var $model_qualifications \app\models\NixxisQualifications */

        switch ($NixxisQualificationId) {
            case '7ab4a87c4bde4607be2ab71ccccdb3a3': //APPARTENANCE AUTRE RELIGION
                $model->scenario = 'APPARTENANCE_AUTRE_RELIGION';
                $model_qualifications->nextstep = 'qualifications';
                break;
            case '09f99a42757f4edeb8fdb58ba3e66d54': //DECU PAR L'EGLISE
                $model->scenario = 'DECU_PAR_EGLISE';
                $model_qualifications->nextstep = 'qualifications';
                break;
            case 'eba0890d93e14f76b2e763119f3a9838': //DON RECENT A UN AUTRE ORGANISME
                $model->scenario = 'DON_AUTRE_ORGANISME';
                $model_qualifications->nextstep = 'qualifications';
                break;
            case '4833d4f7df5f408bb78c055eea986342': //DON AUTRE DIOCESE
                $model->scenario = 'DON_AUTRE_DIOCESE';
                $model_qualifications->nextstep = 'qualifications';
                break;
            case '98079c2f5d4141ff82ca0da7edf2a8ee': //PAS CONCERNE
                $model->scenario = 'PAS_CONCERNE';
                $model_qualifications->nextstep = 'qualifications';
                break;
            case '4d8838a0cba64d73865163fb00c6f073': //RICHESSE SUPPOSEE DE L'EGLISE
                $model->scenario = 'RICHESSE_EGLISE';
                $model_qualifications->nextstep = 'qualifications';
                break;
            case 'da23e01676954e3086ffb34207a3c44a': //ANCIEN DONATEUR DECU
                $model->scenario = 'ANCIEN_DONATEUR_DECU';
                $model_qualifications->nextstep = 'qualifications';
                break;
            case '6e885bc96a94439ebf4ba2bd829a2adb': //REFUS AUTRE A RENSEIGNER
                $model->scenario = 'REFUS_AUTRE';
                $model_qualifications->nextstep = 'qualifications';
                break;
            case 'c47ec1d0367744888284b66258a28636': //PAM
                $model->scenario = 'PAM';
                $model_qualifications->nextstep = 'qualifications';
                break;
            case 'e08e54cc8fa245118236bb6093fb0c7c': //PA
                $model->scenario = 'PA';
                $model_qualifications->nextstep = 'qualifications';
                break;
            case 'a2e3e1e604784bfda9649bcddd168a3d': //DSM
                $model->scenario = 'DSM';
                $model_qualifications->nextstep = 'qualifications';
                break;
            case 'b2aaf3a1a8a34500a1249933e7d39891': //DS
                $model->scenario = 'DS';
                $model_qualifications->nextstep = 'qualifications';
                break;
        }

        if ($this->NixxisQualifications[$NixxisQualificationId]['Description'] == 'A RAPPELER') {
            $model_qualifications->scenario = 'CALLBACK';
        }
    }

    public function actionIndex() {
        /* @var $model \app\scripts\CONQUETE_TULLE\v1\models\DATAd23ae816bcf9448da425439c18f6d52b */
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
        /* @var $model \app\scripts\CONQUETE_TULLE\v1\models\DATAd23ae816bcf9448da425439c18f6d52b */
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
        /* @var $model \app\scripts\CONQUETE_TULLE\v1\models\DATAd23ae816bcf9448da425439c18f6d52b */
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

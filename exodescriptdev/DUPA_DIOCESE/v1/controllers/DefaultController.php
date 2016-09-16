<?php

namespace app\scripts\DUPA_DIOCESE\v1\controllers;

use Yii;
use app\models\NixxisParameters;
use app\models\NixxisQualifications;
use app\components\NrtLogger;

class DefaultController extends \app\controllers\ScriptController {

    private function AffectScenario($NixxisQualificationId, &$model, &$model_qualifications) {
        /* @var $model \app\scripts\DUPA_DIOCESE\v1\models\DATA1d8f8e8696504a02a335c250a2c0ecac */
        /* @var $model_qualifications \app\models\NixxisQualifications */

        switch ($NixxisQualificationId) {
            case '9e5bc9bab8464b14bf33f71ef993e9d9': //APPARTENANCE AUTRE RELIGION
                $model->scenario = 'APPARTENANCE_AUTRE_RELIGION';
                $model_qualifications->nextstep = 'qualifications';
                break;
            case '19c0bc582041418db1379347893fd767': //DECU PAR L'EGLISE
                $model->scenario = 'DECU_PAR_EGLISE';
                $model_qualifications->nextstep = 'qualifications';
                break;
            case '7c3b1575d745425f8bb407879da377c8': //DON RECENT A UN AUTRE ORGANISME
                $model->scenario = 'DON_AUTRE_ORGANISME';
                $model_qualifications->nextstep = 'qualifications';
                break;
            case '12b8b2844ca04a3091d7b75e93c877d7': //DON AUTRE DIOCESE
                $model->scenario = 'DON_AUTRE_DIOCESE';
                $model_qualifications->nextstep = 'qualifications';
                break;
            case '96a1056d17df42eb93ad4ed71604813e': //PAS CONCERNE
                $model->scenario = 'PAS_CONCERNE';
                $model_qualifications->nextstep = 'qualifications';
                break;
            case 'b009267ed915496eab7ff01d7094ae70': //RICHESSE SUPPOSEE DE L'EGLISE
                $model->scenario = 'RICHESSE_EGLISE';
                $model_qualifications->nextstep = 'qualifications';
                break;
            case '8a5e9e0ab57d4c9498f1e8b36607aada': //ANCIEN DONATEUR DECU
                $model->scenario = 'ANCIEN_DONATEUR_DECU';
                $model_qualifications->nextstep = 'qualifications';
                break;
            case '7880a4f447564102bbd1748510741498': //REFUS AUTRE A RENSEIGNER
                $model->scenario = 'REFUS_AUTRE';
                $model_qualifications->nextstep = 'qualifications';
                break;
            case '90e570b296f44ba1a45b287b057dd26f': //NE VEUT PAS DU PA
                $model->scenario = 'NE_VEUT_PAS_DU_PA';
                $model_qualifications->nextstep = 'qualifications';
                break;
            case '59d194fb25fb4356a98ccf660b7da083': //PROBLEME DE RECU FISCAL
                $model->scenario = 'PROBLEME_DE_RECU_FISCAL';
                $model_qualifications->nextstep = 'qualifications';
                break;
            case '854991db3623499ab5ef2bdca3ca1cf0': //PAM
                $model->scenario = 'PAM';
                $model_qualifications->nextstep = 'qualifications';
                break;
            case '769a8cac28a64249869830db58a0a6ad': //PA
                $model->scenario = 'PA';
                $model_qualifications->nextstep = 'qualifications';
                break;
            case 'af4b5d5b88a64ceb9f5e1f417e4a8500': //DSM
                $model->scenario = 'DSM';
                $model_qualifications->nextstep = 'qualifications';
                break;
            case '85e2204e9dc24e33a25ab293ed8604de': //DS
                $model->scenario = 'DS';
                $model_qualifications->nextstep = 'qualifications';
                break;
        }

        if ($this->NixxisQualifications[$NixxisQualificationId]['Description'] == 'A RAPPELER' || $this->NixxisQualifications[$NixxisQualificationId]['Description'] == 'RAPPEL PERSO') {
            $model_qualifications->scenario = 'CALLBACK';
        }
    }

    public function actionIndex() {
        /* @var $model \app\scripts\DUPA_DIOCESE\v1\models\DATA1d8f8e8696504a02a335c250a2c0ecac */
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
        /* @var $model \app\scripts\DUPA_DIOCESE\v1\models\DATA1d8f8e8696504a02a335c250a2c0ecac */
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
        /* @var $model \app\scripts\DUPA_DIOCESE\v1\models\DATA1d8f8e8696504a02a335c250a2c0ecac */
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

<?php

namespace app\scripts\FIDELISATION_RELANCES\v1\controllers;

use Yii;
use app\models\NixxisParameters;
use app\models\NixxisQualifications;
use app\components\NrtLogger;

class DefaultController extends \app\controllers\ScriptController {


private function AffectScenario($NixxisQualificationId, &$model, &$model_qualifications) {
/* @var $model \app\scripts\FIDELISATION_RELANCES\v1\models\DATA234f752d390140b981beaa21a6171d26 */
/* @var $model_qualifications \app\models\NixxisQualifications */

switch ($NixxisQualificationId) {
// case '...' :
//      $model->scenario='...';
//      $model_qualifications->nextstep = '....'
//      break;

}

if ($this->NixxisQualifications[$NixxisQualificationId]['Description'] == 'A RAPPELER') {
$model_qualifications->scenario = 'CALLBACK';
}
}

public function actionIndex() {
/* @var $model \app\scripts\FIDELISATION_RELANCES\v1\models\DATA234f752d390140b981beaa21a6171d26 */
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
/* @var $model \app\scripts\FIDELISATION_RELANCES\v1\models\DATA234f752d390140b981beaa21a6171d26 */
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
NrtLogger::log($NixxisParameters->sessionid, $NixxisParameters,  $this->module, (microtime(true) - $start), "ScriptQualify");

$NixxisDirectLink = new \app\components\NixxisDirectLink(Yii::$app->params['Nixxis_Url'], $NixxisParameters->sessionid);
$NixxisDirectLink->setContactid($NixxisParameters->contactid);
$NixxisDirectLink->setContactlistid($NixxisParameters->diallerReference);
$NixxisDirectLink->setInternalId();
$NixxisDirectLink->setQualification($model_qualifications->qualificationId, $model_qualifications->getCallbackNixxisformat(), $model_qualifications->callbackPhone);
$NixxisDirectLink->nextContact();
echo $NixxisDirectLink->printr($NixxisDirectLink->getStatus());
}
}
else {
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
/* @var $model \app\scripts\FIDELISATION_RELANCES\v1\models\DATA234f752d390140b981beaa21a6171d26 */
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
NrtLogger::log($NixxisParameters->sessionid, $NixxisParameters,  $this->module, (microtime(true) - $start), "ScriptQualify");

$NixxisDirectLink = new \app\components\NixxisDirectLink(Yii::$app->params['Nixxis_Url'], $NixxisParameters->sessionid);
$NixxisDirectLink->setContactid($NixxisParameters->contactid);
$NixxisDirectLink->setContactlistid($NixxisParameters->diallerReference);
$NixxisDirectLink->setInternalId();
$NixxisDirectLink->setQualification($model_qualifications->qualificationId, $model_qualifications->getCallbackNixxisformat(), $model_qualifications->callbackPhone);
$NixxisDirectLink->nextContact();
echo $NixxisDirectLink->printr($NixxisDirectLink->getStatus());
}
}
else {

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

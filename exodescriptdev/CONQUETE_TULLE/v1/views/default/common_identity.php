<?php

use yii\helpers\ArrayHelper;
use app\components\FormWidgets\LineWidget;
use app\components\FormWidgets\TextBoxWidget;
use app\components\FormWidgets\CheckBoxWidget;
use app\components\FormWidgets\MonthYearWidget;
use app\components\FormWidgets\YearWidget;
use app\components\FormWidgets\SelectWidget;
use app\components\FormWidgets\DateWidget;
use app\components\FormWidgets\YesNoWidget;
use app\components\FormWidgets\ButtonWidget;

/* @var $model \app\scripts\CONQUETE_TULLE\v1\models\DATAd23ae816bcf9448da425439c18f6d52b */
?>
<div class="row">
    <div class="col-sm-4">
        <?= $form->field($model, '_NOM_DIOCESE')->textInput(['readonly' => true])->label('Nom du diocèse') ?>
    </div>
    <div class="col-sm-4">
        <?= $form->field($model, '_NOM_EVEQUE')->textInput(['readonly' => true])->label('Nom de l\'évêque') ?>
    </div>
    <div class="col-sm-4">
        <?= $form->field($model, '_PAROISSE')->textInput(['readonly' => ($model->scenario <> 'default' || $model->scenario == 'RO') ? true : false])->label('Paroisse') ?>
    </div>
</div> 
<div class="row">
    <div class="col-sm-2"  >
        <?= $form->field($model, 'CIV')->textInput(['readonly' => ($model->scenario <> 'default' || $model->scenario == 'RO') ? true : false])->label('Civilité') ?>
    </div>
    <div class="col-sm-5" >
        <?= $form->field($model, 'NOM')->textInput(['readonly' => ($model->scenario <> 'default' || $model->scenario == 'RO') ? true : false])->label('Nom') ?>
    </div>
    <div class="col-sm-5" > 
        <?= $form->field($model, 'PRENOM')->textInput(['readonly' => ($model->scenario <> 'default' || $model->scenario == 'RO') ? true : false])->label('Prénom') ?>
    </div>
</div>    
<div class="row" >
    <div class="col-sm-6">
        <?= $form->field($model, 'ADR1')->textInput(['readonly' => ($model->scenario <> 'default' || $model->scenario == 'RO') ? true : false])->label('Adresse 1') ?>
        <?= $form->field($model, 'ADR3')->textInput(['readonly' => ($model->scenario <> 'default' || $model->scenario == 'RO') ? true : false])->label('Adresse 3') ?>
        <?= $form->field($model, 'CP')->textInput(['readonly' => ($model->scenario <> 'default' || $model->scenario == 'RO') ? true : false])->label('Code Postal') ?>

    </div>
    <div class="col-sm-6">
        <?= $form->field($model, 'ADR2')->textInput(['readonly' => ($model->scenario <> 'default' || $model->scenario == 'RO') ? true : false])->label('Adresse 2') ?>
        <?= $form->field($model, 'ADR4')->textInput(['readonly' => ($model->scenario <> 'default' || $model->scenario == 'RO') ? true : false])->label('Adresse 4') ?>
        <?= $form->field($model, 'VILLE')->textInput(['readonly' => ($model->scenario <> 'default' || $model->scenario == 'RO') ? true : false])->label('Ville') ?>
    </div>        
</div>
<div class="row">
    <div class="col-sm-6">
        <?= $form->field($model, 'PAYS')->textInput(['readonly' => ($model->scenario <> 'default' || $model->scenario == 'RO') ? true : false])->label('Pays') ?>
    </div>
    <div class="col-sm-6">
        <?= $form->field($model, 'DATE_DE_NAISSANCE')->textInput(['readonly' => ($model->scenario <> 'default' || $model->scenario == 'RO') ? true : false])->label('Année de naissance') ?>
    </div>
</div>
<div class="row">
    <div class="col-sm-4">
        <?= $form->field($model, 'TEL1')->textInput(['readonly' => ($model->scenario <> 'default' || $model->scenario == 'RO') ? true : false])->label('Téléphoné mobile') ?>
    </div>
    <div class="col-sm-4">
        <?= $form->field($model, 'TEL2')->textInput(['readonly' => ($model->scenario <> 'default' || $model->scenario == 'RO') ? true : false])->label('Téléphone fixe') ?>
    </div>       
</div>  
<div class="row">
    <div class="col-sm-6">
        <?= $form->field($model, 'EMAIL1')->textInput(['readonly' => ($model->scenario <> 'default' || $model->scenario == 'RO') ? true : false])->label('Adresse Email 1') ?>
    </div>
</div>     

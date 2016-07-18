<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use kartik\date\DatePicker;
use kartik\time\TimePicker;
use app\components\FormWidgets\LineWidget;
use app\components\FormWidgets\TextBoxWidget;
use app\components\FormWidgets\CheckBoxWidget;
use app\components\FormWidgets\MonthYearWidget;
use app\components\FormWidgets\YearWidget;
use app\components\FormWidgets\SelectWidget;
use app\components\FormWidgets\DateWidget;
use app\components\FormWidgets\YesNoWidget;
use \app\scripts\INACTIFS_DIOCESE\v1\models\custommodel;

/* @var $model \app\scripts\INACTIFS_DIOCESE\v1\models\DATAb5f7ff55293547e2a9a81bd5cbd6fe80 */
?>

<?= LineWidget::widget() ?>
<div class="row" style=" margin-left: 0px; margin-right: 0px;">
    <?= $form->field($model, 'COMMENTAIRE_APPEL')->textarea(['rows' => 3, 'readonly' => $model->scenario == 'RO' ? true : false]) ?>
</div>
<?= LineWidget::widget() ?>
<div class="row" style=" margin-left: 0px; margin-right: 0px;">
    <?= $form->field($model, 'COMMENTAIRE_DONATEUR')->textarea(['rows' => 3, 'readonly' => $model->scenario == 'RO' ? true : false]) ?>
</div>
<?= LineWidget::widget() ?>
<div id ="blockinterlocuteur" class="row"> 
    <div class="col-sm-3">
        <?=
        $form->field($model, '_INTERLOCUTEUR')->dropDownList(custommodel::getInterlocuteur())->label('Interlocuteur');
        ?>    
    </div>
    <div class="col-sm-9">
        <?= $form->field($model, 'INTERLOCUTEUR')->textInput(['readonly' => ($model->scenario <> 'default' || $model->scenario == 'RO') ? true : false])->label('Si autre :') ?>
    </div>
</div>

<div id ="blockquestion" class="row"> 
    <div class="col-sm-6">
        <?=
        $form->field($model, '_FREQUENTATION_EGLISE')->dropDownList(custommodel::getFrequentationEglise())->label('Fréquentation église');
        ?>    
    </div>
    <div class="col-sm-6">
        <?=
        $form->field($model, '_IMAGE_EVEQUE')->dropDownList(custommodel::getImageEveque())->label('Image de l\'évêque');
        ?>    
    </div>
</div>

<div id ="blockrefus" class="row"> 
    <div class="col-sm-6">
        <?=
        $form->field($model, '_RAISON_ARRET')->dropDownList(custommodel::getRaisonArret())->label('Raison de l\'arrêt');
        ?>    
    </div>
    <div class="col-sm-6">
        <?=
        $form->field($model, 'RAISON_ARRET')->textarea(['rows' => 3, 'maxlength' => '255'])->label('Si autres (Attention, limite à 255 charactères)');
        ?>    
    </div>
</div>
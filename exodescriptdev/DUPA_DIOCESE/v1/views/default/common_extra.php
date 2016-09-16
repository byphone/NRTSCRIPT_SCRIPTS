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
use \app\scripts\DUPA_DIOCESE\v1\models\custommodel;

/* @var $model \app\scripts\DUPA_DIOCESE\v1\models\DATA1d8f8e8696504a02a335c250a2c0ecac */
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
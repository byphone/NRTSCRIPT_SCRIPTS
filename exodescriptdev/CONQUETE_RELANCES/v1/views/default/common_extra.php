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
use app\components\FormWidgets\LabelWidget;
use \app\scripts\CONQUETE_RELANCES\v1\models\custommodel;

/* @var $model \app\scripts\CONQUETE_RELANCES\v1\models\DATA2b02e8a0d7fb4a79a37bdaa12396c047 */
?>

<?= LineWidget::widget() ?>
<div id ="blockcomapp" class="row">
    <div class="col-sm-12">
        <?= LabelWidget::widget(['label' => 'Commentaire du premier appel', 'model' => $model, 'field' => 'COMMENTAIRE_APPEL']) ?>
        <br/>
    </div>
</div>
<div id ="blockcomdon" class="row">
    <div class="col-sm-12">
        <?= LabelWidget::widget(['label' => 'Commentaire donateur', 'model' => $model, 'field' => 'COMMENTAIRE_DONATEUR']) ?>
        <br/>
    </div>
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
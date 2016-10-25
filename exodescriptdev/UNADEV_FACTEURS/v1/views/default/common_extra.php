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
use \app\scripts\UNADEV_FACTEURS\v1\models\custommodel;

/* @var $model \app\scripts\UNADEV_FACTEURS\v1\models\DATA9cd8682fa7a34c50b37332e82d7b807a */
?>
<?= LineWidget::widget() ?>
<div class="row" style=" margin-left: 0px; margin-right: 0px;">
<?= $form->field($model, 'COMMENTAIRE_APPEL')->textarea(['rows' => 3, 'readonly' => $model->scenario == 'RO' ? true : false]) ?>
</div>
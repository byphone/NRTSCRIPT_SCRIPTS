
<?php
/* @var $model \app\scripts\DUPA_DIOCESE\v1\models\DATA1d8f8e8696504a02a335c250a2c0ecac */

use yii\helpers\ArrayHelper;
use app\components\FormWidgets\LabelWidget;
?>
<div class="row" style="text-align: center;">
    <span style="color: red;"><b><?= ($NixxisParameters->ActivityType == $NixxisParameters::ACT_OUTBOUND) ? 'APPEL SORTANT' : 'APPEL ENTRANT' ?></b> </span>
</div>
<div class="row" style="background-color: #113060; color: #ffffff; font-size: 14px;">
    <?= LabelWidget::widget(['label' => 'Identifiant :', 'model' => $model, 'field' => 'IDENTIFIANT1']) ?>    
    <?= LabelWidget::widget(['label' => 'Code Média  :', 'model' => $model, 'field' => 'CODE_MEDIA']) ?>  
    <?= LabelWidget::widget(['label' => 'Montant :', 'model' => $model, 'field' => 'A_MONTANT']) ?>
    <?= LabelWidget::widget(['label' => 'Date dernier don :', 'model' => $model, 'field' => 'A_DATEPA']) ?>
</div>



<?php
        /* @var $model \app\scripts\CONQUETE_TULLE\v1\models\DATAd23ae816bcf9448da425439c18f6d52b */


use yii\helpers\ArrayHelper;
use app\components\FormWidgets\LabelWidget;
?>
<div class="row" style="text-align: center;">
    <span style="color: red;"><b><?= ($NixxisParameters->ActivityType == $NixxisParameters::ACT_OUTBOUND) ? 'APPEL SORTANT' : 'APPEL ENTRANT' ?></b> </span>
</div>
<div class="row" style="background-color: #113060; color: #ffffff; font-size: 14px;">
    <?= LabelWidget::widget(['label' => 'Identifiant :', 'model' => $model, 'field' => 'IDENTIFIANT1']) ?>    
    <?= LabelWidget::widget(['label' => 'Code Média  :', 'model' => $model, 'field' => 'CODE_MEDIA']) ?>  
</div>


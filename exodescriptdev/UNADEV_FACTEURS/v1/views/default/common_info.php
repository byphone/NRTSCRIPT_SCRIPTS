
<?php
/* @var $model \app\scripts\UNADEV_FACTEURS\v1\models\DATA9cd8682fa7a34c50b37332e82d7b807a */

use yii\helpers\ArrayHelper;
use app\components\FormWidgets\LabelWidget;
?>
<div class="row" style="text-align: center;">
    <span style="color: red;"><b><?= ($NixxisParameters->ActivityType == $NixxisParameters::ACT_OUTBOUND) ? 'APPEL SORTANT' : 'APPEL ENTRANT' ?></b> </span>
</div>
<div class="row" style="background-color: #113060; color: #ffffff; font-size: 14px;">
    <?= LabelWidget::widget(['label' => 'Identifiant :', 'model' => $model, 'field' => 'IDENTIFIANT1']) ?>    
    <?= LabelWidget::widget(['label' => 'Code Média  :', 'model' => $model, 'field' => 'CODE_MEDIA']) ?>  
    <?= LabelWidget::widget(['label' => 'Montant dernier don :', 'model' => $model, 'field' => 'A_MONTANT']) ?>  
    <?= LabelWidget::widget(['label' => 'Date réception courrier :', 'model' => $model, 'field' => '_DATE_MARCHE']) ?>
    <?= LabelWidget::widget(['label' => 'Cadeau :', 'model' => $model, 'field' => '_CADEAU']) ?> 
</div>


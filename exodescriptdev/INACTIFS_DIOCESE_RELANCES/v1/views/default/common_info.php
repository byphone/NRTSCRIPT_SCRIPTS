
<?php
/* @var $model \app\scripts\INACTIFS_DIOCESE_RELANCES\v1\models\DATA3da9b560fec24bdb906e138cca99681c */

use yii\helpers\ArrayHelper;
use app\components\FormWidgets\LabelWidget;
?>
<div class="row" style="text-align: center;">
    <span style="color: red;"><b><?= ($NixxisParameters->ActivityType == $NixxisParameters::ACT_OUTBOUND) ? 'APPEL SORTANT' : 'APPEL ENTRANT' ?></b> </span>
</div>
<div class="row" style="background-color: #113060; color: #ffffff; font-size: 14px;">
    <?= LabelWidget::widget(['label' => 'Identifiant :', 'model' => $model, 'field' => 'IDENTIFIANT1']) ?>    
    <?= LabelWidget::widget(['label' => 'Code Média  :', 'model' => $model, 'field' => 'CODE_MEDIA']) ?>
    <?= LabelWidget::widget(['label' => 'Interlocuteur  :', 'model' => $model, 'field' => '_INTERLOCUTEUR']) ?>
    <?= LabelWidget::widget(['label' => 'Dépôt paroisse  :', 'model' => $model, 'value' => $model->_DEPOT_PAROISSE == True ? 'Oui' : 'Non']) ?>
    <?= LabelWidget::widget(['label' => 'Promesse :', 'model' => $model, 'field' => 'SOURCE_QUALIFICATION']) ?>
    <?= LabelWidget::widget(['label' => 'Montant :', 'model' => $model, 'field' => 'N_MONTANT']) ?>
    <?= LabelWidget::widget(['label' => 'Périodicité :', 'model' => $model, 'value' => $model->GetTextCycle($model->N_PERIODICITE)]) ?>  
    <?= LabelWidget::widget(['label' => 'Date de notre appel :', 'model' => $model, 'field' => 'SOURCE_DATETIME']) ?>
</div>

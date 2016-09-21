<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
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
use app\components\FormWidgets\ButtonWidget;

/* @var $model \app\scripts\INACTIFS_DIOCESE_RELANCES\v1\models\DATA3da9b560fec24bdb906e138cca99681c */
?>
<script type="text/javascript" >
    function SetQualification(qualid) {
        $(document).ready(function () {
            var $form = $("#qualify-form");
            data = $form.data("yiiActiveForm");
            $.each(data.attributes, function () {
                this.status = 3;
            });
        });
    }

</script>  
<div class="site-index">

    <?php
    $form = ActiveForm::begin(['id' => 'qualify-form',
                'action' => ['qualify', 'Internal__id__' => $model->Internal__id__]]);
    ?>

    <div class="row">
        <div class="col-sm-2" >
            <?=
            $this->render('common_info', [
                'form' => $form,
                'model' => $model,
                'NixxisParameters' => $NixxisParameters,
            ])
            ?>   
        </div>

        <div class="col-sm-10">
            <?= $form->field($model_qualifications, 'qualificationId')->hiddenInput()->label(false) ?>
            <?= $form->field($model_qualifications, 'callbackDateTime')->hiddenInput(['id' => 'callbackDateTime'])->label(false) ?>
            <?= $form->field($model_qualifications, 'callbackPhone', ['template' => "{label}\n{input}\n{hint}"])->hiddenInput(['id' => 'callbackPhone'])->label(false) ?>            

            <div class="row" style="background-color: #113060; color: #ffffff; height: 39px; margin-left: 0px; margin-right: 0px;">
                <div class="col-sm-12" style="text-align: center;"><h4><?= $Module->getName() ?></h4></div>
            </div>
            <?=
            $this->render('common_identity', [
                'form' => $form,
                'model' => $model,
            ])
            ?>              <?php
            $NixxisQualification = $NixxisQualifications[$model_qualifications->qualificationId];

            switch ($model->scenario) {
                case 'REFUS_AUTRE' :
                    echo'
                    <div class="row" style="background-color: #113060; color: #ffffff; height: 35px; margin-left: 0px; margin-right: 0px; margin-top: 5px;">
                        <div class="col-sm-12" style="text-align: center;"><h5><b>RAISON DU REFUS</b></h5></div>
                    </div>
                    <div class = "row" >
                    <div class = "col-sm-12">';
                    echo $form->field($model, '_RAISON_REFUS')->textarea(['rows' => 3, 'maxlength' => '255'])->label('Attention, limite à 255 charactères');
                    echo '<br/>
                    </div>
                    </div>';
                    break;
                case 'PROMESSE':
//                    echo SelectWidget::widget(['label' => "Promesse", 'model' => $model, 'field' => 'NV_PROMESSE', 'form' => $form, 'data' => $model::getPromesses()]);
                    echo'
                    <div class="row" style="background-color: #113060; color: #ffffff; height: 35px; margin-left: 0px; margin-right: 0px; margin-top: 5px;">
                        <div class="col-sm-12" style="text-align: center;"><h5><b>PAS RECU</b></h5></div>
                    </div>';
                    echo $form->field($model, 'NV_PROMESSE')->dropDownList(\app\scripts\INACTIFS_DIOCESE_RELANCES\v1\models\DATA3da9b560fec24bdb906e138cca99681c::getPromesses(), [
                        'prompt' => 'Select type',
                        'onchange' => '
                                                    $.post( "index.php?r=' . $Module::getRoute() . '/default/list-periodicites&id=' . '"+$(this).val(), function( data ) {
                                                        $( "select#data3da9b560fec24bdb906e138cca99681c-nv_periodicite" ).html( data );
                                                    });'
                    ])->label('Promesse');

                    echo TextBoxWidget::widget(['label' => "Montant", 'model' => $model, 'field' => 'NV_MONTANT', 'form' => $form, 'ro' => false]);
                    echo SelectWidget::widget(['label' => "Périodicité", 'model' => $model, 'field' => 'NV_PERIODICITE', 'form' => $form, 'data' => \app\scripts\INACTIFS_DIOCESE_RELANCES\v1\models\DATA3da9b560fec24bdb906e138cca99681c::getPeriodicite($model->NV_PROMESSE)]);
                    echo '<label class="control-label" for=rown_datepa">Date du prochain prélévement</label>';
                    echo '<div id="rown_datepa" class = "row" >';
                    echo '<div class = "col-sm-3" > ' . $form->field($model, 'N_DATEPA_DAY')->textInput()->label('Jour') . '</div>';
                    echo '<div class = "col-sm-3" > ' . $form->field($model, 'N_DATEPA_MONTH')->dropDownList($model::getMonths(), ['prompt' => '--Select--'], ['class' => 'form-control inline-block updateindicator'])->label('Mois') . '</div>';
                    echo '<div class = "col-sm-3" > ' . $form->field($model, 'N_DATEPA_YEAR')->dropDownList($model::getYears(), ['prompt' => '--Select--'], ['class' => 'form-control inline-block updateindicator'])->label('Année') . '</div>';
                    echo '</div><br/>';
                    echo '<div id="rown_depot_paroisse" class = "row" >';
                    echo '<div class = "col-sm-3" > ' . CheckBoxWidget::widget(['label' => 'Dépot en paroisse : ', 'model' => $model, 'field' => '_DEPOT_PAROISSE', 'form' => $form]) . '</div>';
                    echo '</div>';
                    echo '<label class="control-label" for=rown_dateretour">Date de retour</label>';
                    echo '<div id="rown_dateretour" class = "row" >';
                    echo '<div class = "col-sm-3" > ' . $form->field($model, 'N_DATERETOUR_DAY')->textInput()->label('Jour') . '</div>';
                    echo '<div class = "col-sm-3" > ' . $form->field($model, 'N_DATERETOUR_MONTH')->dropDownList($model::getMonths(), ['prompt' => '--Select--'], ['class' => 'form-control inline-block updateindicator'])->label('Mois') . '</div>';
                    echo '<div class = "col-sm-3" > ' . $form->field($model, 'N_DATERETOUR_YEAR')->dropDownList($model::getYears(), ['prompt' => '--Select--'], ['class' => 'form-control inline-block updateindicator'])->label('Année') . '</div>';
                    echo '</div><br/>';
                    echo '<div id="rowrelances" class = "row" >';
                    echo '<div class = "col-sm-6" style="color:red"> ' . CheckBoxWidget::widget(['label' => 'Cochez la case si la personne ne souhaite pas être relancé : ', 'model' => $model, 'field' => '_NE_PAS_RELANCER', 'form' => $form]) . '</div>';
                    echo '</div>';
                    echo '</div><br/>';
                    echo '</div> 
                    </div>';
                    break;
                case 'VA/DEJAENVOYE':
//                    echo SelectWidget::widget(['label' => "Promesse", 'model' => $model, 'field' => 'NV_PROMESSE', 'form' => $form, 'data' => $model::getPromesses()]);
                    echo'
                    <div class="row" style="background-color: #113060; color: #ffffff; height: 35px; margin-left: 0px; margin-right: 0px; margin-top: 5px;">
                        <div class="col-sm-12" style="text-align: center;"><h5><b>VA ENVOYER / DEJA ENVOYE</b></h5></div>
                    </div>';
                    echo '<div id="rown_depot_paroisse" class = "row" >';
                    echo '<div class = "col-sm-3" > ' . CheckBoxWidget::widget(['label' => 'Dépot en paroisse : ', 'model' => $model, 'field' => '_DEPOT_PAROISSE', 'form' => $form]) . '</div>';
                    echo '</div>';
                    echo '<div id="rowrelances" class = "row" >';
                    echo '<div class = "col-sm-6" style="color:red"> ' . CheckBoxWidget::widget(['label' => 'Cochez la case si la personne ne souhaite pas être relancé : ', 'model' => $model, 'field' => '_NE_PAS_RELANCER', 'form' => $form]) . '</div>';
                    echo '</div>';
                    break;
            }

            switch ($model_qualifications->scenario) {
                case 'CALLBACK' : // RAPPEL
                    ?>
                    <div class="row" style="background-color: #113060; color: #ffffff; height: 29px; margin-left: 0px; margin-right: 0px; margin-top: 5px;">
                        <div class="col-sm-12" style="text-align: center;"><h5><b>EFFECTUER UN RAPPEL</b></h5></div>
                    </div>  
                    <div class="row">
                        <div class="col-sm-6">
                            <?php
                            echo DatePicker::widget([
                                'language' => 'fr',
                                'model' => $model_qualifications,
                                'form' => $form,
                                'name' => 'callback_date',
                                'readonly' => true,
                                'type' => DatePicker::TYPE_COMPONENT_APPEND,
                                'attribute' => 'callbackDate',
                                'pluginOptions' => [
                                    'autoclose' => true,
                                    'format' => 'dd-mm-yyyy',
                                    'todayHighlight' => true
                                ],
                            ]);
                            echo Html::error($model_qualifications, 'callback_date');

                            echo Html::error($model, 'callback_date');
                            ?>

                        </div>
                        <div class="col-sm-6">
                            <?php
                            echo $form->field($model_qualifications, 'callbackTime')->widget(TimePicker::classname(), [
                                'readonly' => true,
                                'pluginOptions' => [
                                    'showSeconds' => false,
                                    'showMeridian' => false,
                                ]
                            ])->label('Heure du rappel (entre 9h15 et 19h45)');
                            ?>
                        </div>


                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <?= TextBoxWidget::widget(['label' => 'Numéro de téléphone pour le rappel (facultatif)', 'model' => $$model_qualifications, 'field' => 'callbackPhone', 'form' => $form]) ?>
                        </div>
                    </div>            
                    <?php
                    break;
            }
            ?>
            <div class="row" style = "margin-top: 5px;">
                <div class="col-sm-12">
                    <?php
                    echo '<p style="text-align:center">';
                    ?>
                    <?=
                    Html::submitButton($NixxisQualification['Description'], ['class' => 'btn btn-success', 'style' => 'width:32%; font-size:10px; font-weight: bold;     padding: 6px 1px; ',
                        'onclick' => 'SetQualification("' . $NixxisQualification['Id'] . '")',
                    ])
                    ?>
                    <?php
                    echo '</p>';
                    ?>
                </div>

            </div> 
            <?= LineWidget::widget() ?>

            <div class="row" style = "margin-top: 5px;">
                <div class="col-sm-12">
                    <p style="text-align:center;margin-top: 5px;">
                        <?= ButtonWidget::widget(['label' => 'Retour', 'action' => 'default/index', 'parameters' => ['Internal__id__' => $model->Internal__id__]]) ?>
                    </p>
                </div>

            </div>  
            <?php ActiveForm::end(); ?> 
        </div>
    </div>
</div>

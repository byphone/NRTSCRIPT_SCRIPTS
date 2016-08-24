<?php

namespace app\scripts\UNADEV_UPGRADE\v1\models;

use Yii;
use yii\helpers\ArrayHelper;
use app\components\Validators\NixxisDateValidator;

class custommodel extends \app\models\Nixxis\Data {

    public $N_DATEPA_DAY;
    public $N_DATEPA_MONTH;
    public $N_DATEPA_YEAR;

    public function afterFind() {
        
    }

    public function beforeValidate() {
        parent::beforeValidate();
        if ($this->scenario == 'AUGPA' && !empty($this->N_DATEPA_MONTH)) {
            $this->N_DATEPA = $this->N_DATEPA_DAY . '/' . $this->N_DATEPA_MONTH . '/' . $this->N_DATEPA_YEAR;
        } else {
            $this->N_DATEPA = '';
        }

        if (($this->scenario == 'AUGPA' && (($this->N_MONTANT / $this->N_PERIODICITE) - ($this->A_MONTANT / $this->A_PERIODICITE)) <= 0)) {


            $this->addError('N_MONTANT', 'Augmentation négative ou nulle');
            return false;
        }

        return true;
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        $p_rules = parent::rules();
        $rules = [
            [['N_DATEPA_DAY', 'N_DATEPA_MONTH', 'N_DATEPA_YEAR', '_CHIENSCHATS'], 'safe'],
            [['N_MONTANT'], 'double', 'message' => 'La valeur doit être un montant valide'],
            [['N_MONTANT', 'N_PERIODICITE'], 'required', 'on' => 'AUGPA', 'message' => 'Ce champs ne peut être vide'],
            [['N_MONTANT'], 'required', 'on' => 'DSM/DSM EN LIGNE', 'message' => 'Ce champs ne peut être vide'],
            [['DATE_DE_NAISSANCE'], NixxisDateValidator::className()],
            ['N_MONTANT', 'compare', 'compareValue' => 0, 'operator' => '>', 'message' => 'Le montant doit être supérieur à 0'],
        ];
        return ArrayHelper::merge($p_rules, $rules);
    }

    public function beforeSave($insert) {
        parent::beforeSave($insert);

        if (($this->ADR1 != $this->getOldAttribute('ADR1')) || ($this->ADR2 != $this->getOldAttribute('ADR2')) || ($this->ADR3 != $this->getOldAttribute('ADR3')) || ($this->ADR4 != $this->getOldAttribute('ADR4')) || ($this->CP != $this->getOldAttribute('CP')) || ($this->VILLE != $this->getOldAttribute('VILLE')) || ($this->PAYS != $this->getOldAttribute('PAYS')) || ($this->NUMERO_DE_RUE != $this->getOldAttribute('NUMERO_DE_RUE')) || ($this->CODE_BIS != $this->getOldAttribute('CODE_BIS'))
        ) {
            $this->MODIF_ADRESSE = 1;
        }

        if (($this->TEL1 != $this->getOldAttribute('TEL1')) ||
                ($this->TEL2 != $this->getOldAttribute('TEL2')) ||
                ($this->TEL3 != $this->getOldAttribute('TEL3'))
        ) {
            $this->MODIF_TEL = 1;
        }

        if (($this->EMAIL1 != $this->getOldAttribute('EMAIL1')) || ($this->EMAIL2 != $this->getOldAttribute('EMAIL2'))) {
            $this->MODIF_EMAIL = 1;
        }
        return true;
    }

    public static function GetFormulaireCycles() {
        return array(
            ['id' => '1', 'name' => 'Tous les mois'],
            ['id' => '3', 'name' => 'Tous les 3 mois'],
            ['id' => '6', 'name' => 'Tous les 6 mois'],
            ['id' => '12', 'name' => 'Tous les 12 mois'],
        );
    }

    public static function GetTextCycle($cycle) {
        $tmp = null;
        $cyclesPA = self::GetFormulaireCycles();
        foreach ($cyclesPA as $cyclePA) {
            if ($cyclePA['id'] == $cycle) {
                $tmp = $cyclePA['name'];
            }
        }
        return $tmp;
    }

    public static function GetFormulaireChienChats() {
        return array(
            ['id' => 'CHIEN', 'name' => 'Chien'],
            ['id' => 'CHAT', 'name' => 'Chat'],
            ['id' => 'AUCUN', 'name' => 'Aucun'],
        );
    }

}

<?php

namespace app\scripts\CONQUETE_RELANCES\v1\models;

use Yii;
use yii\helpers\ArrayHelper;

class custommodel extends \app\models\Nixxis\Data {

    public $N_DATEPA_DAY;
    public $N_DATEPA_MONTH;
    public $N_DATEPA_YEAR;
    public $N_DATERETOUR_DAY;
    public $N_DATERETOUR_MONTH;
    public $N_DATERETOUR_YEAR;
    public $INTERLOCUTEUR;

    public function afterFind() {
        
    }

    public function beforeValidate() {
        parent::beforeValidate();

        if ($this->_INTERLOCUTEUR == 'AUTRE') {
            $this->_INTERLOCUTEUR = $this->_INTERLOCUTEUR . " : " . $this->INTERLOCUTEUR;
        }

        if ($this->NV_PROMESSE == 'PA' || $this->NV_PROMESSE == 'PAM') {
            $this->NV_DATEPA = $this->N_DATEPA_DAY . '/' . $this->N_DATEPA_MONTH . '/' . $this->N_DATEPA_YEAR;
        } else {
            $this->NV_DATEPA = '';
        }

        if ($this->scenario == 'PROMESSE') {
            if (!empty($this->N_DATERETOUR_DAY) && !empty($this->N_DATERETOUR_MONTH) && !empty($this->N_DATERETOUR_YEAR)) {
                $this->_DATE_RETOUR = $this->N_DATERETOUR_DAY . '/' . $this->N_DATERETOUR_MONTH . '/' . $this->N_DATERETOUR_YEAR;
            } else {
                $this->_DATE_RETOUR = '';
            }
        }
        return true;
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        $p_rules = parent::rules();
        $rules = [
            [['INTERLOCUTEUR', 'N_DATEPA_DAY', 'N_DATEPA_MONTH', 'N_DATEPA_YEAR', 'N_DATERETOUR_DAY', 'N_DATERETOUR_MONTH', 'N_DATERETOUR_YEAR'], 'safe'],
            [['NV_MONTANT'], 'double', 'message' => 'La valeur doit être un montant valide'],
            [['NV_PROMESSE'], 'required', 'on' => 'PROMESSE', 'message' => 'Ce champs ne peut être vide'],
            [['_DEPOT_PAROISSE'], 'required', 'on' => 'VA/DEJAENVOYE', 'message' => 'Ce champs ne peut être vide'],
            [['_RAISON_REFUS'], 'required', 'on' => 'REFUS_AUTRE', 'message' => 'Ce champs ne peut être vide'],
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

    public static function getFrequentationEglise() {
        return [
            '' => '',
            'JAMAIS (NON PRATIQUANT)' => 'Jamais (non pratiquant)',
            'EVENEMENTS' => 'Evènements',
            'REGULIERE' => 'Régulière',
            'MESSE A LA TV' => 'Messe à la TV',
        ];
    }

    public static function getImageEveque() {
        return [
            '' => '',
            'POSITIVE' => 'Positive',
            'NEUTRE' => 'Neutre',
            'NEGATIVE' => 'Négative',
        ];
    }

    public static function getPromesses() {
        return [
            'PAM' => 'PAM',
            'PA' => 'PA',
            'DSM' => 'DSM',
            'DS' => 'DS',
        ];
    }

    public static function getPeriodicitePAM() {
        return [
            '1' => 'Tous les mois',
            '3' => 'Tous les 3 mois',
            '6' => 'Tous les 6 mois',
            '12' => 'Tous les 12 mois',
        ];
    }

    public static function getPeriodicite($Promesse) {
        $data = array();
        switch ($Promesse) {
            case 'PAM':
                $data = self::getPeriodicitePAM();
                break;
            default:
                $data = ['' => '-'];
        }
        return $data;
    }

    public static function GetFormulaireCycles() {
        return array(
            ['id' => '', 'name' => ' '],
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

    public static function getInterlocuteur() {
        return [
            '' => '',
            'M' => 'Monsieur',
            'MME' => 'Madame',
            'AUTRE' => 'Autre',
        ];
    }

}

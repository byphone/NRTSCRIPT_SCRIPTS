<?php

namespace app\scripts\CONQUETE_TULLE\v1\models;

use Yii;
use yii\helpers\ArrayHelper;

class custommodel extends \app\models\Nixxis\Data {

    public $INTERLOCUTEUR;
    public $N_DATEPA_DAY;
    public $N_DATEPA_MONTH;
    public $N_DATEPA_YEAR;

    public function afterFind() {
        
    }

    public function beforeValidate() {
        parent::beforeValidate();

        if ($this->_INTERLOCUTEUR == 'AUTRE') {
            $this->_INTERLOCUTEUR = $this->_INTERLOCUTEUR . " : " . $this->INTERLOCUTEUR;
        }


        if ($this->scenario == 'PAM' || $this->scenario == 'PA') {
            $this->N_DATEPA = $this->N_DATEPA_DAY . '/' . $this->N_DATEPA_MONTH . '/' . $this->N_DATEPA_YEAR;
        } else {
            $this->N_DATEPA = '';
        }
        return true;
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        $p_rules = parent::rules();
        $rules = [
            [['INTERLOCUTEUR', 'N_DATEPA_DAY', 'N_DATEPA_MONTH', 'N_DATEPA_YEAR'], 'safe'],
            [['_RAISON_REFUS'], 'required', 'on' => 'APPARTENANCE_AUTRE_RELIGION', 'message' => 'Ce champs ne peut être vide'],
            [['_RAISON_REFUS'], 'required', 'on' => 'DECU_PAR_EGLISE', 'message' => 'Ce champs ne peut être vide'],
            [['_RAISON_REFUS'], 'required', 'on' => 'DON_AUTRE_ORGANISME', 'message' => 'Ce champs ne peut être vide'],
            [['_RAISON_REFUS'], 'required', 'on' => 'DON_AUTRE_DIOCESE', 'message' => 'Ce champs ne peut être vide'],
            [['_RAISON_REFUS'], 'required', 'on' => 'PAS_CONCERNE', 'message' => 'Ce champs ne peut être vide'],
            [['_RAISON_REFUS'], 'required', 'on' => 'RICHESSE_EGLISE', 'message' => 'Ce champs ne peut être vide'],
            [['_RAISON_REFUS'], 'required', 'on' => 'ANCIEN_DONATEUR_DECU', 'message' => 'Ce champs ne peut être vide'],
            [['_RAISON_REFUS'], 'required', 'on' => 'REFUS_AUTRE', 'message' => 'Ce champs ne peut être vide'],
            [['N_DATEPA_DAY', 'N_DATEPA_MONTH', 'N_DATEPA_YEAR', 'N_DATEPA', 'N_MONTANT', 'N_PERIODICITE'], 'required', 'on' => 'PAM', 'message' => 'Ce champs ne peut être vide'],
            [['N_DATEPA_DAY', 'N_DATEPA_MONTH', 'N_DATEPA_YEAR', 'N_DATEPA'], 'required', 'on' => 'PA', 'message' => 'Ce champs ne peut être vide'],
            [['N_MONTANT'], 'required', 'on' => 'DSM', 'message' => 'Ce champs ne peut être vide'],
            [['_DEPOT_PAROISSE'], 'required', 'on' => 'DS', 'message' => 'Ce champs ne peut être vide'],
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

    public static function getInterlocuteur() {
        return [
            '' => '',
            'M' => 'Monsieur',
            'MME' => 'Madame',
            'AUTRE' => 'Autre',
        ];
    }

    public static function getReligions() {
        return [
            'JUIF' => 'Juif',
            'MUSULMAN' => 'Musulman',
            'ORTHODOXE' => 'Orthodoxe',
            'PROTESTANT' => 'Protestant',
            'TEMOINS DE JEHOVA' => 'Témoins de Jéhova',
            'TRADITIONNALISTE' => 'Traditionnalisate',
            'NE SE PRONONCE PAS' => 'Ne se prononce pas',
        ];
    }

    public static function getDecuParEglise() {
        return [
            'PROBLEME LORS DE FUNERAILLES' => 'Problème lors de funérailles',
            'BAPTEME REFUSE' => 'Baptême refusé',
            'PROBLEME AVEC UN PRETRE' => 'Problème avec un prêtre',
            'PRETRES ETRANGERS' => 'Prêtes étrangers',
            'ABSENCE DE PRETRE' => 'Absence de prêtre',
            'REFUS DE COMMUNION' => 'Refus de communion',
            'REFUS DE MARIAGE' => 'Refus de mariage',
            'MANQUE DE MESSE' => 'Manque de messe',
            'ACCUEIL DES DIVORCES' => 'Accueil des divorcés',
        ];
    }

    public static function getDonAutreOrganisme() {
        return [
            'HUMANITAIRE' => 'Humanitaire',
            'ENFANCE' => 'Enfance',
            'SECOURS CATHOLIQUE' => 'Secours Catholique',
            'DONS LIES A L\'EGLISE (CHANTIERS, COMMUNAUTES RELIGIEUSE...)' => 'Dons liés à l\'Eglise (chantiers, communautés religieuses...)',
            'MEDICAL' => 'Médical',
            'NE SE PRONONCE PAS' => 'Ne se prononce pas',
        ];
    }

    public static function getDonAutreDiocese() {
        return [
            'DEMENAGEMENT' => 'Déménagement',
            'RESIDENCE SECONDAIRE' => 'Résidence secondaire',
        ];
    }

    public static function getPasConcerne() {
        return [
            'REPONSE NEUTRE' => 'Réponse neutre',
            'REPONSE PEU AIMABLE' => 'Réponse peu aimable',
        ];
    }

    public static function getRichesseEglise() {
        return [
            'DU VATICAN' => 'Du Vatican',
            'DU DIOCESE' => 'Du Diocèse',
            'DES PRETRES' => 'Des prêtres',
            'GASPILLAGE/MAUVAISE GESTION' => 'Gaspillage / Mauvaise gestion',
        ];
    }

    public static function getAncienDonateurDecu() {
        return [
            'PLUS CONCERNE' => 'Plus concerné',
            'PROBLEME RECU FISCAL' => 'Problème reçu fiscal',
            'ABSENCE REMERCIEMENTS' => 'Absence remerciements',
            'ABSENCE RETOUR INFORMATIONS' => 'Absence retour informations',
        ];
    }

    public static function getPeriodicite() {
        return [
            '1' => 'Tous les mois',
            '3' => 'Tous les 3 mois',
            '6' => 'Tous les 6 mois',
            '12' => 'Tous les 12 mois',
        ];
    }

}

<?php

namespace app\scripts\INACTIFS_DIOCESE_RELANCES\v1\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "DATA_3da9b560fec24bdb906e138cca99681c".
 *
 * @property string $Internal__id__
 * @property integer $MODIF_EMAIL
 * @property string $COMMENTAIRE_APPEL
 * @property string $PAYS
 * @property string $COMMENTAIRE_DERNIERE_RELANCE
 * @property integer $MODIF_TEL
 * @property string $A_MONTANT
 * @property string $COMMENTAIRE_DONATEUR
 * @property string $_FREQUENTATION_EGLISE
 * @property string $NV_DATEPA
 * @property string $VILLE
 * @property string $SOURCE_ID
 * @property string $ADR2
 * @property string $RETOUR_DATEIMPORT
 * @property string $_INTERLOCUTEUR
 * @property string $EMAIL2
 * @property string $IDENTIFIANT2
 * @property string $RS2
 * @property string $IDENTIFIANT1
 * @property string $CIV
 * @property string $SOURCE_ACCOUNT
 * @property string $NOM
 * @property integer $_CONNAIT_LE_DENIER
 * @property string $PRENOM
 * @property string $_DATE_RETOUR
 * @property string $_IMAGE_EVEQUE
 * @property string $RS1
 * @property string $N_MONTANT
 * @property string $ADR1
 * @property string $A_DATEPA
 * @property string $RETOUR_NOMFICHIER
 * @property string $RETOUR_COUPON
 * @property string $RETOUR_PREMIERPRELEVEMENT
 * @property string $N_PERIODICITE
 * @property string $A_PERIODICITE
 * @property string $EMAIL1
 * @property string $RETOUR_JOURPRELEVEMENT
 * @property string $ADR4
 * @property string $CP
 * @property integer $MODIF_ADRESSE
 * @property string $RETOUR_DATESIGNATURE
 * @property string $_PAROISSE
 * @property string $RETOUR_DATESAISIE
 * @property string $RETOUR_CATHEORIQUE
 * @property string $CODE_BIS
 * @property string $NUMERO_DE_RUE
 * @property string $ADR3
 * @property string $N_DATEPA
 * @property string $TEL3
 * @property string $DATE_DERNIERE_RELANCE
 * @property string $RETOUR_MONTANT
 * @property string $NB_JOUR_APPEL
 * @property string $COUNT
 * @property string $FILTRE
 * @property string $TOCALL
 * @property string $PRIORITE
 * @property string $SOURCE_QUALIFICATION
 * @property string $CODE_MEDIA
 * @property string $TEL1
 * @property string $RETOUR_PROMESSE
 * @property string $DATE_DE_NAISSANCE
 * @property string $_NOM_EVEQUE
 * @property string $NV_MONTANT
 * @property string $SOURCE_DATETIME
 * @property string $_NOM_DIOCESE
 * @property string $_RAISON_REFUS
 * @property string $TEL2
 * @property string $RETOUR_FLAG
 * @property string $NV_PROMESSE
 * @property string $NV_PERIODICITE
 * @property string $RETOUR_PERIODICITE
 * @property string $NB_JOUR_RELANCE
 * @property integer $_DEPOT_PAROISSE
 * @property integer $_NE_PAS_RELANCER
 */
class DATA3da9b560fec24bdb906e138cca99681c extends custommodel {

    /**
     * @inheritdoc
     */
    public static function

    tableName() {
        return 'DATA_3da9b560fec24bdb906e138cca99681c';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function

    getDb() {
        return Yii::$app->get('dbv2');
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        $p_rules = parent::rules();
        $rules = [
            [['Internal__id__'], 'required'],
            [['Internal__id__', 'COMMENTAIRE_APPEL', 'PAYS', 'COMMENTAIRE_DERNIERE_RELANCE', 'A_MONTANT', 'COMMENTAIRE_DONATEUR', '_FREQUENTATION_EGLISE', 'NV_DATEPA', 'VILLE', 'SOURCE_ID', 'ADR2', 'RETOUR_DATEIMPORT', '_INTERLOCUTEUR', 'EMAIL2', 'IDENTIFIANT2', 'RS2', 'IDENTIFIANT1', 'CIV', 'SOURCE_ACCOUNT', 'NOM', 'PRENOM', '_DATE_RETOUR', '_IMAGE_EVEQUE', 'RS1', 'N_MONTANT', 'ADR1', 'A_DATEPA', 'RETOUR_NOMFICHIER', 'RETOUR_COUPON', 'RETOUR_PREMIERPRELEVEMENT', 'N_PERIODICITE', 'A_PERIODICITE', 'EMAIL1', 'RETOUR_JOURPRELEVEMENT', 'ADR4', 'CP', 'RETOUR_DATESIGNATURE', '_PAROISSE', 'RETOUR_DATESAISIE', 'RETOUR_CATHEORIQUE', 'CODE_BIS', 'NUMERO_DE_RUE', 'ADR3', 'N_DATEPA', 'TEL3', 'DATE_DERNIERE_RELANCE', 'RETOUR_MONTANT', 'NB_JOUR_APPEL', 'COUNT', 'FILTRE', 'TOCALL', 'PRIORITE', 'SOURCE_QUALIFICATION', 'CODE_MEDIA', 'TEL1', 'RETOUR_PROMESSE', 'DATE_DE_NAISSANCE', '_NOM_EVEQUE', 'NV_MONTANT', 'SOURCE_DATETIME', '_NOM_DIOCESE', '_RAISON_REFUS', 'TEL2', 'RETOUR_FLAG', 'NV_PROMESSE', 'NV_PERIODICITE', 'RETOUR_PERIODICITE', 'NB_JOUR_RELANCE'], 'string'],
            [ ['MODIF_EMAIL', 'MODIF_TEL', '_CONNAIT_LE_DENIER', 'MODIF_ADRESSE',
                    '_DEPOT_PAROISSE', '_NE_PAS_RELANCER'], 'integer']
        ];
        return ArrayHelper::merge($p_rules, $rules);
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'Internal__id__' => 'Internal  ID',
            'MODIF_EMAIL' => 'Modif  Email',
            'COMMENTAIRE_APPEL' => 'Commentaire  Appel',
            'PAYS' => 'Pays',
            'COMMENTAIRE_DERNIERE_RELANCE' => 'Commentaire  Derniere  Relance',
            'MODIF_TEL' => 'Modif  Tel',
            'A_MONTANT' => 'A  Montant',
            'COMMENTAIRE_DONATEUR' => 'Commentaire  Donateur',
            '_FREQUENTATION_EGLISE' => 'Frequentation  Eglise',
            'NV_DATEPA' => 'Nv  Datepa',
            'VILLE' => 'Ville',
            'SOURCE_ID' => 'Source  ID',
            'ADR2' => 'Adr2',
            'RETOUR_DATEIMPORT' => 'Retour  Dateimport',
            '_INTERLOCUTEUR' => 'Interlocuteur',
            'EMAIL2' => 'Email2',
            'IDENTIFIANT2' => 'Identifiant2',
            'RS2' => 'Rs2',
            'IDENTIFIANT1' => 'Identifiant1',
            'CIV' => 'Civ',
            'SOURCE_ACCOUNT' => 'Source  Account',
            'NOM' => 'Nom',
            '_CONNAIT_LE_DENIER' => 'Connait  Le  Denier',
            'PRENOM' => 'Prenom',
            '_DATE_RETOUR' => 'Date  Retour',
            '_IMAGE_EVEQUE' => 'Image  Eveque',
            'RS1' => 'Rs1',
            'N_MONTANT' => 'N  Montant',
            'ADR1' => 'Adr1',
            'A_DATEPA' => 'A  Datepa',
            'RETOUR_NOMFICHIER' => 'Retour  Nomfichier',
            'RETOUR_COUPON' => 'Retour  Coupon',
            'RETOUR_PREMIERPRELEVEMENT' => 'Retour  Premierprelevement',
            'N_PERIODICITE' => 'N  Periodicite',
            'A_PERIODICITE' => 'A  Periodicite',
            'EMAIL1' => 'Email1',
            'RETOUR_JOURPRELEVEMENT' => 'Retour  Jourprelevement',
            'ADR4' => 'Adr4',
            'CP' => 'Cp',
            'MODIF_ADRESSE' => 'Modif  Adresse',
            'RETOUR_DATESIGNATURE' => 'Retour  Datesignature',
            '_PAROISSE' => 'Paroisse',
            'RETOUR_DATESAISIE' => 'Retour  Datesaisie',
            'RETOUR_CATHEORIQUE' => 'Retour  Catheorique',
            'CODE_BIS' => 'Code  Bis',
            'NUMERO_DE_RUE' => 'Numero  De  Rue',
            'ADR3' => 'Adr3',
            'N_DATEPA' => 'N  Datepa',
            'TEL3' => 'Tel3',
            'DATE_DERNIERE_RELANCE' => 'Date  Derniere  Relance',
            'RETOUR_MONTANT' => 'Retour  Montant',
            'NB_JOUR_APPEL' => 'Nb  Jour  Appel',
            'COUNT' => 'Count',
            'FILTRE' => 'Filtre',
            'TOCALL' => 'Tocall',
            'PRIORITE' => 'Priorite',
            'SOURCE_QUALIFICATION' => 'Source  Qualification',
            'CODE_MEDIA' => 'Code  Media',
            'TEL1' => 'Tel1',
            'RETOUR_PROMESSE' => 'Retour  Promesse',
            'DATE_DE_NAISSANCE' => 'Date  De  Naissance',
            '_NOM_EVEQUE' => 'Nom  Eveque',
            'NV_MONTANT' => 'Nv  Montant',
            'SOURCE_DATETIME' => 'Source  Datetime',
            '_NOM_DIOCESE' => 'Nom  Diocese',
            '_RAISON_REFUS' => 'Raison  Refus',
            'TEL2' => 'Tel2',
            'RETOUR_FLAG' => 'Retour  Flag',
            'NV_PROMESSE' => 'Nv  Promesse',
            'NV_PERIODICITE' => 'Nv  Periodicite',
            'RETOUR_PERIODICITE' => 'Retour  Periodicite',
            'NB_JOUR_RELANCE' => 'Nb  Jour  Relance',
            '_DEPOT_PAROISSE' => 'Depot  Paroisse',
            '_NE_PAS_RELANCER' => 'Ne  Pas  Relaner',
        ];
    }

}

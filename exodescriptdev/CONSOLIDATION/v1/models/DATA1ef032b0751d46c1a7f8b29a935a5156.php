<?php

namespace app\scripts\CONSOLIDATION\v1\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "DATA_1ef032b0751d46c1a7f8b29a935a5156".
 *
 * @property string $Internal__id__
 * @property string $CODE_MEDIA
 * @property string $IDENTIFIANT1
 * @property string $IDENTIFIANT2
 * @property string $RS1
 * @property string $RS2
 * @property string $CIV
 * @property string $NOM
 * @property string $PRENOM
 * @property string $ADR1
 * @property string $ADR2
 * @property string $NUMERO_DE_RUE
 * @property string $CODE_BIS
 * @property string $ADR3
 * @property string $ADR4
 * @property string $CP
 * @property string $VILLE
 * @property string $PAYS
 * @property integer $MODIF_ADRESSE
 * @property string $EMAIL1
 * @property string $EMAIL2
 * @property integer $MODIF_EMAIL
 * @property string $TEL1
 * @property string $TEL2
 * @property string $TEL3
 * @property integer $MODIF_TEL
 * @property string $DATE_DE_NAISSANCE
 * @property string $FILTRE
 * @property string $PRIORITE
 * @property string $COMMENTAIRE_APPEL
 * @property string $COMMENTAIRE_DONATEUR
 * @property string $A_MONTANT
 * @property string $A_PERIODICITE
 * @property string $A_DATEPA
 * @property string $N_MONTANT
 * @property string $N_PERIODICITE
 * @property string $N_DATEPA
 * @property string $SOURCE_ID
 * @property string $SOURCE_ACCOUNT
 * @property string $SOURCE_DATETIME
 * @property string $SOURCE_QUALIFICATION
 * @property string $RETOUR_FLAG
 * @property string $RETOUR_DATEIMPORT
 * @property string $RETOUR_NOMFICHIER
 * @property string $RETOUR_PROMESSE
 * @property string $RETOUR_MONTANT
 * @property string $RETOUR_PERIODICITE
 * @property string $RETOUR_COUPON
 * @property string $RETOUR_DATESIGNATURE
 * @property string $RETOUR_DATESAISIE
 * @property string $RETOUR_JOURPRELEVEMENT
 * @property string $RETOUR_PREMIERPRELEVEMENT
 * @property string $RETOUR_CATHEORIQUE
 * @property integer $_DEPOT_PAROISSE
 * @property string $_FREQUENTATION_EGLISE
 * @property string $_IMAGE_EVEQUE
 * @property string $_NOM_DIOCESE
 * @property string $_NOM_EVEQUE
 * @property string $NB_JOUR_APPEL
 * @property string $_DATE_RETOUR
 * @property string $_INTERLOCUTEUR
 * @property string $_RAISON_REFUS
 * @property string $_PAROISSE
 * @property string $TOCALL
 * @property string $A_COMMENTAIRE_APPEL
 * @property string $A_COMMENTAIRE_DONATEUR
 */
class DATA1ef032b0751d46c1a7f8b29a935a5156 extends custommodel {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'DATA_1ef032b0751d46c1a7f8b29a935a5156';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb() {
        return Yii::$app->get('dbv2');
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        $p_rules = parent::rules();
        $rules = [
            [['Internal__id__'], 'required'],
            [['Internal__id__', 'CODE_MEDIA', 'IDENTIFIANT1', 'IDENTIFIANT2', 'RS1', 'RS2', 'CIV', 'NOM', 'PRENOM', 'ADR1', 'ADR2', 'NUMERO_DE_RUE', 'CODE_BIS', 'ADR3', 'ADR4', 'CP', 'VILLE', 'PAYS', 'EMAIL1', 'EMAIL2', 'TEL1', 'TEL2', 'TEL3', 'DATE_DE_NAISSANCE', 'FILTRE', 'PRIORITE', 'COMMENTAIRE_APPEL', 'COMMENTAIRE_DONATEUR', 'A_MONTANT', 'A_PERIODICITE', 'A_DATEPA', 'N_MONTANT', 'N_PERIODICITE', 'N_DATEPA', 'SOURCE_ID', 'SOURCE_ACCOUNT', 'SOURCE_DATETIME', 'SOURCE_QUALIFICATION', 'RETOUR_FLAG', 'RETOUR_DATEIMPORT', 'RETOUR_NOMFICHIER', 'RETOUR_PROMESSE', 'RETOUR_MONTANT', 'RETOUR_PERIODICITE', 'RETOUR_COUPON', 'RETOUR_DATESIGNATURE', 'RETOUR_DATESAISIE', 'RETOUR_JOURPRELEVEMENT', 'RETOUR_PREMIERPRELEVEMENT', 'RETOUR_CATHEORIQUE', '_FREQUENTATION_EGLISE', '_IMAGE_EVEQUE', '_NOM_DIOCESE', '_NOM_EVEQUE', 'NB_JOUR_APPEL', '_DATE_RETOUR', '_INTERLOCUTEUR', '_RAISON_REFUS', 'TOCALL', '_PAROISSE', 'A_COMMENTAIRE_APPEL', 'A_COMMENTAIRE_DONATEUR'], 'string'],
            [['MODIF_ADRESSE', 'MODIF_EMAIL', 'MODIF_TEL', '_DEPOT_PAROISSE'], 'integer']
        ];
        return ArrayHelper::merge($p_rules, $rules);
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'Internal__id__' => 'Internal  ID',
            'CODE_MEDIA' => 'Code  Media',
            'IDENTIFIANT1' => 'Identifiant1',
            'IDENTIFIANT2' => 'Identifiant2',
            'RS1' => 'Rs1',
            'RS2' => 'Rs2',
            'CIV' => 'Civ',
            'NOM' => 'Nom',
            'PRENOM' => 'Prenom',
            'ADR1' => 'Adr1',
            'ADR2' => 'Adr2',
            'NUMERO_DE_RUE' => 'Numero  De  Rue',
            'CODE_BIS' => 'Code  Bis',
            'ADR3' => 'Adr3',
            'ADR4' => 'Adr4',
            'CP' => 'Cp',
            'VILLE' => 'Ville',
            'PAYS' => 'Pays',
            'MODIF_ADRESSE' => 'Modif  Adresse',
            'EMAIL1' => 'Email1',
            'EMAIL2' => 'Email2',
            'MODIF_EMAIL' => 'Modif  Email',
            'TEL1' => 'Tel1',
            'TEL2' => 'Tel2',
            'TEL3' => 'Tel3',
            'MODIF_TEL' => 'Modif  Tel',
            'DATE_DE_NAISSANCE' => 'Date  De  Naissance',
            'FILTRE' => 'Filtre',
            'PRIORITE' => 'Priorite',
            'COMMENTAIRE_APPEL' => 'Commentaire  Appel',
            'COMMENTAIRE_DONATEUR' => 'Commentaire  Donateur',
            'A_MONTANT' => 'A  Montant',
            'A_PERIODICITE' => 'A  Periodicite',
            'A_DATEPA' => 'A  Datepa',
            'N_MONTANT' => 'N  Montant',
            'N_PERIODICITE' => 'N  Periodicite',
            'N_DATEPA' => 'N  Datepa',
            'SOURCE_ID' => 'Source  ID',
            'SOURCE_ACCOUNT' => 'Source  Account',
            'SOURCE_DATETIME' => 'Source  Datetime',
            'SOURCE_QUALIFICATION' => 'Source  Qualification',
            'RETOUR_FLAG' => 'Retour  Flag',
            'RETOUR_DATEIMPORT' => 'Retour  Dateimport',
            'RETOUR_NOMFICHIER' => 'Retour  Nomfichier',
            'RETOUR_PROMESSE' => 'Retour  Promesse',
            'RETOUR_MONTANT' => 'Retour  Montant',
            'RETOUR_PERIODICITE' => 'Retour  Periodicite',
            'RETOUR_COUPON' => 'Retour  Coupon',
            'RETOUR_DATESIGNATURE' => 'Retour  Datesignature',
            'RETOUR_DATESAISIE' => 'Retour  Datesaisie',
            'RETOUR_JOURPRELEVEMENT' => 'Retour  Jourprelevement',
            'RETOUR_PREMIERPRELEVEMENT' => 'Retour  Premierprelevement',
            'RETOUR_CATHEORIQUE' => 'Retour  Catheorique',
            '_DEPOT_PAROISSE' => 'Depot  Paroisse',
            '_FREQUENTATION_EGLISE' => 'Frequentation  Eglise',
            '_IMAGE_EVEQUE' => 'Image  Eveque',
            '_NOM_DIOCESE' => 'Nom  Diocese',
            '_NOM_EVEQUE' => 'Nom  Eveque',
            'NB_JOUR_APPEL' => 'Nb  Jour  Appel',
            '_DATE_RETOUR' => 'Date  Retour',
            '_INTERLOCUTEUR' => 'Interlocuteur',
            '_RAISON_REFUS' => 'Raison  Refus',
            'TOCALL' => 'Tocall',
            '_PAROISSE' => 'Paroisse',
            'A_COMMENTAIRE_APPEL' => 'A  Commentaire  Appel',
            'A_COMMENTAIRE_DONATEUR' => 'A  Commentaire  Donateur',
        ];
    }

}

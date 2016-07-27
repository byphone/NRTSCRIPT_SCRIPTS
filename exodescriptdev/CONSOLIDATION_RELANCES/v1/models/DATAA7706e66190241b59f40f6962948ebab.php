<?php

namespace app\scripts\CONSOLIDATION_RELANCES\v1\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
* This is the model class for table "DATA_A7706e66190241b59f40f6962948ebab".
*
    * @property string $Internal__id__
    * @property string $NB_JOUR_APPEL
    * @property integer $MODIF_ADRESSE
    * @property string $PRENOM
    * @property string $RETOUR_PREMIERPRELEVEMENT
    * @property string $_NOM_EVEQUE
    * @property string $SOURCE_ID
    * @property string $NV_PERIODICITE
    * @property string $VILLE
    * @property string $CIV
    * @property string $NV_MONTANT
    * @property string $ADR2
    * @property string $A_PERIODICITE
    * @property string $ADR1
    * @property string $COMMENTAIRE_DERNIERE_RELANCE
    * @property string $_INTERLOCUTEUR
    * @property string $DATE_DE_NAISSANCE
    * @property string $NV_DATEPA
    * @property string $RETOUR_JOURPRELEVEMENT
    * @property string $RETOUR_DATESIGNATURE
    * @property string $RETOUR_DATESAISIE
    * @property string $CP
    * @property string $N_DATEPA
    * @property string $_DATE_RETOUR
    * @property integer $MODIF_TEL
    * @property string $N_MONTANT
    * @property integer $_CONNAIT_LE_DENIER
    * @property string $_NOM_DIOCESE
    * @property string $TOCALL
    * @property string $NOM
    * @property string $N_PERIODICITE
    * @property string $PRIORITE
    * @property string $FILTRE
    * @property string $_RAISON_REFUS
    * @property string $IDENTIFIANT1
    * @property string $DATE_DERNIERE_RELANCE
    * @property string $NUMERO_DE_RUE
    * @property string $EMAIL2
    * @property string $A_MONTANT
    * @property string $RETOUR_MONTANT
    * @property string $COMMENTAIRE_APPEL
    * @property string $TEL1
    * @property string $PAYS
    * @property string $EMAIL1
    * @property string $RS1
    * @property string $RS2
    * @property string $RETOUR_PROMESSE
    * @property string $TEL2
    * @property string $RETOUR_FLAG
    * @property string $_PAROISSE
    * @property integer $_DEPOT_PAROISSE
    * @property string $_FREQUENTATION_EGLISE
    * @property string $IDENTIFIANT2
    * @property string $COUNT
    * @property string $COMMENTAIRE_DONATEUR
    * @property string $RETOUR_CATHEORIQUE
    * @property string $CODE_MEDIA
    * @property string $A_DATEPA
    * @property integer $MODIF_EMAIL
    * @property string $RETOUR_DATEIMPORT
    * @property string $_IMAGE_EVEQUE
    * @property string $RETOUR_PERIODICITE
    * @property string $SOURCE_DATETIME
    * @property string $SOURCE_ACCOUNT
    * @property string $ADR3
    * @property string $SOURCE_QUALIFICATION
    * @property string $NB_JOUR_RELANCE
    * @property string $RETOUR_COUPON
    * @property string $NV_PROMESSE
    * @property string $ADR4
    * @property string $TEL3
    * @property string $CODE_BIS
    * @property string $RETOUR_NOMFICHIER
    * @property integer $_NE_PAS_RELANCER
*/
class DATAA7706e66190241b59f40f6962948ebab extends custommodel
{
/**
* @inheritdoc
*/
public static function tableName()
{
return 'DATA_A7706e66190241b59f40f6962948ebab';
}

    /**
    * @return \yii\db\Connection the database connection used by this AR class.
    */
    public static function getDb()
    {
    return Yii::$app->get('dbv2');
    }

/**
* @inheritdoc
*/
public function rules()
{
$p_rules = parent::rules();
$rules = [
            [['Internal__id__'], 'required'],
            [['Internal__id__', 'NB_JOUR_APPEL', 'PRENOM', 'RETOUR_PREMIERPRELEVEMENT', '_NOM_EVEQUE', 'SOURCE_ID', 'NV_PERIODICITE', 'VILLE', 'CIV', 'NV_MONTANT', 'ADR2', 'A_PERIODICITE', 'ADR1', 'COMMENTAIRE_DERNIERE_RELANCE', '_INTERLOCUTEUR', 'DATE_DE_NAISSANCE', 'NV_DATEPA', 'RETOUR_JOURPRELEVEMENT', 'RETOUR_DATESIGNATURE', 'RETOUR_DATESAISIE', 'CP', 'N_DATEPA', '_DATE_RETOUR', 'N_MONTANT', '_NOM_DIOCESE', 'TOCALL', 'NOM', 'N_PERIODICITE', 'PRIORITE', 'FILTRE', '_RAISON_REFUS', 'IDENTIFIANT1', 'DATE_DERNIERE_RELANCE', 'NUMERO_DE_RUE', 'EMAIL2', 'A_MONTANT', 'RETOUR_MONTANT', 'COMMENTAIRE_APPEL', 'TEL1', 'PAYS', 'EMAIL1', 'RS1', 'RS2', 'RETOUR_PROMESSE', 'TEL2', 'RETOUR_FLAG', '_PAROISSE', '_FREQUENTATION_EGLISE', 'IDENTIFIANT2', 'COUNT', 'COMMENTAIRE_DONATEUR', 'RETOUR_CATHEORIQUE', 'CODE_MEDIA', 'A_DATEPA', 'RETOUR_DATEIMPORT', '_IMAGE_EVEQUE', 'RETOUR_PERIODICITE', 'SOURCE_DATETIME', 'SOURCE_ACCOUNT', 'ADR3', 'SOURCE_QUALIFICATION', 'NB_JOUR_RELANCE', 'RETOUR_COUPON', 'NV_PROMESSE', 'ADR4', 'TEL3', 'CODE_BIS', 'RETOUR_NOMFICHIER'], 'string'],
            [['MODIF_ADRESSE', 'MODIF_TEL', '_CONNAIT_LE_DENIER', '_DEPOT_PAROISSE', 'MODIF_EMAIL', '_NE_PAS_RELANCER'], 'integer']
        ];
return ArrayHelper::merge($p_rules, $rules);
}

/**
* @inheritdoc
*/
public function attributeLabels()
{
return [
    'Internal__id__' => 'Internal  ID',
    'NB_JOUR_APPEL' => 'Nb  Jour  Appel',
    'MODIF_ADRESSE' => 'Modif  Adresse',
    'PRENOM' => 'Prenom',
    'RETOUR_PREMIERPRELEVEMENT' => 'Retour  Premierprelevement',
    '_NOM_EVEQUE' => 'Nom  Eveque',
    'SOURCE_ID' => 'Source  ID',
    'NV_PERIODICITE' => 'Nv  Periodicite',
    'VILLE' => 'Ville',
    'CIV' => 'Civ',
    'NV_MONTANT' => 'Nv  Montant',
    'ADR2' => 'Adr2',
    'A_PERIODICITE' => 'A  Periodicite',
    'ADR1' => 'Adr1',
    'COMMENTAIRE_DERNIERE_RELANCE' => 'Commentaire  Derniere  Relance',
    '_INTERLOCUTEUR' => 'Interlocuteur',
    'DATE_DE_NAISSANCE' => 'Date  De  Naissance',
    'NV_DATEPA' => 'Nv  Datepa',
    'RETOUR_JOURPRELEVEMENT' => 'Retour  Jourprelevement',
    'RETOUR_DATESIGNATURE' => 'Retour  Datesignature',
    'RETOUR_DATESAISIE' => 'Retour  Datesaisie',
    'CP' => 'Cp',
    'N_DATEPA' => 'N  Datepa',
    '_DATE_RETOUR' => 'Date  Retour',
    'MODIF_TEL' => 'Modif  Tel',
    'N_MONTANT' => 'N  Montant',
    '_CONNAIT_LE_DENIER' => 'Connait  Le  Denier',
    '_NOM_DIOCESE' => 'Nom  Diocese',
    'TOCALL' => 'Tocall',
    'NOM' => 'Nom',
    'N_PERIODICITE' => 'N  Periodicite',
    'PRIORITE' => 'Priorite',
    'FILTRE' => 'Filtre',
    '_RAISON_REFUS' => 'Raison  Refus',
    'IDENTIFIANT1' => 'Identifiant1',
    'DATE_DERNIERE_RELANCE' => 'Date  Derniere  Relance',
    'NUMERO_DE_RUE' => 'Numero  De  Rue',
    'EMAIL2' => 'Email2',
    'A_MONTANT' => 'A  Montant',
    'RETOUR_MONTANT' => 'Retour  Montant',
    'COMMENTAIRE_APPEL' => 'Commentaire  Appel',
    'TEL1' => 'Tel1',
    'PAYS' => 'Pays',
    'EMAIL1' => 'Email1',
    'RS1' => 'Rs1',
    'RS2' => 'Rs2',
    'RETOUR_PROMESSE' => 'Retour  Promesse',
    'TEL2' => 'Tel2',
    'RETOUR_FLAG' => 'Retour  Flag',
    '_PAROISSE' => 'Paroisse',
    '_DEPOT_PAROISSE' => 'Depot  Paroisse',
    '_FREQUENTATION_EGLISE' => 'Frequentation  Eglise',
    'IDENTIFIANT2' => 'Identifiant2',
    'COUNT' => 'Count',
    'COMMENTAIRE_DONATEUR' => 'Commentaire  Donateur',
    'RETOUR_CATHEORIQUE' => 'Retour  Catheorique',
    'CODE_MEDIA' => 'Code  Media',
    'A_DATEPA' => 'A  Datepa',
    'MODIF_EMAIL' => 'Modif  Email',
    'RETOUR_DATEIMPORT' => 'Retour  Dateimport',
    '_IMAGE_EVEQUE' => 'Image  Eveque',
    'RETOUR_PERIODICITE' => 'Retour  Periodicite',
    'SOURCE_DATETIME' => 'Source  Datetime',
    'SOURCE_ACCOUNT' => 'Source  Account',
    'ADR3' => 'Adr3',
    'SOURCE_QUALIFICATION' => 'Source  Qualification',
    'NB_JOUR_RELANCE' => 'Nb  Jour  Relance',
    'RETOUR_COUPON' => 'Retour  Coupon',
    'NV_PROMESSE' => 'Nv  Promesse',
    'ADR4' => 'Adr4',
    'TEL3' => 'Tel3',
    'CODE_BIS' => 'Code  Bis',
    'RETOUR_NOMFICHIER' => 'Retour  Nomfichier',
    '_NE_PAS_RELANCER' => 'Ne  Pas  Relancer',
];
}
}

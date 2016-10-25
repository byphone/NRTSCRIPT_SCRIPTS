<?php

namespace app\scripts\UNADEV_FACTEURS\v1\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
* This is the model class for table "DATA_9cd8682fa7a34c50b37332e82d7b807a".
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
    * @property string $A_DATEDS
    * @property string $N_MONTANT
    * @property string $N_PERIODICITE
    * @property string $N_DATEPA
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
    * @property string $CHIENCHATS
    * @property string $_REMARQUE
    * @property string $_DATE_MARCHE
    * @property string $_CADEAU
    * @property string $_PROMESSEENVOYEE
    * @property string $ID_RELANCE
    * @property string $TYPE_RELANCE
*/
class DATA9cd8682fa7a34c50b37332e82d7b807a extends custommodel
{
/**
* @inheritdoc
*/
public static function tableName()
{
return 'DATA_9cd8682fa7a34c50b37332e82d7b807a';
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
            [['Internal__id__', 'CODE_MEDIA', 'IDENTIFIANT1', 'IDENTIFIANT2', 'RS1', 'RS2', 'CIV', 'NOM', 'PRENOM', 'ADR1', 'ADR2', 'NUMERO_DE_RUE', 'CODE_BIS', 'ADR3', 'ADR4', 'CP', 'VILLE', 'PAYS', 'EMAIL1', 'EMAIL2', 'TEL1', 'TEL2', 'TEL3', 'DATE_DE_NAISSANCE', 'FILTRE', 'PRIORITE', 'COMMENTAIRE_APPEL', 'COMMENTAIRE_DONATEUR', 'A_MONTANT', 'A_PERIODICITE', 'A_DATEPA', 'A_DATEDS', 'N_MONTANT', 'N_PERIODICITE', 'N_DATEPA', 'RETOUR_FLAG', 'RETOUR_DATEIMPORT', 'RETOUR_NOMFICHIER', 'RETOUR_PROMESSE', 'RETOUR_MONTANT', 'RETOUR_PERIODICITE', 'RETOUR_COUPON', 'RETOUR_DATESIGNATURE', 'RETOUR_DATESAISIE', 'RETOUR_JOURPRELEVEMENT', 'RETOUR_PREMIERPRELEVEMENT', 'RETOUR_CATHEORIQUE', 'CHIENCHATS', '_REMARQUE', '_DATE_MARCHE', '_CADEAU', '_PROMESSEENVOYEE', 'ID_RELANCE', 'TYPE_RELANCE'], 'string'],
            [['MODIF_ADRESSE', 'MODIF_EMAIL', 'MODIF_TEL'], 'integer']
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
    'A_DATEDS' => 'A  Dateds',
    'N_MONTANT' => 'N  Montant',
    'N_PERIODICITE' => 'N  Periodicite',
    'N_DATEPA' => 'N  Datepa',
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
    'CHIENCHATS' => 'Chienchats',
    '_REMARQUE' => 'Remarque',
    '_DATE_MARCHE' => 'Date  Marche',
    '_CADEAU' => 'Cadeau',
    '_PROMESSEENVOYEE' => 'Promesseenvoyee',
    'ID_RELANCE' => 'Id  Relance',
    'TYPE_RELANCE' => 'Type  Relance',
];
}
}

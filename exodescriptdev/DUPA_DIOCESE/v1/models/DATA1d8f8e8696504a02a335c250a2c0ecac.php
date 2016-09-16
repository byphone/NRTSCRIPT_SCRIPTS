<?php

namespace app\scripts\DUPA_DIOCESE\v1\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
* This is the model class for table "DATA_1d8f8e8696504a02a335c250a2c0ecac".
*
    * @property string $Internal__id__
    * @property string $A_DATEPA
    * @property string $PRENOM
    * @property string $TEL3
    * @property string $RETOUR_NOMFICHIER
    * @property string $NOM
    * @property string $COMMENTAIRE_DONATEUR
    * @property integer $_DEPOT_PAROISSE
    * @property string $ADR2
    * @property string $_NOM_EVEQUE
    * @property string $RETOUR_CATHEORIQUE
    * @property string $ADR3
    * @property string $EMAIL1
    * @property string $FILTRE
    * @property string $RETOUR_JOURPRELEVEMENT
    * @property string $NUMERO_DE_RUE
    * @property string $CODE_MEDIA
    * @property string $RETOUR_PREMIERPRELEVEMENT
    * @property string $RETOUR_COUPON
    * @property string $_PAROISSE
    * @property string $DATE_DE_NAISSANCE
    * @property string $A_PERIODICITE
    * @property string $RETOUR_FLAG
    * @property string $EMAIL2
    * @property string $_DATE_RETOUR
    * @property string $RETOUR_DATESIGNATURE
    * @property string $CP
    * @property string $TEL2
    * @property string $RS2
    * @property integer $MODIF_EMAIL
    * @property string $RETOUR_PROMESSE
    * @property string $A_MONTANT
    * @property string $ADR1
    * @property string $_NOM_DIOCESE
    * @property string $RETOUR_PERIODICITE
    * @property string $N_PERIODICITE
    * @property string $RETOUR_DATESAISIE
    * @property string $CIV
    * @property string $RETOUR_MONTANT
    * @property string $CODE_BIS
    * @property string $RS1
    * @property string $_INTERLOCUTEUR
    * @property string $_RAISON_REFUS
    * @property string $N_DATEPA
    * @property string $IDENTIFIANT2
    * @property string $ADR4
    * @property integer $MODIF_ADRESSE
    * @property string $IDENTIFIANT1
    * @property string $PAYS
    * @property string $RETOUR_DATEIMPORT
    * @property string $COMMENTAIRE_APPEL
    * @property string $ID_RELANCE
    * @property integer $MODIF_TEL
    * @property string $TEL1
    * @property string $N_MONTANT
    * @property string $PRIORITE
    * @property string $VILLE
*/
class DATA1d8f8e8696504a02a335c250a2c0ecac extends custommodel
{
/**
* @inheritdoc
*/
public static function tableName()
{
return 'DATA_1d8f8e8696504a02a335c250a2c0ecac';
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
            [['Internal__id__', 'A_DATEPA', 'PRENOM', 'TEL3', 'RETOUR_NOMFICHIER', 'NOM', 'COMMENTAIRE_DONATEUR', 'ADR2', '_NOM_EVEQUE', 'RETOUR_CATHEORIQUE', 'ADR3', 'EMAIL1', 'FILTRE', 'RETOUR_JOURPRELEVEMENT', 'NUMERO_DE_RUE', 'CODE_MEDIA', 'RETOUR_PREMIERPRELEVEMENT', 'RETOUR_COUPON', '_PAROISSE', 'DATE_DE_NAISSANCE', 'A_PERIODICITE', 'RETOUR_FLAG', 'EMAIL2', '_DATE_RETOUR', 'RETOUR_DATESIGNATURE', 'CP', 'TEL2', 'RS2', 'RETOUR_PROMESSE', 'A_MONTANT', 'ADR1', '_NOM_DIOCESE', 'RETOUR_PERIODICITE', 'N_PERIODICITE', 'RETOUR_DATESAISIE', 'CIV', 'RETOUR_MONTANT', 'CODE_BIS', 'RS1', '_INTERLOCUTEUR', '_RAISON_REFUS', 'N_DATEPA', 'IDENTIFIANT2', 'ADR4', 'IDENTIFIANT1', 'PAYS', 'RETOUR_DATEIMPORT', 'COMMENTAIRE_APPEL', 'ID_RELANCE', 'TEL1', 'N_MONTANT', 'PRIORITE', 'VILLE'], 'string'],
            [['_DEPOT_PAROISSE', 'MODIF_EMAIL', 'MODIF_ADRESSE', 'MODIF_TEL'], 'integer']
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
    'A_DATEPA' => 'A  Datepa',
    'PRENOM' => 'Prenom',
    'TEL3' => 'Tel3',
    'RETOUR_NOMFICHIER' => 'Retour  Nomfichier',
    'NOM' => 'Nom',
    'COMMENTAIRE_DONATEUR' => 'Commentaire  Donateur',
    '_DEPOT_PAROISSE' => 'Depot  Paroisse',
    'ADR2' => 'Adr2',
    '_NOM_EVEQUE' => 'Nom  Eveque',
    'RETOUR_CATHEORIQUE' => 'Retour  Catheorique',
    'ADR3' => 'Adr3',
    'EMAIL1' => 'Email1',
    'FILTRE' => 'Filtre',
    'RETOUR_JOURPRELEVEMENT' => 'Retour  Jourprelevement',
    'NUMERO_DE_RUE' => 'Numero  De  Rue',
    'CODE_MEDIA' => 'Code  Media',
    'RETOUR_PREMIERPRELEVEMENT' => 'Retour  Premierprelevement',
    'RETOUR_COUPON' => 'Retour  Coupon',
    '_PAROISSE' => 'Paroisse',
    'DATE_DE_NAISSANCE' => 'Date  De  Naissance',
    'A_PERIODICITE' => 'A  Periodicite',
    'RETOUR_FLAG' => 'Retour  Flag',
    'EMAIL2' => 'Email2',
    '_DATE_RETOUR' => 'Date  Retour',
    'RETOUR_DATESIGNATURE' => 'Retour  Datesignature',
    'CP' => 'Cp',
    'TEL2' => 'Tel2',
    'RS2' => 'Rs2',
    'MODIF_EMAIL' => 'Modif  Email',
    'RETOUR_PROMESSE' => 'Retour  Promesse',
    'A_MONTANT' => 'A  Montant',
    'ADR1' => 'Adr1',
    '_NOM_DIOCESE' => 'Nom  Diocese',
    'RETOUR_PERIODICITE' => 'Retour  Periodicite',
    'N_PERIODICITE' => 'N  Periodicite',
    'RETOUR_DATESAISIE' => 'Retour  Datesaisie',
    'CIV' => 'Civ',
    'RETOUR_MONTANT' => 'Retour  Montant',
    'CODE_BIS' => 'Code  Bis',
    'RS1' => 'Rs1',
    '_INTERLOCUTEUR' => 'Interlocuteur',
    '_RAISON_REFUS' => 'Raison  Refus',
    'N_DATEPA' => 'N  Datepa',
    'IDENTIFIANT2' => 'Identifiant2',
    'ADR4' => 'Adr4',
    'MODIF_ADRESSE' => 'Modif  Adresse',
    'IDENTIFIANT1' => 'Identifiant1',
    'PAYS' => 'Pays',
    'RETOUR_DATEIMPORT' => 'Retour  Dateimport',
    'COMMENTAIRE_APPEL' => 'Commentaire  Appel',
    'ID_RELANCE' => 'Id  Relance',
    'MODIF_TEL' => 'Modif  Tel',
    'TEL1' => 'Tel1',
    'N_MONTANT' => 'N  Montant',
    'PRIORITE' => 'Priorite',
    'VILLE' => 'Ville',
];
}
}

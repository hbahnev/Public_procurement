<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "applications".
 *
 * @property integer $id
 * @property integer $contract_number
 * @property string $price
 * @property string $deadline
 * @property integer $guarantee
 * @property string $name
 * @property string $bulstat
 * @property string $address
 * @property string $phone
 * @property string $Additional
 * @property integer $owner_id
 * @property string $isActive
 *
 * @property Contractt $contractNumber
 */
class Applications extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'applications';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['contract_number', 'price', 'deadline', 'guarantee', 'name', 'bulstat', 'address', 'phone', 'Additional', 'owner_id'], 'required','message'=>'Това поле е задължително'],
            [['contract_number', 'guarantee', 'owner_id'], 'integer','message'=>'Моля въвеждайте целочислени стойности'],
            [['price'], 'number','message' => 'Това поле трябва да е с цифри'],
            [['deadline'], 'safe'],
            [['Additional', 'isActive'], 'string'],
            [['name'], 'string', 'max' => 50],
            [['bulstat', 'phone'], 'string', 'max' => 25],
            [['address'], 'string', 'max' => 200],
            [['contract_number'], 'exist', 'skipOnError' => true, 'targetClass' => Contract::className(), 'targetAttribute' => ['contract_number' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'contract_number' => 'Договор',
            'price' => 'Цена в лева',
            'deadline' => 'Срок',
            'guarantee' => 'Години гаранция',
            'name' => 'Име',
            'bulstat' => 'Булстат',
            'address' => 'Адрес',
            'phone' => 'Телефон',
            'Additional' => 'Допълнително',
            'owner_id' => 'Owner ID',
            'isActive' => 'Активен ли е?',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContractNumber()
    {
        return $this->hasOne(Contractt::className(), ['id' => 'contract_number']);
    }
}

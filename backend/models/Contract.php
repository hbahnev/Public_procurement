<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "contractt".
 *
 * @property integer $id
 * @property string $price
 * @property string $deadline_complete
 * @property string $deadline_application
 * @property string $object
 * @property string $contract_more
 * @property integer $guarantee
 * @property string $status
 * @property string $annex
 * @property string $checkout
 */
class Contract extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'contractt';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title','price', 'deadline_complete', 'deadline_application', 'object', 'contract_more', 'guarantee', 'status', 'annex', 'checkout'], 'required','message'=>'Това поле не може да е празно'],
            [['price'], 'number','message'=>'Това поле трябва да е с цифри'],
            [['deadline_complete', 'deadline_application'], 'safe'],
            [['object', 'contract_more', 'status', 'annex', 'checkout','filePath'], 'string'],
            [['guarantee'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Номер на договора',
			'title' => 'Име',
            'price' => 'Цена в лева',
            'deadline_complete' => 'Крайна дата за изпълнение',
            'deadline_application' => 'Крайна дата кандидатури',
            'object' => 'Обект',
            'contract_more' => 'Информация',
            'guarantee' => 'Години гаранция',
            'status' => 'Статус',
            'annex' => 'Приложение',
            'checkout' => 'Плащане',
			'filePath' => 'File Path'
        ];
    }
}

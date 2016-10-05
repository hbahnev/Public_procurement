<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "maintainers".
 *
 * @property integer $id
 * @property string $name
 * @property string $address
 * @property string $email
 * @property string $phone
 * @property string $obl
 * @property string $contract
 */
class Maintainers extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'maintainers';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'address', 'email', 'phone', 'obl', 'contract'], 'required'],
            [['obl'], 'string'],
            [['name', 'address', 'email', 'phone', 'contract'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Име',
            'address' => 'Адрес',
            'email' => 'Имейл',
            'phone' => 'Телефон',
            'obl' => 'Област на обществената поръчка',
            'contract' => 'Отговорник за договор',
        ];
    }
}

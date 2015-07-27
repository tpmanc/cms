<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "paymentType".
 *
 * @property integer $id
 * @property string $title
 * @property string $text
 * @property integer $isDisabled
 */
class PaymentType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'paymentType';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['text'], 'string'],
            [['isDisabled'], 'boolean'],
            ['isDisabled', 'default', 'value' => 0],
            [['title'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app/paymentType', 'ID'),
            'title' => Yii::t('app/paymentType', 'Title'),
            'text' => Yii::t('app/paymentType', 'Text'),
            'isDisabled' => Yii::t('app/paymentType', 'Is Disabled'),
        ];
    }
}

<?php

namespace common\models;

use Yii;
use common\models\OrderProducts;

/**
 * This is the model class for table "order".
 *
 * @property integer $id
 * @property integer $orderProductsId
 * @property string $name
 * @property string $adress
 * @property string $phone
 * @property string $email
 * @property string $extraInformation
 * @property integer $deliveryType
 * @property integer $paymentType
 * @property integer $date
 * @property integer $discount
 * @property integer $totalPrice
 *
 * @property OrderProducts[] $orderProducts
 */
// TODO: быстрый заказ и обратный звонок
class Order extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'order';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'phone', 'deliveryType', 'paymentType'], 'required'],
            [['orderProductsId', 'deliveryType', 'paymentType', 'date', 'discount', 'totalPrice'], 'integer'],
            [['name', 'adress', 'phone', 'email', 'extraInformation'], 'string', 'max' => 255],
            ['email', 'email'],

            [['discount', 'orderProductsId', 'totalPrice'], 'default', 'value' => 0],
            ['date', 'default', 'value' => time()],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'orderProductsId' => 'Order Products ID',
            'name' => Yii::t('app/order', 'Name'),
            'adress' => Yii::t('app/order', 'Adress'),
            'phone' => Yii::t('app/order', 'Phone'),
            'email' => Yii::t('app/order', 'Email'),
            'extraInformation' => Yii::t('app/order', 'Extra Information'),
            'deliveryType' => Yii::t('app/order', 'Delivery Type'),
            'paymentType' => Yii::t('app/order', 'Payment Type'),
            'date' => Yii::t('app/order', 'Date'),
            'discount' => Yii::t('app/order', 'Discount'),
            'totalPrice' => Yii::t('app/order', 'Total Price'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderProducts()
    {
        return $this->hasMany(OrderProducts::className(), ['orderId' => 'id']);
    }

    public function beforeSave($insert)
    {
        if ($this->isNewRecord) {
            // $products = new OrderProducts();
        }
     
        return parent::beforeSave($insert);
    }
}

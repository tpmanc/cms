<?php

namespace common\models;

use Yii;
use common\models\Order;

/**
 * This is the model class for table "orderProducts".
 *
 * @property integer $id
 * @property integer $orderId
 * @property integer $productId
 * @property integer $amount
 *
 * @property Order $order
 */
class OrderProducts extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'orderProducts';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['orderId', 'productId', 'amount'], 'required'],
            [['orderId', 'productId', 'amount'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'orderId' => 'Order ID',
            'productId' => 'Product ID',
            'amount' => Yii::t('app/orderProducts', 'Amount'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrder()
    {
        return $this->hasOne(Order::className(), ['id' => 'orderId']);
    }
}

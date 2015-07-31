<?php

namespace common\models;

use Yii;
use common\models\Product;

/**
 * This is the model class for table "orderProducts".
 *
 * @property integer $id
 * @property integer $orderId
 * @property integer $productId
 * @property integer $amount
 *
 * @property Product $product
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
    public function getInfo()
    {
        return $this->hasOne(Product::className(), ['id' => 'productId']);
    }
}

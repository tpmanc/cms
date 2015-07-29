<?php

namespace common\models;

use Yii;
use common\models\Product;

/**
 * This is the model class for table "productRests".
 *
 * @property integer $id
 * @property integer $productId
 * @property integer $amount
 */
class ProductRests extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'productRests';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['productId', 'amount'], 'required'],
            [['productId', 'amount'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app/productRests', 'ID'),
            'productId' => Yii::t('app/productRests', 'Product ID'),
            'amount' => Yii::t('app/productRests', 'Amount'),
        ];
    }

    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'productId']);
    }
}

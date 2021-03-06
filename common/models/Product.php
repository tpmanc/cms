<?php

namespace common\models;

use Yii;
use yii\helpers\Html;
use common\models\Category;
use common\models\productCategories;
use common\models\ProductRests;
use tpmanc\filebehavior\FileBehavior;

/**
 * This is the model class for table "product".
 *
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property string $shortDescription
 * @property integer $netCost
 * @property integer $price
 * @property integer $discount
 * @property string $nomenclature
 * @property double $length
 * @property double $width
 * @property double $height
 * @property double $weight
 * @property string $seoTitle
 * @property string $seoDescription
 * @property string $seoKeywords
 * @property string $chpu
 * @property integer $fakeInStock
 * @property integer $isDisabled
 */
class Product extends \yii\db\ActiveRecord
{
    public $mainCategory;

    public $additionalCategories = [];

    public $file;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product';
    }

    public function behaviors()
    {
        return [
            'FileBehavior' => [
                'class' => FileBehavior::className(),
                'fileModel' => 'common\models\Image',
                'fileLinkModel' => 'common\models\productImage',
                'fileVar' => 'file',
                'fileType' => 'image',
                'fileFolder' => '@upload/product',
                'imageSizes' => [
                    'original' => [
                        'width' => 800,
                        'height' => 600,
                        'folder' => 'original',
                    ],
                    'small' => [
                        'width' => 800,
                        'height' => 600,
                        'folder' => 'small',
                    ],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'price', 'chpu', 'fakeInStock', 'isDisabled', 'mainCategory'], 'required'],
            [['netCost', 'price', 'discount', 'fakeInStock', 'isDisabled', 'mainCategory'], 'integer'],
            ['mainCategory', 'compare', 'compareValue' => 0, 'operator' => '!=', 'message' => Yii::t('app/product', 'Select Main Category')],
            [['description', 'shortDescription'], 'string'],
            [['length', 'width', 'height', 'weight'], 'number'],
            ['additionalCategories', 'each', 'rule' => ['integer']],
            ['chpu', 'unique'],
            ['chpu', 'match',
                'pattern' => '/^[A-Za-z0-9\-\_]+$/i',
                'message' => Yii::t('app/product', 'Chpu is invalid. Should contain only "0-9", "A-Z", "a-z", "-", "_"')
            ],
            [['title', 'nomenclature', 'seoTitle', 'seoDescription', 'seoKeywords', 'chpu'], 'string', 'max' => 255],
            [
                ['isDisabled', 'netCost', 'discount', 'length', 'width', 'height', 'weight', 'fakeInStock'],
                'default',
                'value' => 0,
            ],
            [
                ['description', 'shortDescription', 'nomenclature', 'seoTitle', 'seoDescription', 'seoKeywords'],
                'default',
                'value' => '',
            ],
            ['file', 'file', 'extensions' => ['png', 'jpg'], 'maxSize' => 1024*1024*1024],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'mainCategory' => Yii::t('app/product', 'Main Category'),
            'additionalCategories' => Yii::t('app/product', 'Additional Categories'),
            'title' => Yii::t('app/product', 'Title'),
            'description' => Yii::t('app/product', 'Description'),
            'shortDescription' => Yii::t('app/product', 'Short Description'),
            'netCost' => Yii::t('app/product', 'Net Cost'),
            'price' => Yii::t('app/product', 'Price'),
            'discount' => Yii::t('app/product', 'Discount'),
            'nomenclature' => Yii::t('app/product', 'Nomenclature'),
            'length' => Yii::t('app/product', 'Length'),
            'width' => Yii::t('app/product', 'Width'),
            'height' => Yii::t('app/product', 'Height'),
            'weight' => Yii::t('app/product', 'Weight'),
            'seoTitle' => 'Seo Title',
            'seoDescription' => 'Seo Description',
            'seoKeywords' => 'Seo Keywords',
            'chpu' => Yii::t('app/product', 'Chpu'),
            'fakeInStock' => Yii::t('app/product', 'Fake In Stock'),
            'isDisabled' => Yii::t('app/product', 'Is Disabled'),
        ];
    }

    public function getCategories()
    {
        return $this->hasMany(productCategories::className(), ['productId' => 'id']);
    }

    public function getAdditionalCategoriesModels()
    {
        return $this->hasMany(productCategories::className(), ['productId' => 'id'])->where(['isMainCategory' => Category::IS_ADDITIONAL_CATEGORY]);
    }

    public function getMainCategoryModel()
    {
        return $this->hasOne(productCategories::className(), ['productId' => 'id'])->where(['isMainCategory' => Category::IS_MAIN_CATEGORY]);
    }

    public function getAdditionalCategoriesString()
    {
        $arr = [];
        $categories = $this->additionalCategoriesModels;
        foreach ($categories as $c) {
            $arr[] = Html::a($c->info->title, ['category/view', 'id' => $c->info->id], ['target' => '_blank']);
        }
        return implode(', ', $arr);
    }

    /**
     * @inheritdoc
     */
    public function afterSave($insert, $changedAttributes)
    {
        productCategories::deleteAll(['productId' => $this->id]);
        // save main category
        $mainCat = $this->mainCategory;
        if ($mainCat != 0) {
            $mainCategory = new productCategories();
            $mainCategory->productId = $this->id;
            $mainCategory->categoryId = $mainCat;
            $mainCategory->isMainCategory = Category::IS_MAIN_CATEGORY;
            $mainCategory->save();
        }
        // save additional categories
        $addCats = $this->additionalCategories;
        if (is_array($addCats)) {
            foreach ($addCats as $categoryId) {
                if ($categoryId != $mainCat) {
                    $category = new productCategories();
                    $category->productId = $this->id;
                    $category->categoryId = $categoryId;
                    $category->isMainCategory = Category::IS_ADDITIONAL_CATEGORY;
                    $category->save();
                }
            }
        }

        parent::afterSave($insert, $changedAttributes);
    }

    /**
     * Rests relation
     */
    public function getRests()
    {
        return $this->hasOne(ProductRests::className(), ['productId' => 'id']);
    }
}

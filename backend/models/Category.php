<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "category".
 *
 * @property integer $id
 * @property string $title
 * @property string $seoTitle
 * @property string $seoDescription
 * @property string $seoKeywords
 * @property string $seoText
 * @property string $chpu
 * @property integer $parentId
 * @property integer $level
 * @property string $idPath
 * @property integer $productCount
 * @property integer $position
 * @property integer $isDisabled
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'category';
    }

    public function scenarios()
    {
        return [
            'create' => ['title', 'seoTitle', 'seoDescription', 'seoKeywords', 'seoText', 'chpu', 'isDisabled'],
            'update' => ['title', 'seoTitle', 'seoDescription', 'seoKeywords', 'seoText', 'chpu', 'isDisabled'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'chpu', 'productCount', 'position', 'isDisabled'], 'required'],
            [['seoText'], 'string'],
            [['productCount', 'position'], 'integer'],
            ['isDisabled', 'boolean'],
            [['title', 'seoTitle', 'seoDescription', 'seoKeywords', 'chpu'], 'string', 'max' => 255],
            ['chpu', 'match', 
                'pattern' => '/^[A-Za-z0-9\-\_]+$/i', 
                'message' => Yii::t('app/category', 'Chpu is invalid. Should contain only "0-9", "A-Z", "a-z", "-", "_"')
            ],
            [['isDisabled', 'productCount', 'position'], 'default', 'value' => 0],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => Yii::t('app/category', 'Title'),
            'seoTitle' => 'Seo Title',
            'seoDescription' => 'Seo Description',
            'seoKeywords' => 'Seo Keywords',
            'seoText' => 'Seo Text',
            'chpu' => Yii::t('app/category', 'Chpu'),
            'productCount' => Yii::t('app/category', 'Product Count'),
            'position' => Yii::t('app/category', 'Position'),
            'isDisabled' => Yii::t('app/category', 'Is Disabled'),
        ];
    }

    public function beforeSave($insert)
    {
        if ($this->isNewRecord) {
            $this->productCount = 0;
            $this->position = 0;
        }
     
        return parent::beforeSave($insert);
    }

    public static function generateSelectBox($currentCategory = false)
    {
        $result = [0 => Yii::t('app/category', 'Root directory')];
        $models = self::find()->all();
        if ($models !== null) {
            foreach ($models as $m) {
                if ($m->id !== $currentCategory) {
                    $result[$m->id] = $m->title;
                }
            }
        }
        return $result;
    }
}

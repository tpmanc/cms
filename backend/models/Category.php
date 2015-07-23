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
            'create' => ['title', 'seoTitle', 'seoDescription', 'seoKeywords', 'seoText', 'chpu', 'parentId', 'isDisabled', 'image'],
            'update' => ['title', 'seoTitle', 'seoDescription', 'seoKeywords', 'seoText', 'chpu', 'parentId', 'isDisabled', 'image'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'chpu', 'level', 'idPath', 'productCount', 'position', 'isDisabled'], 'required'],
            [['seoText'], 'string'],
            [['parentId', 'level', 'productCount', 'position'], 'integer'],
            ['isDisabled', 'boolean'],
            [['title', 'seoTitle', 'seoDescription', 'seoKeywords', 'chpu', 'idPath'], 'string', 'max' => 255],
            ['chpu', 'match', 
                'pattern' => '/^[A-Za-z0-9\-\_]+$/i', 
                'message' => Yii::t('app/category', 'Chpu is invalid. Should contain only "0-9", "A-Z", "a-z", "-", "_"')
            ],
            [['parentId', 'isDisabled', 'productCount', 'level', 'position'], 'default', 'value' => 0],

            // 'on' => ['create', 'update'],
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
            'parentId' => Yii::t('app/category', 'Parent'),
            'level' => Yii::t('app/category', 'Level'),
            'idPath' => Yii::t('app/category', 'Id Path'),
            'productCount' => Yii::t('app/category', 'Product Count'),
            'position' => Yii::t('app/category', 'Position'),
            'isDisabled' => Yii::t('app/category', 'Is Disabled'),
        ];
    }

    public function beforeSave($insert)
    {
        if ($this->parentId == 0) {
            $this->idPath = '';
            $this->level = 0;
        } else {
            $parent = self::find()->select(['idPath'])->where(['id' => $this->parentId])->one();
            if ($parent->idPath !== '') {
                $ids = explode('/', $parent->idPath);
            } else {
                $ids = [];
            }
            $ids[] = $this->parentId;
            $this->idPath = implode('/', $ids);
            $this->level = count($ids);
        }
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

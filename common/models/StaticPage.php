<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "staticPage".
 *
 * @property integer $id
 * @property string $title
 * @property string $text
 * @property string $seoTitle
 * @property string $seoDescription
 * @property string $seoKeywords
 * @property string $chpu
 */
class StaticPage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'staticPage';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'text', 'seoTitle', 'seoDescription', 'seoKeywords', 'chpu'], 'required'],
            [['text'], 'string'],
            ['chpu', 'unique'],
            [['title', 'seoTitle', 'seoDescription', 'seoKeywords', 'chpu'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => Yii::t('app/staticPage', 'Title'),
            'text' => Yii::t('app/staticPage', 'Text'),
            'seoTitle' => 'Seo Title',
            'seoDescription' => 'Seo Description',
            'seoKeywords' => 'Seo Keywords',
            'chpu' => Yii::t('app/staticPage', 'Chpu'),
        ];
    }
}

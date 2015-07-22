<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "staticPage".
 *
 * @property integer $id
 * @property string $title
 * @property string $text
 * @property string $seoTitle
 * @property string $seoDesctiption
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
            [['title', 'text', 'seoTitle', 'seoDesctiption', 'seoKeywords', 'chpu'], 'required'],
            [['text'], 'string'],
            [['title', 'seoTitle', 'seoDesctiption', 'seoKeywords', 'chpu'], 'string', 'max' => 255]
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
            'seoDesctiption' => 'Seo Desctiption',
            'seoKeywords' => 'Seo Keywords',
            'chpu' => Yii::t('app/staticPage', 'Chpu'),
        ];
    }
}

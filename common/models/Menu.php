<?php

namespace common\models;

use Yii;
use creocoder\nestedsets\NestedSetsBehavior;
use common\models\MenuQuery;

/**
 * This is the model class for table "menu".
 *
 * @property integer $id
 * @property integer $lft
 * @property integer $rgt
 * @property integer $depth
 * @property string $name
 */
class Menu extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'menu';
    }

    public function behaviors() {
        return [
            'tree' => [
                'class' => NestedSetsBehavior::className(),
                'treeAttribute' => 'tree',
                // 'leftAttribute' => 'lft',
                // 'rightAttribute' => 'rgt',
                // 'depthAttribute' => 'depth',
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    // public function rules()
    // {
    //     return [
    //         [['lft', 'rgt', 'depth', 'name'], 'required'],
    //         [['lft', 'rgt', 'depth'], 'integer'],
    //         [['name'], 'string', 'max' => 255]
    //     ];
    // }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app/menu', 'ID'),
            'lft' => Yii::t('app/menu', 'Lft'),
            'rgt' => Yii::t('app/menu', 'Rgt'),
            'depth' => Yii::t('app/menu', 'Depth'),
            'name' => Yii::t('app/menu', 'Name'),
        ];
    }

    public function transactions()
    {
        return [
            self::SCENARIO_DEFAULT => self::OP_ALL,
        ];
    }

    public static function find()
    {
        return new MenuQuery(get_called_class());
    }
}

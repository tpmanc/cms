<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "userDashboard".
 *
 * @property integer $id
 * @property integer $userId
 * @property string $items
 */
class UserDashboard extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'userDashboard';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['userId'], 'integer'],
            [['items'], 'string'],
            ['userId', 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'userId' => 'User ID',
            'items' => 'Items',
        ];
    }
}

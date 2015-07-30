<?php

use yii\db\Schema;
use yii\db\Migration;

class m150730_082057_image extends Migration
{
    public function up()
    {
        $this->createTable('image', [
            'id' => Schema::TYPE_PK,
            'title' => Schema::TYPE_STRING . '(255) NOT NULL',
            'image' => Schema::TYPE_STRING . '(255) NOT NULL',
        ]);
    }

    public function down()
    {
        $this->dropTable('image');
    }
    
    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }
    
    public function safeDown()
    {
    }
    */
}

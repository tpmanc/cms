<?php

use yii\db\Schema;
use yii\db\Migration;

class m150730_100123_fileLink extends Migration
{
    public function up()
    {
        $this->createTable('productImage', [
            'id' => Schema::TYPE_PK,
            'itemId' => Schema::TYPE_INTEGER . ' NOT NULL',
            'image' => Schema::TYPE_STRING . '(255) NOT NULL',
            'path' => Schema::TYPE_STRING . '(255) NOT NULL',
            'size' => Schema::TYPE_STRING . '(255) NOT NULL',
        ]);
    }

    public function down()
    {
        $this->dropTable('productImage');
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

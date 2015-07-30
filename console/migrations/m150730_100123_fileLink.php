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
            'fileId' => Schema::TYPE_INTEGER . ' NOT NULL',
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

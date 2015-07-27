<?php

use yii\db\Schema;
use yii\db\Migration;

class m150727_105104_productCategories extends Migration
{
    public function up()
    {
        $this->createTable('productCategories', [
            'id' => Schema::TYPE_PK,
            'productId' => Schema::TYPE_INTEGER . ' NOT NULL',
            'categoryId' => Schema::TYPE_INTEGER . ' NOT NULL',
            'isMainCategory' => Schema::TYPE_BOOLEAN . ' NOT NULL',
        ]);
    }

    public function down()
    {
        $this->dropTable('productCategories');
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

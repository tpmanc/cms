<?php

use yii\db\Schema;
use yii\db\Migration;

class m150730_100123_productImage extends Migration
{
    public function up()
    {
        $this->createTable('productImage', [
            'id' => Schema::TYPE_PK,
            'itemId' => Schema::TYPE_INTEGER . ' NOT NULL',
            'name' => Schema::TYPE_STRING . '(255) NOT NULL',
        ]);

        $this->addForeignKey(
            'FK_productImage_product', 'productImage', 'itemId', 'product', 'id', 'CASCADE', 'CASCADE'
        );
    }

    public function down()
    {
        $this->dropForeignKey('FK_productImage_product', 'productImage');
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

<?php

use yii\db\Schema;
use yii\db\Migration;

class m150729_142338_productRests extends Migration
{
    public function up()
    {
        $this->createTable('productRests', [
            'id' => Schema::TYPE_PK,
            'productId' => Schema::TYPE_INTEGER . ' NOT NULL',
            'amount' => Schema::TYPE_INTEGER . ' NOT NULL',
        ]);
    }

    public function down()
    {
        $this->dropTable('productRests');
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

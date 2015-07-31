<?php

use yii\db\Schema;
use yii\db\Migration;

class m150731_080139_fixOrder extends Migration
{
    public function up()
    {
        $this->dropColumn('order', 'orderProductsId');
        $this->addColumn('order', 'deliveryPrice', Schema::TYPE_INTEGER . ' NOT NULL');
        $this->addColumn('order', 'status', Schema::TYPE_INTEGER . '(1) NOT NULL');
    }

    public function down()
    {
        $this->addColumn('order', 'orderProductsId', Schema::TYPE_INTEGER . ' NOT NULL');
        $this->dropColumn('order', 'deliveryPrice');
        $this->dropColumn('order', 'status');
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

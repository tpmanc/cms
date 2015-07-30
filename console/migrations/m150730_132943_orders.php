<?php

use yii\db\Schema;
use yii\db\Migration;

class m150730_132943_orders extends Migration
{
    public function safeUp()
    {
        $this->createTable('order', [
            'id' => Schema::TYPE_PK,
            'orderProductsId' => Schema::TYPE_INTEGER . ' NOT NULL',
            'name' => Schema::TYPE_STRING . '(255) NOT NULL',
            'adress' => Schema::TYPE_STRING . '(255) NOT NULL',
            'phone' => Schema::TYPE_STRING . '(255) NOT NULL',
            'email' => Schema::TYPE_STRING . '(255) NOT NULL',
            'extraInformation' => Schema::TYPE_STRING . '(255) NOT NULL',
            'deliveryType' => Schema::TYPE_INTEGER . ' NOT NULL',
            'paymentType' => Schema::TYPE_INTEGER . ' NOT NULL',
            'date' => Schema::TYPE_INTEGER . ' NOT NULL',
            'discount' => Schema::TYPE_INTEGER . ' NOT NULL',
            'totalPrice' => Schema::TYPE_INTEGER . ' NOT NULL',
        ]);
        $this->createTable('orderProducts', [
            'id' => Schema::TYPE_PK,
            'orderId' => Schema::TYPE_INTEGER . ' NOT NULL',
            'productId' => Schema::TYPE_INTEGER . ' NOT NULL',
            'amount' => Schema::TYPE_INTEGER . ' NOT NULL',
        ]);

        $this->addForeignKey(
            'FK_orderProducts_order', 'orderProducts', 'orderId', 'order', 'id', 'CASCADE', 'CASCADE'
        );

        $this->addForeignKey(
            'FK_orderProducts_product', 'orderProducts', 'productId', 'product', 'id', 'CASCADE', 'CASCADE'
        );
    }

    public function safeDown()
    {
        $this->dropForeignKey('FK_orderProducts_order', 'orderProducts');
        $this->dropForeignKey('FK_orderProducts_product', 'orderProducts');

        $this->dropTable('order');
        $this->dropTable('orderProducts');
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

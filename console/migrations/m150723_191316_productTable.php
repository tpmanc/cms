<?php

use yii\db\Schema;
use yii\db\Migration;

class m150723_191316_productTable extends Migration
{
    public function up()
    {
        $this->createTable('product', [
            'id' => Schema::TYPE_PK,
            'title' => Schema::TYPE_STRING . '(255) NOT NULL',
            'description' => Schema::TYPE_TEXT . ' NOT NULL',
            'shortDescription' => Schema::TYPE_TEXT . ' NOT NULL',
            'netCost' => Schema::TYPE_INTEGER . ' NOT NULL',
            'price' => Schema::TYPE_INTEGER . ' NOT NULL',
            'discount' => Schema::TYPE_INTEGER . ' NOT NULL',
            'nomenclature' => Schema::TYPE_STRING . '(255) NOT NULL',
            'length' => Schema::TYPE_FLOAT . ' NOT NULL',
            'width' => Schema::TYPE_FLOAT . ' NOT NULL',
            'height' => Schema::TYPE_FLOAT . ' NOT NULL',
            'weight' => Schema::TYPE_FLOAT . ' NOT NULL',
            'seoTitle' => Schema::TYPE_STRING . '(255) NOT NULL',
            'seoDescription' => Schema::TYPE_STRING . '(255) NOT NULL',
            'seoKeywords' => Schema::TYPE_STRING . '(255) NOT NULL',
            'chpu' => Schema::TYPE_STRING . '(255) NOT NULL',
            'fakeInStock' => Schema::TYPE_BOOLEAN . ' NOT NULL',
            'isDisabled' => Schema::TYPE_BOOLEAN . ' NOT NULL',
        ]);
    }

    public function down()
    {
        $this->dropTable('product');
    }
}

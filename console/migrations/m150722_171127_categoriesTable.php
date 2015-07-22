<?php

use yii\db\Schema;
use yii\db\Migration;

class m150722_171127_categoriesTable extends Migration
{
    public function up()
    {
        $this->createTable('category', [
            'id' => Schema::TYPE_PK,
            'title' => Schema::TYPE_STRING . '(255) NOT NULL',
            'seoTitle' => Schema::TYPE_STRING . '(255) NOT NULL',
            'seoDescription' => Schema::TYPE_STRING . '(255) NOT NULL',
            'seoKeywords' => Schema::TYPE_STRING . '(255) NOT NULL',
            'seoText' => Schema::TYPE_TEXT . ' NOT NULL',
            'chpu' => Schema::TYPE_STRING . '(255) NOT NULL',
            'parentId' => Schema::TYPE_INTEGER . ' NOT NULL',
            'level' => Schema::TYPE_INTEGER . ' NOT NULL',
            'idPath' => Schema::TYPE_STRING . '(255) NOT NULL',
            'productCount' => Schema::TYPE_INTEGER . ' NOT NULL',
            'position' => Schema::TYPE_INTEGER . ' NOT NULL',
            'isDisabled' => Schema::TYPE_BOOLEAN . ' NOT NULL',
        ]);
    }

    public function down()
    {
        $this->dropTable('category');
    }
}

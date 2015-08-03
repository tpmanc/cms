<?php

use yii\db\Schema;
use yii\db\Migration;

class m150803_062211_imageSize extends Migration
{
    public function safeUp()
    {
        $this->createTable('imageSize', [
            'id' => Schema::TYPE_PK,
            'imageId' => Schema::TYPE_INTEGER . ' NOT NULL',
            'path' => Schema::TYPE_STRING . '(255) NOT NULL',
            'size' => Schema::TYPE_STRING . '(255) NOT NULL',
        ]);

        $this->addForeignKey(
            'FK_imageSize_productImage', 'imageSize', 'imageId', 'productImage', 'id', 'CASCADE', 'CASCADE'
        );
    }

    public function safeDown()
    {
        $this->dropForeignKey('FK_product_image', 'imageSize');
        $this->dropTable('imageSize');
    }
}

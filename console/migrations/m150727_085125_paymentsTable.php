<?php

use yii\db\Schema;
use yii\db\Migration;

class m150727_085125_paymentsTable extends Migration
{
    public function up()
    {
        $this->createTable('paymentType', [
            'id' => Schema::TYPE_PK,
            'title' => Schema::TYPE_STRING . '(255) NOT NULL',
            'text' => Schema::TYPE_TEXT . ' NOT NULL',
            'isDisabled' => Schema::TYPE_BOOLEAN . ' NOT NULL',
        ]);
    }

    public function down()
    {
        $this->dropTabele('paymentType');
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

<?php

use yii\db\Schema;
use yii\db\Migration;

class m150731_092528_settings extends Migration
{
    public function up()
    {
        $this->createTable('settings', [
            'id' => Schema::TYPE_PK,
            'title' => Schema::TYPE_STRING . '(255) NOT NULL',
            'value' => Schema::TYPE_TEXT . ' NOT NULL',
        ]);

        $this->createIndex('FK_setting_title', 'settings', 'title');

        $this->insert('settings',array(
            'email'=>'test2@notanaddress.com',
            'username' =>'User Two',
            'password' => md5('test2'),
        ));
    }

    public function down()
    {
        $this->dropIndex('FK_setting_title', 'settings');
        $this->dropTable('settings');
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

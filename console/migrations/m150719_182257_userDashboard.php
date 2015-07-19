<?php

use yii\db\Schema;
use yii\db\Migration;

class m150719_182257_userDashboard extends Migration
{
    public function up()
    {
        $this->createTable('userDashboard', [
            'id' => Schema::TYPE_PK,
            'userId' => Schema::TYPE_INTEGER,
            'items' => Schema::TYPE_TEXT,
            'UNIQUE KEY `userId` (`userId`)',
        ]);
    }

    public function down()
    {
        $this->dropTable('userDashboard');
    }
}

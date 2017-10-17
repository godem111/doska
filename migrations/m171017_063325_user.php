<?php

use yii\db\Schema;
use yii\db\Migration;

class m171017_063325_user extends Migration
{

    public function init()
    {
        $this->db = 'db';
        parent::init();
    }

    public function safeUp()
    {
        $tableOptions = 'ENGINE=InnoDB';

        $this->createTable(
            '{{%user}}',
            [
                'id'=> $this->primaryKey(11),
                'username'=> $this->string(255)->notNull(),
                'userrealname'=> $this->string(255)->notNull(),
                'auth_key'=> $this->string(32)->notNull(),
                'password_hash'=> $this->string(255)->notNull(),
                'password_reset_token'=> $this->string(255)->null()->defaultValue(null),
                'email'=> $this->string(255)->notNull(),
                'phone'=> $this->string(255)->notNull(),
                'status'=> $this->smallInteger(6)->notNull()->defaultValue(10),
                'created_at'=> $this->integer(11)->notNull(),
                'logindate_at'=> $this->integer(11)->notNull(),
                'updated_at'=> $this->integer(11)->notNull(),
            ],$tableOptions
        );
        $this->createIndex('username','{{%user}}',['username'],true);
        $this->createIndex('email','{{%user}}',['email'],true);
        $this->createIndex('phone','{{%user}}',['phone'],true);
        $this->createIndex('password_reset_token','{{%user}}',['password_reset_token'],true);

    }

    public function safeDown()
    {
        $this->dropIndex('username', '{{%user}}');
        $this->dropIndex('email', '{{%user}}');
        $this->dropIndex('phone', '{{%user}}');
        $this->dropIndex('password_reset_token', '{{%user}}');
        $this->dropTable('{{%user}}');
    }
}

<?php

use yii\db\Schema;
use yii\db\Migration;

class m171017_063903_userDataInsert extends Migration
{

    public function init()
    {
		$this->db = [
			'class' => 'yii\db\Connection',
			'dsn' => 'mysql:host=localhost;dbname=doska_test',
			'username' => 'root',
			'password' => '486255',
			'charset' => 'utf8',
		];
        parent::init();
    }

    public function safeUp()
    {
        $this->batchInsert('{{%user}}',
                           ["id", "username", "userrealname", "auth_key", "password_hash", "password_reset_token", "email", "phone", "status", "created_at", "logindate_at", "updated_at"],
                            [
    [
        'id' => '1',
        'username' => 'admin',
        'userrealname' => '',
        'auth_key' => 'xdtObYYEqznlQ6bc4pj5NMnqABRCg7In',
        'password_hash' => '$2y$13$mHlaYMp3YwF1lNgoWijCcO3FXwSZw6U6DlmJGRGP14AnY1AOx/50C',
        'password_reset_token' => null,
        'email' => 'admin@sed.ru',
        'phone' => '',
        'status' => '20',
        'created_at' => '1507875907',
        'logindate_at' => '1508109340',
        'updated_at' => '1508109340',
    ],
    [
        'id' => '6',
        'username' => 'gad',
        'userrealname' => '',
        'auth_key' => 'GYpYjdCHoJPKHZzCEHbXVz8htI-pwgAb',
        'password_hash' => '$2y$13$dT9d.o8spRXNv99GsBO2tOrOSN/vfQkCb9z2YfXKEsHR.BGcIe97G',
        'password_reset_token' => null,
        'email' => 'ursnab-chel@yandex.ru',
        'phone' => '89518101095',
        'status' => '10',
        'created_at' => '1508095693',
        'logindate_at' => '1508095693',
        'updated_at' => '1508095693',
    ],
    [
        'id' => '7',
        'username' => 'test',
        'userrealname' => '',
        'auth_key' => '1IR_KtGPG23TxOxFQurkxQOe_BTOBNIt',
        'password_hash' => '$2y$13$VkJZGm5rMFPuScof2sC5xepwuFEBIwaRPHS3Cpk/5yGYvqbJU1F4e',
        'password_reset_token' => null,
        'email' => 'gad@gad.gad',
        'phone' => '123123',
        'status' => '10',
        'created_at' => '1508095793',
        'logindate_at' => '1508099321',
        'updated_at' => '1508099321',
    ],
    [
        'id' => '9',
        'username' => 'map',
        'userrealname' => '',
        'auth_key' => 'u4Sh6DOwY4g_qbO9KVYY8rww9wbcpiXH',
        'password_hash' => '$2y$13$BC621NKIHx8GxPi0/lW0xeKk11L3k5LZuKSx72BaKf/MgLjXqITUy',
        'password_reset_token' => null,
        'email' => 'test@test.map',
        'phone' => '1231233',
        'status' => '10',
        'created_at' => '1508099771',
        'logindate_at' => '1508101917',
        'updated_at' => '1508101917',
    ],
    [
        'id' => '10',
        'username' => 'moder',
        'userrealname' => '',
        'auth_key' => '3ePstFqYmML4G2CC7sN284qyDqR1tEKn',
        'password_hash' => '$2y$13$JBdaY8LZ7AOdYRBw38NJhuuKpI4GASgSGbf7zTUUrgCJ3/dci1BqW',
        'password_reset_token' => null,
        'email' => 'moder@moder.moder',
        'phone' => '213123',
        'status' => '20',
        'created_at' => '1508102649',
        'logindate_at' => '1508109196',
        'updated_at' => '1508109196',
    ],
    [
        'id' => '13',
        'username' => 'nomoder',
        'userrealname' => '',
        'auth_key' => 'UlORmfv3MV4yYwks7CR91f4A8Y0e-NwJ',
        'password_hash' => '$2y$13$7hGI3zdR7jE1dxR1I6IMCe5/U3V2ZnJvywm8y6Yod07n4kE6wH6s2',
        'password_reset_token' => null,
        'email' => 'nomoder@nomoder.nomoder',
        'phone' => '12312321',
        'status' => '10',
        'created_at' => '1508103335',
        'logindate_at' => '1508103334',
        'updated_at' => '1508103335',
    ],
    [
        'id' => '14',
        'username' => 'tip',
        'userrealname' => '',
        'auth_key' => 'J0D0yKdagfOEFJJO97IFLEAKxTemeVJ2',
        'password_hash' => '$2y$13$rfM.R3.kxzdaug1lUuH.ru6wNEVWLrz/60Gew4seLoywfLTtodLOC',
        'password_reset_token' => null,
        'email' => 'tip@tip.tip',
        'phone' => '123',
        'status' => '10',
        'created_at' => '1508103388',
        'logindate_at' => '1508108219',
        'updated_at' => '1508108219',
    ],
    [
        'id' => '15',
        'username' => 'ggg',
        'userrealname' => '',
        'auth_key' => 'bZa3NMsMc9X6OylNenU0OqYm-WY01jF0',
        'password_hash' => '$2y$13$W3FCr4fflUCkJ7K3ZyDDzO.emoPezbKn0Z7VAuaBBrur8oq3Eo1cK',
        'password_reset_token' => null,
        'email' => 'ggg@ggg.ggg',
        'phone' => '123123123',
        'status' => '10',
        'created_at' => '1508103897',
        'logindate_at' => '1508103896',
        'updated_at' => '1508103897',
    ],
]
        );
    }

    public function safeDown()
    {
        //$this->truncateTable('{{%user}} CASCADE');
    }
}

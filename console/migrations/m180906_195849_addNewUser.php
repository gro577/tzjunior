<?php

use yii\db\Migration;

/**
 * Class m180906_195849_addNewUser
 */
class m180906_195849_addNewUser extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function Up()
    {
        $this->insert('user', [
            'username' => 'user',
            'password_hash' => '$2y$13$s84Z4g0npjL62yDHcTr9JeAmyXsUtvTLm0TqXJY0z83NXNG/ulWIi',
            'auth_key' => 'tIh4QOUehscdTB4YTbz9JGZ3Z4BSG50l',
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function Down()
    {
        $this->delete('user',['username'=>'user']);
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180906_195849_addNewUser cannot be reverted.\n";

        return false;
    }
    */
}

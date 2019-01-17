<?php

use yii\db\Migration;

/**
 * Handles the creation of table `message_edit`.
 */
class m190111_110155_create_message_edit_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable('{{message_edit}}', [
            'id' => $this->primaryKey(),
            'name_otelier' => $this->string(255)->notNull(),
            'hotel_name' => $this->string(255)->notNull(),
            'whatsapp' => $this->string(255)->notNull(),
            'telegram' => $this->string(255)->notNull(),
            'viber' => $this->string(255)->notNull(),
            'idOtelier' => $this->integer(20)->notNull()
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('message_edit');
    }
}

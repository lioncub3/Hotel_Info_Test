<?php

use yii\db\Migration;

/**
 * Handles the creation of table `message_otel_stat`.
 */
class m190110_123457_create_message_otel_stat_table extends Migration
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
        $this->createTable('{{messageotelstat}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
            'messanger' => $this->string(255)->notNull(),
            'message' => $this->string(255)->notNull(),
            'otelier' => $this->string(255)->notNull(),
            'time_send' => $this->string(255)->notNull(),
            'tel' => $this->integer(20)->notNull()
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('message_otel_stat');
    }
}

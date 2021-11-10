<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%page_guide}}`.
 */
class m211110_203816_create_page_guide_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%page_guide}}', [
            'id' => $this->primaryKey(),
            'url' => $this->string(1024),
            'rules' => $this->text(),
        ],$tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%page_guide}}');
    }
}

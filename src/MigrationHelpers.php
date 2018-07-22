<?php

namespace ImLiam\Yii2Traits;

use Yii;

trait MigrationHelpers
{
    /**
     * Set the default value of an existing column.
     *
     * @param string $table
     * @param string $column
     * @param mixed $value
     * @return void
     */
    protected function fillColumn(string $table, string $column, $value)
    {
        try {
            $sql = "UPDATE {$table} SET {$column}='{$value}';";
            Yii::$app->getDb()->createCommand($sql)->queryAll();
            echo "Default value of '{$table}.{$column}' has been set to '{$value}'.".PHP_EOL;
        } catch (Exception $e) {
            echo "There was an issue setting the default value of '{$table}.{$column}', please manually check the data.".PHP_EOL;
        }
    }
}

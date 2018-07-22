<?php

namespace ImLiam\Yii2Traits;

trait ActiveRecordHelpers
{
    /**
     * Get the first record matching the attributes or create it.
     * Perfect for handling pivot models.
     *
     * @param  array  $attributes
     * @param  array  $values
     * @return self
     */
    public static function firstOrCreate(array $attributes, array $values = []): self
    {
        if (! is_null($model = static::findOne($attributes))) {
            return $model;
        }

        $model = new static;
        $model->attributes = $attributes + $values;
        $model->save();

        return $model;
    }

    /**
     * Create a new instance of the model and persist it.
     *
     * @param array $attributes
     * @return self
     */
    public static function create(array $attributes): self
    {
        $model = new static;
        $model->attributes = $model->attributes + $attributes;
        $model->save();

        return $model;
    }

    /**
     * Create a new instance of the model without persisting it.
     *
     * @param array $attributes
     * @return self
     */
    public static function make(array $attributes): self
    {
        $model = new static;
        $model->attributes = $model->attributes + $attributes;

        return $model;
    }

    /**
     * Delete a model matching the given attributes.
     *
     * @param array $attributes
     * @return int|false The number of rows deleted, or `false` if the
     *                   deletion is unsuccessful for some reason.
     */
    public static function deleteIfExists(array $attributes)
    {
        $model = static::findOne($attributes);

        if (! is_null($model)) {
            return $model->delete();
        }

        return 0;
    }

    /**
     * Get the first instance of a model.
     *
     * @param string $orderBy
     * @return self|null
     */
    public static function first(string $orderBy = null)
    {
        if (! $orderBy) {
            $orderBy = self::model()->tableSchema->primaryKey;
        }

        return self::model()->find(['order' => $orderBy]);
    }
}

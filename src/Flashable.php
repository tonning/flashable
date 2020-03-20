<?php

namespace Tonning\Flashable;

use ReflectionClass;

trait Flashable
{
    public static function bootFlashable()
    {
        static::created(function ($model) {
            if (property_exists($model, 'flashable') && isset($model->flashable['created'])) {
                return flash($model->flashable['created']);
            }

            $name = self::getName($model);

            flash("{$name} has been created.");
        });

        static::updated(function ($model) {
            if (property_exists($model, 'flashable') && isset($model->flashable['updated'])) {
                return flash($model->flashable['updated']);
            }

            $name = self::getName($model);

            flash("{$name} has been updated.");
        });

        static::deleted(function ($model) {
            if (property_exists($model, 'flashable') && isset($model->flashable['deleted'])) {
                return flash($model->flashable['deleted']);
            }

            $name = self::getName($model);

            flash("{$name} has been deleted.");
        });
    }

    protected static function getName($model)
    {
        if (method_exists($model, 'getModelName')) {
            return $model->getModelName();
        }

        $nameAsArray = preg_split('/(?<=[a-z])(?=[A-Z])/x', (new ReflectionClass($model))->getShortName());

        return join(" ", $nameAsArray);
    }
}

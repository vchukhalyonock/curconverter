<?php

namespace App\Services;

use Interfaces\ICourseImportAdapter;

/**
 * Class CourseImportAdapter
 * @package App\Services
 */
class CourseImportAdapter implements ICourseImportAdapter {
    static function getProvider($provider) {
        $className = 'App\\Providers\\' . $provider;
        if(class_exists($className)) {
            return new $className();
        }

        throw new \Exception("Provider " . $provider . " does not exists");
    }
}
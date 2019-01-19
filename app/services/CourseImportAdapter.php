<?php

namespace App\Services;

use App\Interfaces\ICourseImportAdapter;
use App\Services\Request;

/**
 * Class CourseImportAdapter
 * @package App\Services
 */
class CourseImportAdapter implements ICourseImportAdapter {
    static function getProvider($provider) {
        $className = 'App\\Providers\\' . $provider;
        if(class_exists($className)) {
            return new $className(new Request());
        }

        throw new \Exception("Provider " . $provider . " does not exists");
    }
}
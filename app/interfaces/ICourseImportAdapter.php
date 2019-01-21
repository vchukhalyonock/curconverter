<?php

namespace App\Interfaces;

/**
 * Interface ICourseImportAdapter
 * @package App\Interfaces
 */
interface ICourseImportAdapter {

    /**
     * Should return current provider implemented IProvider interface
     * @param $provider
     * @return mixed
     */
    static function getProvider($provider);
}
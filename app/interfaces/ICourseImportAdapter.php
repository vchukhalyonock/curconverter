<?php

namespace App\Interfaces;

interface ICourseImportAdapter {
    static function getProvider($provider);
}
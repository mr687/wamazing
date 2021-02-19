<?php

namespace Mr687\Wamazing\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Mr687\Wamazing\Skeleton\SkeletonClass
 */
class Wamazing extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'wamazing';
    }
}

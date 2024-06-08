<?php


namespace App\Services\Utilities;


class CacheKeys
{

    public static function version($id)
    {
        return   sprintf('version-points-%s', $id);
    }
}

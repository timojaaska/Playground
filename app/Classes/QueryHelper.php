<?php

namespace App\Classes;

use Str;

class QueryHelper
{
    /**
     * Usage:
     * dump(\App\Classes\QueryHelper::toSql($query));
     */
    static function toSql($query) {
        $sql = \str_replace('?', "'?'", $query->toSql());
        return Str::replaceArray('?', $query->getBindings(), $sql);
    }
}
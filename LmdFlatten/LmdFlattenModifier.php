<?php

namespace Statamic\Addons\LmdFlatten;

use Statamic\Extend\Modifier;

class LmdFlattenModifier extends Modifier
{
    /**
     * Laravel 5.3's `$collection->flatten($depth)`.
     *
     * As of v2.1, Statamic runs on Laravel 5.1, which doesn't support passing
     * a depth argument to `flatten()`.
     *
     * @author Curtis Blackwell
     * @param  array $value
     * @param  array $params First index should be the depth integer.
     * @return array
     */
    public function index($value, $params)
    {
        return self::flatten($value, array_get($params, 0));
    }

    // -------------------------------------------------------------------------
    // 100% stolen from Laravel.
    // https://github.com/illuminate/support/blob/5.3/Arr.php#L166
    // -------------------------------------------------------------------------


    /**
     * Flatten a multi-dimensional array into a single level.
     *
     * @param  array  $array
     * @param  int  $depth
     * @return array
     */
    public static function flatten($array, $depth = INF)
    {
        return array_reduce($array, function ($result, $item) use ($depth) {
            $item = $item instanceof Collection ? $item->all() : $item;
            if (! is_array($item)) {
                return array_merge($result, [$item]);
            } elseif ($depth === 1) {
                return array_merge($result, array_values($item));
            } else {
                return array_merge($result, static::flatten($item, $depth - 1));
            }
        }, []);
    }
}

<?php
declare(strict_types=1);

namespace Zakirullin\TypedAccessor\Caster;

use Zakirullin\TypedAccessor\Finder\ListOfMixedFinder;

final class ListOfTypeCaster
{
    public static function cast($value, callable $caster): ?array
    {
        $list = ListOfMixedFinder::find($value);
        if ($list === null) {
            return null;
        }

        $listOfCasted = [];
        /**
         * @psalm-suppress all
         */
        foreach ($list as $val) {
            $castedValue = $caster($val);
            if ($castedValue === null) {
                return null;
            }

            $listOfCasted[] = $castedValue;
        }

        return $listOfCasted;
    }
}
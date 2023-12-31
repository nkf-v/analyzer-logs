<?php

namespace App\UseCases;

use App\ValueObjects\Interval;

/** UseCase для создания интервалов */
final class CreatorIntervals
{
    /**
     * Метод создания интервалов из списка точек.
     * Если между точками не больше чем в 1, то они являются частью одного интервала.
     *
     * @param int[] $points
     * @return Interval[]
     */
    public function byPoints(array $points): array
    {
        $result = [];
        $start = $points[0] ?? null;
        $end = $start;
        foreach ($points as $point) {
            if ($point - $end <= 1) {
                $end = $point;
            } else {
                $result[] = new Interval($start, $end);
                $start = $point;
                $end = $point;
            }
        }

        if (null !== $start) {
            $result[] = new Interval($start, $end);
        }

        return $result;
    }
}

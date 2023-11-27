<?php

class StatisticsCalculator
{
    public function mean($numbers)
    {
        // Calcule la moyenne d'un tableau de nombres
        // Si le tableau est vide, retourne null

        $sum = 0;
        $count = 0;

        foreach ($numbers as $number) {
            $sum += $number;
            $count++;
        }

        if ($count > 0) {
            return $sum / $count;
        } else {
            return null;
        }
    }

    public function median($numbers)
    {
        // Calcule la médiane d'un tableau de nombres
        // Si le tableau est vide, retourne null

        sort($numbers);

        $count = count($numbers);

        if ($count > 0) {
            if ($count % 2 == 0) {
                return ($numbers[$count / 2 - 1] + $numbers[$count / 2]) / 2;
            } else {
                return $numbers[($count - 1) / 2];
            }
        } else {
            return null;
        }
    }
}

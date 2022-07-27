<?php

namespace App\Classes;

/**
 * Class TemperatureDataRepository
 * @author yourname
 */
class TemperatureDataRepository
{
    protected $csvFile;
    static $sizes = [
        "day" => 9,
        "week" => 9 * 7,
        "month" => 30,
    ];

    /**
     * @param $csvFile =
     */
    public function __construct(
        $csvFile = "../27612.01.01.2021.01.01.2022.1.0.0.ru.utf8.00000000.csv"
    ) {
        $this->csvFile = file($csvFile);
    }

    /**
     * undocumented function
     *
     * @return void
     */
    public function getSlideAvg($windowSizeKey)
    {
        $windowSize = self::$sizes[$windowSizeKey];
        $window = [];
        $data = [];

        foreach ($this->csvFile as $line) {
            [$dateTime, $T] = str_getcsv($line);

            $dateTime = \DateTime::createFromFormat("d.m.Y H:i", $dateTime);
            $T = (float) $T;

            $window[] = $T;

            $row = [
                "date" => $dateTime->format("d-m-Y H:i"),
                "value" => $T,
            ];

            if (count($window) > $windowSize) {
                $row["avg"] = array_sum($window) / count($window);
                array_shift($window);
            } else {
                $row["avg"] = null;
            }

            $data[] = $row;
        }

        return $data;
    }
}

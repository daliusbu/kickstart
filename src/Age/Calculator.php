<?php
/**
 * Created by PhpStorm.
 * User: dalius
 * Date: 19.5.3
 * Time: 12.56
 */

namespace App\Age;


class Calculator
{
    private $dateOfBirth;

    /**
     * Calculator constructor.
     * @param $dateOfBirth
     */
    public function __construct(\DateTime $dateOfBirth)
    {
        $this->dateOfBirth = $dateOfBirth;
    }

    public function calculate()
    {
        $age = date_diff(new \DateTime(), $this->dateOfBirth)->y;
        return $age;
    }

}
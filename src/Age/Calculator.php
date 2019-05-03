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
    /**
     * @param \DateTime $dateOfBirth
     * @return int
     * @throws \Exception
     */
    public function calculate(\DateTime $dateOfBirth)
    {
        $age = date_diff(new \DateTime(), $dateOfBirth)->y;
        return $age;
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: dalius
 * Date: 19.5.3
 * Time: 16.31
 */

namespace App\Age;


class Validator
{
    /**
     * @var int
     */
    private $adultAge;

    /**
     * Validator constructor.
     * @param int $adultAge
     */
    public function __construct(int $adultAge)
    {
        $this->adultAge = $adultAge;
    }

    /**
     * @param int $age
     * @return bool
     */
    public function validateAdulthood(int $age)
    {
        if ($age >= $this->adultAge){
            $result = true;
        } else{
            $result = false;
        }
        return $result;
    }
}
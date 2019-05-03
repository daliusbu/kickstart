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

    public function validateAdulthood($age)
    {
        $adultAge = 18;
        if ($age >= $adultAge){
            $result = true;
        } else{
            $result = false;
        }
var_dump($age);
        return $result;
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: dalius
 * Date: 19.5.3
 * Time: 16.00
 */

namespace App\Person;


use App\Age\Calculator;
use App\Age\Validator;
use App\Model\Person;

class Manager
{
    private $calculator;
    private $validator;
    private $person;

    /**
     * Manager constructor.
     * @param Calculator $calculator
     * @param Validator $validator
     * @param Person $person
     */
    public function __construct(Calculator $calculator, Validator $validator, Person $person)
    {
        $this->calculator = $calculator;
        $this->validator = $validator;
        $this->person = $person;
    }

    public function getAge($dateOfBirth)
    {
        try{
            $date = new \DateTime($dateOfBirth);
            $result = $this->calculator->calculate($date);
        } catch (\Exception $e){
            $result = false;
        }
        return $result;
    }

    public function verifyAge($age)
    {
        return $this->validator->validateAdulthood($age);
    }

    public function getPerson($dateOfBirth)
    {
        $age = $this->getAge($dateOfBirth);
        $this->person->setAge($age);
        $isAdult = $this->verifyAge($age);
        $this->person->setAdult($isAdult);
        return $this->person;
    }

}
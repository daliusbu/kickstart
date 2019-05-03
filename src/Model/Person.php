<?php
/**
 * Created by PhpStorm.
 * User: dalius
 * Date: 19.5.3
 * Time: 12.49
 */

namespace App\Model;


class Person
{
    /**
     * @var int
     */
    private $age;

    /**
     * @var bool
     */
    private $adult;

    /**
     * @return int
     */
    public function getAge(): int
    {
        return $this->age;
    }

    /**
     * @param int $age
     */
    public function setAge(int $age): void
    {
        $this->age = $age;
    }

    /**
     * @return bool
     */
    public function isAdult(): bool
    {
        return $this->adult;
    }

    /**
     * @param bool $adult
     */
    public function setAdult(bool $adult): void
    {
        $this->adult = $adult;
    }

}
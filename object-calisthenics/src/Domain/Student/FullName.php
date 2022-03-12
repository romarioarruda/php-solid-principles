<?php

namespace Alura\Calisthenics\Domain\Student;


class FullName
{
    private string $firstName;
    private string $lastName;

    public function __construct(string $firstName, string $lastName)
    {
        if(empty($firstName)) throw new \InvalidArgumentException('FullName: Invalid firstName');
        if(empty($lastName)) throw new \InvalidArgumentException('FullName: Invalid lastName');

        $this->firstName = $firstName;
        $this->lastName = $lastName;
    }

    public function __toString(): string
    {
        return "{$this->firstName} {$this->lastName}";
    }   
}

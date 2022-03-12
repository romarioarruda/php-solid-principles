<?php

namespace Alura\Calisthenics\Domain\Address;


class Address
{
    private string $street;
    private string $number;
    private string $province;
    private string $city;
    private string $state;
    private string $country;

    public function __construct(string $street, string $number, string $province, string $city, string $state, string $country)
    {
        if(empty($street)) throw new \InvalidArgumentException('Address: Invalid street');
        if(empty($number)) throw new \InvalidArgumentException('Address: Invalid number');
        if(empty($province)) throw new \InvalidArgumentException('Address: Invalid province');
        if(empty($city)) throw new \InvalidArgumentException('Address: Invalid city');
        if(empty($state)) throw new \InvalidArgumentException('Address: Invalid state');
        if(empty($country)) throw new \InvalidArgumentException('Address: Invalid country');

        $this->street = $street;
        $this->number = $number;
        $this->province = $province;
        $this->city = $city;
        $this->state = $state;
        $this->country = $country;
    }

    public function __serialize(): array
    {
        return [
          'street' => $this->street,
          'number' => $this->number,
          'province' => $this->province,
          'city' => $this->city,
          'state' => $this->state,
          'country' => $this->country,
        ];
    }  
}

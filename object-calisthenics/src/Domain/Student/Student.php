<?php

namespace Alura\Calisthenics\Domain\Student;

use Alura\Calisthenics\Domain\Student\FullName;
use Alura\Calisthenics\Domain\Email\Email;
use Alura\Calisthenics\Domain\Address\Address;
use Alura\Calisthenics\Domain\Video\Video;
use DateTimeInterface;
use Ds\Map;

class Student
{
    private Email $email;
    private DateTimeInterface $birthDate;
    private Map $watchedVideos;
    private FullName $fullName;
    private Address $address;

    public function __construct(Email $email, DateTimeInterface $birthDate, FullName $fullName, Address $address)
    {
        $this->watchedVideos = new Map();
        $this->email = $email;
        $this->birthDate = $birthDate;
        $this->fullName = $fullName;
        $this->address = $address;
    }

    public function getFullName(): string
    {
        return $this->fullName;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    private function getBirthDate(): DateTimeInterface
    {
        return $this->birthDate;
    }

    public function getAdreess(): array
    {
        return (array) $this->address;
    }

    public function watch(Video $video, DateTimeInterface $date)
    {
        $this->watchedVideos->put($video, $date);
    }

    public function hasAccess(): bool
    {   
        return $this->watchedVideos->count() > 0 ? $this->firstVideoWasWhatchedInLessThen90Days() : true;
    }

    private function firstVideoWasWhatchedInLessThen90Days(): bool
    {
        $this->watchedVideos->sort(
            fn (DateTimeInterface $dateA, DateTimeInterface $dateB) => $dateA <=> $dateB
        );
        /** @var DateTimeInterface $firstDate */
        $firstDate = $this->watchedVideos->first()->value;
        $today = new \DateTimeImmutable();

        return $firstDate->diff($today)->days < 90;
    }

    public function age(): int
    {
        $today = new \DateTimeImmutable();

        return $this->getBirthDate()->diff($today)->y;
    }
}

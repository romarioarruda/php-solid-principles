<?php

namespace Alura\Calisthenics\Domain\Video;

class Video
{
    private bool $visibility = false;
    private int $ageLimit;

    public function publish(): void
    {
        $this->visibility = true;
    }

    public function unpublish(): void
    {
        $this->visibility = false;
    }

    public function isPublic(): bool
    {
        return $this->visibility;
    }

    public function getAgeLimit(): int
    {
        return $this->ageLimit;
    }

    public function setAgeLimit(int $ageLimit): void
    {
        $this->ageLimit = $ageLimit;
    }
}

<?php

declare(strict_types=1);

require_once 'Audi.php';
class BMW extends Audi
{
    private int $year;

    public function getYear(): int
    {
        return $this->year;
    }

    public function setYear(int $year): void
    {
        $this->year = $year;
    }

}
<?php
declare(strict_types = 1);

namespace App\Domain\Model\PreBooking\ValueObject;

use App\Domain\Model\PreBooking\Exception\CapacityNotPositiveException;

class PreBookingCapacity
{
    /** @var int */
    private $capacity;

    private function __construct(int $capacity)
    {
        if ($capacity <= 0) {
            throw new CapacityNotPositiveException();
        }

        $this->capacity = $capacity;
    }

    public static function fromValue(int $capacity): PreBookingCapacity
    {
        return new self($capacity);
    }

    public function getCapacity(): int
    {
        return $this->capacity;
    }
}
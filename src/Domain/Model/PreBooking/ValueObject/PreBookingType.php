<?php
declare(strict_types = 1);

namespace App\Domain\Model\PreBooking\ValueObject;

use InvalidArgumentException;

class PreBookingType
{
    public const STANDARD  = 'standard';
    public const UNIQUE    = 'unique';
    public const QUALIFIED = 'qualified';

    private const VALID_PRE_BOOKING_TYPES = [
        self::STANDARD,
        self::UNIQUE,
        self::QUALIFIED
    ];

    public const PRE_BOOKING_SCORES = [
        self::STANDARD  => 5,
        self::UNIQUE    => 15,
        self::QUALIFIED => 35
    ];

    /** @var  string */
    private $preBookingType;

    /** @var  int */
    private $preBookingScore;

    private function __construct(string $preBookingType)
    {
        $preBookingType = strtolower($preBookingType);

        if (!in_array($preBookingType, self::VALID_PRE_BOOKING_TYPES, true))
        {
            throw new InvalidArgumentException($preBookingType . ' is an invalid value for PreBookingType');
        }

        $this->preBookingType = $preBookingType;
    }

    public static function fromString(string $preBookingType): PreBookingType
    {
        return new self($preBookingType);
    }

    public static function standard(): PreBookingType
    {
        return new self(self::STANDARD);
    }

    public static function unique(): PreBookingType
    {
        return new self(self::UNIQUE);
    }

    public static function qualified(): PreBookingType
    {
        return new self(self::QUALIFIED);
    }

    public function getScore(): int
    {
        return self::PRE_BOOKING_SCORES[$this->preBookingType];
    }

    public function __toString(): string
    {
        return $this->preBookingType;
    }
}
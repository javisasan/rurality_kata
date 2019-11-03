<?php
declare(strict_types = 1);

namespace App\Domain\Model\PreBooking\ValueObject;

use App\Domain\Model\PreBooking\Exception\DateInHigherThanDateOutException;
use \DateTime;
use \InvalidArgumentException;

class PreBookingPeriod
{
    /** @var  \DateTime */
    private $dateIn;

    /** @var  \DateTime */
    private $dateOut;

    public function __construct(DateTime $dateIn, DateTime $dateOut)
    {
        if (! is_a($dateIn, 'DateTime')) {
            throw new InvalidArgumentException('dateIn is not a DateTime instance');
        }

        if (! is_a($dateOut, 'DateTime')) {
            throw new InvalidArgumentException('dateOut is not a DateTime instance');
        }

        if ($dateIn > $dateOut) {
            throw new DateInHigherThanDateOutException();
        }

        $this->dateIn = $dateIn;
        $this->dateOut = $dateOut;
    }
}
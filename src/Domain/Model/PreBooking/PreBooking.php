<?php
declare(strict_types = 1);

namespace App\Domain\Model\PreBooking;

use App\Domain\Model\Cottage\Cottage;
use App\Domain\Model\Owner\Owner;
use App\Domain\Model\PreBooking\Exception\CapacityNotPositiveException;
use App\Domain\Model\PreBooking\Exception\EmptyPreBookingMessageException;
use App\Domain\Model\PreBooking\Exception\PreBookingCapacitySurpassesCottageCapacityException;
use App\Domain\Model\PreBooking\ValueObject\PreBookingCapacity;
use App\Domain\Model\PreBooking\ValueObject\PreBookingMessage;
use App\Domain\Model\PreBooking\ValueObject\PreBookingPeriod;
use App\Domain\Model\PreBooking\ValueObject\PreBookingType;
use App\Domain\Model\Traveler\Traveler;
use App\Shared\Domain\PreBooking\PreBookingId;

class PreBooking
{
    /** @var  PreBookingId */
    private $id;

    /** @var  Traveler */
    private $traveler;

    /** @var  Cottage */
    private $cottage;

    /** @var  Owner */
    private $owner;

    /** @var  PreBookingPeriod */
    private $preBookingPeriod;

    /** @var  PreBookingCapacity */
    private $capacity;

    /** @var  PreBookingType */
    private $preBookingType;

    /** @var string */
    private $message;

    public function __construct(PreBookingId $id,
        Traveler $traveler,
        Cottage $cottage,
        PreBookingPeriod $preBookingPeriod,
        PreBookingCapacity $capacity,
        PreBookingType $preBookingType,
        PreBookingMessage $message
    )
    {
        if ($capacity->getCapacity() > $cottage->getCapacity()) {
            throw new PreBookingCapacitySurpassesCottageCapacityException();
        }

        $this->id               = $id;
        $this->traveler         = $traveler;
        $this->cottage          = $cottage;
        $this->owner            = $cottage->getOwner();
        $this->preBookingPeriod = $preBookingPeriod;
        $this->capacity         = $capacity;
        $this->preBookingType   = $preBookingType;
        $this->message          = $message;
    }

    public static function create(PreBookingId $id,
        Traveler $traveler,
        Cottage $cottage,
        PreBookingPeriod $preBookingPeriod,
        PreBookingCapacity $capacity,
        PreBookingType $preBookingType,
        PreBookingMessage $message
    ): self
    {
        $preBooking = new self($id, $traveler, $cottage, $preBookingPeriod, $capacity, $preBookingType, $message);

        return $preBooking;
    }

    public function getId(): PreBookingId
    {
        return $this->id;
    }

    public function getTraveler(): Traveler
    {
        return $this->traveler;
    }

    public function getCottage(): Cottage
    {
        return $this->cottage;
    }

    public function getPreBookingPeriod(): PreBookingPeriod
    {
        return $this->preBookingPeriod;
    }

    public function getCapacity(): PreBookingCapacity
    {
        return $this->capacity;
    }

    public function getPreBookingType(): PreBookingType
    {
        return $this->preBookingType;
    }

    public function getMessage(): string
    {
        return $this->message;
    }
}
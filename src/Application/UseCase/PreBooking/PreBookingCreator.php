<?php
declare(strict_types = 1);

namespace App\Application\UseCase\PreBooking;

use App\Domain\Model\Cottage\Cottage;
use App\Domain\Model\PreBooking\PreBooking;
use App\Domain\Model\PreBooking\PreBookingRepository;
use App\Domain\Model\PreBooking\ValueObject\PreBookingCapacity;
use App\Domain\Model\PreBooking\ValueObject\PreBookingMessage;
use App\Domain\Model\PreBooking\ValueObject\PreBookingPeriod;
use App\Domain\Model\PreBooking\ValueObject\PreBookingType;
use App\Domain\Model\Traveler\Traveler;
use App\Shared\Domain\PreBooking\PreBookingId;
use App\Shared\Domain\ValueObject\Uuid;

class PreBookingCreator
{
    private $repository;

    public function __construct(PreBookingRepository $repository)
    {
        $this->repository = $repository;
    }

    public function create(Traveler $traveler,
        Cottage $cottage,
        PreBookingPeriod $preBookingPeriod,
        PreBookingCapacity $capacity,
        PreBookingType $preBookingType,
        PreBookingMessage $message
    ): PreBooking
    {
        $id = new PreBookingId(Uuid::random()->value());

        $preBooking = PreBooking::create($id, $traveler, $cottage, $preBookingPeriod, $capacity, $preBookingType, $message);

        return $preBooking;
    }
}
<?php

namespace App\Infrastructure\Persistence\PreBooking;

use App\Domain\Model\PreBooking\PreBooking;
use App\Domain\Model\PreBooking\PreBookingRepository;
use App\Shared\Domain\PreBooking\PreBookingId;

class PreBookingDoctrineRepositoryInMemory implements PreBookingRepository
{
    /** @var PreBooking */
    private $preBooking;

    public function __construct()
    {
        $this->preBooking = [];
    }

    public function save(PreBooking $preBooking): void
    {
        $this->preBooking[$preBooking->getId()->value()]=$preBooking;
    }

    public function search(PreBookingId $preBookingId): ? PreBooking
    {
        return $this->preBooking[$preBookingId->value()];
    }
}
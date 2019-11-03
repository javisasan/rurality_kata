<?php
declare(strict_types = 1);

namespace App\Domain\Model\PreBooking;

use App\Shared\Domain\PreBooking\PreBookingId;

interface PreBookingRepository
{
    public function save(PreBooking $preBooking): void;

    public function search(PreBookingId $preBookingId): ? PreBooking;
}
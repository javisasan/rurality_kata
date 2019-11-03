<?php
declare(strict_types = 1);

namespace App\Domain\Model\Traveler;

use App\Shared\Domain\Traveler\TravelerId;

interface TravelerRepository
{
    public function save(Traveler $traveler): void;

    public function search(TravelerId $travelerId): ? Traveler;
}
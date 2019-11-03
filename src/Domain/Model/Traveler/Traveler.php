<?php
declare(strict_types = 1);

namespace App\Domain\Model\Traveler;

use App\Shared\Domain\Traveler\TravelerId;

class Traveler
{
    /** @var  TravelerId */
    private $id;

    public function __construct(TravelerId $travelerId)
    {
        $this->id = $travelerId;
    }

    public function getTravelerId(): TravelerId
    {
        return $this->id;
    }
}
<?php
declare(strict_types = 1);

namespace App\Domain\Model\Owner;

use App\Shared\Domain\Owner\OwnerId;

class Owner
{
    /** @var  OwnerId */
    private $id;

    public function __construct(OwnerId $ownerId)
    {
        $this->id = $ownerId;
    }

    public function getId(): OwnerId
    {
        return $this->id;
    }
}
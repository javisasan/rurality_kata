<?php
declare(strict_types = 1);

namespace App\Domain\Model\Owner;

use App\Shared\Domain\Owner\OwnerId;

interface OwnerRepository
{
    public function save(Owner $owner): void;

    public function search(OwnerId $ownerId): ? Owner;
}
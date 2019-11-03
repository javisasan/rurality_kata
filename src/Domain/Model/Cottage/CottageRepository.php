<?php
declare(strict_types = 1);

namespace App\Domain\Model\Cottage;

use App\Shared\Domain\Cottage\CottageId;

interface CottageRepository
{
    public function save(Cottage $cottage): void;

    public function search(CottageId $cottageId): ? Cottage;
}
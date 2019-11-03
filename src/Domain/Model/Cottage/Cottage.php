<?php
declare(strict_types = 1);

namespace App\Domain\Model\Cottage;

use App\Domain\Model\Owner\Owner;
use App\Shared\Domain\Cottage\CottageId;

class Cottage
{
    /** @var  CottageId */
    private $id;

    /** @var  string */
    private $name;

    /** @var  Owner */
    private $owner;

    /** @var int */
    private $capacity;

    public function __construct(CottageId $cottageId, string $name, Owner $owner, int $capacity)
    {
        $this->id       = $cottageId;
        $this->name     = $name;
        $this->owner    = $owner;
        $this->capacity = $capacity;
    }

    public function getId(): CottageId
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getOwner(): Owner
    {
        return $this->owner;
    }

    public function getCapacity(): int
    {
        return $this->capacity;
    }

    public function setCapacity(int $capacity): Cottage
    {
        $this->capacity = $capacity;
        return $this;
    }

}
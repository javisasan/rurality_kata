<?php

namespace Tests\Application\UseCase\PreBooking;

use App\Domain\Model\Cottage\Cottage;
use App\Domain\Model\PreBooking\Exception\CapacityNotPositiveException;
use App\Domain\Model\PreBooking\Exception\DateInHigherThanDateOutException;
use App\Domain\Model\PreBooking\Exception\EmptyPreBookingMessageException;
use App\Domain\Model\PreBooking\Exception\PreBookingCapacitySurpassesCottageCapacityException;
use App\Domain\Model\PreBooking\PreBooking;
use App\Domain\Model\PreBooking\ValueObject\PreBookingCapacity;
use App\Domain\Model\PreBooking\ValueObject\PreBookingMessage;
use App\Domain\Model\PreBooking\ValueObject\PreBookingPeriod;
use App\Domain\Model\PreBooking\ValueObject\PreBookingType;
use App\Domain\Model\Traveler\Traveler;
use App\Application\UseCase\PreBooking\PreBookingCreator;
use App\Infrastructure\Persistence\PreBooking\PreBookingDoctrineRepositoryInMemory;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use TypeError;

class PreBookingCreatorTest extends TestCase
{
    /** @var Traveler */
    private $traveler;
    /** @var Cottage */
    private $cottage;
    /** @var PreBookingPeriod */
    private $preBookingPeriod;
    /** @var PreBookingMessage */
    private $message;
    /** @var PreBookingCreator */
    private $preBookingCreator;
    /** @var PreBookingCapacity */
    private $preBookingCapacity;
    /** @var PreBookingType */
    private $preBookingType;

    /**
     * @before
     */
    public function setupFixture()
    {
        $this->traveler = $this->createMock(Traveler::class);
        $this->cottage = $this->createMock(Cottage::class);
        $this->cottage->method("getCapacity")
            ->willReturn(10);
        $this->capacity = PreBookingCapacity::fromValue(5);
        $this->preBookingPeriod = $this->createMock(PreBookingPeriod::class);
        $this->message = PreBookingMessage::fromString('Dummy message');
        $this->preBookingCreator = new PreBookingCreator(new PreBookingDoctrineRepositoryInMemory());
        $this->preBookingType = PreBookingType::standard();
    }

    public function testCreatePreBookingOk()
    {
        $preBooking = $this->preBookingCreator->create($this->traveler, $this->cottage, $this->preBookingPeriod, $this->capacity, $this->preBookingType, $this->message);

        $this->assertTrue($preBooking instanceof PreBooking);
    }

    public function testCreatePreBookingShouldFailWithInvalidTraveler()
    {
        $this->expectException(TypeError::class);

        $preBooking = $this->preBookingCreator->create(null, $this->cottage, $this->preBookingPeriod, $this->capacity, $this->preBookingType, $this->message);
    }

    public function testCreatePreBookingShouldFailWithInvalidCottage()
    {
        $this->expectException(TypeError::class);

        $preBooking = $this->preBookingCreator->create($this->traveler, null, $this->preBookingPeriod, $this->capacity, $this->preBookingType, $this->message);
    }

    public function testCreatePreBookingShouldFailWithZeroCapacity()
    {
        $this->expectException(CapacityNotPositiveException::class);

        $capacity = PreBookingCapacity::fromValue(0);
    }

    public function testCreatePreBookingShouldFailWithNegativeCapacity()
    {
        $this->expectException(CapacityNotPositiveException::class);

        $capacity = PreBookingCapacity::fromValue(-5);
    }

    public function testCreatePreBookingShouldFailWithCapacityTooHigh()
    {
        $capacity = PreBookingCapacity::fromValue(15);

        $this->expectException(PreBookingCapacitySurpassesCottageCapacityException::class);

        $preBooking = $this->preBookingCreator->create($this->traveler, $this->cottage, $this->preBookingPeriod, $capacity, $this->preBookingType, $this->message);
    }

    public function testCreatePreBookingShouldFaildWithEmptyMessage()
    {
        $this->expectException(EmptyPreBookingMessageException::class);

        PreBookingMessage::fromString('');
    }

    public function testCreatePreBookingShouldFaildWithDateInHigherThanDateOut()
    {
        $dateIn = new \DateTime('2019-10-12');
        $dateOut = new \DateTime('2019-10-13');

        $this->expectException(DateInHigherThanDateOutException::class);

        $preBookingPeriod = new PreBookingPeriod($dateOut, $dateIn);
    }

    public function testShouldCreateStandardTypeFromString()
    {
        $preBookingType = PreBookingType::fromString('standard');

        $this->assertTrue($preBookingType instanceof PreBookingType);
        $this->assertEquals(PreBookingType::PRE_BOOKING_SCORES[PreBookingType::STANDARD], $preBookingType->getScore());
    }

    public function testShouldCreateUniqueTypeFromString()
    {
        $preBookingType = PreBookingType::fromString('unique');

        $this->assertTrue($preBookingType instanceof PreBookingType);
        $this->assertEquals(PreBookingType::PRE_BOOKING_SCORES[PreBookingType::UNIQUE], $preBookingType->getScore());
    }

    public function testShouldCreateQualifiedTypeFromString()
    {
        $preBookingType = PreBookingType::fromString('qualified');

        $this->assertTrue($preBookingType instanceof PreBookingType);
        $this->assertEquals(PreBookingType::PRE_BOOKING_SCORES[PreBookingType::QUALIFIED], $preBookingType->getScore());
    }

    public function testShouldFailWithInvalidArgument()
    {
        $this->expectException(InvalidArgumentException::class);

        $preBookingType = PreBookingType::fromString('extra');
    }

}
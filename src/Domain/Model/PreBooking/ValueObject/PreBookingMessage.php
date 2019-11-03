<?php
declare(strict_types = 1);

namespace App\Domain\Model\PreBooking\ValueObject;

use App\Domain\Model\PreBooking\Exception\EmptyPreBookingMessageException;

class PreBookingMessage
{
    /** @var string */
    private $message;

    private function __construct(string $message)
    {
        if (empty($message)) {
            throw new EmptyPreBookingMessageException();
        }

        $this->message = $message;
    }

    public static function fromString(string $message): PreBookingMessage
    {
        return new self($message);
    }

    public function __toString(): string
    {
        return $this->message;
    }
}
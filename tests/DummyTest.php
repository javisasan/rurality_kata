<?php

namespace Tests;

use App\Dummy;
use PHPUnit\Framework\TestCase;

class DummyTest extends TestCase
{
    public function test_dummy()
    {
        $dummy = new Dummy;

        $this->assertTrue($dummy->execute());
    }
}

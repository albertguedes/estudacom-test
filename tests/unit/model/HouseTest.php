<?php

declare(strict_types=1);

namespace Tests\Unit\Model;

use Estudacom\Model\House;
use PHPUnit\Framework\TestCase;

class HouseTest extends TestCase
{

    private House $house;

    protected function setUp(): void
    {
        $this->house = House::find(1);
    }

    public function testAllMethodReturnsArray(): void
    {
        $houses = House::all();

        $this->assertIsArray($houses);
    
    }

    public function testAllMethodReturnsArrayOfHouses(): void
    {

        $houses = House::all();

        foreach ($houses as $house) {
            $this->assertInstanceOf(House::class, $house);
        }

    }

    public function testFindMethodReturnsHouseObject(): void
    {
        $this->assertInstanceOf(House::class, $this->house);
        $this->assertSame(1, $this->house->id);
        $this->assertSame('Baratheon', $this->house->name);
    }

    public function testFindMethodReturnsNullIfNotFound(): void
    {
        $house = house::find(99);

        $this->assertNull($house);
    }

    public function testPeopleMethodReturnsArrayOfPeople(): void
    {
        $people = $this->house->people();

        $this->assertIsArray($people);
        $this->assertInstanceOf('Estudacom\Model\Person', $people[0]);
    }
}

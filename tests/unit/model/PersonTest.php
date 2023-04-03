<?php

declare(strict_types=1);

namespace Tests\Unit\Model;

use PHPUnit\Framework\TestCase;
use Estudacom\Model\Person;
use Estudacom\Model\House;

class PersonTest extends TestCase
{
    private Person $person;

    protected function setUp(): void
    {
        $this->person = new Person();
    }

    public function testAllMethodReturnsArray(): void
    {
        $people = Person::all();

        $this->assertIsArray($people);
    }

    public function testAllMethodReturnsArrayOfPersons(): void
    {
        $people = Person::all();

        foreach ($people as $person) {
            $this->assertInstanceOf(Person::class, $person);
        }
    }

    public function testFindReturnsPersonObject(): void
    {
        $person = Person::find(1);

        $this->assertInstanceOf(Person::class, $person);
        $this->assertEquals('Stannis Baratheon', $person->name);
        var_dump($person->house_id);
        $this->assertEquals(1, $person->house_id);
    }

    public function testFindReturnsNullIfNotFound(): void
    {
        $person = Person::find(99);

        $this->assertNull($person);
    }

    public function testHouseReturnsHouse(): void
    {
        $person = Person::find(1);
        $house = $person->house();

        $this->assertInstanceOf(House::class, $house);
        $this->assertEquals(1, $house->id);
        $this->assertEquals('Baratheon', $house->name);
    }
}

<?php

declare(strict_types=1);

namespace Estudacom\Model;

use Estudacom\Database;
use Estudacom\Model\House;

class Person {

    public int $id = 0;

    public string $name = '';

    public int $house_id = 0;

    public function __construct(){}

    /**
     * Get all people on "table".
     *
     * @return array
     */
    public static function all(): array 
    {

        $database = new Database();
        $data = $database->readJsonFile(__DIR__ . '/../data/people.json');

        $persons = [];

        foreach ( $data as $row ){
            $person = new Person();
            $person->id = $row->id;
            $person->name = $row->name;
            $person->house_id = $row->house_id;
            $persons[] = $person;
        }

        return $persons;

    }

    /**
     * Get the person given the id.
     *
     * @param integer $id
     * @return mixed
     */
    public static function find( int $id): mixed 
    {

        $database = new Database();
        $data = $database->readJsonFile(__DIR__ . '/../data/people.json');

        foreach ($data as $row) {
            if ($row->id == $id) {
                // Construct the person and return it.
                $person = new Person();
                $person->id   = $row->id;
                $person->name = $row->name;
                $person->house_id = $row->house_id;
                return $person;
            }
        }

        return null;

    }

    /**
     * Get the house associated to the person.
     *
     * @return mixed
     */
    public function house(): mixed
    {
        return House::find($this->house_id);
    }

}
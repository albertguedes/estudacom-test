<?php

declare(strict_types=1);

namespace Estudacom\Model;

use Estudacom\Database;

class House {

    public int $id;

    public string $name;

    public function __construct(){}
    
    /**
     * get all houses.
     *
     * @return array
     */
    public static function all(): array 
    {

        $database = new Database();
        $data = $database->readJsonFile(__DIR__ . '/../data/houses.json');

        $houses = [];

        foreach ($data as $row) {
            $house       = new House();
            $house->id   = $row->id;
            $house->name = $row->name;
            $houses[]    = $house;
        }

        return $houses;

    }

    /**
     * Find the house given the id.
     *
     * @param integer $id
     * @return mixed
     */
    public static function find( int $id ): mixed 
    {

        $database = new Database();
        $data = $database->readJsonFile(__DIR__ . '/../data/houses.json');

        foreach ($data as $row) {
            if ($row->id == $id) {
                // Construct the house and return it.
                $house = new House();
                $house->id   = $row->id;
                $house->name = $row->name;
                return $house;
            }
        }

        return null;

    }

    /**
     * Get the people associated to the house.
     *
     * @return array
     */
    public function people(): array 
    {

        $database = new Database();
        $data = $database->readJsonFile(__DIR__ . '/../data/people.json');

        $people = [];

        foreach ($data as $row) {
            if ($row->house_id == $this->id ) {
                $people[] = Person::find($row->id);
            }
        }

        return $people;

    }

}
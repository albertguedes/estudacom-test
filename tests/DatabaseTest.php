<?php declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\TestCase;
use Estudacom\Database;

/**
 * Summary of DatabaseTest
 */
final class DatabaseTest extends TestCase
{
    
    /**
     * Summary of testReadingValidJsonFile
     * @return void
     */
    public function testReadingValidJsonFile(): void
    {
        $filename = __DIR__ . '/support/files/valid_table.json';

        $database = new Database();
        $data = $database->readJsonFile($filename);

        $this->assertEquals(5, count($data));

        foreach ($data as $row) {
            $this->assertObjectHasAttribute('id', $row);
            $this->assertObjectHasAttribute('name', $row);
        }
    }

    /**
     * Summary of testReadingInvalidJsonFile
     * @return void
     */
    public function testReadingInvalidJsonFile(): void
    {
        $filename = __DIR__ . '/support/files/invalid_table.json';

        $database = new Database();
        $this->assertNull($database->readJsonFile($filename));
    }

    /**
     * Summary of testReadingNotFoundJsonFile
     * @return void
     */
    public function testReadingNotFoundJsonFile(): void
    {
        $filename = __DIR__ . '/support/files/not_found_table.json';

        $database = new Database();
        $this->assertNull($database->readJsonFile($filename));
    }
}

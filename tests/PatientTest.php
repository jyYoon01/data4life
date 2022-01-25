<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;

Class PatientTest extends TestCase
{
    /** @test */
    public function PatientCreateTest()
        {
            include('server/model/Patient.php');
            $patient = new Patient("P1", "P1Name", 15, "M");

            $this->assertEquals("P1", $patient->getId());
            $this->assertEquals("P1Name", $patient->getName());

        }

}

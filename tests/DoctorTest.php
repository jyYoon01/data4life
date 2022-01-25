<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;

Class DoctorTest extends TestCase
{
    /** @test */
    public function DoctorCreateTest()
        {
            include('server/model/Doctor.php');
            $doctor = new Doctor("D1", "D1Name");

            $this->assertEquals("D1", $doctor->getId());
            $this->assertEquals("D1Name", $doctor->getName());

        }

}

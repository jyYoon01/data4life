<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;

Class AppointmentTest extends TestCase
{
    /** @test */
    public function AppointmentCreateTest()
        {
            include('server/model/Appointment.php');
            $appointment = new Appointment("D1", "D1name", "P1", "P1name", 12, "F", "A10", "2018-03-08 09:00:00");

            $this->assertEquals("A10", $appointment->getId());
            $this->assertEquals("2018-03-08 09:00:00", $appointment->getDate());

        }

}

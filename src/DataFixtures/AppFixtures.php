<?php

namespace App\DataFixtures;

use App\Entity\Car;
use App\Entity\SteeringWheel;
use App\Entity\Wheel;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $mycar = new Car();
        $wheel_front = new Wheel();
        $wheel_back = new Wheel();
        $steering_wheel = new SteeringWheel();

        $wheel_front->setSerialNumber("frontwheel");
        $wheel_back->setSerialNumber("backwheel");
        $steering_wheel->setSerialNumber("steeringwheel");

        $mycar->setName("car 1");

        $mycar
            ->addWheel($wheel_front)
            ->addWheel($wheel_back)
            ->setSteeringWheel($steering_wheel)
        ;

        $manager->persist($mycar);
        $manager->persist($wheel_back);
        $manager->persist($wheel_front);
        $manager->persist($steering_wheel);
        $manager->flush();
    }
}

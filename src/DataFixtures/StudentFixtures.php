<?php

namespace App\DataFixtures;

use App\Entity\Student;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class StudentFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $student = new Student();
        $student->setName('John Doe');
        $student->setPhone("0942557865");
        $student->setCourse('Networking');
        $student->setDob(new \DateTime('now'));
        $manager->persist($student);

        $manager->flush();
    }
}

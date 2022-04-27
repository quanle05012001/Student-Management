<?php

namespace App\DataFixtures;

use App\Entity\Student;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class StudentFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for($i = 1; $i <=10; $i++){
            $student = new Student();
            $student->setName('Quan Le');
            $student->setPhone("0942558694");
            $student->setDob(new \DateTime('now'));
            $student->setImage('https://leerit.com/media/blog/uploads/2015/04/15/phan-biet-cac-tu-ve-hoc-sinh-student.jpg');
            $manager->persist($student);
        }
       

        $manager->flush();
    }
}

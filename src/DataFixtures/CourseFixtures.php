<?php

namespace App\DataFixtures;

use App\Entity\Course;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class CourseFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for($i = 1; $i <=10; $i++){
            $course = new Course();
            $course->setName('Tieng Viet 1');
            $course->setImage('https://images.thuvienpdf.com/J5hcEimage%20(14).webp');
            $course->setClassroom("GCH0901");;
            $manager->persist($course);
        }

        $manager->flush();
    }
}

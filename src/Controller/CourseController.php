<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CourseController extends AbstractController
{
    #[Route('/course', name: 'course')]
    public function CourseIndex(ManagerRegistry $registry)
    {
        $course = $registry->getRepository(Course::class)->findAll();
        if (!$course){
            $this->addFlash('error', 'No courses found');
            return $this->redirectToRoute('home');
        }
        return $this->render('course/index.html.twig', [
            'courses' => $course,
        ]);
    
    }
   
}

<?php

namespace App\Controller;

use App\Entity\Student;
use Symfony\Bridge\Doctrine\ManagerRegistry;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class StudentController extends AbstractController
{
    #[Route('/student', name: 'student')]
    public function index(): Response
    {
        $student = $this->getDoctrine()->getRepository(Student::class)->findAll();
        if (!$student) {
            throw $this->createNotFoundException(
                'No students found in the database.'
            );
        }
    
    return $this->render('student/index.html.twig', [
        'student' => $student,
    ]);

}
}
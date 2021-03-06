<?php

namespace App\Controller;

use App\Entity\Teacher;
use App\Form\TeacherType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
#[Route('/teacher')]
class TeacherController extends AbstractController
{
    #[Route('/', name: 'teacher_index')]
    public function index(): Response
    {
        $teachers =$this->getDoctrine()->getRepository(Teacher::class)->findAll();
        if (!$teachers) {
            $this->addFlash("Error", "No teachers found in the database.");
            return $this->redirectToRoute("home");
        }
        return $this->render('teacher/index.html.twig', [
            'Teachers' => $teachers,
        ]);
    }

    #[Route('/detail/{id}', name: 'teacher_detail')]
    public function show($id)
    {
        $teacher = $this->getDoctrine()->getRepository(Teacher::class)->find($id);
        if (!$teacher) {
            $this->addFlash("Error", "Undefined teacher!");
            return $this->redirectToRoute("teacher_index");
        }
        return $this->render('teacher/detail.html.twig', [
            'teacher' => $teacher,
        ]);
    }

    #[Route('/add', name: 'add_teacher')]
    public function add(Request $request, ManagerRegistry $managerRegistry)
    {
        $teacher = new Teacher();
        $form = $this->createForm(TeacherType::class, $teacher);
        $form -> handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
        
            $manager = $managerRegistry->getManager();
            $manager->persist($teacher);
            $manager->flush();
            $this->addFlash("Success", "Teacher added successfully !");
            return $this->redirectToRoute("teacher_index");
        }
        return $this->renderForm(
            'teacher/add.html.twig',
            [
                'teacherForm' => $form
            ]
        );
    }

    #[Route('/delete/{id}', name: 'delete_teacher')]
    public function teacherDelete($id, ManagerRegistry $managerRegistry)
    {
        $teacher = $this->getDoctrine()->getRepository(Teacher::class)->find($id);
        if (!$teacher) {
            $this->addFlash("Error", "Undefined teacher!");
        }
        else if(count($teacher->getFeedBacks())!=0){
            $this->addFlash("Error", "Khong the xoa giao vien");
        }
        else {
        $manager = $managerRegistry->getManager();
        $manager->remove($teacher);
        $manager->flush();
        $this->addFlash("Success", "Teacher has been deleted!");
        
        }
        return $this->redirectToRoute("teacher_index");
    }
    #[Route('/edit/{id}', name: 'edit_teacher')]
    public function teacherEdit($id, Request $request, ManagerRegistry $managerRegistry)
    {
        $teacher = $this->getDoctrine()->getRepository(Teacher::class)->find($id);
        $form = $this->createForm(TeacherType::class, $teacher);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $manager = $this->getDoctrine()->getManager();
            $manager = $managerRegistry->getManager();
            $manager->persist($teacher);
            $manager->flush();
            $this->addFlash("Success", "Teacher edited successfully !");
            return $this->redirectToRoute("teacher_index");
        }
        return $this->renderForm(
            'teacher/edit.html.twig',
            [
                'teacherForm' => $form
            ]
        );
    }

    #[Route('/viewFeedback/{id}', name: 'viewfeedback')]
    public function viewFeedback($id, ManagerRegistry $managerRegistry)
    {
        $teacher = $managerRegistry->getRepository(FeedBack::class)->find($id);
        $feedBack = $teacher->getFeedback();
        return $this->render('feed_back/index.html.twig', [
            'feedback' => $feedBack,
        ]);
    }

    

}

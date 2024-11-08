<?php

namespace App\Controller;


use App\Repository\LessonRepository;
use App\Repository\ThemeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class FormationController extends AbstractController
{
    #[Route('/formation', name: 'app_formation')]
    public function index(ThemeRepository $themeRepository, ): Response
    {
        $themes = $themeRepository -> findAll();

        return $this->render('formation/index.html.twig', [
            'themes'=>$themes
        ]);
    }

    #[Route('/formation/cursus/lesson/{id_lesson}', name:'app_cursus', requirements:['id_lesson' => '\d+'])]
    public function detailLesson(int $id_lesson,LessonRepository $lessonRepository)
    {
        $lesson = $lessonRepository->find($id_lesson);
        return $this->render('formation/detailLesson.html.twig',[
            'lesson'=> $lesson
        ]);
    }
}



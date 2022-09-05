<?php

namespace App\Controller;

use App\Repository\PersonageRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PersonageController extends AbstractController
{
    /**
     * @Route("/personage/{id}", name="app_personage", requirements={"id"="\d+"})
     */
    public function index(PersonageRepository $personageRepository, int $id): Response
    {
        $personage = $personageRepository->find($id);
        return $this->render('personage/index.html.twig', [
            'personage' => $personage,
        ]);
    }
}

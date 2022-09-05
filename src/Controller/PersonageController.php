<?php

namespace App\Controller;

use App\Repository\PersonageRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PersonageController extends AbstractController
{
    /**
     * @Route("/personage", name="app_personage")
     */
    public function index(PersonageRepository $personageRepository): Response
    {
        $personages = $personageRepository->findAll();
        return $this->render('personage/index.html.twig', [
            'personages' => $personages,
        ]);
    }
}

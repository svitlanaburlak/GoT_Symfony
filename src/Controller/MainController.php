<?php

namespace App\Controller;

use App\Repository\HouseRepository;

use App\Repository\PersonageRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */
    public function index(PersonageRepository $personageRepository): Response
    {
        $personages = $personageRepository->findAll();
        return $this->render('main/index.html.twig', [
            'personages' => $personages,
        ]);
    }
}

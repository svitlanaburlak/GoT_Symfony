<?php

namespace App\Controller;

use App\Repository\HouseRepository;
use App\Repository\CharacterRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */
    public function index(HouseRepository $houseRepository): Response
    {
        $houses = $houseRepository->findAll();
        return $this->render('main/index.html.twig', [
            'houses' => $houses
        ]);
    }
}

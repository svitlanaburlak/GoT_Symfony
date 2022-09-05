<?php

namespace App\Controller;

use App\Repository\HouseRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HouseController extends AbstractController
{
    /**
     * @Route("/house", name="app_house_list")
     */
    public function list(HouseRepository $houseRepository): Response
    {
        $houses = $houseRepository->findAll();
        return $this->render('house/list.html.twig', [
            'houses' => $houses,
        ]);
    }

    /**
     * @Route("/house/{id}", name="app_house_read", requirements={"id"="\d+"})
     */
    public function read(HouseRepository $houseRepository, int $id): Response
    {
        $house = $houseRepository->find($id);
        return $this->render('house/read.html.twig', [
            'house' => $house,
        ]);
    }
}

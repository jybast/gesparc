<?php

namespace App\Controller;

use App\Repository\VehiculeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    #[Route('/accueil', name: 'accueil')]
    public function index(VehiculeRepository $vehiculeRepository): Response
    {
        $nbVehicules = $vehiculeRepository->findAll();
        return $this->render('main/index.html.twig', [
            'vehicules' => $nbVehicules,
        ]);
    }

    #[Route('/contact', name: 'contact')]
    public function contact(): Response
    {
        return $this->render('main/contact.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }

    #[Route('/infos', name: 'infos')]
    public function infos(): Response
    {
        return $this->render('main/infos.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }
}

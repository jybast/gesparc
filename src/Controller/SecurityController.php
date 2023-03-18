<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    #[Route(path: '/connexion', name: 'gp_login')]
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        // si un utilisateur est déjà connecté on le renvoie vers 'accueil' 
        if ($this->getUser()) {
            return $this->redirectToRoute('accueil');
        }

        // Récupère l'erreur au login
        $error = $authenticationUtils->getLastAuthenticationError();
        // dernier identifiant utilisé
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
    }

    #[Route(path: '/logout', name: 'gp_logout')]
    public function logout(): void
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }
}

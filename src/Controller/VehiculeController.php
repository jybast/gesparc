<?php

namespace App\Controller;

use App\Entity\Galerie;
use App\Entity\Vehicule;
use App\Form\VehiculeType;
use App\Repository\VehiculeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/vehicule')]
class VehiculeController extends AbstractController
{
    #[Route('/', name: 'vehicule_index', methods: ['GET'])]
    public function index(VehiculeRepository $vehiculeRepository): Response
    {
        return $this->render('vehicule/index.html.twig', [
            'vehicules' => $vehiculeRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'vehicule_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $vehicule = new Vehicule();
        $form = $this->createForm(VehiculeType::class, $vehicule);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            // Récupère la galerie d'images dans le formulaire
            $images = $form->get('galeries')->getData();
            // on boucle sur les images
            foreach ($images as $image) {
                $fichier = md5(uniqid()) . '.' . $image->guessExtension();

                // On copie le fichier dans le dossier uploads
                $image->move(
                    // destination
                    $this->getParameter('galeries_directory'),
                    // le fichier à tranférer
                    $fichier
                );
                // On stocke le nom de l'image dans la base de données
                // nouvelle instance
                $img = new Galerie();
                // on lui donne le nom du fichier
                $img->setNom($fichier);
                // injecte l'instance d'image dans vehicule
                $vehicule->addGalery($img);
            }

            $entityManager->persist($vehicule);
            $entityManager->flush();

            return $this->redirectToRoute('vehicule_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('vehicule/new.html.twig', [
            'vehicule' => $vehicule,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'vehicule_show', methods: ['GET'])]
    public function show(Vehicule $vehicule): Response
    {
        return $this->render('vehicule/show.html.twig', [
            'vehicule' => $vehicule,
        ]);
    }

    #[Route('/{id}/edit', name: 'vehicule_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Vehicule $vehicule, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(VehiculeType::class, $vehicule);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            // Récupère la galerie d'images dans le formulaire
            $images = $form->get('galeries')->getData();
            // on boucle sur les images
            foreach ($images as $image) {
                $fichier = md5(uniqid()) . '.' . $image->guessExtension();

                // On copie le fichier dans le dossier uploads
                $image->move(
                    // destination
                    $this->getParameter('galeries_directory'),
                    // le fichier à tranférer
                    $fichier
                );
                // On stocke le nom de l'image dans la base de données
                // nouvelle instance
                $img = new Galerie();
                // on lui donne le nom du fichier
                $img->setNom($fichier);
                // injecte l'instance d'image dans vehicule
                $vehicule->addGalery($img);
            }

            $entityManager->flush();

            return $this->redirectToRoute('vehicule_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('vehicule/edit.html.twig', [
            'vehicule' => $vehicule,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'vehicule_delete', methods: ['POST'])]
    public function delete(Request $request, Vehicule $vehicule, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $vehicule->getId(), $request->request->get('_token'))) {
            $entityManager->remove($vehicule);
            $entityManager->flush();
        }

        return $this->redirectToRoute('vehicule_index', [], Response::HTTP_SEE_OTHER);
    }

    #[Route('/supprime/image/{id}', name: 'vehicule_delete_image', methods: ['DELETE'])]
    public function deleteImage(Galerie $galerie, Request $request, EntityManagerInterface $entityManager)
    {
        // on récupère les données 
        $data = json_decode($request->getContent(), true);
        // on vérifie si le token est valide
        if ($this->isCsrfTokenValid('delete' . $galerie->getId(), $data['_token'])) {
            // on récupère le  nom du fichier
            $nom = $galerie->getNom();
            // on supprime le fichier
            unlink($this->getParameter('galeries_directory') . '/' . $nom);

            //supprime de la base de données
            $entityManager->remove($galerie);
            $entityManager->flush();

            // On répond en Json
            return new JsonResponse(['success' => 1]);
        } else {
            return new JsonResponse(['error' => 'Token invalide'], 400);
        }
    }
}

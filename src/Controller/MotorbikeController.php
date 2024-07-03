<?php

namespace App\Controller;

use App\Entity\Motorbike;
use App\Form\MotorbikeType;
use App\Repository\MotorbikeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/motorbike')]
class MotorbikeController extends AbstractController
{
    #[Route('/', name: 'app_motorbike_index', methods: ['GET'])]
    public function index(MotorbikeRepository $motorbikeRepository): Response
    {
        return $this->render('motorbike/index.html.twig', [
            'motorbikes' => $motorbikeRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_motorbike_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $motorbike = new Motorbike();
        $form = $this->createForm(MotorbikeType::class, $motorbike);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($motorbike);
            $entityManager->flush();

            return $this->redirectToRoute('app_motorbike_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('motorbike/new.html.twig', [
            'motorbike' => $motorbike,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_motorbike_show', methods: ['GET'])]
    public function show(Motorbike $motorbike): Response
    {
        return $this->render('motorbike/show.html.twig', [
            'motorbike' => $motorbike,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_motorbike_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Motorbike $motorbike, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(MotorbikeType::class, $motorbike);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_motorbike_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('motorbike/edit.html.twig', [
            'motorbike' => $motorbike,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_motorbike_delete', methods: ['POST'])]
    public function delete(Request $request, Motorbike $motorbike, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$motorbike->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($motorbike);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_motorbike_index', [], Response::HTTP_SEE_OTHER);
    }
}

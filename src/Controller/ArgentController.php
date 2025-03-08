<?php

namespace App\Controller;

use App\Entity\Argent;
use App\Form\ArgentType;
use App\Repository\ArgentRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/argent')]
final class ArgentController extends AbstractController
{
    #[Route(name: 'app_argent_index', methods: ['GET'])]
    public function index(ArgentRepository $argentRepository): Response
    {
        return $this->render('argent/index.html.twig', [
            'argents' => $argentRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_argent_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $argent = new Argent();
        $form = $this->createForm(ArgentType::class, $argent);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($argent);
            $entityManager->flush();

            return $this->redirectToRoute('app_argent_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('argent/new.html.twig', [
            'argent' => $argent,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_argent_show', methods: ['GET'])]
    public function show(Argent $argent): Response
    {
        return $this->render('argent/show.html.twig', [
            'argent' => $argent,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_argent_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Argent $argent, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ArgentType::class, $argent);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_argent_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('argent/edit.html.twig', [
            'argent' => $argent,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_argent_delete', methods: ['POST'])]
    public function delete(Request $request, Argent $argent, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$argent->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($argent);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_argent_index', [], Response::HTTP_SEE_OTHER);
    }
}

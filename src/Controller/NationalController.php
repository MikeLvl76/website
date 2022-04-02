<?php

namespace App\Controller;

use App\Entity\National;
use App\Form\NationalType;
use App\Repository\NationalRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/national')]
class NationalController extends AbstractController
{
    #[Route('/', name: 'app_national_index', methods: ['GET'])]
    public function index(NationalRepository $nationalRepository): Response
    {
        return $this->render('national/index.html.twig', [
            'nationals' => $nationalRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_national_new', methods: ['GET', 'POST'])]
    public function new(Request $request, NationalRepository $nationalRepository): Response
    {
        $national = new National();
        $form = $this->createForm(NationalType::class, $national);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $nationalRepository->add($national);
            return $this->redirectToRoute('app_national_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('national/new.html.twig', [
            'national' => $national,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_national_show', methods: ['GET'])]
    public function show(National $national): Response
    {
        return $this->render('national/show.html.twig', [
            'national' => $national,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_national_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, National $national, NationalRepository $nationalRepository): Response
    {
        $form = $this->createForm(NationalType::class, $national);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $nationalRepository->add($national);
            return $this->redirectToRoute('app_national_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('national/edit.html.twig', [
            'national' => $national,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_national_delete', methods: ['POST'])]
    public function delete(Request $request, National $national, NationalRepository $nationalRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$national->getId(), $request->request->get('_token'))) {
            $nationalRepository->remove($national);
        }

        return $this->redirectToRoute('app_national_index', [], Response::HTTP_SEE_OTHER);
    }
}

<?php

namespace App\Controller;

use App\Entity\QSN;
use App\Form\QSNType;
use App\Repository\QSNRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/q/s/n')]
class QSNController extends AbstractController
{
    #[Route('/', name: 'app_qsn_index', methods: ['GET'])]
    public function index(QSNRepository $qSNRepository): Response
    {
        return $this->render('qsn/show.html.twig', [
            'qsn' => $qSNRepository->findOneBy([]),
        ]);
    }

    #[Route('/new', name: 'app_q_s_n_new', methods: ['GET', 'POST'])]
    public function new(Request $request, QSNRepository $qSNRepository): Response
    {
        $qSN = new QSN();
        $form = $this->createForm(QSNType::class, $qSN);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $qSNRepository->save($qSN, true);

            return $this->redirectToRoute('app_q_s_n_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('qsn/new.html.twig', [
            'q_s_n' => $qSN,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_q_s_n_show', methods: ['GET'])]
    public function show(QSN $qSN): Response
    {
        return $this->render('qsn/show.html.twig', [
            'q_s_n' => $qSN,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_q_s_n_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, QSN $qSN, QSNRepository $qSNRepository): Response
    {
        $form = $this->createForm(QSNType::class, $qSN);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $qSNRepository->save($qSN, true);

            return $this->redirectToRoute('app_q_s_n_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('qsn/edit.html.twig', [
            'q_s_n' => $qSN,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_q_s_n_delete', methods: ['POST'])]
    public function delete(Request $request, QSN $qSN, QSNRepository $qSNRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$qSN->getId(), $request->request->get('_token'))) {
            $qSNRepository->remove($qSN, true);
        }

        return $this->redirectToRoute('app_q_s_n_index', [], Response::HTTP_SEE_OTHER);
    }
}

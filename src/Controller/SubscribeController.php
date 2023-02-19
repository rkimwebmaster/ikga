<?php

namespace App\Controller;

use App\Entity\Subscribe;
use App\Form\SubscribeType;
use App\Repository\SubscribeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/subscribe')]
class SubscribeController extends AbstractController
{
   
    #[Route('/new', name: 'app_subscribe_new', methods: ['GET', 'POST'])]
    public function new(Request $request, SubscribeRepository $subscribeRepository): Response
    {
        $subscribe = new Subscribe();
        $form = $this->createForm(SubscribeType::class, $subscribe);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $subscribeRepository->save($subscribe, true);

            return $this->redirectToRoute('app_subscribe_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('subscribe/new.html.twig', [
            'subscribe' => $subscribe,
            'form' => $form,
        ]);
    }

   
}

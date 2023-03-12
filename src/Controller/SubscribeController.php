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
   
    #[Route('/creationNewsLetter', name: 'app_creationNewsLetter', methods: 'GET')]
    public function creationNewsLetter(Request $request, NewsLetterRepository $newsLetterRepository): Response
    {

        $email = $request->get('email');
        // verifier doublon
        $check = $newsLetterRepository->findBy(['email' => $email]);
        if ($check) {
            $this->addFlash("info", "Merci vous êtes déja dans le système.");
            return $this->redirectToRoute('app_accueil', [], Response::HTTP_SEE_OTHER);
        }
        $newsLetter = new Subscribe();
        $newsLetter->setEmail($email);
        $newsLetterRepository->save($newsLetter, true);
        $this->addFlash("success", "Merci pour votre inscription à la newsletter.");
        return $this->redirectToRoute('app_accueil', [], Response::HTTP_SEE_OTHER);
        // return $this->redirect();
    }

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

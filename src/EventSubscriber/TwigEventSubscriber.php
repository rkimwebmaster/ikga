<?php

namespace App\EventSubscriber;

use App\Repository\CategorieRepository;
use App\Repository\NewsRepository;
use App\Repository\ParametreRepository;
use App\Repository\PartenaireRepository;
use App\Repository\ProduitRepository;
use App\Repository\ServiceRepository;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\ControllerEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Twig\Environment;

class TwigEventSubscriber implements EventSubscriberInterface
{
    public function __construct(
        private ParametreRepository $parametreRepository,
        private PartenaireRepository $partenaireRepository,
        private CategorieRepository $categorieRepository,
        private ProduitRepository $produitRepository,
        private NewsRepository $newsRepository,
        private ServiceRepository $serviceRepository,
        private Environment $twig
        )
    {
        
    }
    public function onKernelController(ControllerEvent $event): void
    {
        $this->twig->addGlobal('parametre',$this->parametreRepository->findOneBy([],[]));
        $this->twig->addGlobal('categories',$this->categorieRepository->findAll());
        $this->twig->addGlobal('partenaires',$this->partenaireRepository->findAll());
        $this->twig->addGlobal('services',$this->serviceRepository->findBy([],[]));
        $this->twig->addGlobal('news',$this->newsRepository->findBy([],[]));
        $this->twig->addGlobal('produits',$this->produitRepository->findBy([],[]));
    }

    public static function getSubscribedEvents(): array
    {
        return [
            KernelEvents::CONTROLLER => 'onKernelController',
        ];
    }
}

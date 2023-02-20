<?php

namespace App\EventSubscriber;

use App\Repository\CategorieRepository;
use App\Repository\ParametreRepository;
use App\Repository\ServiceRepository;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\ControllerEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Twig\Environment;

class TwigEventSubscriber implements EventSubscriberInterface
{
    public function __construct(
        private ParametreRepository $parametreRepository,
        private CategorieRepository $categorieRepository,
        private ServiceRepository $serviceRepository,
        private Environment $twig
        )
    {
        
    }
    public function onKernelController(ControllerEvent $event): void
    {
        $this->twig->addGlobal('parametre',$this->parametreRepository->findOneBy([],[]));
        $this->twig->addGlobal('categories',$this->categorieRepository->findOneBy([],[]));
        $this->twig->addGlobal('services',$this->serviceRepository->findOneBy([],[]));
    }

    public static function getSubscribedEvents(): array
    {
        return [
            KernelEvents::CONTROLLER => 'onKernelController',
        ];
    }
}

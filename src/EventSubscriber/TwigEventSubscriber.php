<?php

namespace App\EventSubscriber;

use App\Repository\ParametreRepository;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\ControllerEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Twig\Environment;

class TwigEventSubscriber implements EventSubscriberInterface
{
    public function __construct(
        private ParametreRepository $parametreRepository,
        private Environment $twig
        )
    {
        
    }
    public function onKernelController(ControllerEvent $event): void
    {
        $this->twig->addGlobal('parametre',$this->parametreRepository->findOneBy([],[]));
    }

    public static function getSubscribedEvents(): array
    {
        return [
            KernelEvents::CONTROLLER => 'onKernelController',
        ];
    }
}

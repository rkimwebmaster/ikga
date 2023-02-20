<?php

namespace App\Controller\Admin;

use App\Entity\Categorie;
use App\Entity\Contact;
use App\Entity\News;
use App\Entity\Parametre;
use App\Entity\Partenaire;
use App\Entity\Privacy;
use App\Entity\Produit;
use App\Entity\QSN;
use App\Entity\Service;
use App\Entity\Subscribe;
use App\Entity\TeamMember;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'app_admin')]
    public function index(): Response
    {
        // return parent::index();

        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
        // $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        // return $this->redirect($adminUrlGenerator->setController(OneOfYourCrudController::class)->generateUrl());

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('kilenge22' === $this->getUser()->getUsername()) {
        //     return $this->render('admin/my-dashboard.html.twig');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
        return $this->render('admin/my-dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('IKGA DashBoard');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Categorie', 'fas fa-list', Categorie::class);
        yield MenuItem::linkToCrud('Contact', 'fas fa-list', Contact::class);
        yield MenuItem::linkToCrud('News', 'fas fa-list', News::class);
        yield MenuItem::linkToCrud('Parametres ', 'fas fa-list', Parametre::class);
        yield MenuItem::linkToCrud('Partenaires', 'fas fa-list', Partenaire::class);
        yield MenuItem::linkToCrud('Privacy', 'fas fa-list', Privacy::class);
        yield MenuItem::linkToCrud('Produit', 'fas fa-list', Produit::class);
        yield MenuItem::linkToCrud('Qui sommes nous', 'fas fa-list', QSN::class);
        yield MenuItem::linkToCrud('Services ', 'fas fa-list', Service::class);
        yield MenuItem::linkToCrud('Subscribe', 'fas fa-list', Subscribe::class);
        yield MenuItem::linkToCrud('Membres équipe', 'fas fa-list', TeamMember::class);
    }
}

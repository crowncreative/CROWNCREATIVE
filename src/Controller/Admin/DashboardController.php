<?php

namespace App\Controller\Admin;

use App\Entity\Competences;
use App\Entity\Offer;
use App\Entity\Pack;
use App\Entity\Testimonials;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return parent::index();
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Crown Creative');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Tableau de bord', 'fa fa-home');
        yield MenuItem::linkToCrud('Utilisateurs', 'fa fa-user', User::class);
        yield MenuItem::linkToCrud('Offres', 'fa fa-gift', Offer::class);
        yield MenuItem::linkToCrud('Packs', 'fa fa-box-open', Pack::class);
        yield MenuItem::linkToCrud('Compétences', 'fa fa-sitemap', Competences::class);
        yield MenuItem::linkToCrud('Témoignages', 'fa fa-book', Testimonials::class);
    }
}

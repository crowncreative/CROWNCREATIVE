<?php

namespace App\Controller;

use App\Entity\Competences;
use App\Entity\Testimonials;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/', name: 'home')]
    public function index(): Response
    {
        $competences = $this->entityManager->getRepository(Competences::class)->findAll();
        $testimonials = $this->entityManager->getRepository(Testimonials::class)->findAll();

        return $this->render('home/index.html.twig', [
            'competences' => $competences,
            'testimonials' => $testimonials
        ]);
    }
}

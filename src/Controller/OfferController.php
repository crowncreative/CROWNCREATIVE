<?php

namespace App\Controller;

use App\Entity\Pack;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class OfferController extends AbstractController
{

    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/nos-offres', name: 'offer')]
    public function index(): Response
    {
        $offers = $this->entityManager->getRepository(Pack::class)->findAll();

        return $this->render('offer/index.html.twig', [
            'offers' => $offers
        ]);
    }
}

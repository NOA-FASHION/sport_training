<?php

namespace App\Controller;

use App\Repository\PartenaireRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PartenaireController extends AbstractController
{
    #[Route('/partenaire', name: 'app_partenaire')]
    public function index(PartenaireRepository $repository): Response
    {
        $partenaires = $repository->findAll();
        return $this->render('pages/partenaire/index.html.twig', [
            'partenaires' => $partenaires
        ]);
    }
}

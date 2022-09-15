<?php

namespace App\Controller;

use App\Entity\Partenaire;
use App\Repository\PartenaireRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class EspacePartenaireController extends AbstractController
{
    #[Route('/espace/partenaire', name: 'espace.partenaire')]
    #[IsGranted('ROLE_PARTENAIRE')]
    public function index(PartenaireRepository $repository,Request $request): Response
    {
        if(!$this->getUser()){

            return $this->redirectToRoute('security.login');
        }

        /**
        * @var User
         */
        $user=$this->getUser();
        $partenaire =$user->getPartenaire();
        $structure = $partenaire->getStructures();       
         return $this->render('pages/espace_partenaire/index.html.twig', [
            'partenaire' => $partenaire,
            'structures'=> $structure
        ]);
    }
}

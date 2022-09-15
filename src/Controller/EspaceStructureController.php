<?php

namespace App\Controller;

use App\Repository\StructureRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class EspaceStructureController extends AbstractController
{

    #[Route('/espace/structure', name: 'espace.structure')]
    #[IsGranted('ROLE_STRUCTURE')]
    public function index(StructureRepository $repository,Request $request): Response
    {
        if(!$this->getUser()){

            return $this->redirectToRoute('security.login');
        }

        /**
        * @var User
         */
        $user=$this->getUser();
        
        $structure = $user->getStructure();       
        $partenaire =$structure->getPartenaire();
         return $this->render('pages/espace_structure/index.html.twig', [
            'partenaire' => $partenaire,
            'structure'=> $structure
        ]);
    }
}

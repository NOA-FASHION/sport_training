<?php

namespace App\Controller;

use App\Repository\StructureRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class StructureController extends AbstractController
{
    #[Route('/structure/{id}', name: 'structure.index',methods:['GET'])]
    public function index(StructureRepository $repository,PaginatorInterface $paginator,Request $request,int $id): Response
    {
       
        $structure  = $repository->findBy(["partenaire"=>$id]);
        // $structure = $repository->findAll();
         
        // $structure  = $paginator->paginate(
        //     $repository->findOneBy(["partenaire"=>$id]), /* query NOT result */
        //     $request->query->getInt('page', 1), /*page number*/
        //     5 /*limit per page*/
        // );

        return $this->render('pages/structure/index.html.twig', [
            'structures' => $structure,
        ]);
    }
}

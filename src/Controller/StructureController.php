<?php

namespace App\Controller;

use App\Entity\Structure;
use App\Form\StructureType;
use App\Repository\StructureRepository;
use App\Repository\PartenaireRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class StructureController extends AbstractController
{


     /**
     * display partenaires
     *
     * @param PartenaireRepository $repository
     * @param PaginatorInterface $paginator
     * @param Request $request
     * @return Response
     */
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
            'id'=>$id
        ]);
    }
    #[Route('/structure/new/{id}','structure.new',methods:['GET', 'POST'])]
    public function new(PartenaireRepository $repository, Request $request, EntityManagerInterface $manager,int $id):Response
    {

        $partenaires =$repository->findOneBy(["id"=>$id]);
        // dd( $partenaires);
        $structure = new Structure();
        $form = $this->createForm(StructureType::class,$structure);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $structure = $form->getData();
            $structure ->setPartenaire($partenaires);
            $manager->persist( $structure);
            $manager->flush();
            
            $this->addFlash(
               'success',
               'Votre ingrédient à été céer avec succes !'
            );
        //  return $this->redirectToRoute('structure.index');
      
        }
        
        return $this->render('pages/structure/new.html.twig',[
            'form'=>$form->createView(),
            'partenaires' => $partenaires
        ]);
    }


    #[Route('/structure/edition/{id}/{id1}','structure.edit',methods:['GET', 'POST'])]
    public function edit(PartenaireRepository $repository1,StructureRepository $repository, int $id, int $id1,Request $request,EntityManagerInterface $manager):Response
    {
        $partenaires =$repository1->findOneBy(["id"=>$id]);
        $structure =$repository->findOneBy(["id"=>$id1]);
        $form = $this->createForm(StructureType::class, $structure);
        $form->handleRequest($request);
        
        if($form->isSubmitted()  && $form->isValid()){
            $structure = $form->getData();
            $manager->persist($structure);
            $manager->flush();
            // $this->addFlash(
            //     'success',
            //     'la structure à été modifier avec succes !'
            //  );
            // return $this->redirectToRoute('partenaire.index');
        }

        return $this->render('pages/structure/edit.html.twig',[
            'form' => $form->createView(),
            'partenaires' => $partenaires

        ]);
    }

}

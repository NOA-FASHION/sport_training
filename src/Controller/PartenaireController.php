<?php

namespace App\Controller;

use App\Entity\Partenaire;
use App\Form\PartenaireType;
use App\Repository\PartenaireRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PartenaireController extends AbstractController
{

    
    /**
     * display all ingredients
     *
     * @param PartenaireRepository $repository
     * @param PaginatorInterface $paginator
     * @param Request $request
     * @return Response
     */
    #[Route('/partenaire', name: 'partenaire.index')]
    public function index(PartenaireRepository $repository,PaginatorInterface $paginator,Request $request): Response
    {
        $partenaires = $repository->findAll();


        $partenaires  = $paginator->paginate(
            $repository->findAll(), /* query NOT result */
            $request->query->getInt('page', 1), /*page number*/
            6 /*limit per page*/
        );
        return $this->render('pages/partenaire/index.html.twig', [
            'partenaires' => $partenaires
        ]);
    }

  /**
     * controller create partenaire
     *
     * @param PartenaireRepository $repository
     * @param PaginatorInterface $paginator
     * @param Request $request
     * @return Response
     */

    #[Route('/partenaire/new','partenaire.new', methods:['GET' , 'POST'])]
    public function new(Request $request,EntityManagerInterface $manager):Response
    {
        $partenaire = new Partenaire();
        $form = $this->createForm(PartenaireType::class, $partenaire);

        $form->handleRequest($request);
        if($form->isSubmitted()  && $form->isValid()){
            $partenaire = $form->getData();
            $manager->persist($partenaire);
            $manager->flush();
            $this->addFlash(
                'success',
                'le partenaire à été céer avec succes !'
             );
            return $this->redirectToRoute('partenaire.index');
        }
        return $this->render('pages/partenaire/new.html.twig',[
            'form' => $form->createView(),
        ]);

    }
    /**
     * controller edit partenaire
     *
     * @param PartenaireRepository $repository
     * @param PaginatorInterface $paginator
     * @param Request $request
     * @return Response
     */

    #[Route('/partenaire/edition/{id}','ingredient.edit',methods:['GET', 'POST'])]
    public function edit(PartenaireRepository $repository, int $id,Request $request,EntityManagerInterface $manager):Response
    {
        $partenaire =$repository->findOneBy(["id"=>$id]);
        $form = $this->createForm(PartenaireType::class, $partenaire);
        $form->handleRequest($request);
        if($form->isSubmitted()  && $form->isValid()){
            $partenaire = $form->getData();
            $manager->persist($partenaire);
            $manager->flush();
            $this->addFlash(
                'success',
                'le partenaire à été modifier avec succes !'
             );
            return $this->redirectToRoute('partenaire.index');
        }

        return $this->render('pages/partenaire/edit.html.twig',[
            'form' => $form->createView()
        ]);
    }

    /**
     * delete partenaires
     *
     * @param PartenaireRepository $repository
     * @param PaginatorInterface $paginator
     * @param Request $request
     * @return Response
     */

    #[Route('/partenaire/suppression/{id}','partenaire.delete', methods :['GET'])]
     public function delete(EntityManagerInterface $manager,Partenaire $partenaire):Response
     {
        $manager->remove($partenaire);
        $manager->flush();
        $this->addFlash(
            'success',
            'Votre ingrédient à été supprimer avec succes !'
         );
         return $this->redirectToRoute('app_ingredient');
     }
}

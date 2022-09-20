<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Partenaire;
use App\Form\PartenaireType;
use App\Form\RegistrationType;
use App\Repository\UserRepository;
use App\Repository\PartenaireRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

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
    #[IsGranted('ROLE_ADMIN')]
    public function index(PartenaireRepository $repository,PaginatorInterface $paginator,Request $request): Response
    {
    
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
    #[IsGranted('ROLE_ADMIN')]
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

    #[Route('/partenaire/edition/{id}','partenaire.edit',methods:['GET', 'POST'])]
    #[IsGranted('ROLE_ADMIN')]
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
    #[IsGranted('ROLE_ADMIN')]
     public function delete(EntityManagerInterface $manager,Partenaire $partenaire):Response
     {
        $manager->remove($partenaire);
        $manager->flush();
        $this->addFlash(
            'success',
            'Votre ingrédient à été supprimer avec succes !'
         );
         return $this->redirectToRoute('partenaire.index');
     }

    #[Route('/partenaire/new/user/{id}','partenaire.new.user', methods:['GET','POST'] )]
    #[IsGranted('ROLE_ADMIN')]
    public function registration(MailerInterface $mailer,PartenaireRepository $repository,Request $request, EntityManagerInterface $manager,$id):Response
    {
        $partenaire =$repository->findOneBy(["id"=>$id]);
        $user = new User();
        $user->setRoles(['ROLE_PARTENAIRE']);
        $form = $this->createForm(RegistrationType::class,$user);
        $form->handleRequest($request);
        if ($form->isSubmitted()  && $form->isValid()){
           
            $user = $form->getData();
            
            $user->setPartenaire($partenaire);
            
            $this->addFlash(
                'success',
                'Votre compte à été crée avec succes !'
             );
            $manager->persist($user);
            $manager->flush();

            $email = (new TemplatedEmail())
            ->from('michel.almont@gmail.com')
            ->to($user->getEmail())
            //->cc('cc@example.com')
            //->bcc('bcc@example.com')
            //->replyTo('fabien@example.com')
            //->priority(Email::PRIORITY_HIGH)
            ->subject('Votre compte Sport-training à été crée avec succès')
            ->htmlTemplate('mails/contact.html.twig')

            // pass variables (name => value) to the template
                ->context([
                'expiration_date' => new \DateTime('+7 days'),
                'user' => $user,
                ]);

            $mailer->send($email);


            return $this->redirectToRoute('partenaire.index');
           
        }
        return $this->render('pages/partenaire/registration.html.twig',[
            'form'=>$form->createView(),
            'partenaire'=>$partenaire
        ]);
    }

    #[Route('/partenaire/user/{id}', name: 'partenaire.user.index')]
    #[IsGranted('ROLE_ADMIN')]
    public function indexPartenaireUser(PartenaireRepository $repository1,UserRepository $repository,PaginatorInterface $paginator,Request $request,$id): Response
    {
        $partenaire =$repository1->findOneBy(["id"=>$id]);
        $idUser = $partenaire->getUserPartenaire();
        // dd($idUser );
        if($idUser === null){
            $user = null;
        }else{
            $user =$repository->findOneBy(["id"=>$idUser]);
        }
        
    
        return $this->render('pages/partenaire/user.html.twig', [
            'user' => $user,
            'id'=>$id,
            'partenaire'=>$partenaire
        ]);
    }
 
}

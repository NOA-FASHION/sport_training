<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Structure;
use App\Form\StructureType;
use App\Form\RegistrationType;
use App\Repository\UserRepository;
use App\Repository\StructureRepository;
use App\Repository\PartenaireRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Mime\Email;
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
    #[IsGranted('ROLE_ADMIN')]
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
    #[IsGranted('ROLE_ADMIN')]
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
    #[IsGranted('ROLE_ADMIN')]
    public function edit(UserRepository $repository2 ,MailerInterface $mailer,PartenaireRepository $repository1,StructureRepository $repository, int $id, int $id1,Request $request,EntityManagerInterface $manager):Response
    {
        $user=new user();
        $partenaires =$repository1->findOneBy(["id"=>$id]);
        $structure =$repository->findOneBy(["id"=>$id1]);
        if($structure->getUserStructure() !=null){
            $user=$repository2->findOneBy(["id"=>$structure->getUserStructure()]);
           
        }
        $form = $this->createForm(StructureType::class, $structure);
        $form->handleRequest($request);
        
        if($form->isSubmitted()  && $form->isValid()){
            $structure = $form->getData();
            $manager->persist($structure);
            $manager->flush();
            if($structure->getUserStructure() !=null){
              
            $email = (new Email())
            ->from('michel.almont@gmail.com')
            ->to($user->getEmail())
            //->cc('cc@example.com')
            //->bcc('bcc@example.com')
            //->replyTo('fabien@example.com')
            //->priority(Email::PRIORITY_HIGH)
            ->subject('Modification des information de la structure '.$structure->getNameStructure())
            ->text('Des modifcation ont été éffectuer sur la structure '.$structure->getNameStructure())
            ->html('<p>connecter vous à l\'adresse suivante pour vérifier les modification éffectuées</p>');

        $mailer->send($email);
            }
            return $this->redirectToRoute('structure.index',['id' =>$id]);
        }

        return $this->render('pages/structure/edit.html.twig',[
            'form' => $form->createView(),
            'partenaires' => $partenaires

        ]);
    }

    #[Route('/structure/user/{id}', name: 'structure.user.index')]
    #[IsGranted('ROLE_ADMIN')]
    public function indexPartenaireUser(StructureRepository $repository1,UserRepository $repository,PaginatorInterface $paginator,Request $request,$id): Response
    {
        $structure =$repository1->findOneBy(["id"=>$id]);
        $idUser = $structure->getUserStructure();
        // dd($idUser );
        if($idUser === null){
            $user = null;
        }else{
            $user =$repository->findOneBy(["id"=>$idUser]);
        }
        
    
        return $this->render('pages/structure/user.html.twig', [
            'user' => $user,
            'id'=>$id,
            'structure'=>$structure
        ]);
    }

    #[Route('/structure/new/user/{id}','structure.new.user', methods:['GET','POST'] )]
    #[IsGranted('ROLE_ADMIN')]
    public function registration(MailerInterface $mailer,StructureRepository $repository,Request $request, EntityManagerInterface $manager,$id):Response
    {
        $structure =$repository->findOneBy(["id"=>$id]);
        $user = new User();
        $user->setRoles(['ROLE_STRUCTURE']);
        $form = $this->createForm(RegistrationType::class,$user);
        $form->handleRequest($request);
        if ($form->isSubmitted()  && $form->isValid()){
            $user = $form->getData();
            $user->setStructure($structure);
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

            return $this->redirectToRoute('structure.user.index',['id' =>$id ]);
           
        }
        return $this->render('pages/structure/registration.html.twig',[
            'form'=>$form->createView(),
            'structure'=>$structure
        ]);
    }

}

<?php

namespace App\Controller;

use App\Entity\Utilisateur;
use App\Form\RegistrationType;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;


class SecurityController extends AbstractController
{
    /**
     * @Route("/inscription", name="security_registration")
     */
    public function registration(Request $request, UserPasswordEncoderInterface $encoder)
    {
        $utilisateur = new Utilisateur();
        $manager = $this->getDoctrine()->getManager();

        $form = $this->createForm(RegistrationType::class, $utilisateur);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){

            $hash = $encoder->encodePassword($utilisateur, $utilisateur->getMdp());
            $utilisateur->setMdp($hash);

            $manager->persist($utilisateur);
            $manager->flush();

           return $this->redirectToRoute('security_login');
        }

        return $this->render('security/registration.html.twig',[
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/connexion",name="security_login")
     */
    public function login(){
        return $this->render('security/login.html.twig'); 
    }

     /**
     * @Route("/deconnexion",name="security_logout")
     */
    public function logout(){
        //return $this->render('security/login.html.twig');
    }
}

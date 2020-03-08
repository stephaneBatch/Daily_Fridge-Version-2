<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DailyFridgeController extends AbstractController
{
    /**
     * @Route("/", name="daily_fridge_index")
     */
    //{{path('daily_fridge_create')}}
    public function index()
    {
        return $this->render('daily_fridge/index.html.twig', [
            'controller_name' => 'DailyFridgeController',
        ]);
    }

     /**
     * @Route("/daily_fridge_inscription2",name="daily_fridge_eric")
     */
    public function create()
    {
        return $this->render('daily_fridge/inscription.html.twig');

    }

    /**
     * @Route("/daily_fridge_accueil",name="daily_fridge_accueil")
     */

    public function accueil()
    {
        return $this->render('daily_fridge/accueil.html.twig');
    }

   
}

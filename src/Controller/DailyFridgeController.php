<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DailyFridgeController extends AbstractController
{
    /**
     * @Route("/DailyFridge", name="daily_fridge")
     */
    public function index()
    {
        return $this->render('daily_fridge/index.html.twig', [
            'controller_name' => 'DailyFridgeController',
        ]);
    }

    /**
     * @Route("/",name="home")
     */

    public function home()
    {
        return $this->render('daily_fridge/accueil.html.twig');
    }
}

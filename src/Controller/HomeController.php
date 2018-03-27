<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends Controller
{
    /**
     * @Route("/home", name="home")
     */
    public function index(UserRepository $userRepo)
    {
        // $userRepo est passé automatiquement en parametre par Symfony
        // -> injection de dépendance. On n'a donc pas a l'instancier nous-meme
        // $userRepo effectuera ici un SELECT * FROM user ...
        $userlist = $userRepo->findAll();
        
        return $this->render("home.html.twig",[
            'users' => $userlist
        ]);
    }
}

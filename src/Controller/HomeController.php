<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
    
    class HomeController extends Controller{
        /**
         * @Route("/hello/{personne}/age/{age}", name="hello")
         * @Route("/hello", name="hello_base")
         */

        public function hello($personne = "anonyme", $age = 0){
            return $this->render(
                'hello.html.twig',
                [
                    'prenom' => $personne,
                    'age' => $age
                ]
            );
        }

        /**
         * @Route("/", name="homepage")
         */
        public function home(){
            $personne = ["lior" => 31, "Joseph" => 12, "Anne" => 55];
            return $this->render(
                'home.html.twig',
                [
                    'title' => "Bonjour a tous",
                    'tableau' => $personne
                ]
            );
        }
    }
?>
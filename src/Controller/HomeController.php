<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    #[Route('/hello/{prenom}', name: 'app_hello')]
    public function hello(string $prenom): Response
    {
        dump("Bonjour $prenom !");
        return $this->render('home/index.html.twig', [
            'controller_name' => 'Hello Fanny',
            'prenom' => $prenom,
        ]);
    }

    #[Route('/home/about', name: 'app_about')]
    public function about(): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    #[Route('/home/contact', name: 'app_contact')]
    public function contact(): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    #[Route('/coucou', name: 'home_coucou_query')]
    public function coucouQuery(Request $request): Response
    {
        // Equivalent de $_GET
        // Au lieu de faire $_GET['name']
        // On fait $request->query->get('name');
        // Même si l'information n'existe pas, on aura pas d'erreur, juste "null"

        // Un queryParam (GET) est OPTIONNEL et n'est pas garanti d'être présent !!

        // route sans nom: localhost/coucou                 =====> "Coucou"
        // route avec nom: localhost/coucou?name=Charlotte  =====> "Coucou Charlotte"

        return new Response("Coucou " .  $request->query->get('name') . " !!");
    }

    #[Route('/coucou/{name}/{age}', name: 'home_coucou_param')]
    public function coucouParam(string $name, int $age): Response
    {
        // On peut récupérer les "params" (dynamiques) comme des paramètres de fonction dans les parenthèses

        // "name" et "age" sont obligatoires, mais peuvent changer

        // localhost/coucou/gilbert/55          ====> Coucou Gilbert et j'ai 55 ans
        // localhost/coucou/louise/22           ====> Coucou Louise et j'ai 22 ans
        // localhost/coucou/louise              ====> ERREUR !!! Il manque l'âge !

        return new Response("Coucou PARAMS " . $name . " et j'ai $age ans !!");
    }
       
}


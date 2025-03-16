<?php

namespace App\Controller;

use App\Repository\CatRepository;
use App\Repository\HumanRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/chats')]
final class ChatsController extends AbstractController
{ //juste accueil /chats
    #[Route('', name: 'chats_index')]
    public function index(CatRepository $catRepository, HumanRepository $humanRepository): Response
    {
        $cats = $catRepository->findAll();
        $human = $humanRepository->findAll();
        //Récupérer dans la bdd, $cats & $human (relations faites)
        //dump($human);
        //dd($cats);

        $nom = 'Zazou ❤️'; // Mettre une valeur ou laisser une chaîne vide
        $chats = ['Félix', 'Miaou', 'Whiskers', 'Chaussette', 'Pantoufle']; // Tableau contenant les noms des chats
        $roles = ['Admin', 'Editor']; // Tableau de rôles (peut être vide ou avec des rôles spécifiques)

        return $this->render('chats/index.html.twig', [
            'nom' => $nom, // Ajouter la variable nom
            'chats' => $chats, // Ajouter la variable chats
            'roles' => $roles, // Ajouter la variable roles
        ]);
    }


    //Archives / Numéro de page en int
    #[Route('/archives/{page?1}', name: 'chats_archive', requirements: ['page' => '\d+'])]
    public function archive(int $page): Response
    {
        if ($page < 1 || $page > 3) {
            return new Response('Erreur : Page introuvable !', 404);
        }

        return new Response("Vous êtes sur la page $page des archives des chats.");
    }

    //Celui là est important dans la pratique
    #[Route('/show/{nom}', name: 'chats_show')]
    public function show(string $nom): Response
    {
        $chats = ['misty', 'felix', 'garfield']; // Liste des chats connus

        if (!in_array(strtolower($nom), $chats)) {
            return new Response('Erreur : Chat introuvable !', 404);
        }

        return new Response("Chat : " . ucfirst($nom));
    }

    //Category / race / page?1
    #[Route('/category/{race}/{page?1}', name: 'chats_by_category', requirements: ['page' => '\d+'])]
    public function byCategory(string $race, int $page): Response
    {
        // Liste des races autorisées
        $races = ['siamois', 'maine coon', 'persan'];

        // Vérification si la race est valide
        if (!in_array(strtolower($race), $races)) {
            return new Response('Erreur : Race de chat introuvable !', 404);
        }

        // Vérification si la page est dans les limites
        if ($page < 1 || $page > 3) {
            return new Response('Erreur : Page introuvable !', 404);
        }

        return new Response("Race : " . ucfirst($race) . ", Page : $page");
    }
    //Like
    #[Route('/like/{machin}/{race}', name: 'like_chat')]
    public function like(string $machin, string $race): Response
    {
        // Liste des races autorisées pour validation
        $races = ['siamois', 'maine coon', 'persan'];

        // Vérifier si la race est valide
        if (!in_array(strtolower($race), $races)) {
            return new Response('Erreur : Race de chat introuvable !', 404);
        }

        // Affichage du message dynamique
        return new Response("$machin adore les chats $race");
    }

}

<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/shop')]
final class ShopController extends AbstractController
{
    #[Route('/', name: 'shop_index')]
    public function index(): Response
    {
        return $this->render('shop/index.html.twig');
    }

    #[Route('/article', name: 'shop_article')]
    public function article(): Response
    {
        return $this->render('shop/index.html.twig', [
            'controller_name' => 'ShopController',
        ]);
    }

    #[Route('/panier', name: 'shop_panier')]
    public function panier(): Response
    {
        return $this->render('shop/index.html.twig', [
            'controller_name' => 'ShopController',
        ]);
    }

    #[Route('/paiement', name: 'shop_paiement')]
    public function paiement(): Response
    {
        return new Response('Paiement !!');
    }
}

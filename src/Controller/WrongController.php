<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class WrongController extends AbstractController
{
    #[Route('/wrong', name: 'app_wrong')]
    public function index(): Response
    {
        return $this->render('wrong/index.html.twig', [
            'controller_name' => 'WrongController',
        ]);
    }
}

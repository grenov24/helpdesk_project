<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class NewRequestController extends AbstractController
{
    #[Route('/novy_pozadavek', name: 'app_new_request')]
    public function index(): Response
    {
        return $this->render('new_request/index.html.twig', [
            'controller_name' => 'NewRequestController',
        ]);
    }
}

<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class CheckRequestController extends AbstractController
{
    #[Route('/kontrola-pozadavku', name: 'app_check_request')]
    public function index(): Response
    {
        return $this->render('check_request/index.html.twig', [
            'controller_name' => 'CheckRequestController',
        ]);
    }
}

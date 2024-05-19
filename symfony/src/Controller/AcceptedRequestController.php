<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class AcceptedRequestController extends AbstractController
{
    #[Route('/vas-pozadavek-byl-prijat', name: 'app_accepted_request')]
    public function index(): Response
    {
        return $this->render('accepted_request/index.html.twig', [
            'controller_name' => 'AcceptedRequestController',
        ]);
    }
}

<?php

namespace App\Controller;

use App\Repository\RequestRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class DashboardController extends AbstractController
{
    #[Route('/prehled', name: 'app_dashboard')]
    public function index(RequestRepository $requestRepository): Response
    {
        $requests = $requestRepository->findBy([], ['id' => 'DESC'], 8);

        return $this->render('dashboard/index.html.twig', [
            'requests' => $requests,
        ]);
    }
}


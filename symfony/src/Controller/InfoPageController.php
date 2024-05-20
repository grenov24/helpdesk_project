<?php

namespace App\Controller;

use App\Repository\InfoPageRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class InfoPageController extends AbstractController
{
    #[Route('/info/{slug}', name: 'app_info_page')]
    public function show(string $slug, InfoPageRepository $infoPageRepository): Response
    {
        $infoPage = $infoPageRepository->findOneBy(['slug' =>$slug]);

        dump($infoPage);

        return $this->render('info_page/index.html.twig', [
            'controller_name' => 'InfoPageController',
        ]);
    }
}

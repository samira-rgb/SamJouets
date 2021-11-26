<?php

namespace App\Controller;

use App\Repository\ArticlesRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FrontController extends AbstractController
{
    /**
     * @Route ("/", name="home")
     */
    public function home(ArticlesRepository $articlesRepository)
    {
        $articles=$articlesRepository->findAll();
        return $this->render('front/index.html.twig', [
            'articles' => $articles,
        ]);
    }
}

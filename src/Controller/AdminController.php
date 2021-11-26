<?php

namespace App\Controller;

use DateTime;
use App\Entity\Articles;
use App\Form\ArticleType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AdminController extends AbstractController
{
    /**
     * @Route("/ajout_article", name="ajout_article")
     */
    public function ajout_article(Request $request, EntityManagerInterface $manager)
    {
        $article = new Articles();
        $form = $this->createForm(ArticleType::class, $article);

        $post = $request->request;
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()):
            $article->setDateCreation(new \DateTime('now'));
            $imageFile=$form->get('photo')->getData();

            if($imageFile):
            $nomImage=date("YmdHis")."-".uniqid()."-".$imageFile->getClientOriginalName();
            $imageFile->move(
                $this->getParameter('images_directory'),
                $nomImage
            );
            $article->setPhoto($nomImage);
            $manager->persist($article);
            $manager->flush();
            $this->addFlash("success", "L'article a bien été ajouté");
            return $this->redirectToRoute("ajout_article");
        endif;
    endif;
    return $this->render('admin/ajout_article.html.twig',[
        'formu'=>$form->createView()
    ]);
            }
}

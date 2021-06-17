<?php

namespace App\Controller;

use App\Entity\Competences;
use App\Entity\Portfolio;
use App\Entity\Projet;
use App\Form\PortfolioType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PortfolioController extends AbstractController
{
    /**
     * @Route("/", name="portfolio")
     */
    public function new(Request $request, \Swift_Mailer $mailer): Response
    {
        $portfolio = new Portfolio();

        $form = $this->createForm(PortfolioType::class, $portfolio);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $contact = $form->getData();            // On crée le message
            $message = (new \Swift_Message('Nouveau contact'))
                // On attribue l'expéditeur
                ->setFrom($contact->getEmail())
                // On attribue le destinataire
                ->setTo('charlydelaize@gmail.com')
                // On crée le texte avec la vue
                ->setBody(
                    $this->renderView(
                        'emails/contact.html.twig', compact('contact')
                    ),
                    'text/html'
                )
            ;
            $mailer->send($message);
            $em->persist($portfolio);
            $em->flush();
            echo "<h3 style='background-color: #a4fcb1; text-align: center;'>Merci d'avoir envoyé un message</h3>";
        }

        $repository = $this->getDoctrine()->getRepository(Competences::class);
        $competences = $repository->findAll();

        $repo = $this->getDoctrine()->getRepository(Projet::class);
        $projet = $repo->findAll();

        return $this->render('portfolio/index.html.twig', [
            'formulaire' => $form->createView(),
            'lists' => $competences,
            'images' => $projet
        ]);
    }

    /**
     * @Route("/edit/{id<\d+>}")
     */
    public function edit(Request $request, Portfolio $portfolio)
    {
        $form = $this->createForm(PortfolioType::class, $portfolio);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $this->getDoctrine()->getManager()->flush();
        }

        return $this->render('portfolio/edit.html.twig', array(
            'formulaire' => $form->CreateView(),
        ));
    }

    /**
     * @Route("/delete/{id<\d+>}")
     */
    public function delete(Portfolio $portfolio){
        $em = $this->getDoctrine()->getManager();
        $em->remove($portfolio);
        $em->flush();

        return $this->redirect('../read-all');
    }

    /**
     * @Route("/read/{id<\d+>}")
     */
    public function read(Portfolio $portfolio){
        return $this->render('portfolio/read.html.twig', array(
            'contact' => $portfolio
        ));
    }

    /**
     * @Route("/read-all")
     */
    public function readAll(){
        $repository = $this->getDoctrine()->getRepository(Portfolio::class);
        $messages = $repository->findAll();
        return $this->render('portfolio/read-all.html.twig', array(
            'liste' => $messages
        ));
    }
}
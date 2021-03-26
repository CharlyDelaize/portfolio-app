<?php

namespace App\Controller;

use App\Entity\Projet;
use App\Form\ProjetType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProjetController extends AbstractController
{
    /**
     * @Route("/projet", name="competences")
     */
    public function new(Request $request): Response
    {
        $projet = new Projet();

        $form = $this->createForm(ProjetType::class, $projet);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $em->persist($projet);
            $em->flush();
        }

        return $this->render('projet/new-projet.html.twig', [
            'formulaire' => $form->createView()
        ]);
    }

    /**
     * @Route("/edit-projet/{id<\d+>}")
     */
    public function edit(Request $request, Projet $projet)
    {
        $form = $this->createForm(ProjetType::class, $projet);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $this->getDoctrine()->getManager()->flush();
        }

        return $this->render('projet/edit-projet.html.twig', array(
            'formulaire' => $form->CreateView(),
        ));
    }

        /**
     * @Route("/delete-projet/{id<\d+>}")
     */
    public function delete(Projet $projet){
        $em = $this->getDoctrine()->getManager();
        $em->remove($projet);
        $em->flush();

        return $this->redirect('../read-all-projet');
    }

    /**
     * @Route("/read-projet/{id<\d+>}")
     */
    public function read(Projet $projet){
        return $this->render('projet/read-projet.html.twig', array(
            'projet' => $projet
        ));
    }

    /**
     * @Route("/read-all-projet")
     */
    public function readAll(){
        $repository = $this->getDoctrine()->getRepository(Projet::class);
        $projet = $repository->findAll();
        return $this->render('projet/read-all-projet.html.twig', array(
            'lists' => $projet
        ));
    }

}
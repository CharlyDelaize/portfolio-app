<?php

namespace App\Controller;

use App\Entity\Competences;
use App\Form\CompetencesType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CompetencesController extends AbstractController
{
    /**
     * @Route("/competences", name="competences")
     */
    public function new(Request $request): Response
    {
        $competences = new Competences();

        $form = $this->createForm(CompetencesType::class, $competences);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $em->persist($competences);
            $em->flush();
        }

        return $this->render('competences/new-competences.html.twig', [
            'formulaire' => $form->createView()
        ]);
    }

    /**
     * @Route("/edit-competences/{id<\d+>}")
     */
    public function edit(Request $request, Competences $competences)
    {
        $form = $this->createForm(CompetencesType::class, $competences);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $this->getDoctrine()->getManager()->flush();
        }

        return $this->render('competences/edit-competences.html.twig', array(
            'formulaire' => $form->CreateView(),
        ));
    }

    /**
     * @Route("/delete-competences/{id<\d+>}")
     */
    public function delete(Competences $competences){
        $em = $this->getDoctrine()->getManager();
        $em->remove($competences);
        $em->flush();

        return $this->redirect('../read-all-competences');
    }

    /**
     * @Route("/read-competences/{id<\d+>}")
     */
    public function read(Competences $competences){
        return $this->render('competences/read-competences.html.twig', array(
            'competences' => $competences
        ));
    }

    /**
     * @Route("/read-all-competences")
     */
    public function readAll(){
        $repository = $this->getDoctrine()->getRepository(Competences::class);
        $competences = $repository->findAll();
        return $this->render('competences/read-all-competences.html.twig', array(
            'lists' => $competences
        ));
    }
}
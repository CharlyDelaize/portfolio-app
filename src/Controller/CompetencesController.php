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
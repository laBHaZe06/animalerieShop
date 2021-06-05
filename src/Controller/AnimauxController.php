<?php

namespace App\Controller;

use App\Entity\Animaux;
use App\Repository\AnimauxRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AnimauxController extends AbstractController
{
    /**
     * @Route("/animaux", name="animaux_index")
     */
    public function index(AnimauxRepository $animauxRepository): Response
    {
      
        $animaux=$animauxRepository->findAll();

        return $this->render('animaux/index.html.twig', [
            'animal'=> $animaux,
        ]);
    }

    /**
     * @Route("/chien", name="chien")
     */
    public function dog(AnimauxRepository $animauxRepository)
    {
        $animaux=$animauxRepository->findBy(array('categoryAnimaux'=>'406'));
        
        return $this->render('animaux/chien.html.twig', [
            'animal'=> $animaux,
        ]);
    }

    /**
     * @Route("/chat", name="chat")
     */
    public function cat(AnimauxRepository $animauxRepository)
    {
        $animaux=$animauxRepository->findBy(array('categoryAnimaux'=>'407'));
        
        return $this->render('animaux/chat.html.twig', [
            'animal'=> $animaux,
        ]);
    }

    /**
     * @Route("/oiseaux", name="oiseaux")
     */
    public function bird(AnimauxRepository $animauxRepository)
    {
        $animaux=$animauxRepository->findBy(array('categoryAnimaux'=>'408'));
        
        return $this->render('animaux/oiseaux.html.twig', [
            'animal'=> $animaux,
        ]);
    }

    /**
     * @Route("/rongeur", name="rongeur")
     */
    public function rodent(AnimauxRepository $animauxRepository)
    {
        $animaux=$animauxRepository->findBy(array('categoryAnimaux'=>'409'));
        
        return $this->render('animaux/rongeur.html.twig', [
            'animal'=> $animaux,
        ]);
    }

    /**
     * @Route("/reptile", name="reptile")
     */
    public function reptile(AnimauxRepository $animauxRepository)
    {
        $animaux=$animauxRepository->findBy(array('categoryAnimaux'=>'410'));
        
        return $this->render('animaux/reptile.html.twig', [
            'animal'=> $animaux,
        ]);
    }

    

    /**
     * @Route("animaux/{slug}", name="animaux_show")
     */
    public function show(Animaux $animaux)
    {
        return $this->render('animaux/show.html.twig', [
            'animaux'=> $animaux,
        ]);
    }
}

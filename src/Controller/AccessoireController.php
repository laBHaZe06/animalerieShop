<?php

namespace App\Controller;

use App\Entity\Accessoire;
use App\Repository\AccessoireRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class AccessoireController extends AbstractController
{
    /**
     * @Route("/accessoire", name="accessoire_index")
     */
    public function index(AccessoireRepository $accessoireRepository,SessionInterface $session): Response
    {
        $accessoire = $accessoireRepository->findAll();
       
        return $this->render('accessoire/index.html.twig', [
            'accessoires'=> $accessoire,
        ]);
    }

     /**
     * @Route("accessoire/alimentation", name="accessoire_alimentation")
     */
    public function alimentation(AccessoireRepository $accessoireRepository): Response
    {
        $accessoire = $accessoireRepository->findBy(array('categoryAccessoire'=> '889'));

        return $this->render('accessoire/alimentation.html.twig', [
            'accessoires'=> $accessoire,
        ]);
    }

    /**
     * @Route("accessoire/habitat", name="accessoire_habitat")
     */
    public function habitat(AccessoireRepository $accessoireRepository): Response
    {
        $accessoire = $accessoireRepository->findBy(array('categoryAccessoire'=> '890'));

        return $this->render('accessoire/habitat.html.twig', [
            'accessoires'=> $accessoire,
        ]);
    }

    /**
     * @Route("accessoire/soins", name="accessoire_soins")
     */
    public function soins(AccessoireRepository $accessoireRepository): Response
    {
        $accessoire = $accessoireRepository->findBy(array('categoryAccessoire'=> '891'));

        return $this->render('accessoire/soins.html.twig', [
            'accessoires'=> $accessoire,
        ]);
    }
    
    /**
     * @Route("accessoire/jeux", name="accessoire_jeux")
     */
    public function jeux(AccessoireRepository $accessoireRepository): Response
    {
        $accessoire = $accessoireRepository->findBy(array('categoryAccessoire'=> '892'));

        return $this->render('accessoire/jeux.html.twig', [
            'accessoires'=> $accessoire,
        ]);
    }

    
   
    /**
     * @Route("accessoire/{slug}", name="accessoire_show")
     */
    public function show(Accessoire $accessoire)
    {
        return $this->render('accessoire/show.html.twig',[
            'accessoire'=> $accessoire,
        ]);
    }
}   

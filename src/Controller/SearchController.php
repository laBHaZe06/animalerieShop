<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SearchController extends AbstractController
{
    /**
     * @Route("/search", name="search")
     */
    public function search( EntityManagerInterface $manager): Response
    {
       
      
        $animaux = [];
       
        $accessoire=[];
             
        $search=[];
         if (isset($_POST['search']))                  
         {
             $search = $_POST['search'];
        
            $animaux = $manager->createQuery("SELECT a, ca
             FROM App\Entity\Animaux a
             JOIN a.categoryAnimaux ca
             WHERE a.titre like'%".$search."%'
                OR a.age like'%".$search."%'
                OR a.description like'%".$search."%'
                OR a.status like'%".$search."%'
                OR a.slug like'%".$search."%'
                OR a.price like'%".$search."%'
                OR a.espece like'%".$search."%'
                OR ca.type like'%".$search."%'")->getResult(); 

 
             $accessoire = $manager->createQuery("SELECT ac 
             FROM App\Entity\Accessoire ac 
             JOIN ac.categoryAccessoire cacc
             WHERE ac.description like'%".$search."%'
                OR ac.slug like'%".$search."%'
                OR ac.status like'%".$search."%'
                OR ac.titre like'%".$search."%'
                OR ac.price like'%".$search."%'
                OR cacc.type like'%".$search."%'")->getResult(); 
           
        // dump($animaux);
         //dump($accessoire);
             if ( $animaux == true || $accessoire == true) {
                         
                 $this->addFlash('success', 'Résultat de votre recherche pour ' .$search.' ');
                 //$this->redirectToRoute('search/index.html.twig');
                 
             }
             else{ 
             
                 $this->addFlash('danger', 'Aucun résultat, veuillez saisir une autre valeur que '.$search.' ');
                
             
             }
     
         }

        return $this->render('search/index.html.twig', [
            'animaux'=> $animaux,
            'accessoire'=>$accessoire,
            'search'=>$search,
            
            
            
        ]);
    }
}

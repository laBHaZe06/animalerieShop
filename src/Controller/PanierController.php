<?php

namespace App\Controller;

use App\Repository\AccessoireRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PanierController extends AbstractController
{
    /**
     * @Route("/panier", name="panier_index")
     */
    public function index(SessionInterface $session, AccessoireRepository $accessoireRepository): Response
    {
        $panier = $session->get('panier',[]);
        $panierWithData = [];

        foreach($panier as $id => $quantity){
            $panierWithData[] = [
                'accessoire'=> $accessoireRepository->find($id),
                'quantity'=> $quantity,
            ];
        }

        $total = 0;

       //dd($panierWithData);
        foreach ($panierWithData as $item){
            $totalPanier = $item['accessoire']->getPrice() * $item['quantity'];
            $total += $totalPanier;
        }
      // dd($panierWithData);
       //dd($total);
        return $this->render('panier/index.html.twig', [
            'items'=> $panierWithData,
            'total'=> $total
        
        ]);
    }

    /**
     * @Route("/panier/add/{id}",name="panier_add")
     */
    public function add($id, SessionInterface $session)
    {
       //$session = $request->getSession();
        $panier = $session->get('panier',[]);

        if (!empty($panier[$id] ))
        {
            $panier[$id]++;
        } 
        else
        {
            $panier[$id] = 1;
        }
       $session->set('panier',$panier);
       //dd( $session->get('panier'));
       return $this->redirectToRoute('panier_index');
    }

        /**
     * @Route("/remove/{id}", name="remove")
     */
    public function remove(AccessoireRepository $accessoireRepository, SessionInterface $session)
    {
        // On récupère le panier actuel
        $panier = $session->get("panier", []);
        $id = $accessoireRepository->getId();

        if(!empty($panier[$id])){
            if($panier[$id] > 1){
                $panier[$id]--;
            }else{
                unset($panier[$id]);
            }
        }

        // On sauvegarde dans la session
        $session->set("panier", $panier);

        return $this->redirectToRoute("panier_index");
    }

    /**
     * @Route("/delete/{id}", name="delete")
     */
    public function delete(AccessoireRepository $accessoireRepository, SessionInterface $session)
    {
        // On récupère le panier actuel
        $panier = $session->get("panier", []);
        $id = $accessoireRepository->getId();

        if(!empty($panier[$id])){

            unset($panier[$id]); //je détruis ma variable
        }

        // On sauvegarde dans la session
        $session->set("panier", $panier);

        return $this->redirectToRoute("panier_index");
    }

    /**
     * @Route("/delete", name="delete_all")
     */
    public function deleteAll(SessionInterface $session)
    {
        $session->remove("panier");

        return $this->redirectToRoute("panier_index");
    }
}

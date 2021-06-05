<?php

namespace App\Service;


class PanierService
{
    
    public function panier(SessionInterface $session, AccessoireRepository $accessoireRepository): Response
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

    public function panierAdd($id, SessionInterface $session)
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

    
    public function panierRemove(Accessoire $accessoire, SessionInterface $session)
    {
        // On récupère le panier actuel
        $panier = $session->get("panier", []);
        $id = $accessoire->getId();

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

    
    public function panierDelete(SessionInterface $session,Accessoire $accessoire)
    {
        $accessoire = new Accessoire();
        // On récupère le panier actuel
        $panier = $session->get("panier", []);
        $id = $accessoire->getId();

        if(!empty($panier[$id])){

            unset($panier[$id]); //je détruis ma variable
        }

        // On sauvegarde dans la session
        $session->set("panier", $panier);

        return $this->redirectToRoute("panier_index");
    }

   
    public function panierDeleteAll(SessionInterface $session)
    {
        $session->remove("panier");

        return $this->redirectToRoute("panier_index");
    }
}
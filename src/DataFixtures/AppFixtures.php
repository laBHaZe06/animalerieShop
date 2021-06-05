<?php

namespace App\DataFixtures;

use App\Entity\Animaux;
use App\Entity\Accessoire;
use Cocur\Slugify\Slugify;
use App\Entity\ImageAnimaux;
use App\Entity\CategoryAnimaux;
use App\Entity\ImageAccessoire;
use App\Entity\CategoryAccessoire;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
      
        // $product = new Product();
        // $manager->persist($product);
        $slugify = new Slugify();
        $title = 'Animal n° ';
        $slug = $slugify->slugify($title);
        
        $slugifyProduct = new Slugify();
        $titleaccessoire = 'accessoire n°';
        $slugAccessoire = $slugifyProduct->slugify($titleaccessoire);
        
        
        $categoryAnimaux= array('Chien','Chat','Oiseaux','Rongeur','Reptile');
        $categoryAcc = array('Alimentation','Habitat','Soins','Jeux');
        
        $ageA = array('3 mois','6 mois','12 mois');
        $statusAnimaux = array('Vendu','Disponible','Bientôt disponible');
        
        
        $ageRand= array_rand($ageA,1);
        $age= $ageA[$ageRand];
        
        $statusRand = array_rand($statusAnimaux,1);
        $status = $statusAnimaux[$statusRand];
        
        
    foreach( $categoryAnimaux as $category)
    {
        $animauxCategory = new CategoryAnimaux();
        $animauxCategory->setType($category);
        $manager->persist($animauxCategory);
        $manager->flush();
        
        
        
        
        for($a=0;$a<5;$a++)
        {
            $animal = new Animaux();
            $animal
                ->setTitre('titre de l\'animal')
                ->setStatus($status)
                ->setAge($age)
                ->setEspece('nom latin')
                ->setDescription('description de l\'animal')
                ->setPrice(mt_rand(20,250))
                ->setCoverImage('https://picsum.photos/id/237/200/300')
                ->setCategoryAnimaux($animauxCategory)
                ->setSlug("$slug$a");
            
            
            $manager->persist($animal);
            $manager->flush(); 

            for($c=0;$c<mt_rand(1,4);$c++)
            {
              $image = new ImageAnimaux();
              $image
                ->setUrl('https://picsum.photos/seed/picsum/200/300')
                ->setLegend('légende de la photo')
                ->setAnimaux($animal);
              $manager->persist($image);
              $manager->flush();
            }
        }
    
    }
        
            foreach($categoryAcc as $categoryAccessoire)
            {
                $accessoireCat = new CategoryAccessoire();
                $accessoireCat->setType($categoryAccessoire);
                $manager->persist($accessoireCat);
                $manager->flush();

                for($b=0;$b<mt_rand(3,6);$b++)
                {
                        $accessoire = new Accessoire();
                        $accessoire
                            ->setTitre('tire de l\'accessoire')
                            ->setDescription('description accessoire')
                            ->setStock(mt_rand(1,300))
                            ->setPrice(mt_rand(2,200))
                            ->setCoverImage('https://picsum.photos/id/247/200/300')
                            ->setStatus('$status')
                            ->setSlug("$slugAccessoire")
                            ->setCategoryAccessoire($accessoireCat)
                            ->setCategoryAnimaux($animauxCategory);
                            $manager->persist($accessoire);
                            $manager->flush();


                    for($d=0;$d<mt_rand(1,3);$d++)
                      {
                        $imageAccessoire= new ImageAccessoire();
                        $imageAccessoire
                            ->setUrl('https://picsum.photos/200/300?grayscale')
                            ->setLegend('légende de l\'image')
                            ->setAccessoire($accessoire);
                        $manager->persist($imageAccessoire);
                        $manager->flush();
                        
                        
                      }
                            
                            
                }
            
            }
            
           
           

        $manager->flush();
    }
}

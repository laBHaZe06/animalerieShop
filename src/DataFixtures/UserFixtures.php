<?php

namespace App\DataFixtures;

use DateTime;
use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;        
    }
    public function load(ObjectManager $manager)
    {
        $user = new User();
        $encoder = $this->encoder->encodePassword($user, "password");
        $user
            ->setPrenom('yoyo')
            ->setNom('bobo')
            ->setPseudo('yoshi')
            ->setHash($encoder)
            ->setNumeroAdd('163')
            ->setAdresse('avenue louis pasteur')
            ->setEmail('yop06outlook.fr')
            ->setCreatedAt(new DateTime('29-05-2021'));
        $manager->persist($user);    
        $manager->flush();
    }
}

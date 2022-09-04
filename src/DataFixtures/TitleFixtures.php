<?php

namespace App\DataFixtures;

use App\Entity\Title;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class TitleFixtures extends Fixture
{ 
    public function load(ObjectManager $manager): void
    {
        $titles = [
            'Lord',
            'Lady',
            'Noble',
            'Roi',
            'Reine',
            'Bâtard',
            'Prince',
            'Princesse',
            'Chevalier'
        ];

        foreach ($titles as $title) {

            $titleObj = new Title();
            $titleObj->setName($title);

            $titleObj->setCreatedAt(new \DateTime);

            $manager->persist($titleObj);
            $this->addReference($title, $titleObj);
        }

        $manager->flush();
    }
    
}
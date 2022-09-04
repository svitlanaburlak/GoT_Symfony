<?php

namespace App\DataFixtures;

use App\Entity\House;
use App\Entity\Title;
use App\Entity\Character;
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

            $manager->persist($titleObj);
            $this->addReference($title, $titleObj);
        }

        $manager->flush();
    }
    
}
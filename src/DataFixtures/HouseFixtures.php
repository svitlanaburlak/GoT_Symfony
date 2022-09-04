<?php

namespace App\DataFixtures;

use App\Entity\House;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class HouseFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $houses = [
            [
                "name" => "Stark",
                "image" => "stark.png",
                "colour" => "e3e3e3",
            ],
            [
                "name" => "Baratheon",
                "image" => "baratheon.png",
                "colour" => "baa207",
            ],
            [
                "name" => "Tully",
                "image" => "tully.png",
                "colour" => "2b3aab",
            ],
            [
                "name" => "Arryn",
                "image" => "arryn.png",
                "colour" => "6ebae6",
            ],
            [
                "name" => "Lannister",
                "image" => "lannister.png",
                "colour" => "a31a10",
            ],
            [
                "name" => "Greyjoy",
                "image" => "greyjoy.png",
                "colour" => "1c1c1c",
            ],
            [
                "name" => "Tyrell",
                "image" => "tyrell.png",
                "colour" => "1d6b2e",
            ],
            [
                "name" => "Martell",
                "image" => "martell.png",
                "colour" => "d6973e",
            ],
            [
                "name" => "Targaryen",
                "image" => "targaryen.png",
                "colour" => "111111",
            ],
        ];

        foreach ($houses as $house) {
            $houseObj = new House();
            $houseObj->setName($house["name"]);
            $houseObj->setImage($house["image"]);
            $houseObj->setColour($house["colour"]);

            $houseObj->setCreatedAt(new \DateTime);

            $manager->persist($houseObj);
            $this->addReference($house["name"], $houseObj);
        }

        $manager->flush();
    }
}
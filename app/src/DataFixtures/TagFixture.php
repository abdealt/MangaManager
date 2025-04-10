<?php

namespace App\DataFixtures;

use App\Entity\Tag;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class TagFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $tags = ['Action', 'Aventure', 'Drame', 'Comédie', 'Fantasy'];

        foreach ($tags as $tagName) {
            $tag = new Tag();
            $tag->setName($tagName);
            $manager->persist($tag);
        }

        $manager->flush();
    }
}

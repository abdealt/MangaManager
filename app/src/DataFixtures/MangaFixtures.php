<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Repository\CategoryRepository;
use App\Entity\Manga;
use Faker\Factory;


class MangaFixtures extends Fixture
{
    function __construct(private CategoryRepository $categoryRepository)
    {}

    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');

        for($i = 0; $i<20; $i++){
            $manga = new Manga();
            $manga->setTitle($faker->name());
            $manga->setPrice(mt_rand(3, 10));
            $manga->setDescription($faker->sentence());
            $manga->setCategory($this->categoryRepository->find(mt_rand(1, 5)));
            $manager->persist($manga);
        }

        $manager->flush();
    }
}

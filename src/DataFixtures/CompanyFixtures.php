<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Company;
use Faker;

class CompanyFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create();
        for ($i = 0; $i < 10; $i++) {
            $adresses = array(
                  "number" => "Le Seigneur des Anneaux", 
                  "wayType" => "Film", 
                  "wayName" => "", 
                  "city" => $faker->city,
                  "postCode" => "75017",
                  "createdAt" => $faker->dateTime($max = 'now', $timezone = null),
                  "updatedAt" => $faker->dateTime($max = 'now', $timezone = null),
            );
            $company = new Company();
            $company
                ->setName($faker->company)
                ->setSiren("123456789")
                ->setRegistrationCity($faker->city)
                ->setRegistrationDate($faker->dateTimeAD($max = 'now', $timezone = null))
                ->setStreetNumber1($faker->randomDigit)
                ->setWayType1("Boulevard")
                ->setWayName1($faker->streetName)
                ->setCity1($faker->city)
                ->setPostCode1($faker->postcode)
                ->setCapital(123456789)
                ->setCreatedAt($faker->dateTimeAD($max = 'now', $timezone = null))
                ->setUpdatedAt($faker->dateTimeAD($max = 'now', $timezone = null));
            $manager->persist($company);
        }
        $manager->flush();
        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}

<?php
namespace AppBundle\DataFixtures;

use AppBundle\Entity\AddressBook;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;

class AddressBookFixture implements FixtureInterface
{


    protected $faker;

    public function load(ObjectManager $manager)
    {
        $faker = Factory::create();

        for ($i = 0; $i < 50; $i++) {
            $customer = new AddressBook();

            $customer->setFirstName($faker->firstName);
            $customer->setLastName($faker->lastName);
            $customer->setStreetAddress($faker->streetAddress);
            $customer->setZipCode($faker->name);
            $customer->setCity($faker->city);
            $customer->setCountry("LEB");
            $customer->setPhoneNumber($faker->phoneNumber);
            $customer->setBirthday("2012-02-02" );
            $customer->setEmailAddress($faker->email);
            $customer->setPicture($faker->imageUrl());

            $manager->persist($customer);
        }

        $manager->flush();
    }
}

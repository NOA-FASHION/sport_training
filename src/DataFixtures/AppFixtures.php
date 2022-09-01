<?php

namespace App\DataFixtures;

use Faker\Factory;
use Faker\Generator;
use App\Entity\Partenaire;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{

      /**
     * @var Generator
     */
    private Generator $faker;
    
    public function __construct()
    {
        $this->faker = Factory::create('fr_FR');
        
    }

    public function load(ObjectManager $manager): void
    {

        for ($i=0; $i < 10; $i++) { 
        $partenaire = new Partenaire();
        $partenaire->setName($this->faker->word());
        $partenaire->setActive(false);
        $partenaire->setShortDescription($this->faker->text(90));
        $partenaire->setFullDescription($this->faker->text(200));
        $partenaire->setLogoUrl($this->faker->word());
        $partenaire->setDpo($this->faker->word());
        $partenaire->setTechnicalContact($this->faker->word());
        $partenaire->setCommercialContact($this->faker->word());
        $partenaire->setMembersRead(false);
        $partenaire->setMembersWrite(false);
        $partenaire->setMembersProduct(false);
        $partenaire->setMembersPayment(false);
        $partenaire->setMembersStat(false);
        $partenaire->setMembersSubscription(false);
        $partenaire->setPaymentSchedulesRead(false);
        $partenaire->setPaymentSchedulesWrite(false);
        $partenaire->setPaymentDaysRead(false);
        $partenaire->setPaymentDayWrite(false);
        $manager->persist( $partenaire);
        $manager->flush();
        }
    }
}

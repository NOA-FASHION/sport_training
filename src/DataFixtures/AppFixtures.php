<?php

namespace App\DataFixtures;

use Faker\Factory;
use Faker\Generator;
use App\Entity\Structure;
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
            //partenaires
            $partenaires=[];
        for ($i=0; $i < 20; $i++) { 
        $partenaire = new Partenaire();
        $partenaire->setName($this->faker->word())
        ->setActive(false)
        ->setShortDescription($this->faker->text(90))
        ->setFullDescription($this->faker->text(200))
        ->setLogoUrl($this->faker->word())
        ->setDpo($this->faker->word())
        ->setTechnicalContact($this->faker->word())
        ->setCommercialContact($this->faker->word())
        ->setMembersRead(false)
        ->setMembersWrite(false)
        ->setMembersProduct(false)
        ->setMembersPayment(false)
        ->setMembersStat(false)
        ->setMembersSubscription(false)
        ->setPaymentSchedulesRead(false)
        ->setPaymentSchedulesWrite(false)
        ->setPaymentDaysRead(false)
        ->setPaymentDayWrite(false);

        $partenaires[]=$partenaire;
        $manager->persist( $partenaire);
       
        }
    //structures
        for ($i=0; $i < 10; $i++) { 
            $partenaire = new Structure();
            $partenaire->setNameStructure($this->faker->word())
            ->setNameResponsable($this->faker->word())
            ->setAdresseStructure($this->faker->text(50))
            ->setActiveStructure(true)
            ->setMembersRead(false)
            ->setMembersWrite(false)
            ->setMembersProduct(false)
            ->setMembersPayment(false)
            ->setMembersStistiquesRead(false)
            ->setMembersSubscriptionRead(false)
            ->setPaymentSchedulesRead(false)
            ->setPaymentShedulesWrite(false)
            ->setPaymentDaysRead(false)
            ->setPaymentDaysWrite(false)
            ->setPartenaire($partenaires[mt_rand(0,count($partenaires)-1)]);
            $manager->persist( $partenaire);
           
            }
            $manager->flush();
    }
}

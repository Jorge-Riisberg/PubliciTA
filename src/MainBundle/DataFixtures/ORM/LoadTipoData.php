<?php

namespace MainBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use MainBundle\Entity\Tipo;

class LoadTipoData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {

        $Tipo12_3 = new Tipo();
        $Tipo12_3->setNombre('12:3');
        $Tipo12_3->setDescripcion('4 bloques bootstrap');
        $manager->persist($Tipo12_3);

        $Tipo12_4 = new Tipo();
        $Tipo12_4->setNombre('12:4');
        $Tipo12_4->setDescripcion('3 bloques bootstrap');
        $manager->persist($Tipo12_4); 

        $Tipo12_6 = new Tipo();
        $Tipo12_6->setNombre('12:6');
        $Tipo12_6->setDescripcion('2 bloques bootstrap');
        $manager->persist($Tipo12_6);               

        $manager->flush();

        $this->addReference('Tipo12_3', $Tipo12_3);
        $this->addReference('Tipo12_4', $Tipo12_4);
        $this->addReference('Tipo12_6', $Tipo12_6);
    }

    public function getOrder()
    {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 4;
    }    
}

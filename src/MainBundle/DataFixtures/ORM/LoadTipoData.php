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

        $Tipo1 = new Tipo();
        $Tipo1->setNombre('Tipo1');
        $Tipo1->setDescripcion('200x400px');
        $manager->persist($Tipo1);

        $manager->flush();

        $this->addReference('Tipo1', $Tipo1);
    }

    public function getOrder()
    {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 4;
    }    
}

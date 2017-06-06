<?php

namespace MainBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use MainBundle\Entity\Categoria;

class LoadCategoriaData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {

        $Seguros = new Categoria();
        $Seguros->setNombre('Seguros');
        $manager->persist($Seguros);

        $Indumentaria = new Categoria();
        $Indumentaria->setNombre('Indumentaria');
        $manager->persist($Indumentaria); 

        $Rotiserias = new Categoria();
        $Rotiserias->setNombre('Rotiserias');
        $manager->persist($Rotiserias);

        $Confiterias = new Categoria();
        $Confiterias->setNombre('Confiterias');
        $manager->persist($Confiterias); 

        $Supermercados = new Categoria();
        $Supermercados->setNombre('Supermercados');
        $manager->persist($Supermercados);

        $Librerias = new Categoria();
        $Librerias->setNombre('Librerias');
        $manager->persist($Librerias);                                

        $manager->flush();

        $this->addReference('Seguros', $Seguros);
        $this->addReference('Indumentaria', $Indumentaria);
        $this->addReference('Rotiserias', $Rotiserias);
        $this->addReference('Confiterias', $Confiterias);
        $this->addReference('Supermercados', $Supermercados);
        $this->addReference('Librerias', $Librerias);
    }

    public function getOrder()
    {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 2;
    }    
}

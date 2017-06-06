<?php

namespace MainBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use MainBundle\Entity\Anuncio;

class LoadAnuncioData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {

        //Seguro Hogar - La Caja Seguros
        $SeguroHogar = new Anuncio();
        $SeguroHogar->setEmpresa($this->getReference('LaCaja'));
        $SeguroHogar->setTipo($this->getReference('Tipo12_3'));
        $SeguroHogar->setNombre('Seguro Hogar');
        $SeguroHogar->setDescripcion('50% descuento en Seguro Hogar');
        $SeguroHogar->addCategoria($this->getReference('Seguros'));
        $manager->persist($SeguroHogar);

        // 2x1 Jeans Tascani - Marco Polo
        $JeansTascani = new Anuncio();
        $JeansTascani->setEmpresa($this->getReference('MarcoPolo'));
        $JeansTascani->setTipo($this->getReference('Tipo12_4'));
        $JeansTascani->setNombre('Jeans Tascani');
        $JeansTascani->setDescripcion('2x1 Jeans Tascani');
        $JeansTascani->addCategoria($this->getReference('Indumentaria'));
        $manager->persist($JeansTascani);        

        $manager->flush();

        $this->addReference('SeguroHogar', $SeguroHogar);
        $this->addReference('JeansTascani', $JeansTascani);
    }

    public function getOrder()
    {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 5;
    }    
}

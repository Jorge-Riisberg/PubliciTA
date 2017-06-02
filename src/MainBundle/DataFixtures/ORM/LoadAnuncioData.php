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
        $SeguroHogar->setEmpresa($this->getReference('LaCajaSeguros'));
        $SeguroHogar->setTipo($this->getReference('Tipo1'));
        $SeguroHogar->setDescripcion('Seguro Hogar. Asegura tu casa por 1000 por mes');   
        $SeguroHogar->addCategoria($this->getReference('Seguros'));
        $manager->persist($SeguroHogar);

        $manager->flush();

        $this->addReference('SeguroHogar', $SeguroHogar);
    }

    public function getOrder()
    {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 5;
    }    
}

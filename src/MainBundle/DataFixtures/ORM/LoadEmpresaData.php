<?php

namespace MainBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use MainBundle\Entity\Empresa;

class LoadEmpresaData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {

        $LaCajaSeguros = new Empresa();
        $LaCajaSeguros->setNombre('LaCajaSeguros');
        $manager->persist($LaCajaSeguros);

        $manager->flush();

        $this->addReference('LaCajaSeguros', $LaCajaSeguros);
    }

    public function getOrder()
    {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 3;
    }    
}

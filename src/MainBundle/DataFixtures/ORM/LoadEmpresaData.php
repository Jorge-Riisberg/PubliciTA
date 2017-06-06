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

        $LaCaja = new Empresa();
        $LaCaja->setNombre('La Caja');
        $manager->persist($LaCaja);

        $LaPerla = new Empresa();
        $LaPerla->setNombre('La Perla');
        $manager->persist($LaPerla);

        $LaPerseverancia = new Empresa();
        $LaPerseverancia->setNombre('La Perseverancia');
        $manager->persist($LaPerseverancia);

        $CATA = new Empresa();
        $CATA->setNombre('CATA');
        $manager->persist($CATA); 

        $MarcoPolo = new Empresa();
        $MarcoPolo->setNombre('Marco Polo');
        $manager->persist($MarcoPolo);

        $DonLuis = new Empresa();
        $DonLuis->setNombre('Don Luis');
        $manager->persist($DonLuis); 

        $manager->flush();

        $this->addReference('LaCaja', $LaCaja);
        $this->addReference('LaPerla', $LaPerla);
        $this->addReference('LaPerseverancia', $LaPerseverancia);
        $this->addReference('CATA', $CATA);
        $this->addReference('MarcoPolo', $MarcoPolo);
        $this->addReference('DonLuis', $DonLuis);
    }

    public function getOrder()
    {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 3;
    }    
}

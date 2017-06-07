<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\User;

class LoadUserData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setEmail('rtl.dex@gmail.com');
        $user->setPassword('$2a$05$vmDkcRNre9Nsr3dgSH/VF.3lGfrJ1vFYqsK1QrD4x71uYZToZ3C7m');
        $user->setAdmin(true);

        $manager->persist($user);
        $manager->flush();
    }
}
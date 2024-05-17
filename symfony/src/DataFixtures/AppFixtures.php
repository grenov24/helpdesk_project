<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Enums\UserRoles;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Faker;

class AppFixtures extends Fixture
{
    public function __construct(private UserPasswordHasherInterface $passwordHasher)
    {
    }

    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create();

        $user = new User();
        $user->setName('Václav Greňo')
             ->setEmail('vaclav.greno@gmail.com')
             ->setRoles([UserRoles::Admin])
             ->setPassword(
                $this->passwordHasher->hashPassword(
                   $user,
                   '123456789'
                )
             );

        $manager->flush();
    }
}

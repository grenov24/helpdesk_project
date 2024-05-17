<?php

namespace App\DataFixtures;

use App\Entity\Admin;
use App\Entity\Category;
use App\Entity\Request;
use App\Entity\Status;
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

        $admin = new Admin();
        $admin->setName('Václav Greňo')
            ->setEmail('vaclav.greno@gmail.com')
            ->setRoles([UserRoles::Admin])
            ->setPassword(
                $this->passwordHasher->hashPassword(
                    $admin,
                    '123456789'
                )
            );
        $manager->persist($admin);


        for ($j = 0; $j < 5; $j++) {
            $category = new Category();
            $category->setName($faker->word());
            $manager->persist($category);
        }
        for ($o = 0; $o < 3; $o++) {
            $status = new Status();
            $status->setName('Přijato', 'V řešení', 'Hotovo');
            $manager->persist($status);
        }

        for ($i = 0; $i < 5; $i++) {
            $requestCount = $faker->numberBetween(5, 25);
            for ($j = 0; $j < $requestCount; $j++) {
                $content = array_reduce(
                    $faker->paragraphs($faker->numberBetween(5, 10)),
                    fn ($text, $paragraph) => $text .= "<p>$paragraph</p>",
                    ""
                );

                $request = new Request();
                $request->setName($faker->words(3, true))
                    ->setContent($content)
                    ->setLocation($faker->words(3, true))
                    ->setUserEmail('testing@email.com')
                    ->setUsername('Lenka Nováková')
                    ->setEvNumber('F00999P')
                    ->setImage('Smiley.png')
                    ->setTechnician($admin)
                    ->setUserPhone('774082337');
                $category->addRequest($request);
                $status->addRequest($request);
                $manager->persist($request);
            }
        }
        $manager->flush();
    }
}

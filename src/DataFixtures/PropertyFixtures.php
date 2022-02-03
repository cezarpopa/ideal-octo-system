<?php
declare(strict_types=1);

namespace App\DataFixtures;

use App\Factory\JobFactory;
use App\Factory\PropertyFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class PropertyFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $properties = PropertyFactory::createMany(20);

        PropertyFactory::new()
                       ->many(5)
                       ->create();

        JobFactory::createMany(100, static function() use ($properties) {
            return [
                'property' => $properties[array_rand($properties)]
            ];
        });

        $manager->flush();
    }
}

<?php

namespace App\Factory;

use App\Entity\Property;
use App\Repository\PropertyRepository;
use Zenstruck\Foundry\RepositoryProxy;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;

/**
 * @extends ModelFactory<Property>
 *
 * @method static Property|Proxy createOne(array $attributes = [])
 * @method static Property[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static Property|Proxy find(object|array|mixed $criteria)
 * @method static Property|Proxy findOrCreate(array $attributes)
 * @method static Property|Proxy first(string $sortedField = 'id')
 * @method static Property|Proxy last(string $sortedField = 'id')
 * @method static Property|Proxy random(array $attributes = [])
 * @method static Property|Proxy randomOrCreate(array $attributes = [])
 * @method static Property[]|Proxy[] all()
 * @method static Property[]|Proxy[] findBy(array $attributes)
 * @method static Property[]|Proxy[] randomSet(int $number, array $attributes = [])
 * @method static Property[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static PropertyRepository|RepositoryProxy repository()
 * @method Property|Proxy create(array|callable $attributes = [])
 */
final class PropertyFactory extends ModelFactory
{
    public function __construct()
    {
        parent::__construct();
    }

    protected function getDefaults(): array
    {
        return [
            'name' => self::faker()->firstName(),
        ];
    }

    protected function initialize(): self
    {
        return $this;
    }

    protected static function getClass(): string
    {
        return Property::class;
    }
}

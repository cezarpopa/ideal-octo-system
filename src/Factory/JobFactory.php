<?php

namespace App\Factory;

use App\Doctrine\DBAL\Types\JobStatusType;
use App\Entity\Job;
use App\Repository\JobRepository;
use Zenstruck\Foundry\RepositoryProxy;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;

/**
 * @extends ModelFactory<Job>
 *
 * @method static Job|Proxy createOne(array $attributes = [])
 * @method static Job[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static Job|Proxy find(object|array|mixed $criteria)
 * @method static Job|Proxy findOrCreate(array $attributes)
 * @method static Job|Proxy first(string $sortedField = 'id')
 * @method static Job|Proxy last(string $sortedField = 'id')
 * @method static Job|Proxy random(array $attributes = [])
 * @method static Job|Proxy randomOrCreate(array $attributes = [])
 * @method static Job[]|Proxy[] all()
 * @method static Job[]|Proxy[] findBy(array $attributes)
 * @method static Job[]|Proxy[] randomSet(int $number, array $attributes = [])
 * @method static Job[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static JobRepository|RepositoryProxy repository()
 * @method Job|Proxy create(array|callable $attributes = [])
 */
final class JobFactory extends ModelFactory
{
    public function __construct()
    {
        parent::__construct();
    }

    protected function getDefaults(): array
    {
        return [
            'summary' => self::faker()->realTextBetween(50, 150),
            'description' => self::faker()->realTextBetween(20, 150),
            'status' => self::faker()->randomElement(JobStatusType::getChoices()),
            'firstName' => self::faker()->firstName(),
            'lastName' => self::faker()->lastName(),
            'email' => self::faker()->email(),
            'property' => PropertyFactory::random(),
        ];
    }

    protected function initialize(): self
    {
        return $this;
    }

    protected static function getClass(): string
    {
        return Job::class;
    }
}

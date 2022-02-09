<?php

declare(strict_types=1);

namespace App\Doctrine\DBAL\Types;

use Fresh\DoctrineEnumBundle\DBAL\Types\AbstractEnumType;

final class JobStatusType extends AbstractEnumType
{
    public const JOB_OPEN = 'open';
    public const JOB_COMPLETED = 'completed';
    public const JOB_IN_PROGRESS = 'in-progress';
    public const JOB_CANCELLED = 'cancelled';

    protected static array $choices = [
        self::JOB_OPEN => 'Open',
        self::JOB_COMPLETED => 'Completed',
        self::JOB_IN_PROGRESS => 'In Progress',
        self::JOB_CANCELLED => 'Cancelled',
    ];
}

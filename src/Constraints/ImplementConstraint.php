<?php
declare(strict_types=1);

namespace Arkitect\Constraints;

use Arkitect\Analyzer\ClassDescription;
use Arkitect\Rules\Violations;

class ImplementConstraint implements Constraint
{
    private $interface;

    public function __construct(string $interface)
    {
        $this->interface = $interface;
    }

    public function getViolationError(ClassDescription $classDescription): string
    {
        return "{$classDescription->getFQCN()} does not implement {$this->interface}";
    }

    public function isViolatedBy(ClassDescription $theClass): bool
    {
        return !$theClass->implements($this->interface);
    }
}

<?php
declare(strict_types=1);

namespace Arkitect\Rules;

use Arkitect\Analyzer\ClassDescription;
use Arkitect\Expression\Expression;

class Constraints
{
    private $expressions = [];

    public function add(Expression $expression): void
    {
        $this->expressions[] = $expression;
    }

    public function checkAll(ClassDescription $classDescription, Violations $violations): void
    {
        /** @var Expression $expression */
        foreach ($this->expressions as $expression) {
            $expression->evaluate($classDescription, $violations);
        }
    }
}

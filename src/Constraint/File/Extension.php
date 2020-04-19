<?php

namespace Palmtree\Form\Constraint\File;

use Palmtree\Form\Constraint\AbstractConstraint;
use Palmtree\Form\Constraint\ConstraintInterface;

class Extension extends AbstractConstraint implements ConstraintInterface
{
    private $extensions = [];

    public function validate($uploadedFile): bool
    {
        $extension = pathinfo($uploadedFile['name'], PATHINFO_EXTENSION);

        if (!\in_array($extension, $this->extensions, true)) {
            $this->setErrorMessage('Only the following file extensions are allowed: ' . implode(', ', $this->extensions));

            return false;
        }

        return true;
    }

    public function setExtensions(array $extensions): self
    {
        $this->extensions = $extensions;

        return $this;
    }

    public function getExtensions(): array
    {
        return $this->extensions;
    }
}

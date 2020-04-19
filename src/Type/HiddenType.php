<?php

namespace Palmtree\Form\Type;

use Palmtree\Html\Element;

class HiddenType extends AbstractType
{
    protected $type      = 'hidden';
    protected $userInput = false;

    public function getLabelElement(): ?Element
    {
        return null;
    }
}

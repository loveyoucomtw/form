<?php

namespace Palmtree\Form\Captcha;

use Palmtree\Form\Form;
use Palmtree\Html\Element;

interface CaptchaInterface
{
    /** @param mixed $input */
    public function verify($input): bool;

    public function getErrorMessage(): string;

    /** @return Element[] */
    public function getElements(Element $element, Form $form);
}

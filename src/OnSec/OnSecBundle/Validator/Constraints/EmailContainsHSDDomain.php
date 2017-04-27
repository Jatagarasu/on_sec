<?php

namespace OnSec\OnSecBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class EmailContainsHSDDomain extends Constraint
{
    public $message = 'Die eingegebene Adresse ist ungültig. Bitte verwenden Sie eine Adresse der Hochschule Düsseldorf. Erlaubte Domain: hs-duesseldorf.de.';
}
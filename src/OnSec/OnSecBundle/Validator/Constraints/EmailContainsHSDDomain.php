<?php

namespace OnSec\OnSecBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class EmailContainsHSDDomain extends Constraint
{
    public $message = 'Die eingegebene Adresse ist ungültig. Bitte verwenden Sie eine Adresse der Hochschule Düsseldorf. Erlaubte Domains: hs-duesseldorf.de, fh-duesseldorf.de, study.hs-duesseldorf.de oder study.fh-duesseldorf.de';
}
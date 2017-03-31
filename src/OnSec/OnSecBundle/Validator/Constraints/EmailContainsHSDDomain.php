<?php

namespace OnSec\OnSecBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * Class EmailContainsHSDDomain
 * @package OnSec\OnSecBundle\Validator\Constraints
 * @Annotation
 */
class EmailContainsHSDDomain extends Constraint
{
    public $message = 'Die eingegebene eMail Adresse ist ungültig. Bitte verwenden Sie eine Adresse der Hochschule Düsseldorf (mustermann@hs-duesseldorf.de)';
}
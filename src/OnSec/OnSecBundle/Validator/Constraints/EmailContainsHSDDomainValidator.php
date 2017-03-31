<?php

namespace OnSec\OnSecBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;


class EmailContainsHSDDomainValidator extends ConstraintValidator
{

    /**
     * Checks if the passed value is valid.
     *
     * The passed value is valid if it contains a String like _at_hs-duesseldorf.de
     *
     * @param mixed $value The value that should be validated
     * @param Constraint $constraint The constraint for the validation
     */
    public function validate($value, Constraint $constraint)
    {
        if(!preg_match('@hs-duesseldorf.de', $value, $matches)){
            $this->context->buildViolation($constraint->message)
                ->setParameter('%string%', $value)
                ->addViolation();
        }
    }
}
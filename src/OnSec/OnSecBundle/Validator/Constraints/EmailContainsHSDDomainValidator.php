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
        if(!strpos($value,'@hs-duesseldorf.de')
            || !strpos($value, '@study.hs-duesseldorf.de')
            || !strpos($value, '@study.fh-duesseldorf.de')
            || !strpos($value, '@fh-duesseldorf.de')){
            $this->context->buildViolation($constraint->message)
                ->setParameter('%string%', $value)
                ->addViolation();
            //TODO: Fix that validation issue
        }
    }
}
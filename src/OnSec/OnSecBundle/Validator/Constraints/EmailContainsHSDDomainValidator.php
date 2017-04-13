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
        $hsd = 'hs-duesseldorf.de';
        $fhd = 'fh-duesseldorf.de';
        $shsd = 'study.hs-duesseldorf.de';
        $sfhd = 'study.fh-duesseldorf.de';

        //TODO: auf mehr als eine Domain überprüfen

        if(!strpos($value, $hsd)){
            $this->context->buildViolation($constraint->message)
                ->setParameter('%string%', $value)
                ->addViolation();
        }
    }
}
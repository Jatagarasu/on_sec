<?php

namespace OnSec\OnSecBundle\Entity;


/**
 * CompletedInstruction
 */
class CompletedInstruction
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var \DateTime
     */
    private $expireDate;

    /**
     * @var \DateTime
     */
    private $completionDate;

    /**
     * @return CompletedInstruction
     */
    public function getCompletionDate()
    {
        return $this->completionDate;
    }

    /**
     * Set completionDate
     *
     * @param \DateTime $completionDate
     */
    public function setCompletionDate($completionDate)
    {
        $this->completionDate = $completionDate;
    }

    /**
     * @var \OnSec\OnSecBundle\Entity\Instruction
     */
    private $instruction;

    /**
     * @var \OnSec\OnSecBundle\Entity\User
     */
    private $user;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set expireDate
     *
     * @param \DateTime $expireDate
     *
     * @return CompletedInstruction
     */
    public function setExpireDate($expireDate)
    {
        $this->expireDate = $expireDate;

        return $this;
    }

    /**
     * Get expireDate
     *
     * @return \DateTime
     */
    public function getExpireDate()
    {
        return $this->expireDate;
    }

    /**
     * Set instruction
     *
     * @param \OnSec\OnSecBundle\Entity\Instruction $instruction
     *
     * @return CompletedInstruction
     */
    public function setInstruction(\OnSec\OnSecBundle\Entity\Instruction $instruction = null)
    {
        $this->instruction = $instruction;

        return $this;
    }

    /**
     * Get instruction
     *
     * @return \OnSec\OnSecBundle\Entity\Instruction
     */
    public function getInstruction()
    {
        return $this->instruction;
    }

    /**
     * Set user
     *
     * @param \OnSec\OnSecBundle\Entity\User $user
     *
     * @return CompletedInstruction
     */
    public function setUser(\OnSec\OnSecBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \OnSec\OnSecBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @ORM\PrePersist
     *
     * Sets the completionDate to todays date.
     */
    public function completionDateTime()
    {
        $this->setCompletionDate(new \DateTime());
    }

    /**
     * @ORM\PrePersist
     *
     * Sets the expireDate from this completedIntruction onto todays date plus days from the intruction.expiretime attribute
     * e.g. 2000.01.01 + 90 = 2000.03.30
     */
    public function initialDateTime()
    {
        $date = new \DateTime();
        $date->add(new \DateInterval('P'.$this->instruction->getExpiretime().'D'));
        $this->setExpireDate($date);
    }
}

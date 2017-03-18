<?php

namespace OnSec\OnSecBundle\Entity;

/**
 * Keyword
 */
class Keyword
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $description;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $instructions;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->instructions = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * Set description
     *
     * @param string $description
     *
     * @return Keyword
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Get instruction
     *
     * @return \Doctrine\Common\Collections\Collection
    */
    public function getInstructions() {
        return $this->instructions;
    }

    /**
     * Add instruction
     *
     * @param \OnSec\OnSecBundle\Entity\Instruction $instruction
     *
     * @return Keyword
     */
    public function addInstruction(\OnSec\OnSecBundle\Entity\Instruction $instruction)
    {
        $this->instructions[] = $instruction;

        return $this;
    }

    /**
     * Remove instruction
     *
     * @param \OnSec\OnSecBundle\Entity\Instruction $instruction
     */
    public function removeInstruction(\OnSec\OnSecBundle\Entity\Instruction $instruction)
    {
        $this->instructions->removeElement($instruction);
    }
}


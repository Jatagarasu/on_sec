<?php

namespace OnSec\OnSecBundle\Entity;

/**
 * Room
 */
class Room
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
    private $keywords;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->keywords = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Gets Roomdescription
     *
     * @return string
     */
    public function __toString()
    {
        return $this->getDescription();
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
     * @return Room
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
     * Add keyword
     *
     * @param \OnSec\OnSecBundle\Entity\Keyword $keyword
     *
     * @return Room
     */
    public function addKeyword(\OnSec\OnSecBundle\Entity\Keyword $keyword)
    {
        $this->keywords[] = $keyword;

        return $this;
    }

    /**
     * Remove keyword
     *
     * @param \OnSec\OnSecBundle\Entity\Keyword $keyword
     */
    public function removeKeyword(\OnSec\OnSecBundle\Entity\Keyword $keyword)
    {
        $this->keywords->removeElement($keyword);
    }

    /**
     * Get keywords
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getKeywords()
    {
        return $this->keywords;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $instructions;


    /**
     * Add instruction
     *
     * @param \OnSec\OnSecBundle\Entity\Instruction $instruction
     *
     * @return Room
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

    /**
     * Get instructions
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getInstructions()
    {
        return $this->instructions;
    }
}

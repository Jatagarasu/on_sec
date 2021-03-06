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
     * Gets Keyworddescription
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
}

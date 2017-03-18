<?php

namespace OnSec\OnSecBundle\Entity;

/**
 * Instruction
 */
class Instruction
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
     * @var \DateTime
     */
    private $expiredate;

    /**
     * @var string
     */
    private $pdfLink;

    /**
     * @var \OnSec\OnSecBundle\Entity\User
     */
    private $owner;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $moderators;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $questions;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $keywords;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->moderators = new \Doctrine\Common\Collections\ArrayCollection();
        $this->questions = new \Doctrine\Common\Collections\ArrayCollection();
        $this->keywords = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Instruction
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
     * Set expiredate
     *
     * @param \DateTime $expiredate
     *
     * @return Instruction
     */
    public function setExpiredate($expiredate)
    {
        $this->expiredate = $expiredate;

        return $this;
    }

    /**
     * Get expiredate
     *
     * @return \DateTime
     */
    public function getExpiredate()
    {
        return $this->expiredate;
    }

    /**
     * Set pdfLink
     *
     * @param string $pdfLink
     *
     * @return Instruction
     */
    public function setPdfLink($pdfLink)
    {
        $this->pdfLink = $pdfLink;

        return $this;
    }

    /**
     * Get pdfLink
     *
     * @return string
     */
    public function getPdfLink()
    {
        return $this->pdfLink;
    }

    /**
     * Set owner
     *
     * @param \OnSec\OnSecBundle\Entity\User $owner
     *
     * @return Instruction
     */
    public function setOwner(\OnSec\OnSecBundle\Entity\User $owner = null)
    {
        $this->owner = $owner;

        return $this;
    }

    /**
     * Get owner
     *
     * @return \OnSec\OnSecBundle\Entity\User
     */
    public function getOwner()
    {
        return $this->owner;
    }

    /**
     * Add moderator
     *
     * @param \OnSec\OnSecBundle\Entity\User $moderator
     *
     * @return Instruction
     */
    public function addModerator(\OnSec\OnSecBundle\Entity\User $moderator)
    {
        $this->moderators[] = $moderator;

        return $this;
    }

    /**
     * Remove moderator
     *
     * @param \OnSec\OnSecBundle\Entity\User $moderator
     */
    public function removeModerator(\OnSec\OnSecBundle\Entity\User $moderator)
    {
        $this->moderators->removeElement($moderator);
    }

    /**
     * Get moderators
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getModerators()
    {
        return $this->moderators;
    }

    /**
     * Add question
     *
     * @param \OnSec\OnSecBundle\Entity\Question $question
     *
     * @return Instruction
     */
    public function addQuestion(\OnSec\OnSecBundle\Entity\Question $question)
    {
        $this->questions[] = $question;

        return $this;
    }

    /**
     * Remove question
     *
     * @param \OnSec\OnSecBundle\Entity\Question $question
     */
    public function removeQuestion(\OnSec\OnSecBundle\Entity\Question $question)
    {
        $this->questions->removeElement($question);
    }

    /**
     * Get questions
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getQuestions()
    {
        return $this->questions;
    }

    /**
     * Add keyword
     *
     * @param \OnSec\OnSecBundle\Entity\Keyword $keyword
     *
     * @return Instruction
     */
    public function addKeyword(\OnSec\OnSecBundle\Entity\Keyword $keyword)
    {
        $this->keywords->add($keyword);

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
}


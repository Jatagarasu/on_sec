<?php

namespace OnSec\OnSecBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * Answer
 */
class Answer
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $answerText;

    /**
     * @var boolean
     */
    private $isCorrect;

    /**
     * @var \DateTime
     */
    private $createdOn;

    /**
     * @var \DateTime
     */
    private $updatedOn;

    /**
     * @var \OnSec\OnSecBundle\Entity\Question
     */
    private $question;


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
     * Set answerText
     *
     * @param string $answerText
     *
     * @return Answer
     */
    public function setAnswerText($answerText)
    {
        $this->answerText = $answerText;

        return $this;
    }

    /**
     * Get answerText
     *
     * @return string
     */
    public function getAnswerText()
    {
        return $this->answerText;
    }

    /**
     * Set isCorrect
     *
     * @param integer $isCorrect
     *
     * @return Answer
     */
    public function setIsCorrect($isCorrect)
    {
        $this->isCorrect = $isCorrect;

        return $this;
    }

    /**
     * Get isCorrect
     *
     * @return integer
     */
    public function getIsCorrect()
    {
        return $this->isCorrect;
    }

    /**
     * Set createdOn
     *
     * @param \DateTime $createdOn
     *
     * @return Answer
     */
    public function setCreatedOn($createdOn)
    {
        $this->createdOn = $createdOn;

        return $this;
    }

    /**
     * Get createdOn
     *
     * @return \DateTime
     */
    public function getCreatedOn()
    {
        return $this->createdOn;
    }

    /**
     * Set updatedOn
     *
     * @param \DateTime $updatedOn
     *
     * @return Answer
     */
    public function setUpdatedOn($updatedOn)
    {
        $this->updatedOn = $updatedOn;

        return $this;
    }

    /**
     * Get updatedOn
     *
     * @return \DateTime
     */
    public function getUpdatedOn()
    {
        return $this->updatedOn;
    }

    /**
     * Set question
     *
     * @param \OnSec\OnSecBundle\Entity\Question $question
     *
     * @return Answer
     */
    public function setQuestion(\OnSec\OnSecBundle\Entity\Question $question = null)
    {
        $this->question = $question;

        return $this;
    }

    /**
     * Get question
     *
     * @return \OnSec\OnSecBundle\Entity\Question
     */
    public function getQuestion()
    {
        return $this->question;
    }
    /**
     * @ORM\PrePersist
     */
    public function initialDateTime()
    {
        // Add your code here
    }

    /**
     * @ORM\PreFlush
     */
    public function updateDateTime()
    {
        // Add your code here
    }
}


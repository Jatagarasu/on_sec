<?php

namespace OnSec\OnSecBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use OnSec\OnSecBundle\Entity\Course;
use OnSec\OnSecBundle\Entity\Keyword;
use OnSec\OnSecBundle\Entity\Question;
use OnSec\OnSecBundle\Entity\User;

/**
 * Instruction
 *
 * @ORM\Table(name="instruction")
 * @ORM\Entity(repositoryClass="OnSec\OnSecBundle\Repository\InstructionRepository")
 */
class Instruction
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="expiredate", type="datetime")
     */
    private $expiredate;

    /**
     * @var string
     *
     * @ORM\Column(name="pdfLink", type="string", length=255, nullable=true)
     */
    private $pdfLink;

    /**
     * @var User
     *
     * @ORM\Column(name="owner", type="User")
     */
    private $owner;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\Column(name="questions", type="\Doctrine\Common\Collections\Collection")
     */
    private $questions;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     */
    private $keywords;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     */
    private $moderators;

    /**
     * @var Course
     *
     * @ORM\Column(name="course", type="Course")
     */
    private $course;


    /**
     * Get id
     *
     * @return int
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
     * @param User $user
     *
     * @return Instruction
     */
    public function setOwner($user)
    {
        $this->owner = $user;

        return $this;
    }

    /**
     * Get owner
     *
     * @return User
     */
    public function getOwner()
    {
        return $this->owner;
    }

    /**
     * Add questions
     *
     * @param Question $questions
     *
     * @return Instruction
     */
    public function addQuestion(Question $question)
    {
        $this->questions[] = $question;

        return $this;
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
     * @param Keyword $keyword
     *
     * @return Instruction
     */
    public function setKeywords(Keyword $keyword)
    {
        $this->keywords[] = $keyword;

        return $this;
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
     * Add moderator
     *
     * @param User $user
     *
     * @return Instruction
     */
    public function addModerators(User $user)
    {
        $this->moderators[] = $user;

        return $this;
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
     * Set course
     *
     * @param Course $course
     *
     * @return Instruction
     */
    public function setCourse(Course $course)
    {
        $this->course = $course;

        return $this;
    }

    /**
     * Get course
     *
     * @return Course
     */
    public function getCourse()
    {
        return $this->course;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->questions = new \Doctrine\Common\Collections\ArrayCollection();
        $this->keywords = new \Doctrine\Common\Collections\ArrayCollection();
        $this->moderators = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Add keyword
     *
     * @param \OnSec\OnSecBundle\Entity\Keyword $keyword
     *
     * @return Instruction
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

    public function __toString() {
        return $this->description;
    }
}

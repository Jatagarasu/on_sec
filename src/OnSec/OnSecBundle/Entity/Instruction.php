<?php

namespace OnSec\OnSecBundle\Entity;

use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * Instruction
 * @Vich\Uploadable
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
     *
     * @Vich\UploadableField(mapping="instruction_pdf", fileNameProperty="pdfLink")
     *
     * @var File
     */
    private $pdfFile;

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
     * Gets Instructiondescription
     *
     * @return string
     */
    public function __toString()
    {
        return $this->getDescription();
    }

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
     *
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile $pdf
     *
     * @return Instruction
     */
    public function setPdfFile($pdf = null)
    {
        if ($pdf instanceof File) {
          $this->pdfFile = $pdf;
        }

        if ($pdf instanceof UploadedFile) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTimeImmutable();
        }

        return $this;
    }

    /**
     * @return File|null
     */
    public function getPdfFile()
    {
        return $this->pdfFile;
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
        if (!$this->moderators->contains($moderator)) {
          $this->moderators[] = $moderator;
        }

        return $this;
    }

    public function setModerators($moderators)
    {
      $this->moderators = $moderators;

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
     * @param \OnSec\OnSecBundle\Entity\Keyword $keyword
     * @return bool
     */
    public function hasKeyword(Keyword $keyword)
    {
        return $this->getKeywords()->contains($keyword);
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
        if (!$this->hasKeyword($keyword)) {
            $this->keywords[] = $keyword;
        }

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
     * @var integer
     */
    private $expiretime;


    /**
     * Set expiretime
     *
     * @param integer $expiretime
     *
     * @return Instruction
     */
    public function setExpiretime($expiretime)
    {
        $this->expiretime = $expiretime;

        return $this;
    }

    /**
     * Get expiretime
     *
     * @return integer
     */
    public function getExpiretime()
    {
        return $this->expiretime;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $completed_instructions;


    /**
     * Add completedInstruction
     *
     * @param \OnSec\OnSecBundle\Entity\CompletedInstruction $completedInstruction
     *
     * @return Instruction
     */
    public function addCompletedInstruction(\OnSec\OnSecBundle\Entity\CompletedInstruction $completedInstruction)
    {
        $this->completed_instructions[] = $completedInstruction;

        return $this;
    }

    /**
     * Remove completedInstruction
     *
     * @param \OnSec\OnSecBundle\Entity\CompletedInstruction $completedInstruction
     */
    public function removeCompletedInstruction(\OnSec\OnSecBundle\Entity\CompletedInstruction $completedInstruction)
    {
        $this->completed_instructions->removeElement($completedInstruction);
    }

    /**
     * Get completedInstructions
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCompletedInstructions()
    {
        return $this->completed_instructions;
    }
}

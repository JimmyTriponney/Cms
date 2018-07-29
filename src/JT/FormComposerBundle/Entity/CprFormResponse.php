<?php

namespace JT\FormComposerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FormResponse
 *
 * @ORM\Table(name="cpr_form_response")
 * @ORM\Entity(repositoryClass="JT\FormComposerBundle\Repository\CprFormResponseRepository")
 */
class CprFormResponse
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
     * @ORM\Column(name="rep_object", type="string", length=255, nullable=true)
     */
    private $repObject;

    /**
     * @var string
     *
     * @ORM\Column(name="rep_from", type="string", length=255, nullable=true)
     */
    private $repFrom;

    /**
     * @var string
     *
     * @ORM\Column(name="rep_from_name", type="string", length=255, nullable=true)
     */
    private $repFromName;

    /**
     * @var string
     *
     * @ORM\Column(name="rep_to", type="text", nullable=true)
     */
    private $repTo;

    /**
     * @var string
     *
     * @ORM\Column(name="rep_cc", type="text", nullable=true)
     */
    private $repCc;

    /**
     * @var string
     *
     * @ORM\Column(name="rep_cci", type="text", nullable=true)
     */
    private $repCci;

    /**
     * @var string
     *
     * @ORM\Column(name="rep_html", type="text", nullable=true)
     */
    private $repHtml;

    /**
     * @var string
     *
     * @ORM\Column(name="rep_reply", type="string", length=255, nullable=true)
     */
    private $repReply;


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
     * Set repObject
     *
     * @param string $repObject
     *
     * @return FormResponse
     */
    public function setRepObject($repObject)
    {
        $this->repObject = $repObject;

        return $this;
    }

    /**
     * Get repObject
     *
     * @return string
     */
    public function getRepObject()
    {
        return $this->repObject;
    }

    /**
     * Set repFrom
     *
     * @param string $repFrom
     *
     * @return FormResponse
     */
    public function setRepFrom($repFrom)
    {
        $this->repFrom = $repFrom;

        return $this;
    }

    /**
     * Get repFrom
     *
     * @return string
     */
    public function getRepFrom()
    {
        return $this->repFrom;
    }

    /**
     * Set repFromName
     *
     * @param string $repFromName
     *
     * @return FormResponse
     */
    public function setRepFromName($repFromName)
    {
        $this->repFromName = $repFromName;

        return $this;
    }

    /**
     * Get repFromName
     *
     * @return string
     */
    public function getRepFromName()
    {
        return $this->repFromName;
    }

    /**
     * Set repTo
     *
     * @param string $repTo
     *
     * @return FormResponse
     */
    public function setRepTo($repTo)
    {
        $this->repTo = $repTo;

        return $this;
    }

    /**
     * Get repTo
     *
     * @return string
     */
    public function getRepTo()
    {
        return $this->repTo;
    }

    /**
     * Set repCc
     *
     * @param string $repCc
     *
     * @return FormResponse
     */
    public function setRepCc($repCc)
    {
        $this->repCc = $repCc;

        return $this;
    }

    /**
     * Get repCc
     *
     * @return string
     */
    public function getRepCc()
    {
        return $this->repCc;
    }

    /**
     * Set repCci
     *
     * @param string $repCci
     *
     * @return FormResponse
     */
    public function setRepCci($repCci)
    {
        $this->repCci = $repCci;

        return $this;
    }

    /**
     * Get repCci
     *
     * @return string
     */
    public function getRepCci()
    {
        return $this->repCci;
    }

    /**
     * Set repHtml
     *
     * @param string $repHtml
     *
     * @return FormResponse
     */
    public function setRepHtml($repHtml)
    {
        $this->repHtml = $repHtml;

        return $this;
    }

    /**
     * Get repHtml
     *
     * @return string
     */
    public function getRepHtml()
    {
        return $this->repHtml;
    }

    /**
     * Set repReply
     *
     * @param string $repReply
     *
     * @return FormResponse
     */
    public function setRepReply($repReply)
    {
        $this->repReply = $repReply;

        return $this;
    }

    /**
     * Get repReply
     *
     * @return string
     */
    public function getRepReply()
    {
        return $this->repReply;
    }
}


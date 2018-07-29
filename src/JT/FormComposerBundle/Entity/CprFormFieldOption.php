<?php

namespace JT\FormComposerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CprFieldOption
 *
 * @ORM\Table(name="cpr_form_field_option")
 * @ORM\Entity(repositoryClass="JT\FormComposerBundle\Repository\CprFormFieldOptionRepository")
 */
class CprFormFieldOption
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
     * @ORM\Column(name="opt_value", type="string", length=255, nullable=true)
     */
    private $optValue;

    /**
     * @var string
     *
     * @ORM\Column(name="opt_label", type="string", length=255, nullable=true)
     */
    private $optLabel;


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
     * Set optValue
     *
     * @param string $optValue
     *
     * @return CprFieldOption
     */
    public function setOptValue($optValue)
    {
        $this->optValue = $optValue;

        return $this;
    }

    /**
     * Get optValue
     *
     * @return string
     */
    public function getOptValue()
    {
        return $this->optValue;
    }

    /**
     * Set optLabel
     *
     * @param string $optLabel
     *
     * @return CprFieldOption
     */
    public function setOptLabel($optLabel)
    {
        $this->optLabel = $optLabel;

        return $this;
    }

    /**
     * Get optLabel
     *
     * @return string
     */
    public function getOptLabel()
    {
        return $this->optLabel;
    }
}


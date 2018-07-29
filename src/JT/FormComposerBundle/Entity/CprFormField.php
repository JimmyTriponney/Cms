<?php

namespace JT\FormComposerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * CprFormField
 *
 * @ORM\Table(name="cpr_form_field")
 * @ORM\Entity(repositoryClass="JT\FormComposerBundle\Repository\CprFormFieldRepository")
 */
class CprFormField
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
     * @ORM\Column(name="name", type="string", length=255, nullable=true)
	 * @Assert\NotBlank(message = "ce champ n'a pas de nom.")
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="slug", type="string", length=255, nullable=true)
     */
    private $slug;

    /**
     * @var int
     *
     * @ORM\Column(name="col_md", type="integer", nullable=true)
     */
    private $colMd;

	/**
     * Entity CprFormFieldList
     *
     * @ORM\ManyToOne(targetEntity="CprFormFieldList")
	 * @ORM\JoinColumn(nullable=true)
     */
    private $fieldType;

    /**
     * @var string
     *
     * @ORM\Column(name="field_format", type="string", length=255, nullable=true)
     */
    private $fieldFormat;

    /**
     * @var string
     *
     * @ORM\Column(name="field_value", type="text", nullable=true)
     */
    private $fieldValue;

    /**
     * @var string
     *
     * @ORM\Column(name="html_class", type="string", length=255, nullable=true)
     */
    private $htmlClass;

    /**
     * @var string
     *
     * @ORM\Column(name="html_id", type="string", length=255, nullable=true)
     */
    private $htmlId;
	
    /**
     * @var string
     *
     * @ORM\Column(name="field_required", type="string", length=10, nullable=true)
     */
    private $fieldRequired;

	/**
     * Entity CprFormFieldOption
     *
     * @ORM\ManyToMany(targetEntity="CprFormFieldOption", cascade={"persist", "remove"}, orphanRemoval=true)
	 * @ORM\JoinColumn(nullable=true)
     */
	private $fieldOptions;

	/**
     * Entity CprFormConditionGroup
     *
     * @ORM\ManyToMany(targetEntity="CprFormConditionGroup", cascade={"persist", "remove"}, orphanRemoval=true)
	 * @ORM\JoinColumn(nullable=true)
     */
	private $fieldConditionGroup;
	
    /**
     * @var Integer
     *
     * @ORM\Column(name="form_order", type="integer", nullable=false)
     */
    private $formOrder;

	

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
     * Set name
     *
     * @param string $name
     *
     * @return CprField
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set slug
     *
     * @param string $slug
     *
     * @return CprField
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set colMd
     *
     * @param integer $colMd
     *
     * @return CprField
     */
    public function setColMd($colMd)
    {
        $this->colMd = $colMd;

        return $this;
    }

    /**
     * Get colMd
     *
     * @return int
     */
    public function getColMd()
    {
        return $this->colMd;
    }

    /**
     * Set fieldFormat
     *
     * @param string $fieldFormat
     *
     * @return CprField
     */
    public function setFieldFormat($fieldFormat)
    {
        $this->fieldFormat = $fieldFormat;

        return $this;
    }

    /**
     * Get fieldFormat
     *
     * @return string
     */
    public function getFieldFormat()
    {
        return $this->fieldFormat;
    }

    /**
     * Set fieldValue
     *
     * @param string $fieldValue
     *
     * @return CprField
     */
    public function setFieldValue($fieldValue)
    {
        $this->fieldValue = $fieldValue;

        return $this;
    }

    /**
     * Get fieldValue
     *
     * @return string
     */
    public function getFieldValue()
    {
        return $this->fieldValue;
    }

    /**
     * Set htmlClass
     *
     * @param string $htmlClass
     *
     * @return CprField
     */
    public function setHtmlClass($htmlClass)
    {
        $this->htmlClass = $htmlClass;

        return $this;
    }

    /**
     * Get htmlClass
     *
     * @return string
     */
    public function getHtmlClass()
    {
        return $this->htmlClass;
    }

    /**
     * Set htmlId
     *
     * @param string $htmlId
     *
     * @return CprField
     */
    public function setHtmlId($htmlId)
    {
        $this->htmlId = $htmlId;

        return $this;
    }

    /**
     * Get htmlId
     *
     * @return string
     */
    public function getHtmlId()
    {
        return $this->htmlId;
    }

    /**
     * Set fieldRequired
     *
     * @param string $fieldRequired
     *
     * @return CprField
     */
    public function setFieldRequired($fieldRequired)
    {
        $this->fieldRequired = $fieldRequired;

        return $this;
    }

    /**
     * Get fieldRequired
     *
     * @return string
     */
    public function getFieldRequired()
    {
        return $this->fieldRequired;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->fieldOptions = new \Doctrine\Common\Collections\ArrayCollection();
        $this->fieldConditionGroup = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add fieldOption
     *
     * @param \JT\FormComposerBundle\Entity\CprFormFieldOption $fieldOption
     *
     * @return CprFormField
     */
    public function addFieldOption(\JT\FormComposerBundle\Entity\CprFormFieldOption $fieldOption)
    {
        $this->fieldOptions[] = $fieldOption;

        return $this;
    }

    /**
     * Remove fieldOption
     *
     * @param \JT\FormComposerBundle\Entity\CprFormFieldOption $fieldOption
     */
    public function removeFieldOption(\JT\FormComposerBundle\Entity\CprFormFieldOption $fieldOption)
    {
        $this->fieldOptions->removeElement($fieldOption);
    }

    /**
     * Get fieldOptions
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getFieldOptions()
    {
        return $this->fieldOptions;
    }

    /**
     * Add fieldConditionGroup
     *
     * @param \JT\FormComposerBundle\Entity\CprFormConditionGroup $fieldConditionGroup
     *
     * @return CprFormField
     */
    public function addFieldConditionGroup(\JT\FormComposerBundle\Entity\CprFormConditionGroup $fieldConditionGroup)
    {
        $this->fieldConditionGroup[] = $fieldConditionGroup;

        return $this;
    }

    /**
     * Remove fieldConditionGroup
     *
     * @param \JT\FormComposerBundle\Entity\CprFormConditionGroup $fieldConditionGroup
     */
    public function removeFieldConditionGroup(\JT\FormComposerBundle\Entity\CprFormConditionGroup $fieldConditionGroup)
    {
        $this->fieldConditionGroup->removeElement($fieldConditionGroup);
    }

    /**
     * Get fieldConditionGroup
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getFieldConditionGroup()
    {
        return $this->fieldConditionGroup;
    }


    /**
     * Set fieldType
     *
     * @param \JT\FormComposerBundle\Entity\CprFormFieldList $fieldType
     *
     * @return CprFormField
     */
    public function setFieldType($fieldType)
    {
        $this->fieldType = $fieldType;

        return $this;
    }

    /**
     * Get fieldType
     *
     * @return \JT\FormComposerBundle\Entity\CprFormFieldList
     */
    public function getFieldType()
    {
        return $this->fieldType;
    }

    /**
     * Set formOrder
     *
     * @param integer $formOrder
     *
     * @return CprFormField
     */
    public function setFormOrder($formOrder)
    {
        $this->formOrder = $formOrder;

        return $this;
    }

    /**
     * Get formOrder
     *
     * @return integer
     */
    public function getFormOrder()
    {
        return $this->formOrder;
    }
}

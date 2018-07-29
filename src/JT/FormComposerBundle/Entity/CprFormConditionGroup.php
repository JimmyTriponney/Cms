<?php

namespace JT\FormComposerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CprFormConditionGroup
 *
 * @ORM\Table(name="cpr_form_condition_group")
 * @ORM\Entity(repositoryClass="JT\FormComposerBundle\Repository\CprFormConditionGroupRepository")
 */
class CprFormConditionGroup
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
     * Entity CprFormCondition
     *
     * @ORM\ManyToMany(targetEntity="CprFormCondition", cascade={"persist", "remove"}, orphanRemoval=true)
	 * @ORM\JoinColumn(nullable=true)
     */
	private $conditions;
	

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
     * Constructor
     */
    public function __construct()
    {
        $this->conditions = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add condition
     *
     * @param \JT\FormComposerBundle\Entity\CprFormCondition $condition
     *
     * @return CprFormConditionGroup
     */
    public function addCondition(\JT\FormComposerBundle\Entity\CprFormCondition $condition)
    {
        $this->conditions[] = $condition;

        return $this;
    }

    /**
     * Remove condition
     *
     * @param \JT\FormComposerBundle\Entity\CprFormCondition $condition
     */
    public function removeCondition(\JT\FormComposerBundle\Entity\CprFormCondition $condition)
    {
        $this->conditions->removeElement($condition);
    }

    /**
     * Get conditions
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getConditions()
    {
        return $this->conditions;
    }
}

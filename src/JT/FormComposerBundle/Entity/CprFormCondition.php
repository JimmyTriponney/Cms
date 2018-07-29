<?php

namespace JT\FormComposerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CprFormCondition
 *
 * @ORM\Table(name="cpr_form_condition")
 * @ORM\Entity(repositoryClass="JT\FormComposerBundle\Repository\CprFormConditionRepository")
 */
class CprFormCondition
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
     * @ORM\Column(name="action", type="string", length=100, nullable=true)
     */
    private $action;

    /**
     * @var string
     *
     * @ORM\Column(name="slug_target", type="string", length=255, nullable=true)
     */
    private $fieldTarget;

    /**
     * @var string
     *
     * @ORM\Column(name="action_condition", type="string", length=20, nullable=true)
     */
    private $actionCondition;

    /**
     * @var string
     *
     * @ORM\Column(name="value", type="string", length=255, nullable=true)
     */
    private $value;


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
     * Set action
     *
     * @param string $action
     *
     * @return CprFormCondition
     */
    public function setAction($action)
    {
        $this->action = $action;

        return $this;
    }

    /**
     * Get action
     *
     * @return string
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * Set fieldTarget
     *
     * @param string $fieldTarget
     *
     * @return CprFormCondition
     */
    public function setFieldTarget($fieldTarget)
    {
        $this->fieldTarget = $fieldTarget;

        return $this;
    }

    /**
     * Get fieldTarget
     *
     * @return string
     */
    public function getFieldTarget()
    {
        return $this->fieldTarget;
    }

    /**
     * Set actionCondition
     *
     * @param string $actionCondition
     *
     * @return CprFormCondition
     */
    public function setActionCondition($actionCondition)
    {
        $this->actionCondition = $actionCondition;

        return $this;
    }

    /**
     * Get actionCondition
     *
     * @return string
     */
    public function getActionCondition()
    {
        return $this->actionCondition;
    }

    /**
     * Set value
     *
     * @param string $value
     *
     * @return CprFormCondition
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get value
     *
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }
}


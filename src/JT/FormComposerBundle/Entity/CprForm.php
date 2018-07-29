<?php

namespace JT\FormComposerBundle\Entity;

use JT\FormComposerBundle\Entity\CprFormField;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * CprForm
 *
 * @ORM\Table(name="cpr_form")
 * @ORM\Entity(repositoryClass="JT\FormComposerBundle\Repository\CprFormRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class CprForm
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
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
	 * @Assert\NotBlank(message = "Toto est reparti.")
     */
    private $name;
	
    /**
     * @var string
     *
     * @ORM\Column(name="user_name", type="string", length=255, nullable=true)
     */
    private $userName;

    /**
     * @var string
     *
     * @ORM\Column(name="slug", type="string", length=255, nullable=true)
	 * @Gedmo\Slug(fields={"name"})
     */
    private $slug;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="create_date", type="datetime", nullable=true)
     */
    private $createDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="update_date", type="datetime", nullable=true)
     */
    private $updateDate;

	/**
     * Entity CprFormField
     *
     * @ORM\ManyToMany(targetEntity="CprFormField", cascade={"persist", "remove"}, orphanRemoval=true)
	 * @ORM\JoinColumn(nullable=true)
     */
	private $fields;

	/**
     * Entity CprFormResponse
     *
     * @ORM\ManyToMany(targetEntity="CprFormResponse", cascade={"persist", "remove"}, orphanRemoval=true)
	 * @ORM\JoinColumn(nullable=true)
     */
	private $response;

    /**
     * @var Integer
     *
     * @ORM\Column(name="count_elem", type="integer", nullable=false)
     */
    private $countElem;

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
     * @return CprForm
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
     * @return CprForm
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
     * Set createDate
     *
     * @param \DateTime $createDate
     *
     * @return CprForm
     */
    public function setCreateDate($createDate)
    {
        $this->createDate = $createDate;

        return $this;
    }

    /**
     * Get createDate
     *
     * @return \DateTime
     */
    public function getCreateDate()
    {
        return $this->createDate;
    }

    /**
     * Set updateDate
     *
     * @param \DateTime $updateDate
     *
     * @return CprForm
     */
    public function setUpdateDate($updateDate)
    {
        $this->updateDate = $updateDate;

        return $this;
    }

    /**
     * Get updateDate
     *
     * @return \DateTime
     */
    public function getUpdateDate()
    {
        return $this->updateDate;
    }

    /**
     * Add field
     *
     * @param \JT\FormComposerBundle\Entity\CprFormField $field
     *
     * @return CprForm
     */
    public function addField(\JT\FormComposerBundle\Entity\CprFormField $field)
    {
        $this->fields[] = $field;

        return $this;
    }

    /**
     * Remove field
     *
     * @param \JT\FormComposerBundle\Entity\CprFormField $field
     */
    public function removeField(\JT\FormComposerBundle\Entity\CprFormField $field)
    {
        $this->fields->removeElement($field);
    }

    /**
     * Get fields
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getFields()
    {
        return $this->fields;
    }

    /**
     * Add response
     *
     * @param \JT\FormComposerBundle\Entity\CprFormResponse $response
     *
     * @return CprForm
     */
    public function addResponse(\JT\FormComposerBundle\Entity\CprFormResponse $response)
    {
        $this->response[] = $response;

        return $this;
    }

    /**
     * Remove response
     *
     * @param \JT\FormComposerBundle\Entity\CprFormResponse $response
     */
    public function removeResponse(\JT\FormComposerBundle\Entity\CprFormResponse $response)
    {
        $this->response->removeElement($response);
    }

    /**
     * Get response
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getResponse()
    {
        return $this->response;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->fields = new \Doctrine\Common\Collections\ArrayCollection();
        $this->response = new \Doctrine\Common\Collections\ArrayCollection();
    }
	
	/**
	* @ORM\PrePersist
	*/
	public function prePersist()
	{
		$dateTime = new \DateTime();
		
		$this->setCreateDate($dateTime);
	}
	
	/**
	* @ORM\PreUpdate
	*/
	public function preUpdate()
	{
		$dateTime = new \DateTime();
		
		$this->setUpdateDate($dateTime);
	}


    /**
     * Set countElem
     *
     * @param integer $countElem
     *
     * @return CprForm
     */
    public function setCountElem($countElem)
    {
        $this->countElem = $countElem;

        return $this;
    }

    /**
     * Get countElem
     *
     * @return integer
     */
    public function getCountElem()
    {
        return $this->countElem;
    }
	
	public function __string()
	{
		return $this->name;
	}

    /**
     * Set userName
     *
     * @param string $userName
     *
     * @return CprForm
     */
    public function setUserName($userName)
    {
        $this->userName = $userName;

        return $this;
    }

    /**
     * Get userName
     *
     * @return string
     */
    public function getUserName()
    {
        return $this->userName;
    }
}

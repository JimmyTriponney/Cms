<?php

namespace JT\PageComposerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CprColumnBlock
 *
 * @ORM\Table(name="cpr_column_block")
 * @ORM\Entity(repositoryClass="JT\PageComposerBundle\Repository\CprColumnBlockRepository")
 */
class CprColumnBlock
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
     * @var int
     *
     * @ORM\Column(name="padding_top", type="integer", nullable=true)
     */
    private $paddingTop;

    /**
     * @var int
     *
     * @ORM\Column(name="padding_left", type="integer", nullable=true)
     */
    private $paddingLeft;

    /**
     * @var int
     *
     * @ORM\Column(name="padding_bottom", type="integer", nullable=true)
     */
    private $paddingBottom;

    /**
     * @var int
     *
     * @ORM\Column(name="padding_right", type="integer", nullable=true)
     */
    private $paddingRight;

    /**
     * @var string
     *
     * @ORM\Column(name="border_style", type="string", length=20, nullable=true)
     */
    private $borderStyle;

    /**
     * @var string
     *
     * @ORM\Column(name="border_color", type="string", length=10, nullable=true)
     */
    private $borderColor;

    /**
     * @var int
     *
     * @ORM\Column(name="border_size", type="integer", nullable=true)
     */
    private $borderSize;

    /**
     * @var int
     *
     * @ORM\Column(name="border_radius", type="integer", nullable=true)
     */
    private $borderRadius;

    /**
     * @var string
     *
     * @ORM\Column(name="bg_color", type="string", length=10, nullable=true)
     */
    private $bgColor;
	
	
    /**
     * @var string
     *
	 * @ORM\ManyToOne(targetEntity="JT\FileBundle\Entity\File")
     */
    private $bgImg;

    /**
     * @var int
     *
     * @ORM\Column(name="page_order", type="integer", nullable=true)
     */
    private $pageOrder;

    /**
     * @var text
     *
     * @ORM\Column(name="content_text", type="text", nullable=true)
     */
    private $contentText;

    /**
     * @var text
     *
     * @ORM\Column(name="content_html", type="text", nullable=true)
     */
    private $contentHtml;

    /**
     * @var string
     *
     * @ORM\Column(name="html_class", type="string", length=100, nullable=true)
     */
    private $htmlClass;
	
	
    /**
     * Entity Block
     *
     * @ORM\ManyToOne(targetEntity="CprBlock")
	 * @ORM\JoinColumn(nullable=true)
     */
    private $block;
		
    /**
     * @var string
     *
	 * @ORM\ManyToOne(targetEntity="JT\FileBundle\Entity\File")
     */
    private $contentImg;	
			
    /**
     * @var string
     *
     * @ORM\Column(name="other_info", type="string", length=10, nullable=true)
     */
    private $otherInfo;
	
    /**
     * @var string
     *
     * @ORM\Column(name="align", type="string", length=10, nullable=true)
     */
    private $align;
	
    /**
     * @var string
     *
     * @ORM\Column(name="color", type="string", length=10, nullable=true)
     */
    private $color;
	
    /**
     * Entity Form
     *
     * @ORM\ManyToOne(targetEntity="\JT\FormComposerBundle\Entity\CprForm")
     */
    private $form;
	


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
     * Set paddingTop
     *
     * @param integer $paddingTop
     *
     * @return CprColumnBlock
     */
    public function setPaddingTop($paddingTop)
    {
        $this->paddingTop = $paddingTop;

        return $this;
    }

    /**
     * Get paddingTop
     *
     * @return integer
     */
    public function getPaddingTop()
    {
        return $this->paddingTop;
    }

    /**
     * Set paddingLeft
     *
     * @param integer $paddingLeft
     *
     * @return CprColumnBlock
     */
    public function setPaddingLeft($paddingLeft)
    {
        $this->paddingLeft = $paddingLeft;

        return $this;
    }

    /**
     * Get paddingLeft
     *
     * @return integer
     */
    public function getPaddingLeft()
    {
        return $this->paddingLeft;
    }

    /**
     * Set paddingBottom
     *
     * @param integer $paddingBottom
     *
     * @return CprColumnBlock
     */
    public function setPaddingBottom($paddingBottom)
    {
        $this->paddingBottom = $paddingBottom;

        return $this;
    }

    /**
     * Get paddingBottom
     *
     * @return integer
     */
    public function getPaddingBottom()
    {
        return $this->paddingBottom;
    }

    /**
     * Set paddingRight
     *
     * @param integer $paddingRight
     *
     * @return CprColumnBlock
     */
    public function setPaddingRight($paddingRight)
    {
        $this->paddingRight = $paddingRight;

        return $this;
    }

    /**
     * Get paddingRight
     *
     * @return integer
     */
    public function getPaddingRight()
    {
        return $this->paddingRight;
    }

    /**
     * Set borderStyle
     *
     * @param string $borderStyle
     *
     * @return CprColumnBlock
     */
    public function setBorderStyle($borderStyle)
    {
        $this->borderStyle = $borderStyle;

        return $this;
    }

    /**
     * Get borderStyle
     *
     * @return string
     */
    public function getBorderStyle()
    {
        return $this->borderStyle;
    }

    /**
     * Set borderColor
     *
     * @param string $borderColor
     *
     * @return CprColumnBlock
     */
    public function setBorderColor($borderColor)
    {
        $this->borderColor = $borderColor;

        return $this;
    }

    /**
     * Get borderColor
     *
     * @return string
     */
    public function getBorderColor()
    {
        return $this->borderColor;
    }

    /**
     * Set borderSize
     *
     * @param integer $borderSize
     *
     * @return CprColumnBlock
     */
    public function setBorderSize($borderSize)
    {
        $this->borderSize = $borderSize;

        return $this;
    }

    /**
     * Get borderSize
     *
     * @return integer
     */
    public function getBorderSize()
    {
        return $this->borderSize;
    }

    /**
     * Set borderRadius
     *
     * @param integer $borderRadius
     *
     * @return CprColumnBlock
     */
    public function setBorderRadius($borderRadius)
    {
        $this->borderRadius = $borderRadius;

        return $this;
    }

    /**
     * Get borderRadius
     *
     * @return integer
     */
    public function getBorderRadius()
    {
        return $this->borderRadius;
    }

    /**
     * Set bgColor
     *
     * @param string $bgColor
     *
     * @return CprColumnBlock
     */
    public function setBgColor($bgColor)
    {
        $this->bgColor = $bgColor;

        return $this;
    }

    /**
     * Get bgColor
     *
     * @return string
     */
    public function getBgColor()
    {
        return $this->bgColor;
    }

    /**
     * Set pageOrder
     *
     * @param integer $pageOrder
     *
     * @return CprColumnBlock
     */
    public function setPageOrder($pageOrder)
    {
        $this->pageOrder = $pageOrder;

        return $this;
    }

    /**
     * Get pageOrder
     *
     * @return integer
     */
    public function getPageOrder()
    {
        return $this->pageOrder;
    }

    /**
     * Set contentText
     *
     * @param string $contentText
     *
     * @return CprColumnBlock
     */
    public function setContentText($contentText)
    {
        $this->contentText = $contentText;

        return $this;
    }

    /**
     * Get contentText
     *
     * @return string
     */
    public function getContentText()
    {
        return $this->contentText;
    }

    /**
     * Set contentHtml
     *
     * @param string $contentHtml
     *
     * @return CprColumnBlock
     */
    public function setContentHtml($contentHtml)
    {
        $this->contentHtml = $contentHtml;

        return $this;
    }

    /**
     * Get contentHtml
     *
     * @return string
     */
    public function getContentHtml()
    {
        return $this->contentHtml;
    }

    /**
     * Set htmlClass
     *
     * @param string $htmlClass
     *
     * @return CprColumnBlock
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
     * Set block
     *
     * @param \JT\PageComposerBundle\Entity\CprBlock $block
     *
     * @return CprColumnBlock
     */
    public function setBlock(\JT\PageComposerBundle\Entity\CprBlock $block = null)
    {
        $this->block = $block;

        return $this;
    }

    /**
     * Get block
     *
     * @return \JT\PageComposerBundle\Entity\CprBlock
     */
    public function getBlock()
    {
        return $this->block;
    }

    /**
     * Set otherInfo
     *
     * @param string $otherInfo
     *
     * @return CprColumnBlock
     */
    public function setOtherInfo($otherInfo)
    {
        $this->otherInfo = $otherInfo;

        return $this;
    }

    /**
     * Get otherInfo
     *
     * @return string
     */
    public function getOtherInfo()
    {
        return $this->otherInfo;
    }

    /**
     * Set form
     *
     * @param \JT\FormComposerBundle\Entity\CprForm $form
     *
     * @return CprColumnBlock
     */
    public function setForm(\JT\FormComposerBundle\Entity\CprForm $form = null)
    {
        $this->form = $form;

        return $this;
    }

    /**
     * Get form
     *
     * @return \JT\FormComposerBundle\Entity\CprForm
     */
    public function getForm()
    {
        return $this->form;
    }

    /**
     * Set bgImg
     *
     * @param \JT\FileBundle\Entity\File $bgImg
     *
     * @return CprColumnBlock
     */
    public function setBgImg(\JT\FileBundle\Entity\File $bgImg = null)
    {
        $this->bgImg = $bgImg;

        return $this;
    }

    /**
     * Get bgImg
     *
     * @return \JT\FileBundle\Entity\File
     */
    public function getBgImg()
    {
        return $this->bgImg;
    }

    /**
     * Set contentImg
     *
     * @param \JT\FileBundle\Entity\File $contentImg
     *
     * @return CprColumnBlock
     */
    public function setContentImg(\JT\FileBundle\Entity\File $contentImg = null)
    {
        $this->contentImg = $contentImg;

        return $this;
    }

    /**
     * Get contentImg
     *
     * @return \JT\FileBundle\Entity\File
     */
    public function getContentImg()
    {
        return $this->contentImg;
    }

    /**
     * Set align
     *
     * @param string $align
     *
     * @return CprColumnBlock
     */
    public function setAlign($align)
    {
        $this->align = $align;

        return $this;
    }

    /**
     * Get align
     *
     * @return string
     */
    public function getAlign()
    {
        return $this->align;
    }

    /**
     * Set color
     *
     * @param string $color
     *
     * @return CprColumnBlock
     */
    public function setColor($color)
    {
        $this->color = $color;

        return $this;
    }

    /**
     * Get color
     *
     * @return string
     */
    public function getColor()
    {
        return $this->color;
    }
}

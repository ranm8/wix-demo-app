<?php

namespace Wix\DemoBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
use Symfony\Component\Validator\Constraints as Assert;
use Wix\FrameworkBundle\Document\User;

/**
 * @MongoDB\Document(collection="users")
 * @MongoDB\UniqueIndex(keys={"instanceId"="asc", "componentId"="asc"})
 */
class ApplicationUser extends User
{
    /**
     * @MongoDB\String
     */
    protected $fontFamily;

    /**
     * @MongoDB\String
     */
    protected $fontSize;

    /**
     * @MongoDB\String
     */
    protected $titleColor;

    /**
     * @MongoDB\String
     */
    protected $textColor;

    /**
     * @MongoDB\String
     */
    protected $urlColor;

    /**
     * @MongoDB\String
     */
    protected $birthDate;

    /**
     * @MongoDB\String
     */
    protected $searchBackground;

    /**
     * @MongoDB\Boolean
     */
    protected $searchBackgroundOpacity;

    /**
     * @MongoDB\Int
     */
    protected $searchBackgroundOpacityValue;

    /**
     * @MongoDB\String
     */
    protected $searchBorder;

    /**
     * @MongoDB\Boolean
     */
    protected $searchBorderOpacity;

    /**
     * @MongoDB\Int
     */
    protected $searchBorderOpacityValue;

    /**
     * @MongoDB\String
     */
    protected $borderColor;

    /**
     * Set fontFamily
     *
     * @param string $fontFamily
     * @return \ApplicationUser
     */
    public function setFontFamily($fontFamily)
    {
        $this->fontFamily = $fontFamily;
        return $this;
    }

    /**
     * Get fontFamily
     *
     * @return string $fontFamily
     */
    public function getFontFamily()
    {
        return $this->fontFamily;
    }

    /**
     * Set fontSize
     *
     * @param string $fontSize
     * @return \ApplicationUser
     */
    public function setFontSize($fontSize)
    {
        $this->fontSize = $fontSize;
        return $this;
    }

    /**
     * Get fontSize
     *
     * @return string $fontSize
     */
    public function getFontSize()
    {
        return $this->fontSize;
    }

    /**
     * Set titleColor
     *
     * @param string $titleColor
     * @return \ApplicationUser
     */
    public function setTitleColor($titleColor)
    {
        $this->titleColor = $titleColor;
        return $this;
    }

    /**
     * Get titleColor
     *
     * @return string $titleColor
     */
    public function getTitleColor()
    {
        return $this->titleColor;
    }

    /**
     * Set textColor
     *
     * @param string $textColor
     * @return \ApplicationUser
     */
    public function setTextColor($textColor)
    {
        $this->textColor = $textColor;
        return $this;
    }

    /**
     * Get textColor
     *
     * @return string $textColor
     */
    public function getTextColor()
    {
        return $this->textColor;
    }

    /**
     * Set urlColor
     *
     * @param string $urlColor
     * @return \ApplicationUser
     */
    public function setUrlColor($urlColor)
    {
        $this->urlColor = $urlColor;
        return $this;
    }

    /**
     * Get urlColor
     *
     * @return string $urlColor
     */
    public function getUrlColor()
    {
        return $this->urlColor;
    }

    /**
     * Set birthDate
     *
     * @param string $birthDate
     * @return \ApplicationUser
     */
    public function setBirthDate($birthDate)
    {
        $this->birthDate = $birthDate;
        return $this;
    }

    /**
     * Get birthDate
     *
     * @return string $birthDate
     */
    public function getBirthDate()
    {
        return $this->birthDate;
    }

    /**
     * Set searchBackground
     *
     * @param string $searchBackground
     * @return \ApplicationUser
     */
    public function setSearchBackground($searchBackground)
    {
        $this->searchBackground = $searchBackground;
        return $this;
    }

    /**
     * Get searchBackground
     *
     * @return string $searchBackground
     */
    public function getSearchBackground()
    {
        return $this->searchBackground;
    }

    /**
     * Set searchBackgroundOpacity
     *
     * @param boolean $searchBackgroundOpacity
     * @return \ApplicationUser
     */
    public function setSearchBackgroundOpacity($searchBackgroundOpacity)
    {
        $this->searchBackgroundOpacity = $searchBackgroundOpacity;
        return $this;
    }

    /**
     * Get searchBackgroundOpacity
     *
     * @return boolean $searchBackgroundOpacity
     */
    public function getSearchBackgroundOpacity()
    {
        return $this->searchBackgroundOpacity;
    }

    /**
     * Set searchBackgroundOpacityValue
     *
     * @param int $searchBackgroundOpacityValue
     * @return \ApplicationUser
     */
    public function setSearchBackgroundOpacityValue($searchBackgroundOpacityValue)
    {
        $this->searchBackgroundOpacityValue = $searchBackgroundOpacityValue;
        return $this;
    }

    /**
     * Get searchBackgroundOpacityValue
     *
     * @return int $searchBackgroundOpacityValue
     */
    public function getSearchBackgroundOpacityValue()
    {
        return $this->searchBackgroundOpacityValue;
    }

    /**
     * Set searchBorder
     *
     * @param string $searchBorder
     * @return \ApplicationUser
     */
    public function setSearchBorder($searchBorder)
    {
        $this->searchBorder = $searchBorder;
        return $this;
    }

    /**
     * Get searchBorder
     *
     * @return string $searchBorder
     */
    public function getSearchBorder()
    {
        return $this->searchBorder;
    }

    /**
     * Set searchBorderOpacity
     *
     * @param boolean $searchBorderOpacity
     * @return \ApplicationUser
     */
    public function setSearchBorderOpacity($searchBorderOpacity)
    {
        $this->searchBorderOpacity = $searchBorderOpacity;
        return $this;
    }

    /**
     * Get searchBorderOpacity
     *
     * @return boolean $searchBorderOpacity
     */
    public function getSearchBorderOpacity()
    {
        return $this->searchBorderOpacity;
    }

    /**
     * Set searchBorderOpacityValue
     *
     * @param int $searchBorderOpacityValue
     * @return \ApplicationUser
     */
    public function setSearchBorderOpacityValue($searchBorderOpacityValue)
    {
        $this->searchBorderOpacityValue = $searchBorderOpacityValue;
        return $this;
    }

    /**
     * Get searchBorderOpacityValue
     *
     * @return int $searchBorderOpacityValue
     */
    public function getSearchBorderOpacityValue()
    {
        return $this->searchBorderOpacityValue;
    }

    /**
     * Set borderColor
     *
     * @param string $borderColor
     * @return \ApplicationUser
     */
    public function setBorderColor($borderColor)
    {
        $this->borderColor = $borderColor;
        return $this;
    }

    /**
     * Get borderColor
     *
     * @return string $borderColor
     */
    public function getBorderColor()
    {
        return $this->borderColor;
    }
}
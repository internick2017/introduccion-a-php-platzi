<?php

namespace App\Models;

class BaseElement
{
    protected $title;
    protected $description;
    protected $visible = true;
    protected $months;

    public function __construct($title, $description)
    {
        $this->title = $title;
        $this->description = $description;
    }

    public function getDurationAsString()
    {
        $years = floor($this->months / 12);
        $extraMonths = $this->months % 12;

        return "$years years $extraMonths months";
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getVisible()
    {
        return $this->visible;
    }

    public function setVisible($visible)
    {
        $this->visible = $visible;
    }

    public function getMonths()
    {
        return $this->months;
    }

    public function setMonths($months)
    {
        $this->months = $months;
    }
}

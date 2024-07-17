<?php

namespace Entities;

class Game
{
    private int $id;
    private string $title;
    private int $release_year;
    private string $jacket;
    private int $category_id;
    private int $platform_id;
    private string $description;

    // Getter et Setter pour $id
    public function getId() : int
    {
        return $this->id;
    }

    public function setId(int $id) : void
    {
        $this->id = $id;
    }

    // Getter et Setter pour $title
    public function getTitle() : string
    {
        return $this->title;
    }

    public function setTitle(string $title) : void
    {
        $this->title = $title;
    }

    // Getter et Setter pour $release_year
    public function getReleaseYear() : int
    {
        return $this->release_year;
    }

    public function setReleaseYear(int $release_year) : void
    {
        $this->release_year = $release_year;
    }

    // Getter et Setter pour $jacket
    public function getJacket() : string
    {
        return $this->jacket;
    }

    public function setJacket(string $jacket) : void
    {
        $this->jacket = $jacket;
    }

    // Getter et Setter pour $category_id
    public function getCategoryId() : int
    {
        return $this->category_id;
    }

    public function setCategoryId(int $category_id) : void
    {
        $this->category_id = $category_id;
    }

    // Getter et Setter pour $plateform_id
    public function getPlateformId() : int
    {
        return $this->platform_id;
    }

    public function setPlateformId(int $platform_id) : void
    {
        $this->platform_id = $platform_id;
    }

    // Getter et Setter pour $description
    public function getDescription() : string
    {
        return $this->description;
    }

    public function setDescription(int $description) : void
    {
        $this->description = $description;
    }
}
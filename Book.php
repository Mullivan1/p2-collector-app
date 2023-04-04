<?php

class Book
{
    private int $id;
    private string $title;
    private string $author;
    private string $genre;
    private int $year;
    private ?float $progressPercent;
    private ?float $rating;
    private ?string $coverLink;
    private ?string $grLink;

        public function __construct(
            string $title,
            string $author,
            string $genre,
            int $year,
            ?float $progressPercent = null,
            ?float $rating = null,
            ?string $coverLink = null,
            ?string $grLink = null,
            int $id = -1
    ) {
            $this->id = $id;
            $this->title = $title;
            $this->author = $author;
            $this->genre = $genre;
            $this->year = $year;
            $this->progressPercent = $progressPercent;
            $this->rating = $rating;
            $this->coverLink = $coverLink;
            $this->grLink = $grLink;
        }

    // Methods



    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getAuthor(): string
    {
        return $this->author;
    }

    public function setAuthor(string $author): void
    {
        $this->author = $author;
    }

    public function getGenre(): string
    {
        return $this->genre;
    }

    public function setGenre(string $genre): void
    {
        $this->genre = $genre;
    }

    public function getYear(): int
    {
        return $this->year;
    }

    public function setYear(int $year): void
    {
        $this->year = $year;
    }

    public function getProgressPercent(): float
    {
        return $this->progressPercent;
    }

    public function setProgressPercent(float $progressPercent): void
    {
        $this->progressPercent = $progressPercent;
    }

    public function getRating(): float
    {
        return $this->rating;
    }

    public function setRating(float $rating): void
    {
        $this->rating = $rating;
    }

    public function getCoverLink(): string
    {
        return $this->coverLink;
    }

    public function setCoverLink(string $coverLink): void
    {
        $this->coverLink = $coverLink;
    }

    public function getGrLink(): string
    {
        return $this->grLink;
    }

    public function setGrLink(string $grLink): void
    {
        $this->grLink = $grLink;
    }
}

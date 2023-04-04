<?php

class Book
{
    private int $id;
    private string $title;
    private string $author;
    private string $genre;
    private int $year;
    private float $progressPercent;
    private float $rating;
    private string $coverLink;
    private string $grLink;

        public function __construct(
            string $title,
            string $author,
            string $genre,
            int $year,
            float $progressPercent = null,
            float $rating = null,
            string $coverLink = null,
            string $grLink = null,
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



    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getAuthor(): string
    {
        return $this->author;
    }

    /**
     * @param string $author
     */
    public function setAuthor(string $author): void
    {
        $this->author = $author;
    }

    /**
     * @return string
     */
    public function getGenre(): string
    {
        return $this->genre;
    }

    /**
     * @param string $genre
     */
    public function setGenre(string $genre): void
    {
        $this->genre = $genre;
    }

    /**
     * @return int
     */
    public function getYear(): int
    {
        return $this->year;
    }

    /**
     * @param int $year
     */
    public function setYear(int $year): void
    {
        $this->year = $year;
    }

    /**
     * @return float
     */
    public function getProgressPercent(): float
    {
        return $this->progressPercent;
    }

    /**
     * @param float $progressPercent
     */
    public function setProgressPercent(float $progressPercent): void
    {
        $this->progressPercent = $progressPercent;
    }

    /**
     * @return float
     */
    public function getRating(): float
    {
        return $this->rating;
    }

    /**
     * @param float $rating
     */
    public function setRating(float $rating): void
    {
        $this->rating = $rating;
    }

    /**
     * @return string
     */
    public function getCoverLink(): string
    {
        return $this->coverLink;
    }

    /**
     * @param string $coverLink
     */
    public function setCoverLink(string $coverLink): void
    {
        $this->coverLink = $coverLink;
    }

    /**
     * @return string
     */
    public function getGrLink(): string
    {
        return $this->grLink;
    }

    /**
     * @param string $grLink
     */
    public function setGrLink(string $grLink): void
    {
        $this->grLink = $grLink;
    }
}

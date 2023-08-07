<?php

namespace Feliciencorbat\Mycospecies\Domain\Model;

use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

final class Species extends AbstractEntity
{
    protected int $id;

    protected int $cfId;

    protected string $canonicalName;

    protected string $scientificName;

    protected string $author;

    protected string $status;

    protected string $rank;

    protected ?bool $isInChampisNet = null;

    protected ?int $synonymGbifId = null;

    protected ?string $synonymCanonicalName = null;

    protected ?string $synonymScientificName = null;

    protected ?string $synonymAuthor = null;

    protected ?string $synonymStatus = null;

    protected ?string $synonymRank = null;

    protected ?int $basionymId = null;

    protected ?string $basionym = null;

    protected ?string $vernacularName = null;

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
     * @return int
     */
    public function getCfId(): int
    {
        return $this->cfId;
    }

    /**
     * @param int $cfId
     */
    public function setCfId(int $cfId): void
    {
        $this->cfId = $cfId;
    }

    /**
     * @return string
     */
    public function getCanonicalName(): string
    {
        return $this->canonicalName;
    }

    /**
     * @param string $canonicalName
     */
    public function setCanonicalName(string $canonicalName): void
    {
        $this->canonicalName = $canonicalName;
    }

    /**
     * @return string
     */
    public function getScientificName(): string
    {
        return $this->scientificName;
    }

    /**
     * @param string $scientificName
     */
    public function setScientificName(string $scientificName): void
    {
        $this->scientificName = $scientificName;
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
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @param string $status
     */
    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

    /**
     * @return string
     */
    public function getRank(): string
    {
        return $this->rank;
    }

    /**
     * @param string $rank
     */
    public function setRank(string $rank): void
    {
        $this->rank = $rank;
    }

    /**
     * @return bool|null
     */
    public function getIsInChampisNet(): ?bool
    {
        return $this->isInChampisNet;
    }

    /**
     * @param bool|null $isInChampisNet
     */
    public function setIsInChampisNet(?bool $isInChampisNet): void
    {
        $this->isInChampisNet = $isInChampisNet;
    }

    /**
     * @return int|null
     */
    public function getSynonymGbifId(): ?int
    {
        return $this->synonymGbifId;
    }

    /**
     * @param int|null $synonymGbifId
     */
    public function setSynonymGbifId(?int $synonymGbifId): void
    {
        $this->synonymGbifId = $synonymGbifId;
    }

    /**
     * @return string|null
     */
    public function getSynonymCanonicalName(): ?string
    {
        return $this->synonymCanonicalName;
    }

    /**
     * @param string|null $synonymCanonicalName
     */
    public function setSynonymCanonicalName(?string $synonymCanonicalName): void
    {
        $this->synonymCanonicalName = $synonymCanonicalName;
    }

    /**
     * @return string|null
     */
    public function getSynonymScientificName(): ?string
    {
        return $this->synonymScientificName;
    }

    /**
     * @param string|null $synonymScientificName
     */
    public function setSynonymScientificName(?string $synonymScientificName): void
    {
        $this->synonymScientificName = $synonymScientificName;
    }

    /**
     * @return string|null
     */
    public function getSynonymAuthor(): ?string
    {
        return $this->synonymAuthor;
    }

    /**
     * @param string|null $synonymAuthor
     */
    public function setSynonymAuthor(?string $synonymAuthor): void
    {
        $this->synonymAuthor = $synonymAuthor;
    }

    /**
     * @return string|null
     */
    public function getSynonymStatus(): ?string
    {
        return $this->synonymStatus;
    }

    /**
     * @param string|null $synonymStatus
     */
    public function setSynonymStatus(?string $synonymStatus): void
    {
        $this->synonymStatus = $synonymStatus;
    }

    /**
     * @return string|null
     */
    public function getSynonymRank(): ?string
    {
        return $this->synonymRank;
    }

    /**
     * @param string|null $synonymRank
     */
    public function setSynonymRank(?string $synonymRank): void
    {
        $this->synonymRank = $synonymRank;
    }

    /**
     * @return int|null
     */
    public function getBasionymId(): ?int
    {
        return $this->basionymId;
    }

    /**
     * @param int|null $basionymId
     */
    public function setBasionymId(?int $basionymId): void
    {
        $this->basionymId = $basionymId;
    }

    /**
     * @return string|null
     */
    public function getBasionym(): ?string
    {
        return $this->basionym;
    }

    /**
     * @param string|null $basionym
     */
    public function setBasionym(?string $basionym): void
    {
        $this->basionym = $basionym;
    }

    /**
     * @return string|null
     */
    public function getVernacularName(): ?string
    {
        return $this->vernacularName;
    }

    /**
     * @param string|null $vernacularName
     */
    public function setVernacularName(?string $vernacularName): void
    {
        $this->vernacularName = $vernacularName;
    }
}
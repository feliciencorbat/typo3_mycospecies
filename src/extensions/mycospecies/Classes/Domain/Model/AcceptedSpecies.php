<?php

namespace Feliciencorbat\Mycospecies\Domain\Model;

use TYPO3\CMS\Extbase\Annotation\Validate;
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

class AcceptedSpecies extends AbstractEntity
{
    #[Validate(
        [
            'validator' => 'NotEmpty'
        ]
    )]
    protected int $gbifId;

    #[Validate(
        [
        'validator' => 'StringLength',
        'options' => ['minimum' => 3, 'maximum' => 150],
        ]
    )]
    #[Validate(
        [
        'validator' => 'NotEmpty'
        ]
    )]
    protected string $scientificName;

    /**
     * @return int
     */
    public function getGbifId(): int
    {
        return $this->gbifId;
    }

    /**
     * @param int $gbifId
     */
    public function setGbifId(int $gbifId): void
    {
        $this->gbifId = $gbifId;
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
}

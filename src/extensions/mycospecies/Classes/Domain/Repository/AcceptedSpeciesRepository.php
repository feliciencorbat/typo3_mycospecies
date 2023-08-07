<?php

namespace Feliciencorbat\Mycospecies\Domain\Repository;

use TYPO3\CMS\Extbase\Persistence\QueryInterface;
use TYPO3\CMS\Extbase\Persistence\Repository;

class AcceptedSpeciesRepository extends Repository
{
    use PaginationTrait;

    protected $defaultOrderings = [
        'scientificName' => QueryInterface::ORDER_ASCENDING,
    ];
}
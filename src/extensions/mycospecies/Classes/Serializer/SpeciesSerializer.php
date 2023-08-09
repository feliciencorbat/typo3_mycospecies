<?php

namespace Feliciencorbat\Mycospecies\Serializer;

use Feliciencorbat\Mycospecies\Domain\Model\Species;
use stdClass;

class SpeciesSerializer
{
    public function serializeSpecies(Species $species): string
    {
        return json_encode([
            'id' => $species->getId(),
            'cfId' => $species->getCfId(),
            'canonicalName' => $species->getCanonicalName(),
            'scientificName' => $species->getScientificName(),
            'author' => $species->getAuthor(),
            'status' => $species->getStatus(),
            'rank' => $species->getRank()
        ]);
    }

    public function deserializeSpecies(stdClass $stdClassSpecies, int $cfId): Species
    {
        $species = new Species();
        $species->setId($stdClassSpecies->key);
        $species->setCfId($cfId);
        $species->setCanonicalName($stdClassSpecies->canonicalName);
        $species->setScientificName($stdClassSpecies->scientificName);
        $species->setAuthor($stdClassSpecies->authorship);
        $species->setStatus($stdClassSpecies->taxonomicStatus);
        $species->setRank($stdClassSpecies->rank);

        return $species;
    }

    public function serializeAutocomplete(array $speciesList): string
    {
        $jsonSpeciesList = [];
        foreach ($speciesList as $species) {
            $jsonSpecies = [
                'id' => $species->getId(),
                'canonicalName' => $species->getCanonicalName(),
                'scientificName' => $species->getScientificName(),
                'status' => $species->getStatus(),
                'rank' => $species->getRank()
            ];
            $jsonSpeciesList[] = $jsonSpecies;
        }
        return json_encode($jsonSpeciesList);
    }

    public function deserializeAutocomplete(array $stdClassSpeciesList): array
    {
        $speciesList = [];
        foreach ($stdClassSpeciesList as $stdClassSpecies) {
            $species = new Species();
            $species->setId($stdClassSpecies->key);
            $species->setCfId(0);
            $species->setCanonicalName($stdClassSpecies->canonicalName);
            $species->setScientificName($stdClassSpecies->scientificName);
            $species->setAuthor("");
            $species->setStatus($stdClassSpecies->status);
            $species->setRank($stdClassSpecies->rank);
            $speciesList[] = $species;
        }

        return $speciesList;
    }
}
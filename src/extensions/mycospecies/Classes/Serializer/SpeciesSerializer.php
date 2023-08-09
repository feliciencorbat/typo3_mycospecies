<?php

namespace Feliciencorbat\Mycospecies\Serializer;

use Feliciencorbat\Mycospecies\Domain\Model\Species;
use stdClass;
use TYPO3\CMS\Extbase\Utility\Exception\InvalidTypeException;

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
            'rank' => $species->getRank(),
            'basionym' => $species->getBasionym(),
            'vernacularName' => $species->getVernacularName(),
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
        $species->setBasionym($stdClassSpecies->basionym);
        $species->setVernacularName($stdClassSpecies->vernacularName);

        return $species;
    }

    /**
     * @throws InvalidTypeException
     */
    public function serializeAutocomplete(array $speciesList): string
    {
        $jsonSpeciesList = [];
        foreach ($speciesList as $species) {

            if ($species instanceof Species) {
                $jsonSpecies = [
                    'id' => $species->getId(),
                    'canonicalName' => $species->getCanonicalName(),
                    'scientificName' => $species->getScientificName(),
                    'status' => $species->getStatus(),
                    'rank' => $species->getRank()
                ];
                $jsonSpeciesList[] = $jsonSpecies;
            } else {
                throw new InvalidTypeException("L'élément n'est pas un objet de type Species", 500);
            }

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
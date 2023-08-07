<?php

namespace Feliciencorbat\Mycospecies\Controller;

use Exception;
use Feliciencorbat\Mycospecies\Http\GbifApi;
use Feliciencorbat\Mycospecies\Serializer\SpeciesSerializer;
use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

final class SpeciesController extends ActionController
{
    public function __construct(
        protected readonly GbifApi $gbifApi,
        protected readonly SpeciesSerializer $speciesSerializer
    )
    {}

    public function showAction(): ResponseInterface
    {
        try {
            $speciesId = (int)$this->request->getArgument('id');
            $species = $this->gbifApi->getGbifSpecies($speciesId);
            $jsonSpecies = $this->speciesSerializer->serializeSpecies($species);
            return $this->jsonResponse($jsonSpecies);
        } catch(Exception $e) {
            $jsonException = json_encode([
                'message' => $e->getMessage(),
                'status' => $e->getCode()
            ]);
            $this->throwStatus($e->getCode(), null, $jsonException);
        }
    }

    public function autocompleteAction(): ResponseInterface
    {
        try {
            $query = (string)$this->request->getArgument('query');
            $speciesList = $this->gbifApi->getGbifAutocomplete($query);
            $jsonSpeciesList = $this->speciesSerializer->serializeAutocomplete($speciesList);
            return $this->jsonResponse($jsonSpeciesList);
        } catch(Exception $e) {
            $jsonException = json_encode([
                'message' => $e->getMessage(),
                'status' => $e->getCode()
            ]);
            $this->throwStatus($e->getCode(), null, $jsonException);
        }
    }
}
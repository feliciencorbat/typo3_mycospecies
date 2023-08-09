<?php

namespace Feliciencorbat\Mycospecies\Controller;

use Exception;
use Feliciencorbat\Mycospecies\Http\GbifApi;
use Feliciencorbat\Mycospecies\Serializer\SpeciesSerializer;
use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use TYPO3\CMS\Extbase\Utility\DebuggerUtility;

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
            $speciesCfId = 0;
            if (isset($this->request->getQueryParams()['cfId'])) {
                $speciesCfId = (int)$this->request->getQueryParams()['cfId'];
            }
            $species = $this->gbifApi->getGbifSpecies($speciesId, $speciesCfId);
            $jsonSpecies = $this->speciesSerializer->serializeSpecies($species);
            return $this->jsonResponse($jsonSpecies);
        } catch(Exception $e) {
            $jsonException = json_encode([
                'message' => $e->getMessage(),
                'status' => $e->getCode()
            ]);
            return $this->jsonResponse($jsonException)->withStatus($this->getStatus($e->getCode()));
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

            return $this->jsonResponse($jsonException)->withStatus($this->getStatus($e->getCode()));
        }
    }

    private function getStatus(int $code): int
    {
        if ($code < 100 || $code >= 600)
        {
            return 400;
        } else {
            return $code;
        }
    }
}
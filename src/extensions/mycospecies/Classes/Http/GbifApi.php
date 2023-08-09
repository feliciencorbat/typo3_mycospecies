<?php

namespace Feliciencorbat\Mycospecies\Http;

use Feliciencorbat\Mycospecies\Domain\Model\Species;
use Feliciencorbat\Mycospecies\Serializer\SpeciesSerializer;
use RuntimeException;
use TYPO3\CMS\Core\Http\RequestFactory;

class GbifApi
{
	private const TAXREF_DATASET_KEY = "0e61f8fe-7d25-4f81-ada7-d970bbb2c6d6";
	private const GBIF_ROOT_PATH = 'https://api.gbif.org/v1/';

    public function __construct(
        private readonly RequestFactory $requestFactory,
        private readonly SpeciesSerializer $speciesSerializer
    ) {
    }

    /**
     * @param int $gbifId
     * @return Species
     * @throws \JsonException
     */
	public function getGbifSpecies(int $gbifId, int $cfId): Species
    {
        // Additional headers for this specific request
        // See: https://docs.guzzlephp.org/en/stable/request-options.html
        $additionalOptions = [
            'headers' => ['Cache-Control' => 'no-cache'],
            'allow_redirects' => false,
        ];

        // Get a PSR-7-compliant response object
        $response = $this->requestFactory->request(
            self::GBIF_ROOT_PATH . 'species/' . $gbifId,
            'GET',
            $additionalOptions
        );

        // test if response is not 200
        if ($response->getStatusCode() < 200 || $response->getStatusCode() >= 300) {
            throw new RuntimeException(
                'Erreur lors de la requête de code ',
                $response->getStatusCode()
            );
        }

        // test if response has valid JSON
        if ($response->getHeaderLine('Content-Type') !== 'application/json') {
            throw new RuntimeException(
                "La requête n'a pas retourné du JSON valide",
                500
            );
        }

        // transform body as stdclass
        $content = $response->getBody()->getContents();
        $stdObjectSpecies = json_decode($content, false, flags: JSON_THROW_ON_ERROR);

        return $this->speciesSerializer->deserializeSpecies($stdObjectSpecies, $cfId);
    }

    public function getGbifAutocomplete(string $query): array
    {
        // Additional headers for this specific request
        // See: https://docs.guzzlephp.org/en/stable/request-options.html
        $additionalOptions = [
            'headers' => ['Cache-Control' => 'no-cache'],
            'allow_redirects' => false,
        ];

        // Get a PSR-7-compliant response object
        $response = $this->requestFactory->request(
            self::GBIF_ROOT_PATH . 'species/suggest?q=' . $query,
            'GET',
            $additionalOptions
        );

        // test if response is not 200
        if ($response->getStatusCode() < 200 || $response->getStatusCode() >= 300) {
            throw new RuntimeException(
                'Erreur lors de la requête de code ',
                $response->getStatusCode()
            );
        }

        // test if response has valid JSON
        if ($response->getHeaderLine('Content-Type') !== 'application/json') {
            throw new RuntimeException(
                "La requête n'a pas retourné du JSON valide",
                500
            );
        }

        // transform body as stdclass
        $content = $response->getBody()->getContents();
        $stdObjectAutocomplete = json_decode($content, false, flags: JSON_THROW_ON_ERROR);
        return $this->speciesSerializer->deserializeAutocomplete($stdObjectAutocomplete);
    }
}
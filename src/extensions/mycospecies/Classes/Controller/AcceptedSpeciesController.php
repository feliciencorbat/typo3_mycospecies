<?php

namespace Feliciencorbat\Mycospecies\Controller;

use Exception;
use Feliciencorbat\Mycospecies\Domain\Model\AcceptedSpecies;
use Feliciencorbat\Mycospecies\Domain\Repository\AcceptedSpeciesRepository;
use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Backend\Attribute\Controller;
use TYPO3\CMS\Backend\Template\ModuleTemplateFactory;
use TYPO3\CMS\Core\Type\ContextualFeedbackSeverity;
use TYPO3\CMS\Extbase\Annotation\IgnoreValidation;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use TYPO3\CMS\Extbase\Persistence\Exception\IllegalObjectTypeException;
use TYPO3\CMS\Extbase\Persistence\Exception\InvalidQueryException;

#[Controller]
class AcceptedSpeciesController extends ActionController
{
    use PaginationTrait;

    const NB_ACCEPTED_SPECIES_PER_PAGE = 10;

    public function __construct(
        protected readonly AcceptedSpeciesRepository $acceptedSpeciesRepository,
        protected readonly ModuleTemplateFactory $moduleTemplateFactory,
    ) {
    }


    /**
     * @return ResponseInterface
     * @throws InvalidQueryException
     */
    public function listAction(): ResponseInterface
    {
        $itemsPerPage = AcceptedSpeciesController::NB_ACCEPTED_SPECIES_PER_PAGE;
        $allAcceptedSpecies = $this->acceptedSpeciesRepository->findAll();
        $paginationInfos = $this->paginateObjectsList($itemsPerPage, $this->request, $allAcceptedSpecies);

        $paginatedAcceptedSpecies = $this->acceptedSpeciesRepository->findPaginatedObjects($itemsPerPage, $paginationInfos[2], ['scientificName' => 'ASC']);

        $moduleTemplate = $this->moduleTemplateFactory->create($this->request);
        $moduleTemplate->assignMultiple(
            [
                'paginator' => $paginationInfos[0],
                'pagination' => $paginationInfos[1],
                'acceptedSpeciesList' => $paginatedAcceptedSpecies
            ]
        );
        return $moduleTemplate->renderResponse();
    }

    /**
     * @return ResponseInterface
     */
    #[IgnoreValidation(['argumentName' => 'newAcceptedSpecies'])]
    public function newAction(): ResponseInterface
    {
        $moduleTemplate = $this->moduleTemplateFactory->create($this->request);
        return $moduleTemplate->renderResponse();
    }

    /**
     * @throws IllegalObjectTypeException
     */
    public function createAction(AcceptedSpecies $newAcceptedSpecies): ResponseInterface
    {
        $this->acceptedSpeciesRepository->add($newAcceptedSpecies);
        return $this->redirect('list');
    }

    /**
     * @param AcceptedSpecies $acceptedSpecies
     * @return ResponseInterface
     */
    public function deleteAction(AcceptedSpecies $acceptedSpecies): ResponseInterface
    {
        try {
            $this->acceptedSpeciesRepository->remove($acceptedSpecies);
        } catch (Exception $e) {
            $this->addFlashMessage($e->getMessage(), 'Erreur', ContextualFeedbackSeverity::ERROR);
        } finally {
            return $this->redirect('list');
        }
    }
}
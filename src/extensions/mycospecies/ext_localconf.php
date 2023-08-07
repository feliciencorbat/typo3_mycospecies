<?php

declare(strict_types=1);

use Feliciencorbat\Mycospecies\Controller\SpeciesController;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Extbase\Utility\ExtensionUtility;

defined('TYPO3') or die();

ExtensionUtility::configurePlugin(
    // extension name, matching the PHP namespaces (but without the vendor)
    'mycospecies',
    // arbitrary, but unique plugin name (not visible in the backend)
    'ShowSpecies',
    // all actions
    [SpeciesController::class => 'show'],
    // non-cacheable actions
    [SpeciesController::class => 'show'],
);

ExtensionUtility::configurePlugin(
// extension name, matching the PHP namespaces (but without the vendor)
    'mycospecies',
    // arbitrary, but unique plugin name (not visible in the backend)
    'Autocomplete',
    // all actions
    [SpeciesController::class => 'autocomplete'],
    // non-cacheable actions
    [SpeciesController::class => 'autocomplete'],
);

call_user_func(
    function () {
        ExtensionManagementUtility::addTypoScript(
            'mycospecies',
            'constants',
            "@import 'EXT:mycospecies/Configuration/TypoScript/constants.typoscript'"
        );
    }
);

call_user_func(
    function () {
        ExtensionManagementUtility::addTypoScript(
            'mycospecies',
            'setup',
            "@import 'EXT:mycospecies/Configuration/TypoScript/setup.typoscript'"
        );
    }
);

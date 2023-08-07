<?php

use TYPO3\CMS\Extbase\Utility\ExtensionUtility;

defined('TYPO3') or die();

(static function (): void {
    ExtensionUtility::registerPlugin(
        // extension name, matching the PHP namespaces (but without the vendor)
        'mycospecies',
        // arbitrary, but unique plugin name (not visible in the backend)
        'ShowSpecies',
        // plugin title, as visible in the drop-down in the backend, use "LLL:" for localization
        'Show Species'
    );
})();

(static function (): void {
    ExtensionUtility::registerPlugin(
    // extension name, matching the PHP namespaces (but without the vendor)
        'mycospecies',
        // arbitrary, but unique plugin name (not visible in the backend)
        'Autocomplete',
        // plugin title, as visible in the drop-down in the backend, use "LLL:" for localization
        'Autocomplete'
    );
})();
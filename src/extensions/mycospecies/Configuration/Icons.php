<?php

use TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider;

return [
    'tx_mycospecies_logo' => [
        'provider' => SvgIconProvider::class,
        'source' => 'EXT:mycospecies/Resources/Public/Icons/icon_mycospecies.svg',
    ]
];

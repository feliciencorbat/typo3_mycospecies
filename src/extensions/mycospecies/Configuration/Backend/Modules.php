<?php

use Feliciencorbat\Mycospecies\Controller\AcceptedSpeciesController;

return [
    'module' => [
        'labels' => ['title' => 'MycoSpecies'],
        'position' => ['after' => 'web'],
        'iconIdentifier' => 'tx_mycospecies_logo',
        'extensionName' => 'mycospecies',
    ],

    'accepted_species' => [
        'parent' => 'module',
        'access' => 'user',
        'workspaces' => 'live',
        'path' => '/module/web/accepted_species',
        'labels' => ['title' => 'Espèces acceptées'],
        'extensionName' => 'mycospecies',
        'iconIdentifier' => 'tx_mycospecies_logo',
        'controllerActions' => [
            AcceptedSpeciesController::class => [
                'list', 'new', 'update', 'create', 'delete'
            ],
        ],
    ],
];

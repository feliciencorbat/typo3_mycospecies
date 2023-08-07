<?php

return [
    'ctrl' => [
        'title' => 'Espèces synonymes',
        'label' => 'scientific_name',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'delete' => 'deleted',
        'sortby' => 'sorting',
        'iconfile' => 'EXT:mycospecies/Resources/Public/Icons/icon_mycospecies.svg'
    ],
    'columns' => [
        'gbif_id' => [
            'label' => 'Gbif id',
            'config' => [
                'type' => 'input',
                'size' => 250,
                'eval' => 'trim',
                'required' => true,
            ],
        ],
        'scientific_name' => [
            'label' => 'Nom scientifique',
            'config' => [
                'type' => 'input',
                'size' => 250,
                'eval' => 'trim',
                'required' => true,
            ],
        ],
        'accepted_species' => [
            'label' => 'Espèce acceptés',
            'description' => 'Espèce acceptée',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'foreign_table' => 'tx_mycocarto_domain_model_acceptedspecies',
                'required' => true,
            ],

        ],
    ],
    'types' => [
        '0' => [
            'showitem' => 'gbif_id, scientific_name, accepted_species',
        ]
    ],
];

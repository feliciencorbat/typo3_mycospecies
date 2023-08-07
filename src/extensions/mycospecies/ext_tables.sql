CREATE TABLE tx_mycospecies_domain_model_acceptedspecies
(
    gbif_id int(11) NOT NULL,
    scientific_name varchar(255) NOT NULL,
    UNIQUE KEY unique_accepted_species_gbif_id (gbif_id, deleted),
    UNIQUE KEY unique_accepted_species_scientific_name (scientific_name, deleted)
);

CREATE TABLE tx_mycospecies_domain_model_newspecies
(
    gbif_id int(11) NOT NULL,
    parent_gbif_id int(11),
    parent_scientific_name varchar(255) NOT NULL,
    canonical_name varchar(255) NOT NULL,
    author varchar(255) NOT NULL,
    `rank` varchar(255) NOT NULL,
    UNIQUE KEY unique_new_species_gbif_id (name, deleted),
    UNIQUE KEY unique_new_species_canonical_name_author (canonical_name, author, deleted)
);

CREATE TABLE tx_mycospecies_domain_model_parentspecies
(
    gbif_id int(11) NOT NULL,
    scientific_name varchar(255) NOT NULL,
    parent_gbif_id int(11) NOT NULL,
    UNIQUE KEY unique_parent_species_gbif_id (gbif_id, deleted),
    UNIQUE KEY unique_parent_species_scientific_name (scientific_name, deleted)
);

CREATE TABLE tx_mycospecies_domain_model_removedspecies
(
    gbif_id int(11) NOT NULL,
    scientific_name varchar(255) NOT NULL,
    UNIQUE KEY unique_removed_species_gbif_id (gbif_id, deleted),
    UNIQUE KEY unique_removed_species_scientific_name (scientific_name, deleted)
);

CREATE TABLE tx_mycospecies_domain_model_synonymspecies
(
    gbif_id int(11) NOT NULL,
    scientific_name varchar(255) NOT NULL,
    accepted_species int(11) NOT NULL,
    UNIQUE KEY unique_synonym_species_gbif_id (gbif_id, deleted),
    UNIQUE KEY unique_synonym_species_scientific_name (scientific_name, deleted)
);
<?php
/**
 * Configuració general del projecte.
 * Aquest fitxer NO escriu res a la pantalla.
 */

// Dades de la botiga
const BOTIGA_NOM    = 'BotigaMolona';
const BOTIGA_LEMA   = 'La teva botiga molona';
const BOTIGA_CORREU = 'info@botigamolona.cat';

// Regles de validació
const MIN_USUARI = 4;
const MIN_CLAU   = 6;

// Rutes
const FULL_ESTILS   = 'estils.css';
const FITXER_USUARIS = __DIR__ . '/usuaris.json';   // usuaris registrats
const PAG_FORMULARI = 'registre.php';

// Fitxers de dades dels clients (Activitat 9)
const CARPETA_DADES = 'dades';
const FITXER_CSV    = 'dades/clients.csv';
const FITXER_JSON   = 'dades/clients.json';

/* Quin format es fa servir per desar: 'csv' o 'json' */
const FORMAT_DADES  = 'csv';

// USUARIOS
const USUARIS = [
    'aina' => [
        'nom' => 'Aina Puig',
        'hash' => '$2y$10$TgcVu0mOuJiRBgewBK2rc.nWpo0bAB8ivN71Qq45cMVHf.YsaOj6W'
    ],
    'marc' => [
        'nom' => 'Marc Soler',
        'hash' => '$2y$10$elpofbfXZ3GDKDqHQ/LUleLRO.H8JtjvoVI2FOmIF3bo1eUrOlE/C'
    ],
    
];
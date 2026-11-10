<?php
/**
 * Funcions pròpies del projecte.
 * Aquest fitxer NO escriu res a la pantalla.
 */

/**
 * Recull un camp de text del formulari ja net d'espais.
 *
 * @param string $camp    Nom del camp (l'atribut name del formulari)
 * @param string $defecte Valor si el camp no ha arribat
 * @return string         El valor net
 */
function camp(string $camp, string $defecte = ''): string
{
    return trim($_POST[$camp] ?? $defecte);
}

/**
 * Converteix la clau de l'array en una etiqueta llegible.
 *
 * @param string $clau Clau de l'array ('codipostal', 'naixement'...)
 * @return string      Etiqueta per mostrar a la taula
 */
function etiqueta(string $clau): string
{
    $noms = [
        'nom'           => 'Nom',
        'cognoms'       => 'Cognoms',
        'naixement'     => 'Data de naixement',
        'telefono'      => 'Telèfon',
        'correu'        => 'Correu electrònic',
        'nomusu'        => 'Nom d\'usuari',
        'Carrerinúmero' => 'Carrer i número',
        'poblacio'      => 'Població',
        'codipostal'    => 'Codi postal',
        'origen'        => 'Com ens has conegut',
        'newsletter'    => 'Vol rebre el butlletí',
        'condiciones'   => 'Ha acceptat les condicions',
        'tipo'          => 'Tipus de client',
    ];

    return $noms[$clau] ?? ucfirst($clau);
}

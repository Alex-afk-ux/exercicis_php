<?php
/**
 * Retorna tots els usuaris: els de config.php i els registrats a usuaris.json.
 *
 * @return array Llista [nom d'usuari => ['nom' => ..., 'hash' => ...]]
 */
function carregaUsuaris(): array
{
    $registrats = [];

    if (is_file(FITXER_USUARIS)) {
        $dades = json_decode((string) file_get_contents(FITXER_USUARIS), true);
        if (is_array($dades)) {
            $registrats = $dades;
        }
    }

    // Els de config.php manen si hi ha algun nom repetit
    return array_merge($registrats, USUARIS);
}

/**
 * Diu si un nom d'usuari ja existeix (sense distingir majúscules).
 */
function existeixUsuari(string $nomusu): bool
{
    return isset(carregaUsuaris()[mb_strtolower($nomusu)]);
}

/**
 * Desa un usuari nou a usuaris.json amb la contrasenya xifrada.
 *
 * @param string $nomusu Nom d'usuari (es desa en minúscules)
 * @param string $nom    Nom complet per mostrar
 * @param string $clau   Contrasenya en text pla (es desa només el hash)
 * @return bool          true si s'ha pogut desar
 */
function desaUsuari(string $nomusu, string $nom, string $clau): bool
{
    $dades = [];

    if (is_file(FITXER_USUARIS)) {
        $llegit = json_decode((string) file_get_contents(FITXER_USUARIS), true);
        if (is_array($llegit)) {
            $dades = $llegit;
        }
    }

    $dades[mb_strtolower($nomusu)] = [
        'nom'  => $nom,
        'hash' => password_hash($clau, PASSWORD_DEFAULT),
    ];

    $json = json_encode($dades, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

    return file_put_contents(FITXER_USUARIS, $json, LOCK_EX) !== false;
}

/**
 * Comprova un usuari i una contrasenya contra la llista d'usuaris.
 *
 * @param string $usuari Nom d'usuari escrit al formulari
 * @param string $clau   Contrasenya escrita al formulari
 * @return array|null    Dades de l'usuari, o null si no són correctes
 */
function comprovaCredencials(string $usuari, string $clau): ?array
{
    $usuari  = mb_strtolower($usuari);
    $usuaris = carregaUsuaris();

    if (!isset($usuaris[$usuari])) {
        return null;
    }

    if (!password_verify($clau, $usuaris[$usuari]['hash'])) {
        return null;
    }

    return $usuaris[$usuari];
}

/**
 * Neteja un camp enviat per POST (el login.php i processa.php l'utilitzen).
 * Si el camp no existeix o queda buit, retorna el valor per defecte.
 * Si ja el tens definit d'abans (Activitat 3 o 6), esborra aquest.
 *
 * @param string $nom     Nom del camp del formulari
 * @param string $defecte Valor a retornar si el camp és buit o no existeix
 */
if (!function_exists('camp')) {
    function camp(string $nom, string $defecte = ''): string
    {
        $valor = trim($_POST[$nom] ?? '');

        return $valor !== '' ? $valor : $defecte;
    }
}

function etiqueta(string $clau): string
{
    $noms = [
        'nom'         => 'Nom',
        'cognoms'     => 'Cognoms',
        'naixement'   => 'Data de naixement',
        'telefono'    => 'Telèfon',
        'correu'      => 'Correu electrònic',
        'nomusu'      => 'Nom d\'usuari',
        'carrer'      => 'Carrer i número',
        'poblacio'    => 'Població',
        'codipostal'  => 'Codi postal',
        'origen'      => 'Com ens has conegut',
        'newsletter'  => 'Vol rebre el butlletí',
        'condiciones' => 'Ha acceptat les condicions',
        'tipo'        => 'Tipus de client',
    ];

    return $noms[$clau] ?? ucfirst($clau);
}

/**
 * Afegeix un client al fitxer CSV.
 *
 * @param array $client Array associatiu amb les dades del client
 * @return bool         true si s'ha pogut desar
 */
function desaClientCsv(array $client): bool
{
    if (!is_dir(CARPETA_DADES)) {
        mkdir(CARPETA_DADES, 0777, true);
    }

    $esNou = !file_exists(FITXER_CSV);

    $fitxer = fopen(FITXER_CSV, 'a');
    if ($fitxer === false) {
        return false;
    }

    // La fila de capçaleres només la primera vegada
    if ($esNou) {
        fputcsv($fitxer, array_keys($client));
    }

    fputcsv($fitxer, array_values($client));
    fclose($fitxer);

    return true;
}

/**
 * Llegeix tots els clients del CSV.
 *
 * @return array Array d'arrays associatius
 */
function llegeixClientsCsv(): array
{
    if (!file_exists(FITXER_CSV)) {
        return [];
    }

    $fitxer = fopen(FITXER_CSV, 'r');
    if ($fitxer === false) {
        return [];
    }

    $capcaleres = fgetcsv($fitxer);   // la primera linia

    $clients = [];
    while (($fila = fgetcsv($fitxer)) !== false) {
        // Una línia buida dona [null]: la saltem
        if ($fila === [null] || count($fila) !== count($capcaleres)) {
            continue;
        }
        $clients[] = array_combine($capcaleres, $fila);
    }

    fclose($fitxer);

    return $clients;
}

/**
 * Llegeix tots els clients del JSON.
 */
function llegeixClientsJson(): array
{
    if (!file_exists(FITXER_JSON)) {
        return [];
    }

    $text = file_get_contents(FITXER_JSON);

    // El true fa que torni arrays associatius i no objectes
    $clients = json_decode($text, true);

    // Si el fitxer esta malmes, json_decode torna null
    if (!is_array($clients)) {
        return [];
    }

    return $clients;
}

/**
 * Afegeix un client al fitxer JSON (llegir tot, afegir, reescriure tot).
 */
function desaClientJson(array $client): bool
{
    if (!is_dir(CARPETA_DADES)) {
        mkdir(CARPETA_DADES, 0777, true);
    }

    // 1. llegir-ho tot
    $clients = llegeixClientsJson();

    // 2. afegir-hi el nou
    $clients[] = $client;

    // 3. reescriure-ho tot
    $text = json_encode($clients,
        JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

    return file_put_contents(FITXER_JSON, $text) !== false;
}

/**
 * Desa un client en el format triat a config.php (FORMAT_DADES).
 */
function desaClient(array $client): bool
{
    if (FORMAT_DADES === 'json') {
        return desaClientJson($client);
    }

    return desaClientCsv($client);
}

/**
 * Llegeix els clients en el format triat a config.php (FORMAT_DADES).
 */
function llegeixClients(): array
{
    if (FORMAT_DADES === 'json') {
        return llegeixClientsJson();
    }

    return llegeixClientsCsv();
}

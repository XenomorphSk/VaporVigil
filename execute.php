<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $button = $_POST['button'];

    switch ($button) {
        case 'nmap':
            $script = './nmap.pl';
            break;
        case 'direnum':
            $script = 'perl direnum.pl';
            break;
        case 'subenum':
            $script = 'perl subenum.pl';
            break;
        case 'rid':
            $script = 'perl rid.pl';
            break;
        case 'sql':
            $script = 'perl sql.pl';
            break;
        default:
            echo 'Invalid button';
            exit;
    }

    // Executa o script Perl
    $output = shell_exec($script);

    // Retorna o nome do arquivo de saída
    echo 'output.txt';
}
?>

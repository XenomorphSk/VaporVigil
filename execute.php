<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';

    if ($action === 'start') {
        startPhpServer();
        echo 'Servidor PHP iniciado.';
    } elseif ($action === 'stop') {
        stopPhpServer();
        echo 'Servidor PHP encerrado.';
    } else {
        $button = $_POST['button'];
        $target = $_POST['target'];

        error_log("Button clicked: " . $button);
        error_log("Target: " . $target);

        switch ($button) {
            case 'nmap':
                $command = 'nmap -Pn ' . escapeshellarg($target);
                break;
            case 'direnum':
                $command = 'perl direnum.pl';
                break;
            case 'subenum':
                $command = 'perl subenum.pl';
                break;
            case 'rid':
                $command = 'enum4linux/./enum4linux.pl ' . escapeshellarg($target);
                break;
            case 'sql':
                $command = 'perl sql.pl';
                break;
            default:
                echo 'Invalid button';
                exit;
        }

        error_log("Executing command: " . $command);

        // Executa o comando
        $output = shell_exec($command);

        error_log("Command output: " . $output);

        // Retorna o output
        echo $output;
    }
}

function startPhpServer() {
    exec('nohup php -S localhost:8000 > /dev/null 2>&1 &');
}

function stopPhpServer() {
    exec('pkill -f "php -S localhost:8000"');
}
?>

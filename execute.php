<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';

    if ($action === 'start') {
        startPhpServer();
        echo json_encode(['message' => 'Servidor PHP iniciado.', 'url' => 'results.php']);
    } elseif ($action === 'stop') {
        stopPhpServer();
        echo json_encode(['message' => 'Servidor PHP encerrado.', 'url' => '']);
    } else {
        $button = $_POST['button'];
        $target = $_POST['target'];

        error_log("Button clicked: " . $button);
        error_log("Target: " . $target);

        switch ($button) {
            case 'nmap':
                $command = 'nmap -Pn ' . escapeshellarg($target) . ' > output.txt';
                break;
            case 'direnum':
                $command = 'perl direnum.pl > output.txt';
                break;
            case 'subenum':
                $command = 'perl subenum.pl > output.txt';
                break;
            case 'rid':
                $command = 'enum4linux/./enum4linux.pl ' . escapeshellarg($target) . ' > output.txt';
                break;
            case 'sql':
                $command = 'perl sql.pl > output.txt';
                break;
            default:
                echo json_encode(['error' => 'Invalid button']);
                exit;
        }

        error_log("Executing command: " . $command);

        // Executa o comando
        shell_exec($command);

        // Retorna a URL da página de resultados
        echo json_encode(['url' => 'results.php']);
    }
}

function startPhpServer() {
    exec('nohup php -S localhost:8000 > /dev/null 2>&1 &');
}

function stopPhpServer() {
    exec('pkill -f "php -S localhost:8000"');
}
?>

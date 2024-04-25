<?php
if (file_exists('output.txt')) {
    $output = file_get_contents('output.txt');
    echo "<pre>" . htmlspecialchars($output) . "</pre>";
} else {
    echo "Nenhum dado foi fornecido.";
}
?>

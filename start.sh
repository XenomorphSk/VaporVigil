#!/bin/bash

# Função para iniciar o servidor PHP
start_php_server() {
    php -S localhost:8000 > /dev/null 2>&1 &
    echo "Servidor PHP iniciado em http://localhost:8000/"
}

# Função para encerrar o servidor PHP
stop_php_server() {
    pkill -f "php -S localhost:8000"
    echo "Servidor PHP encerrado."
}

# Verifica os argumentos passados para o script
if [ "$1" == "start" ]; then
    # Verifica se o nmap está instalado
    if ! command -v nmap &> /dev/null; then
        echo "Instalando nmap..."
        sudo apt update
        sudo apt install -y nmap
    else
        echo "nmap já está instalado."
    fi

    # Verifica se o git está instalado
    if ! command -v git &> /dev/null; then
        echo "Instalando git..."
        sudo apt update
        sudo apt install -y git
    else
        echo "git já está instalado."
    fi

    # Clona o repositório enum4linux se ainda não estiver clonado
    if [ ! -d "enum4linux" ]; then
        echo "Clonando o repositório enum4linux..."
        git clone https://github.com/CiscoCXSecurity/enum4linux.git
        chmod +x enum4linux
    else
        echo "Repositório enum4linux já foi clonado."
    fi

    start_php_server

elif [ "$1" == "stop" ]; then
    stop_php_server
else
    echo "Uso: $0 <start|stop>"
fi

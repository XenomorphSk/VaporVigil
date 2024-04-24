**VaporVigil



VaporVigil é uma ferramenta integrada de Pentest e OSINT (Open Source Intelligence) projetada para facilitar a coleta e análise de informações de diversas fontes online.
Funcionalidades
Pentest

    Nmap: Escaneamento de portas e serviços em redes.
    Direnum: Enumeração de diretórios em servidores web.
    Subenum: Enumeração de subdomínios para um domínio específico.
    RID: Identificação e análise de informações de identificação.
    SQL Injection: Teste de vulnerabilidade SQL em aplicações web.

OSINT (Open Source Intelligence)

    Foothold: Coleta inicial de informações sobre um alvo, incluindo domínios, IPs, e informações básicas.
    Análise de Perfil: Coleta de informações de perfil em redes sociais e plataformas online.
    Enumeração de Contas: Identificação e enumeração de contas relacionadas ao alvo.

Pré-requisitos

    PHP
    Perl
    Nmap
    Acesso à internet

Instalação e Uso

    Clonar o Repositório

    bash

git clone https://github.com/seu-usuario/VaporVigil.git

Navegar até o Diretório

bash

cd VaporVigil

Executar o Servidor PHP

bash

    php -S localhost:8000

    Acessar a Interface
        Abra um navegador web e acesse http://localhost:8000/interface/menu.html

    Uso
        Clique nos botões para executar os respectivos scripts e visualizar as saídas.

Estrutura de Diretórios

    interface: Contém a interface web do VaporVigil.
    execute.php: Script PHP para executar os scripts Perl.
    nmap.pl: Script Perl para executar o Nmap.
    direnum.pl: Script Perl para executar o Direnum.
    subenum.pl: Script Perl para executar o Subenum.
    rid.pl: Script Perl para executar o RID.
    sql.pl: Script Perl para executar a SQL Injection.
    output.txt: Arquivo de saída onde as informações são armazenadas.

Contribuição

Contribuições são bem-vindas! Sinta-se à vontade para abrir uma issue ou enviar um pull request.**

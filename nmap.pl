#!/usr/bin/perl
use strict;
use warnings;
use Net::Nmap::Parser;

# Defina o comando nmap
my $command = 'nmap -sT -p 22,80,443 127.0.0.1';

# Execute o comando e capture a saída
my $output = `$command`;

# Crie um objeto Net::Nmap::Parser e analise a saída
my $parser = Net::Nmap::Parser->new($output);

# Itere sobre os hosts e portas encontrados
foreach my $host ($parser->get_host()) {
    print "Host: " . $host->addr . "\n";
    
    foreach my $port ($host->get_port()) {
        print "  Porta: " . $port->portid . " - Estado: " . $port->state . "\n";
    }
}

open(my $fh, '>', 'output.txt') or die "Não foi possível abrir o arquivo 'output.txt' $!";
print $fh "Sua saída aqui...\n";
close $fh;
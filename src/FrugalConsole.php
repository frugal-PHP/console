<?php

$commandsAvailable = [];
if(file_exists(getcwd().'/config/plugins.php'))
{
    echo "Chargement des plugins";
    $plugins = require getcwd().'/config/plugins.php';

    foreach($plugins as $plugin) {
        if(method_exists($plugin, 'registerCliCommands')) {
            $commandsAvailable[] = $plugin::registerCliCommands();
        }
    }
} else {
    echo "Fichier ./config/plugins.php manquant";
}

$commandToExecute = $argv[1];

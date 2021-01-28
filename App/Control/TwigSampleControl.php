<?php

use Livro\Control\Page;

class TwigSampleControl extends Page{
    public function __construct(){
        parent::__construct();
        require_once'Lib/Livro/Autoloader.php';
        Twig_Autoloader::register();

        $loader    = new Twi_loader_Filesystem('App/Resuorces');
        $twgi      = new Twig_Enviroment($loader);
        $template  = $twig->loadTeamplate('form.html');

        $replaces = array();
        $replaces['title'] = 'Form Junio';
        $replaces['action'] = 'index.php?class=TwigSampleControl&method=onGravar';
        $replaces['nome'] = 'Wasgington';
        $replaces['endereco'] = 'Rua da glória';
        $replaces['telefone'] = '(71)98822-1520';

        $content = $template->render($replaces);
        echo $content;
    }
    public function onGravar(){
        echo "<pre>";
        var_dump($_POST);
        echo "</pre>\n";
    }
}
?>
<?php
function cabecalho(){
    session_start();
    $menu = $GLOBALS["menu"];
    echo "<!DOCTYPE html>
    <html lang='pt-br'>
        <head>
            <meta charset='utf-8' />
            <script src='js/jquery-3.5.1.min.js'></script>
            <script src='js/md5.js'></script>
            <script src='js/cadastro.js'></script>";
    echo '
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js" integrity="sha384-LtrjvnR4Twt/qOuYxE721u19sVFLVSA4hf/rRt6PrZTmiPltdZcI7q7PXQBYTKyf" crossorigin="anonymous"></script>
        ';

    echo "<link href='css/main.css' rel='stylesheet' />                    
        </head>
        <body>                
            <nav class='navbar navbar-expand-md fundo navbar-dark'>
            <a href='index.php' class='navbar-brand logotipo'>
                <img src='img/logo.png' class='rounded' width='120' height='100'/>
            </a>

            <!-- botão que aparece quando a tela for pequena -->
            <button class='navbar-toggler' type='button'
                data-toggle='collapse' data-target='#menu'>
                <span class='navbar-toggler-icon'></span>
            </button>

            <div class='collapse navbar-collapse' id='menu'>
                <ul class='navbar-nav'>";

                if(isset($_SESSION["usuario"])){
                    if($_SESSION["permissao"]=='1'){
                        echo"<li role='presentation' class='dropdown'>
                            <a class='dropdown-toggle font-italic font-weight-bold ' data-toggle='dropdown' href='#' role='button' aria-haspopup='true' aria-expanded='true'>
                            Cadastrar <span class='caret'></span>
                            </a>
                            <ul class='dropdown-menu'>";                        
                            foreach($menu as $i=>$l){
                                echo "<li class='nav-item'>
                                        <a class='menu' href='form_$i.php'>$l</a>
                                    </li>";
                            }  
                            echo"
                            </ul>
                        </li>
                        <li role='presentation' class='dropdown'>
                            <a class='dropdown-toggle  font-italic font-weight-bold ' data-toggle='dropdown' href='#' role='button' aria-haspopup='true' aria-expanded='false'>
                            Listar <span class='caret'></span>
                            </a>
                            <ul class='dropdown-menu'>";                        
                            foreach($menu as $i=>$l){
                                echo "<li class='nav-item'>
                                        <a class='menu' href='lista_$i.php'>$l</a>
                                    </li>";
                            }  
                            echo"
                            </ul>
                        </li>
                        
                    ";
                    } else if(($_SESSION["permissao"])=='2'){

                    echo"<li role='presentation' class='dropdown'>
                            <a class='dropdown-toggle font-italic font-weight-bold ' data-toggle='dropdown' href='#' role='button' aria-haspopup='true' aria-expanded='true'>
                            Cadastrar <span class='caret'></span>
                            </a>
                            <ul class='dropdown-menu'>                    
                                <li class='nav-item'>
                                    <a class='menu' href='form_livro.php'> Meu Livro</a>
                                </li>
                            </ul>
                        </li>
                        <li role='presentation' class='dropdown'>
                            <a class='dropdown-toggle font-italic font-weight-bold ' data-toggle='dropdown' href='#' role='button' aria-haspopup='true' aria-expanded='true'>
                            Listar <span class='caret'></span>
                            </a>
                            <ul class='dropdown-menu'>                    
                                <li class='nav-item'>
                                    <a class='menu' href='lista_autor.php'>Meus Dados</a>
                                </li>
                                <li class='nav-item'>
                                    <a class='menu' href='lista_livro.php'>Meus Livros</a>
                                </li>
                            </ul>
                        </li>";
                    } else if (($_SESSION["permissao"])=='3'){

                        echo"
                        <li role='presentation' class='dropdown'>
                        <a class='dropdown-toggle font-italic font-weight-bold ' data-toggle='dropdown' href='#' role='button' aria-haspopup='true' aria-expanded='true'>
                        Listar <span class='caret'></span>
                        </a>
                        <ul class='dropdown-menu'>                    
                            <li class='nav-item'>
                                <a class='menu' href='lista_leitor.php'>Meus Dados</a>
                            </li>
                            <li class='nav-item'>
                                <a class='menu' href='lista_livro.php'>Livros</a>
                            </li>
                        </ul>
                    </li>";
                        }
                        echo"<li>
                            <ul class='navbar-nav'>
                                <li role='presentation'>
                                    <a class='font-italic font-weight-bold '  href='encerrar.php'>
                                    Sair <span class='caret'></span>
                                    </a>
                                </li>
                            </ul>
                        </li>";
                }else{

                echo"
                <li role='presentation' class='dropdown'>
                <a class='dropdown-toggle font-italic font-weight-bold ' data-toggle='dropdown' href='#' role='button' aria-haspopup='true' aria-expanded='true'>
                Cadastre-se <span class='caret'></span>
                </a>
                <ul class='dropdown-menu'>                    
                    <li class='nav-item'>
                        <a class='menu' href='form_leitor.php'>Leitor</a>
                    </li>
                    <li class='nav-item'>
                        <a class='menu' href='form_autor.php'>Autor</a>
                    </li>
                </ul>
            </li>
                    <li>
                        <ul class='navbar-nav'>
                            <li role='presentation'>
                                <a class='font-italic font-weight-bold ' data-toggle='modal' href='#' data-target='#modal_login'>
                                Login <span class='caret'></span>
                                </a>
                            </li>
                        </ul>
                    </li>";
                }   
                echo" </ul>      
            </div>        
        </nav>";
        if(isset($_GET["erro"])){
            echo "<div id='erro'>Erro na Autenticação</div>";
        }
        echo"<main role='main' class='container'>";
        include "modal_cab.php";
}
?>
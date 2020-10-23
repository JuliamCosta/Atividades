<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MusicPlayer</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-grid.css">
    <link rel="stylesheet" href="css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="css/bootstrap-reboot.css">
    <link rel="stylesheet" href="css/bootstrap-reboot.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/estilo.css">
    <script src="js/bootstrap.bundle.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="jquery-3.5.1.min.js"></script>
</head>
<body>
    <div class="fundo py-4" style="background-image:url(img/fundo1.png)">
		<div>
            <div>
                <h1 class="display-4 font-italic font-weight-normal text-white text-center">MusicPlayer</h1>
            </div>
        </div>
    </div>
    <div class="text-center py-4">
            <h2 class="font-weight-bordel">Seja bem-vindo!</h2>
    </div>
    <div class="row mb-2 py-4 text-center px-5">
        <div class="col-md-6 text-dark">
            <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative bg-light">
            <div class="col p-4 d-flex flex-column position-static">
                <h2 class=" mb-0 display-5 font-weight-normal-bold">Cadastrar</h2><br/>
                <h2 class="mb-0 font-weight-normal lista"><a href="form_genero.php">Gênero </a></h2>
                <h2 class="mb-0 font-weight-normal lista"><a href="form_banda.php">Banda </a></h2>
                <h2 class="mb-0 font-weight-normal lista"><a href="form_musica.php">Música </a></h2>
                <h2 class="mb-0 font-weight-normal lista"><a href="form_playlist.php">Playlist </a></h2>
              
            </div>
            </div>
        </div>
        <div class="col-md-6 text-dark">
            <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative bg-light">
            <div class="col p-4 d-flex flex-column position-static">
                <h2 class="mb-0 display-5 font-weight-normal-bold">Listar</h2><br/>
                <h2 class="mb-0 font-weight-normal lista"><a href="listar_genero.php">Gênero </a></h2>
                <h2 class="mb-0 font-weight-normal lista"><a href="listar_banda.php">Banda </a></h2>
                <h2 class="mb-0 font-weight-normal lista"><a href="listar_musica.php">Música </a></h2>
                <h2 class="mb-0 font-weight-normal lista"><a href="listar_playlist.php">Playlist </a></h2>  
            </div>
            </div>
        </div>
        </div>
        <?php include "rodape.inc"; ?>
    </body>
</html>
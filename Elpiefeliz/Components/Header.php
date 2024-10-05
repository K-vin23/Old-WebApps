<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Components/Designs/Header.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="Components/Designs/cardmodelos.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</head>
<body class="grid-container">
    <header class="flex-container">
        <img src="IMG/Elpiefeliz Dall-E.webp" alt="">
        <nav class="nav">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                    Tipos
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="Index.php?controller=Modelos&action=lista">Todo</a></li>
                    <div class="dropdown-divider"></div>
                    <li><a class="dropdown-item" href="Index.php?controller=Modelos&action=getByType&id=ZAPT">Zapatillas</a></li>
                    <li><a class="dropdown-item" href="Index.php?controller=Modelos&action=getByType&id=TACN">Tacones</a></li>          
                    <li><a class="dropdown-item" href="Index.php?controller=Modelos&action=getByType&id=BOOT">Botas</a></li>
                    <li><a class="dropdown-item" href="Index.php?controller=Modelos&action=getByType&id=BOTI">Botines</a></li>
                    <li><a class="dropdown-item" href="Index.php?controller=Modelos&action=getByType&id=MCIN">Mocacines</a></li>
                    <li><a class="dropdown-item" href="Index.php?controller=Modelos&action=getByType&id=SAND">Sandalias</a></li>
                </ul>
            </li>
            <a class="nav-link" href="#">Marcas</a>
            <a class="nav-link" href="#">En oferta</a>
            <a class="nav-link" href="">Contactanos</a>
        </nav>
    </header>
    

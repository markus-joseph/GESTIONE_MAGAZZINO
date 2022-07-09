<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestione magazzino</title>
    <!--STYLE CSS-->
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <!--CONTAINER TITLE SITE -->
    <div class="container-title">
        <h1>GESTIONALE</h1>
    </div>

    <!--CONTAINER FORM -->
    <div class="container-form">
        <form action="./gm_distribution.php" method="post" class="form-gm">
            <label for="nome_prodotto">Nome Prodotto</label>
            <input type="text" name="nome_prodotto" id="nomeProdotto" required>
            <label for="descrizione_prodotto">Descrizione del prodotto</label>
            <input type="text" name="descrizione_prodotto" id="descrizioneProdotto" required>
            <label for="prezzo_prodotto">Prezzo del prodotto</label>
            <input type="number" name="prezzo_prodotto" id="prezzoDelProdotto" required step="0.01">
            <label for="quantita_prodotto">Quantità del prodotto</label>
            <input type="number" name="quantita_prodotto" id="quantitaProdotto" required>
            <input type="submit" value="Inserisci prodotto" class="submit">
        </form>
    </div> 

    <!--CONTAINER PRODUCT -->
    <div class="container-product">
        <h1>CARRELLO</h1>
        <!--CONTAINER PRODUCT ELEMENT -->
        <div class="container-product-element">
            <!--CONTAINER $_SESSION if not exsist -->
            <?php if(!isset($_SESSION['store'])){?>
                <h1>non ci sono prodotti nel carrello</h1>
            <?php }else{ ?>
                <!--CONTAINER $_SESSION is start -->
                <table>
                    <caption>LISTA PRODOTTI</caption>
                        <thead>
                            <tr>
                                <th>Nome prodotto</th>
                                <th>Descrizione</th>
                                <th>Prezzo prodotto</th>
                                <th>Quantità</th>
                            </tr>
                        </thead>
                        <tbody>
            <?php foreach ($_SESSION['store'] as $key) {?>
                            <tr>
                                <td><?=$key['Nome prodotto']?></td>
                                <td><?=$key['Descrizione']?></td>
                                <td><?=$key['Prezzo prodotto']?></td>
                                <td><?=$key['Quantità']?></td>
                            <?php }?>
                            </tr>
                        </tbody>
                </table>
                
                <?php }?>
        </div>
                <!--CONTAINER MODIFIED PRODUCT -->
        <div class="container-modified-product cmp-hide">
                <!--CONTAINER CLOSE WINDOWS - JAVASCRIPT CODE -->
            <div class="close-this-modifiel">
                <div class="container-title-windows">
                    <h1>Modifica prodotto</h1>
                </div>
                <img src="./img/close.png" alt="close" class="close-window">
            </div>
                <!--CONTAINER PHP CODE - MODIFIED ELEMENT -->
            <div class="container-php-code-modified">
                <?php if(!isset($_SESSION['store'])){?>
                    <h1 class="">Non ci sono prodotti da modificare</h1>
                <?php }else{?>
                    <h1>Seleziona l'elemento da modificare</h1>
                    
                <?php }?>
            </div>
        </div>
    </div>
                <!--CONTAINER TOOL - ELEMENT -->
    <div class="container-tool-element">
        <h1>Strumenti Gestionale</h1>
                <!--CONTAINER TOOL - DELETE DATABASE -->
        <form action="./destroy_session.php" method="post" class="form-delete-session">
            <input type="submit" value="Cancella Database">
        </form>
                <!--CONTAINER TOOL - BUTTON MODIFIED PRODUCT -->
        <button class="button-mod-element">Modifica prodotto</button>
    </div>

    <script src="./script.js"></script>
</body>
</html>
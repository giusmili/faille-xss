<?php
    class User{
        static $title = "Fail XSS - (Cross-Site Scripting)";
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= User::$title ?></title>
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="https://matcha.mizu.sh/matcha.css">
</head>
<body>
    <header>
        <h1>
            ⚡️<?= User::$title ?>
                
        </h1>
    </header>

    <main>
        <fieldset>
            <legend>
            📝
            Ajoutez un commentaire
            </legend>
           <!--  attention le script intégré dans la balise form est provisoire -->
            <form method="post">
        <label for="comment">Votre commentaire :</label><br>
        <textarea id="comment" name="comment" rows="4" cols="50"></textarea><br>
        <button type="submit">Envoyer</button>
    </form>

    <h2>Commentaires : &lt;/&gt;</h2>
        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $comment = $_POST['comment'];
            // Ajout direct sans filtrage
            # print "<p>$comment</p>";

            # avec filtrage
            print "<p>✏️<kbd>" . htmlspecialchars($comment, ENT_QUOTES, 'UTF-8') . "</kbd></p>";
        }
        ?>
    
        </fieldset>
    </main>
    <?php
        # date and format
        $_date = new dateTime()
    ?>
    <!-- <img src="https://evalian.co.uk/wp-content/uploads/2022/03/XSS-attacks-what-is-cross-site-scripting.png" alt=""> -->
    <footer>
        <p>
            &copy; - PHP - <?= $_date->format("Y") ?>
        </p>
    </footer>
    
</body>
</html>
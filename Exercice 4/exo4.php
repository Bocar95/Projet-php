<?php

    $formValide= false;
    $text="";

    
// TRAITEMENT DES PHRASES QUI SONT DANS LE TEXTAREA.

    if (isset($_POST['envoie'])){        
        if (isset($_POST['text'])){
            $text=$_POST['text'];
            $text = trim($text);
            $text= preg_replace('#\s+#', ' ', $text);
            $text= preg_replace('#\s+[.]#', '.', $text);
            $text= preg_replace('#\s+[!]#', '!', $text);
            $text= preg_replace('#\s+[?]#', '?', $text);
            $text= preg_replace('#\s+[,]#', ',', $text);
            $text= preg_replace('#\s+[;]#', ';', $text);
            $text= preg_replace('#\s+[\']#', '\'', $text);
            $text= preg_replace('#[\']+\s+#', '\'', $text);
            $text= preg_split ("/([^.!?]+[.!?]+)/", $text, -1, PREG_SPLIT_DELIM_CAPTURE | PREG_SPLIT_NO_EMPTY);

            $formValide= true;
            }
    }
?>

<!-- PARTIE HTML POUR L'AFFICHAGE DES TEXTAREA -->

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Document</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

    <center>
        <p><strong>Saisir autant de phrase que vous voulez dans la zone de saisi.</strong></p>
        <form method="POST" action="">
            <textarea max-lenght="200" cols="100" rows="10" name="text" placeholder="Saisir"><?= $_POST['text'] ?></textarea>
            <input type="submit" name="envoie" value="envoie">
            <br>
            <br>
        </form>     
    </center>


<?php
    if ($formValide){      
?>
    <center>
        <p style="color: red;"><strong>Aprés correction, nous avons les phrases suivantes: </strong></p>
            <textarea readonly cols="100" rows="10"><?php foreach ($text as $i){echo '-'.$i; ?>
            
<?php
                }
                ?>
            </textarea>
    </center>
<?php
       
    }
?>
          
    </body>
</html>
<?php            
//Logika, kas apstrada / izvada formas datus
if (isset($_POST['form-submit']))
{
    echo "Forma aizpildita!<br />";
    echo "Noraditais vards: {$_POST['fname']}<br />";
    echo "Noraditais uzvards: {$_POST['lname']}<br />";
    echo "<hr />";
}
else
{
    echo "Aizpildiet formu!";
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Formas</title>
    </head>
    <body>
        
        <h1>Forma</h1>
        <form action='index1.php' method="post">
            <input type='text' name='fname' placeholder="Vards"><br /><br />
            <input type='text' name='lname' placeholder="Uzvards"><br /><br />
            <input type='submit' name='form-submit' value='OK'><br />
        <form>
        
    </body>
</html>

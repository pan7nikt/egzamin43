<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hurtownia papiernicza</title>
    <link rel="stylesheet" type="text/css" href="styl.css">
</head>

<body>
    <div id="banner">
        <h1>W naszej hurtowni kupisz najtaniej</h1>
    </div>
    <div id="lewy">
        <h3>Ceny wybranych artykułów hurtowni:</h3>
        <table>
            <!--SKRYPT 1-->
            <?php
            $conn = mysqli_connect('localhost','root','','sklep2');
            $q = mysqli_query($conn,'SELECT `nazwa`,`cena` FROM `towary` LIMIT 4;');

            while($a = mysqli_fetch_array($q))
            {
                echo "<tr>
                    <td>".$a['nazwa']."</td>
                    <td>".$a['cena']."</td>
                </tr>";
            }

            ?>
        </table>
    </div>
    <div id="mid">
        <h3>Ile będą kosztować Twoje zakupy?</h3>
        <form method="POST">
            wybierz artykuł<br>
            <select id="towary" name="towary">
                <option value="Zeszyt 60 kartek">Zeszyt 60 kartek</option>
                <option value="Zeszyt 32 kartek">Zeszyt 32 kartek</option>
                <option value="Cyrkiel">Cyrkiel</option>
                <option value="Linijka 30 cm">Linijka 30 cm</option>
                <option value="Ekierka">Ekierka</option>
                <option value="Linijka 50 cm">Linijka 50 cm</option>
            </select><br> liczba sztuk<br>
            <input type="number" name="liczba" value="1">
            <input type="submit" name="oblicz" value="oblicz">
        </form>

        <!--SKRYPT 2-->
        <?php
            $nazwa = $_POST['towary'];
            $liczba = $_POST['liczba'];
            //echo $nazwa;
            //echo $liczba;

            $conn = mysqli_connect('localhost','root','','sklep2');
            $q = mysqli_query($conn,'SELECT `cena` FROM `towary` WHERE `nazwa`="'.$nazwa.'";');

            $a = mysqli_fetch_array($q);
            $kwota = $a['cena']*$liczba;
            echo $kwota;

        ?>
    </div>
    <div id="prawy">
        <img src="zakupy2.png" alt="hurtownia">
        <h3>Kontakt</h3>
        <p>telefon: 111222333<br> e-mail: hurt@wp.pl</p>
        <h4>Witrynę wykonał 12345678901</h4>
    </div>
    <div id="stopka">

    </div>
</body>

</html>
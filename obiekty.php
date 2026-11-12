<!DOCTYPE html>
<html lang="PL">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>islandia</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <?php
        $connect = mysqli_connect("localhost", "root","" ,"islandia");
    ?>
    <section id="mainContainer">
        <section id="lewa">
            <header>
                <a href="index.html"><h1>Zwiedzaj Islandię</h1></a>
            </header>
            <main>
                <h2>Opis miejsca</h2>
                <section id="sekcja1">
                    <?php
                    
                    if(isset($_GET['idObiekt'])){
                    $idObiekt = $_GET['idObiekt'];
                    $zapytanie4 = "SELECT plik, nazwa, nazwaCechy, wartoscCechy, opis, rodzaje.rodzaj
                                    FROM obiekty
                                    JOIN rodzaje
                                    ON obiekty.idRodzaj = rodzaje.idRodzaj
                                    WHERE obiekty.idObiekt = $idObiekt ;";

                    $wynik = mysqli_query($connect, $zapytanie4);
                    $a = mysqli_fetch_array($wynik);
                    echo "<img class='miniatury' src='{$a['plik']}' alt='{$a['nazwa']}' title='{$a['nazwa']}'>";
                    echo "<h2>".$a['nazwa']."</h2>";
                    echo "<h3>".$a['rodzaj']."</h3>";
                    echo "<p>".$a['opis']."</p>";
                    }
                    ?>
                </section>
            </main>
        </section>
        <aside>
            <h3>Do zwiedzania</h3>
            <ul>
                <li>Wodospady:
                    <ol>
                        <?php
                            $zapytanie1 = "SELECT obiekty.nazwa
                                            FROM obiekty
                                            JOIN rodzaje
                                            ON obiekty.idRodzaj = rodzaje.idRodzaj
                                            WHERE obiekty.panstwo = 'Islandia'
                                            AND rodzaje.idRodzaj = 10;";

                            $wynik1 = mysqli_query($connect, $zapytanie1);
                            while($a = mysqli_fetch_array($wynik1)){
                                echo "<li>".$a['nazwa']."</li>";
                            }
                        ?>
                    </ol>
                </li>
                <li>Siedliska zwierząt:
                    <ol>
                        <?php
                            $zapytanie2 = "SELECT obiekty.nazwa
                                            FROM obiekty
                                            JOIN rodzaje
                                            ON obiekty.idRodzaj = rodzaje.idRodzaj
                                            WHERE obiekty.panstwo = 'Islandia'
                                            AND rodzaje.idRodzaj = 14;";

                            $wynik2 = mysqli_query($connect, $zapytanie2);
                            while($a = mysqli_fetch_array($wynik2)){
                                echo "<li>".$a['nazwa']."</li>";
                            }
                        ?>
                    </ol>
                </li>
            </ul>
        </aside>
    </section>
    <footer>
        <hr>
        <p>Autor: Jose Arcadio Morales</p>
    </footer>
    <?php
        mysqli_close($connect);
    ?>
</body>
</html>
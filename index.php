<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formularz</title>
</head>

<body>
    <form action="index.php" method="POST" name="formularz">
        <input type="text" name="imie" id="" placeholder="Imię">
        <input type="text" name="nazwisko" id="" placeholder="Nazwisko">
        <input type="number" name="ocena" id="" placeholder="Ocena">
        <button value="dodaj" name="dodaj" type="submit">Zapisz</button>
    </form>

    <table border="1">
        <caption>Matematyka</caption>
        <tr>
            <th>ID</th>
            <th>Imie</th>
            <th>Nazwisko</th>
            <th>Ocena</th>
        </tr>
        <?php
        $polaczenie = mysqli_connect('localhost', 'root', '', 'szkola');

        if (isset($_POST['imie']) && isset($_POST['nazwisko']) && isset($_POST['ocena'])) {
            $imie = $_POST['imie'];
            $nazwisko = $_POST['nazwisko'];
            $ocena = $_POST['ocena'];

            $dodajDane = "INSERT INTO `matematyka`(`imie`, `nazwisko`, `ocena`) VALUES ('$imie','$nazwisko','$ocena')";

            mysqli_query($polaczenie, $dodajDane);
        }

        $zapytanie = "SELECT * FROM `matematyka`";

        $wynik = mysqli_query($polaczenie, $zapytanie);

        while ($wiersz = mysqli_fetch_assoc($wynik)) {
            echo "<tr><td>" . $wiersz['ID'] . "</td><td>" . $wiersz['Imie'] . "</td><td>" . $wiersz['Nazwisko'] . "</td><td>" . $wiersz['Ocena'] . "</td></tr>";
        }
        mysqli_close($polaczenie);
        ?>
    </table>
    <br><br><br><br><br>
    <h2>Wyświetlanie danych po nazwisku</h2>
    <form action="index.php" method="POST" name="formularz">
        <input type="text" name="pobieranieNazwiska" id="" placeholder="Podaj nazwisko">
        <button value="">Pokaż</button>
    </form>
    <ul>
        <?php
        if (isset($_POST['Nazwisko'])) {
            $polaczenie = mysqli_connect('localhost', 'root', '', 'szkola');
            $nazwisko = $_POST['pobieranieNazwiska'];
            $zapytanie2 = "SELECT `Imie`, `Nazwisko`, `Ocena` FROM `matematyka` WHERE Nazwisko = '$nazwisko'";

            $wynik2 = mysqli_query($polaczenie, $zapytanie2);

            while ($wiersz = mysqli_fetch_assoc($wynik2)) {
                echo "<li>" . $wiersz['imie'] . " " . $wiersz['nazwisko'] . "</li>";
            }

            mysqli_close($polaczenie);
        }
        ?>
    </ul>
</body>

</html>
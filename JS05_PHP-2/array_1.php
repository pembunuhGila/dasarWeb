<!DOCTYPE html>
<html>
    <head>
    </head>
    <body>
        <h2>Array Terindeks</h2>
        <?php
        $listdosen=["Elok Nur Hamdana", "Unggul Pamenang", "Bagas Nugraha"];

        echo $listdosen[2] . "<br>";
        echo $listdosen[0] . "<br>";
        echo $listdosen[1] . "<br>";

        // menggunakan for loop
        for ($i = 0; $i < count($listdosen); $i++) {
            echo $listdosen[$i] . "<br>";
        }
        
        ?>
    </body>
</html>
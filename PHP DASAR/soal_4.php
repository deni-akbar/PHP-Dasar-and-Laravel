<html>

<body>


    <table>
        <tr>
            <?php
            $awal=1;
            $akhir=64;

            for ($i = $awal; $i <= $akhir; $i++) {

                if ($i % 3 == 0 || $i % 4 == 0) {
                    echo "<td>$i</td>";
                } else {
                    echo "<td style='background:black; color:white;'>$i</td>";
                }

                if ($i % 8 == 0) {
                    echo "</tr><tr>";
                }
            }

            ?>
        </tr>
    </table>


</body>

</html>
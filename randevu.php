<?php include 'baslik.php' ?>

<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MHRS OTOMASYON</title>
</head>

<body>

    <table>
        <tr>
            <th>Hastane</th>
            <th>Klinik</th>
            <th>Doktor</th>
            <th>İl</th>
            <th>Tarih</th>
            <th>İşlemler</th> <!-- İşlemler adında sütun eklendi --> 
        </tr>

        <?php

        $randevu_sor = $db->prepare("SELECT * FROM mhrs INNER JOIN hasta ON mhrs.mhrs_hasta_id = hasta.hasta_id WHERE hasta_tc=:hasta_tc");
        $randevu_sor->execute([
            'hasta_tc' => $_SESSION['hastahasta_tc']
        ]);
        while ($hastacekek = $randevu_sor->fetch(PDO::FETCH_ASSOC)) { ?>


            <tr>
                <td><?php echo $hastacekek['mhrs_hastane']; ?> </td>
                <td><?php echo $hastacekek['mhrs_klinik']; ?></td>
                <td><?php echo $hastacekek['mhrs_doktor']; ?></td>
                <td><?php echo $hastacekek['mhrs_sehir']; ?></td>
                <td><?php echo $hastacekek['mhrs_tarih']; ?></td>
                <td>
                    <form method="POST" action="islem.php">
                        <!-- Her bir satırın sil butonu -->
                        <input type="hidden" name="mhrs_id" value="<?php echo $hastacekek['mhrs_id']; ?>">
                        <button type="submit" name="Randevu_Sil" style="width: auto; padding-left: 10%; padding-right:10%; background-color:brown;">Sil</button>
                    </form>
                </td>
            </tr>
        <?php } ?>
    </table>

</body>

</html>
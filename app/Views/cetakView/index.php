<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Data | Desa Tanah Merah</title>
    <style>
        .center {
            margin-left: auto;
            margin-right: auto;
        }

        .judul {
            text-align: center;
        }
    </style>
</head>

<body>
    <h1 class="judul">Data Peraturan</h1>
    <table class="center" border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No</th>
            <th>Nomor Dan Tgl Peraturan Desa</th>
            <th>Tentang</th>
            <th>Uraian Singkat</th>
        </tr>;
        <?php $i = 1; ?>
        <?php foreach ($data as $d) : ?>
            <tr>
                <td><?= $i++; ?></td>
                <td><?= $d["nomor_tgl_peraturan"]; ?></td>
                <td><?= $d["tentang"]; ?></td>
                <td><?= $d["uraiansingkat"]; ?></td>
            </tr> ;
        <?php endforeach; ?>
    </table>
</body>

</html>
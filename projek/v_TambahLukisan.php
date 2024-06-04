<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tambah Lukisan</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
        <link rel="stylesheet" href="hf.css">
    </head>
    <body>
        <h2>Yuk, Tambah Lukisan!</h2>
        <form action="" method="post" name="tLukisan" enctype="multipart/form-data">
                Judul Lukisan : <input type="text" name="judulLukisan"><br><br>
                Nama Pelukis : <input type="text" name="namaPelukis"><br><br>
                Deskrpsi Karya : <input type="text" name="deskripsiKarya"><br><br>
                
                <input type="file" name="addGambar" value="Tambah Foto">
                <input id="tombol" type="submit" name="tLukisan" value="Tambah">
        </form>

        <?php
            include_once("c_MeJatim.php");
            
            if(isset($_POST['tLukisan'])) {
                $main = new c_MeJatim();
                $main->add_lukisan();
            }
        ?>
    </body>
</html>
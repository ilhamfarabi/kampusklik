<?php
include "tampilkan_data.php";
if (isset($_GET['id'])) {
    $idnya = $_GET['id'];
    $get_data_by_id = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE id=$idnya");
    $datanya_id = mysqli_fetch_assoc($get_data_by_id);

    $npm = $datanya_id["npm"];
    $nama_mahasiswa = $datanya_id["nama_mahasiswa"];
    $prodi = $datanya_id["prodi"];

    $status = "edit_data.php";
} else {
    $status = "proses_pertemuan12.php";
    $npm = "";
    $nama_mahasiswa = "";
    $prodi = "";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
    <link href="assets/styles.css" rel="stylesheet" media="screen">
</head>

<body>
    <!-- <form action="proses_pertemuan12.php" method="POST">
        NPM : <br>
        <input type="text" name="inputan_npm"><br>
        PRODI : <br>
        <input type="text" name="inputan_prodi"><br>
        ULANGI : <br>
        <input type="text" name="inputan_ulangi"><br>
        <button type="submit" name="submit">Proses</button>
    </form> -->
    <div class="row-fluid" bis_skin_checked="1">
        <!-- block -->
        <div class="block" bis_skin_checked="1">
            <div class="navbar navbar-inner block-header" bis_skin_checked="1">
                <div class="muted pull-left" bis_skin_checked="1">Form Example</div>
            </div>
            <div class="block-content collapse in" bis_skin_checked="1">
                <div class="span12" bis_skin_checked="1">
                    <form class="form-horizontal" action="<?= $status; ?>" method="POST">
                        <fieldset>
                            <legend>Form Horizontal</legend>
                            <input type="hidden" name="id" value="<?= $idnya; ?>">
                            <div class="control-group" bis_skin_checked="1">
                                <label class="control-label" for="focusedInput">NPM</label>
                                <div class="controls" bis_skin_checked="1">
                                    <input class="input-xlarge focused" id="focusedInput" type="number" name="inputan_npm" value="<?= $npm; ?>">
                                </div>
                            </div>
                            <div class="control-group" bis_skin_checked="1">
                                <label class="control-label" for="focusedInput">NAMA</label>
                                <div class="controls" bis_skin_checked="1">
                                    <input class="input-xlarge focused" id="focusedInput" type="text" name="inputan_nama" value="<?= $nama_mahasiswa; ?>">
                                </div>
                            </div>
                            <div class=" control-group" bis_skin_checked="1">
                                <label class="control-label" for="focusedInput">PRODI</label>
                                <div class="controls" bis_skin_checked="1">
                                    <input class="input-xlarge focused" id="focusedInput" type="text" name="inputan_prodi" value="<?= $prodi; ?>">
                                </div>
                            </div>
                            <div class="form-actions" bis_skin_checked="1">
                                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                                <button type="reset" class="btn">Cancel</button>
                            </div>
                        </fieldset>
                    </form>

                </div>
            </div>
        </div>
        <!-- /block -->
    </div>

    <div class="row-fluid" bis_skin_checked="1">
        <!-- block -->
        <div class="block" bis_skin_checked="1">
            <div class="navbar navbar-inner block-header" bis_skin_checked="1">
                <div class="muted pull-left" bis_skin_checked="1">Basic Table</div>
            </div>
            <div class="block-content collapse in" bis_skin_checked="1">
                <div class="span12" bis_skin_checked="1">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID Mahasiswa</th>
                                <th>NPM Mahasiswa</th>
                                <th>Nama Mahasiswa</th>
                                <th>Prodi Mahasiswa</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($data = mysqli_fetch_assoc($get_data)) { ?>
                                <tr>
                                    <td><?= $data['id'] ?></td>
                                    <td><?= $data['npm'] ?></td>
                                    <td><?= $data['nama_mahasiswa'] ?></td>
                                    <td><?= $data['prodi'] ?></td>
                                    <td><a href="pertemuan12.php?id=<?= $data['id'] ?>">Edit</a>| <a href="hapus_data.php?id=<?= $data['id'] ?>">Hapus</a></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- /block -->
    </div>
</body>

</html>
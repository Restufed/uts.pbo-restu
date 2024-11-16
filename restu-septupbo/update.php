<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Barang - toko restu</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-dark bg-dark">
        <span class="navbar-brand mb-0 h1">restu toko</span>
    </nav>

    <div class="container mt-5">
        <h4 class="text-center">Update Barang</h4>

        <?php
        // Koneksi ke database
        require_once "koneksi.php";

        // Cek apakah ada id_barang yang diterima melalui URL
        if (isset($_GET['id_barang'])) {
            $id_barang = htmlspecialchars($_GET['id_barang']);
            
            // Ambil data barang yang akan diupdate
            $sql = "SELECT * FROM tb_restustok WHERE id_barang = ?";
            $stmt = $kon->prepare($sql);
            $stmt->bind_param("i", $id_barang);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                // Ambil data barang untuk diisi dalam form
                $data = $result->fetch_assoc();
            } else {
                // Jika barang tidak ditemukan
                echo "<div class='alert alert-danger'>Barang tidak ditemukan.</div>";
                exit();
            }
        } else {
            // Jika id_barang tidak ada
            echo "<div class='alert alert-danger'>ID Barang tidak ditemukan.</div>";
            exit();
        }

        // Proses update data
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Ambil data dari form
            $id_barang_baru = htmlspecialchars($_POST['id_barang']); // Ambil id_barang baru dari form
            $nama_barang = htmlspecialchars($_POST['nama_barang']);
            $stok = (int) $_POST['stok'];
            $harga_beli = (float) $_POST['harga_beli'];
            $harga_jual = (float) $_POST['harga_jual'];

            // Validasi input
            if (empty($nama_barang) || empty($stok) || empty($harga_beli) || empty($harga_jual)) {
                $error = "Semua field harus diisi.";
            } else {
                // Query untuk mengupdate data barang, termasuk update id_barang
                $sql_update = "UPDATE tb_restustok SET id_barang = ?, nama_barang = ?, stok = ?, harga_beli = ?, harga_jual = ? WHERE id_barang = ?";
                $stmt_update = $kon->prepare($sql_update);
                $stmt_update->bind_param("isiddi", $id_barang_baru, $nama_barang, $stok, $harga_beli, $harga_jual, $id_barang);

                if ($stmt_update->execute()) {
                    // Jika berhasil, redirect ke halaman index.php
                    header("Location: index.php");
                    exit();
                } else {
                    $error = "Data gagal diupdate.";
                }
            }
        }
        ?>

        <?php if (isset($error)): ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php endif; ?>

        <form method="POST">
            <div class="form-group">
                <label for="id_barang">ID Barang</label>
                <input type="text" class="form-control" id="id_barang" name="id_barang" value="<?php echo htmlspecialchars($data['id_barang']); ?>" required>
            </div>
            
            <div class="form-group">
                <label for="nama_barang">Nama Barang</label>
                <input type="text" class="form-control" id="nama_barang" name="nama_barang" value="<?php echo htmlspecialchars($data['nama_barang']); ?>" required>
            </div>

            <div class="form-group">
                <label for="stok">Stok</label>
                <input type="number" class="form-control" id="stok" name="stok" value="<?php echo htmlspecialchars($data['stok']); ?>" required>
            </div>

            <div class="form-group">
                <label for="harga_beli">Harga Beli</label>
                <input type="number" step="0.01" class="form-control" id="harga_beli" name="harga_beli" value="<?php echo htmlspecialchars($data['harga_beli']); ?>" required>
            </div>

            <div class="form-group">
                <label for="harga_jual">Harga Jual</label>
                <input type="number" step="0.01" class="form-control" id="harga_jual" name="harga_jual" value="<?php echo htmlspecialchars($data['harga_jual']); ?>" required>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="index.php" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</body>
</html>
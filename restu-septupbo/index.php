<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>
<title>
toko restu</title>
<body>
    <nav class="navbar navbar-dark bg-dark">
            <span class="navbar-brand mb-0 h1">restu sepatu</span>
        </div>
    </nav>
<div class="container">
    <br>
    <h4><center>TABEL BARANG</center></h4>
<?php

    require "koneksi.php";


    //Cek apakah ada kiriman form dari method post
    if (isset($_GET['id_barang'])) {
        $id_barang=htmlspecialchars($_GET["id_barang"]);

        $sql="delete from tb_restustok where id_barang='$id_barang' ";
        $hasil=mysqli_query($kon,$sql);

        //Kondisi apakah berhasil atau tidak
            if ($hasil) {
                header("Location:index.php");

            }
            else {
                echo "<div class='alert alert-danger'> Data Gagal dihapus.</div>";

            }
        }
?>


     <tr class="table-danger">
            <br>
        <thead>
        <tr>
       <table class="my-3 table table-bordered">
            <tr class="table-primary">           
            <th>id_barang</th>
            <th>Nama_Barang</th>
            <th>Stok</th>
            <th>Harga_Beli</th>
            <th>Harga_ Jual</th>
            <th colspan='2'>Aksi</th>

        </tr>
        </thead>

        <?php
        require_once "koneksi.php";

        $sql="select * from tb_restustok order by id_barang desc";
        
        $hasil=mysqli_query($kon,$sql);
        $no=0;
        while ($data = mysqli_fetch_array($hasil)) {
            $no++;

            ?>
            <tbody>
            <tr>
                <td><?php echo $no;?></td>
                <td><?php echo $data["nama_barang"]; ?></td>
                <td><?php echo $data["stok"];   ?></td>
                <td><?php echo $data["harga_beli"];   ?></td>
                <td><?php echo $data["harga_jual"];   ?></td>
                <td>
                    <a href="update.php?id_barang=<?php echo htmlspecialchars($data['id_barang']); ?>" class="btn btn-warning" role="button">Update</a>
                    <a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?id_barang=<?php echo $data['id_barang']; ?>" class="btn btn-danger" role="button">Delete</a>
                </td>
            </tr>
            </tbody>
            <?php
        }
        ?>
    </table>
    <a href="create.php" class="btn btn-primary" role="button">Tambah Data</a>
</div>
</body>
</html>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>toko sepatu</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
<table>
        <tr>
            <th>ID Barang</th>
            <th>Nama Barang</th>
            <th>stok</th>
           <th> harga beli</th>
           <th>harga jual</th>
        </tr>
        <tr>
            <td>28</td>
            <td>sepatu futsal</td>
            <td>1</td>
            <td>150000</td>
            <td>200000</td>
        </tr>
        <tr>
            <td>12</td>
            <td>sepatu bola</td>
            <td>2</td>
            <td>20000</td>
            <td>250000</td>
        </tr>
        <tr>
            <td>5</td>
            <td>sepatu voli</td>
            <td>9</td>
            <td>267000</td>
            <td>280000</td>
        </tr>
        </tr>
        <td>30</td>
            <td>sepatu tenis</td>
            <td>4</td>
            <td>200000</td>
            <td>300000</td>
            </tr>
        </tr>
        <td>66</td>
            <td>sepatu basket</td>
            <td>1</td>
            <td>20000</td>
            <td>25000</td>
        </table>
</body>
</html>

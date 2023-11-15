<?php
    include 'koneksi.php';
    session_start();


    $query = "SELECT * FROM tb_siswa;";
    $sql = mysqli_query($conn, $query);
    $no = 0;
   
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.bundle.min.js" ></script>
    
    <!--Font Awsome-->
    <link rel="stylesheet" href="fontawesome/css/font-awesome.min.css">

    <!-- Data Tables -->
    <link rel="stylesheet" type="text/css" href="datatables/datatables.css">
    <script type="text/javascript" src="datatables/datatables.js"></script>
    <title>crud</title>
</head>


  <script type="text/javascript">
      $(document).ready(function(){
          $('#dt').DataTable();
      } );
  </script>

<body>
    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">
            CRUD - BS5
          </a>
        </div>
      </nav>

    <!-- Judul -->
    <div class="container-fluid">
      <h1 class="mt-4">Data Siswa</h1>
      <figure>
        <blockquote class="blockquote">
          <p>Berisi data yang telah disimpan di database.</p>
        </blockquote>
        <figcaption class="blockquote-footer">
          CRUD <cite title="Source Title">Create Read Update Delete</cite>
        </figcaption>
      </figure>
      <a href="kelola.php" type="button" class="btn btn-primary mb-3">
        <i class="fa fa-plus"></i>
        Tambah Data
      </a> 

          <?php
              if(isset($_SESSION['eksekusi'])):
          ?>
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?php
                echo $_SESSION['eksekusi'];
                ?>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
          <?php
              session_destroy();
              endif;
          ?>

      <div class="table-responsive">
        <table id="dt" class="table align-middle table-bordered table-hover">
            <thead>
                <tr>
                   <th><center>No.</center></th>
                   <th>NISN</th>
                   <th>Nama Siswa</th>
                   <th>Jenis Kelamin</th>
                   <th>Foto Siswa</th>
                   <th>Alamat</th>
                   <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            <?php
                while($result = mysqli_fetch_assoc($sql)){
            ?>
                <tr>
                   <td><center>
                      <?php echo ++$no; ?>.
                   </center></td>
                   <td>
                   <?php echo $result['nisn']; ?>
                   </td>
                   <td>
                   <?php echo $result['nama_siswa']; ?>
                   </td>
                   <td>
                   <?php echo $result['jenis_kelamin']; ?>
                   </td>
                   <td>
                    <img src="img/<?php echo $result['foto_siswa']; ?>" style="width: 150px;">
                   </td>
                   <td>
                   <?php echo $result['alamat']; ?>
                   </td>
                   <td>
                        <a href="kelola.php?ubah=<?php echo $result['id_siswa']; ?>" type="button" class="btn btn-success btn-sm">
                            <i class="fa fa-pencil"></i>
                        </a>
                        <a href="proses.php?hapus=<?php echo $result['id_siswa']; ?> " type="button" class="btn btn-danger btn-sm" onClick="return confirm('Apakah anda yakin ingin menghapus data tersebut???')">
                             <i class="fa fa-trash"></i>
                         </a>
                   </td>
                </tr> 
                <?php
                }
                ?>
            </tbody>
        </table>
      </div>
    </div>
    <div class="mb-5"></div>
</body>
</html>

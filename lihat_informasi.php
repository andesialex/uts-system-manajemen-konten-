<fieldset>
  <legend></legend>

  <?php
  $carikode = mysqli_query($conn,"select max(id) from tb_informasi") or die (mysql_error());
  $datakode = mysqli_fetch_array($carikode);
  if($carikode){
    $nilaikode = substr($datakode[0], 1);
    $kode = (int) $nilaikode;
    $kode =$kode + 1;
    $hasilkode = "IF".str_pad($kode, 3, "0", STR_PAD_LEFT);
  } else {
    $hasilkode = "IF001";
  }
  ?>

  <form action="" method="post" enctype="multipart/form-data">
    <table>
      <tr>
        <td>ID</td>
        <td> : </td>
        <td><input type="text" name="id" value="<?php echo $hasilkode; ?>" /></td>
      </tr>
      <tr>
        <td>Judul</td>
        <td> : </td>
        <td><input type="text" name="judul"/></td>
      </tr>

      <tr>
        <td>Gambar</td>
        <td>: </td>
        <td><input type="file" name="gambar"/></td>
      </tr>

      <tr>
        <td>Deskripsi</td>
        <td> : </td>
        <td><textarea name='deskripsi' class="deskripsi" placeholder='deskripsi'></textarea></td>
      </tr>
      
      <tr>
        <td></td>
        <td> : </td>
        <td><input type="submit" name="tambah" value="Tambah"/> <input type="reset" value="Reset"/></td>
      </tr>
    </table>
  </form>

  <?php
  $id = @$_POST['id'];
  $judul = @$_POST['judul'];
  $deskripsi = @$_POST['deskripsi'];

  $asal = @$_FILES['gambar']['tmp_name'];
  $target = 'img/';
  $nama_gambar = @$_FILES['gambar']['name'];

  $tambah_informasi = @$_POST['tambah'];

  if($tambah_informasi){
    if($id== "" || $judul=="" || $nama_gambar== "" || $deskripsi==""){
      ?>
      <script type="text/javascript">
      alert("Inputan tidak boleh ada yang kosong");
      </script>
      <?php 
    } else {
      $pindah = move_uploaded_file($asal, $target.$nama_gambar);
      if($pindah){
        mysqli_query($conn,"insert into tb_informasi values ('$id', '$judul', '$nama_gambar', '$deskripsi')") or die(mysql_error());
        ?>
        <script type="text/javascript">
        alert("tambah informasi baru, berhasil!");
        window.location.href="?page=informasi";
        </script>
        <?php
      } else {
        ?>
        <script type="text/javascript">
        alert("Gambar gagal di upload");
        </script>
        <?php
      }
    }
  }
  ?>
</fieldset>
<?php
require 'fungsi.php';
require 'cek.php';

?>
<html>
<head>
  <title>Stock Barang</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
</head>

<body>
<div class="container">
			<h2>Stock Bahan</h2>
				<div class="data-tables datatable-dark">
					
					<table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Nomor</th>
                                            <th>Nama Barang</th>
                                            <th>Indikasi</th>
                                            <th>Dosis</th>
                                            <th>Efek Samping</th>
                                            <th>Stok</th>
                                                
                                        </tr>
                                    </thead>
                                   
                                    <tbody>
                                    
                                        <?php
                                        $getalldataobat = mysqli_query($conn, "SELECT * FROM obat");
                                        $i=1;
                                        while($data=mysqli_fetch_array($getalldataobat)){
                                            $namaobat = $data['namaobat'];
                                            $indikasi = $data['indikasi'];
                                            $dosis = $data['dosis'];
                                            $efeksamping = $data['efeksamping'];
                                            $stok = $data['stok'];
                                            $ido = $data['id_obat'];
                                        ?>
                                        <tr>
                                            <td><?= $i++;?></td>
                                            <td><?php echo $namaobat;?></td>
                                            <td><?php echo $indikasi;?></td>
                                            <td><?php echo $dosis;?></td>
                                            <td><?php echo $efeksamping;?></td>
                                            <td><?php echo $stok;?></td>
                                            
                                        </tr>
                                        
                                        <!-- The ubah Modal -->
                                        <div class="modal fade" id="ubah<?=$ido;?>">
                                          <div class="modal-dialog">
                                            <div class="modal-content">

                                              <!-- Modal Header -->
                                              <div class="modal-header">
                                                <h4 class="modal-title">Silahkan Ubah !</h4>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                              </div>

                                              <!-- Modal body -->
                                              <form method="post">
                                                <div class="modal-body">
                                                    <input type="text" name="namaobat" value="<?=$namaobat;?>" class="form-control" required><br>
                                                    <input type="text" name="indikasi" value="<?=$indikasi;?>" class="form-control" required><br>
                                                    <input type="text" name="dosis" value="<?=$dosis;?>" class="form-control" required><br>
                                                    <input type="text" name="efeksamping" value="<?=$efeksamping;?>"" class="form-control" required><br>
                                                    <input type="text" name="stok" value="<?=$stok;?>" class="form-control" required><br>
                                                    <input type="hidden" name="ido" value="<?=$ido?>">
                                                    <button type="submit" class="btn btn-primary" name="ubahobat">Ubah</button>
                                                </div>
                                              </form>

                                              <!-- Modal footer -->
                                            </div>
                                          </div>
                                        </div>
                                        
                                        <!-- The hapus Modal -->
                                        <div class="modal fade" id="hapus<?=$ido;?>">
                                          <div class="modal-dialog">
                                            <div class="modal-content">

                                              <!-- Modal Header -->
                                              <div class="modal-header">
                                                <h4 class="modal-title">Hapus Obat?</h4>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                              </div>

                                              <!-- Modal body -->
                                              <form method="post">
                                                <div class="modal-body">
                                                    Apakah Anda yakin ingin menghapus <b><?=$namaobat;?></b> ?
                                                    <input type="hidden" name="ido" value="<?=$ido?>">
                                                    <br>
                                                    <br>
                                                    <button type="submit" class="btn btn-danger" name="hapusobat">Hapus</button>
                                                </div>
                                              </form>
                                              <!-- Modal footer -->
                                            </div>
                                          </div>
                                        </div>
                                        <?php
                                        }
                                        
                                        ?>
                                        
                                        
                                    </tbody>
                                </table>
					
				</div>
</div>
	
<script>
$(document).ready(function() {
    $('#datatablesSimple').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy','csv','excel', 'pdf', 'print'
        ]
    } );
} );

</script>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>

	

</body>

</html>
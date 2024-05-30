<div class=" row">
    <div class="col">
        <div class="row p-2 small-box d-flex text-justify bg-white">
            <div class="col">
                <h6>Nama</h6>
                <h6>No KTP</h6>
                <h6>No HP</h6>
                <h6>Tanggal Lahir</h6>
                <h6>Tanggal Bergabung</h6>
            </div>
            <div class="col">

                <h6>: <?= strtoupper($idnasabah['nama']) ?></h6>
                <h6>: <?= $idnasabah['ktp'] ?></h6>
                <h6>: <?= $idnasabah['no_hp'] ?></h6>
                <h6>: <?= $idnasabah['tgl_lahir'] ?></h6>
                <h6>: <?= date('d F Y', $idnasabah['dated_created']) ?></h6>
            </div>

        </div>
    </div>
    <div class="col-lg-4 col-sm-12">
        <div class="small-box bg-warning p-3 h-4">
            <h4 class="text-bold text-body-emphasis card-header p-0">Total Saldo</h4>
            <h5 class="m-auto">-</h5>
        </div>
    </div>
</div>



<div class="row">
    <div class="card col">
        <h5 class="card-header">Riwayat Transaksi</h5>
        <div class="card-body">
            <table class="table" id="example1">
                <thead>
                    <tr>
                        <td>#</td>
                        <td>Kode Transaksi</td>
                        <td>Tanggal Transaksi</td>
                        <td>Jenis Sampah</td>
                        <td>Berat Sampah</td>
                        <td>Debit</td>
                        <td>Kredit</td>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($saldodebit as $d):?>
                    <tr>
                        <td><?=$no++?></td>
                        <td><?=$d->kode_transaksi?></td>
                        
                        <td><?= date('d F Y', $d->tgl_transaksi)?></td>
                        <td><?=$d->id_sampah?></td>
                        <td><?=$d->berat?> Kg</td>
                        <td>
                        <?php if($d->debit == 0){
                            echo '-';
                        }else{
                            echo ('Rp.'.number_format($d->debit)." ,-");
                        }
                        
                        ?>
                        </td>
                        <td>
                        <?php if($d->kredit == 0){
                            echo '-';
                        }else{
                            echo ('Rp.'.number_format($d->kredit)." ,-");
                        }
                        
                        ?>
                        </td>
                    </tr>

                    <?php 
                  
                    endforeach?>

                    <?php echo '<tr>
                    <td></td>
                    </tr>'
                    ?>

                    
                    
                </tbody>
            </table>
        </div>

    </div>
</div>
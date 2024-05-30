<?php
$kode = $kodetransaksi['kodetransaksi'];

if ($kode != null) {
    $urutan = (int) substr($kode, 12, 3);
    $urutan++;

    $kodetrs = 'PBM-D/' . date('d/m/') . sprintf("%03s", $urutan);
} else {
    $kodetrs = 'PBM-D/' . date('d/m/') . '001';
}
?>

<form action="<?=base_url('transaksi/savedebit')?>" method="POST">
   <div class="row">
    <div class="col col-sm-12 col-md-3">
        <div class="small-box bg-warning p-3 h-4">
           <h4 class="text-bold text-body-emphasis card-header p-0">Kode Transaksi</h4>
          <h5 class="m-auto"><?= $kodetrs ?></h5>
        </div>
        <div class="small-box bg-info p-3">
            <h4 class="text-bold text-body-emphasis card-header p-0">Tanggal Transaksi</h4>
            <h5 class="m-auto"><?= date('d-M-Y') ?></h5>
        </div>
    </div>
   
    <!-- form debit box -->
    <div class="col p-3 bg-white rounded">
        <h4 class="card-header mb-2">Transaksi Debit</h4>
        <div class="row">
            <div class="col">
            <input type="text" value="<?= $kodetrs ?>" name="kodetransaksi" id="kodetransaksi" hidden>
            <label for="nasabah" class="form-label">Nasabah</label>
            <input type="text" class="form-control" id="idnasabah" name="idnasabah" value="<?= $idnasabah['id'] ?>" hidden>
            <input type="text" class="form-control" readonly value="<?= strtoupper($idnasabah['nama']) ?>">
            </div>
        <div class="col">
        <label for="ktp" class="form-label">KTP</label>
                <input type="text" class="form-control" value="<?= $idnasabah['ktp'] ?>" readonly>
        </div>
        </div>
        <div class="row">
            <div class="col col-sm-12">
            <label for="sampah" class="form-label">Jenis Sampah</label>
                <select id="id_sampah" name="id_sampah" class="form-select form-control">
                    <option selected>Choose...</option>
                    <?php foreach ($sampah as $s) : ?>
                        <option value=" <?= $s->id ?>"><?= $s->nama ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="col col-sm-12">
            <label for="beratsampah" class="form-label">Berat Sampah</label>
                <input type="text" class="form-control" id="beratsampah" name="beratsampah">
            </div>
            <div class="col col-sm-12">
            <label for="harga" class="form-label">Harga/Kg</label>
                <input type="text" class="form-control" id="harga" name="harga" readonly placeholder="Rp. ...">
            </div>
        </div>
        <div class="row">
        <label class="form-label">Sub total</label>
                <input type="text" class="form-control" name="debit" id="debit" placeholder="Rp. ... ..." readonly>
        </div>

        <div class="row mt-2">
        <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Simpan Transaksi</button>
                <a href="<?= base_url('transaksi/index') ?>" class="btn btn-primary ml-2"><i class="fas fa-undo mr-2"></i>Kembali</a>
        </div>
    </div>
   </div>
</form>


<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>


<script type="text/javascript">
    //

    $(document).ready(function(){
        $('#id_sampah').on('change',function(){
             var id = $('#id_sampah').val()
             $.ajax({
                url: '<?=base_url('transaksi/getharga')?>',
                type: 'POST',
                data: {id_sampah:id},
                dataType: 'json',
                success:function(res){
                   $.each(res, function(){
                    $('#harga').val(res.harga)
                   })
                }
             });
        });


        // hitung harga
        $('#beratsampah').keyup(function(){
            let berat = parseInt($('#beratsampah').val())
            let harga = parseInt($('#harga').val())

            let subtotal = berat * harga

            $('#debit').val(subtotal)


        })
    });

    // let id = $('#id_sampah').val();
    // $.ajax({
    //     url: '#',
    //     type: 'POST',
    //     data: {
    //         id: id
    //     },
    //     success: function(data) {
    //         // alert('Data Berhasil')
    //         // $('#harga').val(data.harga);
    //         // console.log(data)
    //         alert(id);
    //     }
    // });



</script>

<script src="<?= base_url('assets/') ?>plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?= base_url('assets/') ?>plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->

<!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
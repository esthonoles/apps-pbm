<?php
$kode = $kodetransaksi['kodetransaksi'];

if ($kode != null) {
    $urutan = (int) substr($kode, 12, 3);
    $urutan++;

    $kodetrs = 'PBM-K/' . date('d/m/') . sprintf("%03s", $urutan);
} else {
    $kodetrs = 'PBM-K/' . date('d/m/') . '001';
}
?>


<div class=" row">
    <div class="col-sm-12 col-xl-3">
        <div class="small-box bg-warning p-3 h-4">
            <h4 class="text-bold text-body-emphasis card-header p-0">Kode Transaksi</h4>
            <h5 class="m-auto"><?= $kodetrs ?></h5>
        </div>
        <div class="small-box bg-info p-3">
            <h4 class="text-bold text-body-emphasis card-header p-0">Tanggal Transaksi</h4>
            <h5 class="m-auto"><?= date('d-M-Y') ?></h5>
        </div>
    </div>
    <div class="col-md-8 card p-3 ml-2">
        <h4 class="card-header m-0 p-0 mb-2">Transaksi Kredit</h4>
        <form class="row g-3">
            <div class="col-md-6">
                <label for="nasabah" class="form-label">Nasabah</label>
                <input type="text" class="form-control" name="idnasabah" id="idnasabah" value="<?= $idnasabah['id'] ?>" hidden>
                <input type="text" class="form-control" value="<?= strtoupper($idnasabah['nama']) ?>" readonly>

            </div>
            <div class="col-md-6">
                <label for="ktp" class="form-label">KTP</label>
                <input type="text" class="form-control" value="<?= $idnasabah['ktp'] ?>" readonly>
            </div>
            <div class="col-12">
                <label for="jumlahkredit" class="form-label">Jumlah Penarikan</label>
                <input type="text" class="form-control" name="jumlahkredit" id="jumlahkredit" placeholder="Rp. ... ...">
            </div>

            <div class="col-12 mt-3">
                <button type="submit" class="btn btn-warning"><i class="fas fa-save"></i> Simpan Transaksi</button>
                <a href="<?= base_url('transaksi/index') ?>" class="btn btn-primary ml-2"><i class="fas fa-undo mr-2"></i>Kembali</a>
            </div>
        </form>
    </div>
</div>
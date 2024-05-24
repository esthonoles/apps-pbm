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
            <h5 class="m-auto">Rp.2.500,</h5>
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
                        <td>Debit</td>
                        <td>Kredit</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>PBM-D/0514-002</td>
                        <td>12-Mei-2024</td>
                        <td>Rp.10.000,</td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>PBM-K/0514-002</td>
                        <td>13-Mei-2024</td>
                        <td>-</td>
                        <td>Rp.7.500,</td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
</div>
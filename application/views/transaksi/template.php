<?php
$kode = $kodetransaksi['kodetransaksi'];

if ($kode != null) {
    $urutan = (int) substr($kode, 3, 3);
    $urutan++;

    $kodetrs = 'TRS' . date('md-') . sprintf("%04s", $urutan);
} else {
    $kodetrs = 'TRS' . date('md-') . '001';
}


// if ($kode == null) {
//     $kodetrs = 'TRS' . date('md-') . sprintf("%03s", $urutan);
// }
?>

<div class=" row">
    <div class="small-box bg-warning p-3">
        <h4 class="text-bold text-body-emphasis card-header p-0">Kode Transaksi</h4>
        <h5 class="m-auto"><?= $kodetrs ?></h5>
    </div>
    <div class="card p-3">
        <form action="" id="insert_form" method="post">
            <div class="input-field">
                <table class="table table-bordered" id="table_field">
                    <tr>
                        <th>Nasabah</th>
                        <th>Jenis Sampah</th>
                        <th>Harga/Kg</th>
                        <th>Berat Sampah / Kg</th>
                        <th>Total Transaksi</th>
                    </tr>
                    <tr>
                        <td><input type="text" name="tgltransaksi[]" id="tgltransaksi" class="form-control" placeholder="<?= date('d-M-Y') ?>"></td>
                        <td>
                            <select id="nasabah" class="form-control" name="nasabah[]">
                                <option>-pilih-</option>
                                <?php foreach ($nasabah as $ns) : ?>
                                    <option value="<?= $ns->id ?>"><?= $ns->nama ?></option>
                                <?php endforeach; ?>
                            </select>
                        </td>
                        <td>
                            <select id="sampah" class="form-control" name="jenissampah[]" required>
                                <option>-pilih-</option>
                                <?php foreach ($sampah as $s) : ?>
                                    <option value="<?= $s->id ?>"><?= $s->nama ?></option>
                                    <option id="harga" hidden value="<?= $s->harga ?>"></option>
                                <?php endforeach; ?>
                            </select>
                        </td>
                        <td><input type=" text" name="harga[]" id="hargatxt" class="form-control" readonly>
                        </td>

                        <td><input type="text" name="beratsampah[]" id="beratsampah" class="form-control hitung" placeholder="berat sampah">
                        </td>
                        <td><input type="text" name="totaltransaksi[]" id="totalTransaksi" class="form-control" placeholder="total transaksi" readonly></td>

                        <td> <button class="btn btn-success ml-1" type="button" id="btnAdd"><i class="fas fa-plus"></i></button></td>
                    </tr>
                </table>
                <center><button type="submit" class="btn btn-warning"><i class="fas fa-save"></i> Simpan Transaksi</button></center>
            </div>
        </form>
    </div>
</div>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>




<script>
    $(document).ready(function() {
        var html = `
        <tr>
                        <td><input type="text" name="tgltransaksi[]" id="tgltransaksi" class="form-control" placeholder="<?= date('d-M-Y') ?>"></td>
                        <td>
                            <select id="nasabah" class="form-control" name="nasabah[]" required title="Pilih Nasabah">
                                <option>-pilih-</option>
                                <?php foreach ($nasabah as $ns) : ?>
                                    <option value="<?= $ns->id ?>"><?= $ns->nama ?></option>
                                <?php endforeach; ?>
                            </select>
                        </td>
                        <td>
                            <select id="nasabah" class="form-control" name="jenissampah[]" required>
                                <option>-pilih-</option>
                                <?php foreach ($sampah as $s) : ?>
                                    <option value="<?= $s->id ?>"><?= $s->nama ?></option>
                                <?php endforeach; ?>
                            </select>
                        </td>
                        <td><input type="text" name="beratsampah[]" id="beratsampah" class="form-control" placeholder="berat sampah"></td>
                        <td><input type="text" name="totaltransaksi[]" id="total transaksi" class="form-control" placeholder="total transaksi" readonly></td>

                        <td> <button class="btn btn-danger ml-1" type="button" id="btnRemove"><i class="fas fa-minus"></i></button></td>
                    </tr>
        `;

        var max = 3;
        var x = 1

        $("#btnAdd").click(function() {
            if (x <= max) {
                $('#table_field').append(html);
                x++;
            }
        });

        $("#table_field").on('click', '#btnRemove', function() {
            $(this).closest('tr').remove();
            x--;
        });

    });
</script>
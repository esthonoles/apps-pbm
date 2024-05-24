<div class="card col-md-6 p-4 m-auto">
    <!-- <div class="card-header"></div> -->
    <form action="<?= base_url('datamember/addmember') ?>" method="post">
        <div class="form-group">
            <label for="ktp">No KTP</label>
            <input type="number" class="form-control" name="ktp" id="ktp" placeholder="masukkan no ktp" required value="<?= set_value('ktp'); ?>">
            <?= form_error('ktp', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
        <div class=" form-group">
            <label for="nasabah">Nama Nasabah</label>
            <input type="text" class="form-control" name="nama" id="nama" placeholder="masukkan nama" required value="<?= set_value('nama'); ?>">
            <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>

        <div class=" form-group">
            <label for="tgl_lahir">Tanggal Lahir</label>
            <input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir" placeholder="tanggal lahir" required value="<?= set_value('tgl_lahir'); ?>">
            <?= form_error('tgl_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
        <div class=" form-group">
            <label for="nohp">No Handphone</label>
            <input type="number" class="form-control" name="notlp" id="notlp" placeholder="masukkan nomer telepon" value="<?= set_value('notlp'); ?>" required>
            <?= form_error('notlp', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>

        <button class=" btn btn-info float-right" type="submit">Tambah Data</button>
    </form>
</div>
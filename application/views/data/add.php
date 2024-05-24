<div class="card col-md-4 p-4">
    <!-- <div class="card-header"></div> -->
    <form action="<?= base_url('datasampah/add') ?>" method="post">
        <div class="form-group">
            <input type="text" class="form-control" name="nama" id="nama" placeholder="nama sampah" required>
        </div>
        <div class="form-group">
            <input type="number" class="form-control" name="harga" id="harga" placeholder="harga sampah" required>
        </div>
        <button class="btn btn-info float-right" type="submit">Tambah Data</button>
    </form>
</div>
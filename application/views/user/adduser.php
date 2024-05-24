<div class="card col-md-4 p-4">
    <!-- <div class="card-header"></div> -->
    <form action="<?= base_url('userapp/adduser') ?>" method="post">

        <div class="form-group">
            <select class="form-control">
                <option selected>- Pilih Role -</option>
                <option value="1">Administrator</option>
                <option value="2">Staff</option>
            </select>
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan Nama" required>
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="email" id="email" placeholder="Masukkan Email" required>
        </div>
        <div class="form-group">
            <input type="password" class="form-control" name="password" id="password" placeholder="Masukkan Password" required>
        </div>
        <button class="btn btn-info float-right" type="submit">Tambah Data</button>
    </form>
</div>
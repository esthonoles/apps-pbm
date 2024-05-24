<div class="row">
    <div class="col-md-8">
        <?= $this->session->flashdata('message'); ?>

        <a href="<?= base_url('datasampah/add') ?>" class="btn btn-info mb-2"><i class="fas fa-plus"></i> Tambah Data</a>

        <div class="card">
            <div class="card-body p-2">
                <table id="example1" class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Jenis Sampah</th>
                            <th>Harga /Kg</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($sampah as $s) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $s->nama ?></td>
                                <td><?= $s->harga ?></td>
                                <td>
                                    <button class="btn badge badge-info" data-toggle="modal" data-target="#edit<?= $s->id ?>"><i class="fas fa-edit"></i></button>
                                    <a href="<?= base_url('datasampah/delete/') ?><?= $s->id ?>" class="btn badge badge-danger" onclick="return confirm('Hapus Data ?');"><i class="fas fa-trash"></i></a>
                                </td>
                                </i>
                                </a>
                                </td>

                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<?php foreach ($sampah as $s) : ?>
    <div class="modal fade" id="edit<?= $s->id ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Data Sampah</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form action="<?= base_url('datasampah/updateData/' . $s->id) ?>" method="post">
                        <div class="form-group">
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Jenis Sampah" value="<?= $s->nama ?>">
                        </div>
                        <div class="form-group">
                            <input type="number" class="form-control" id="harga" name="harga" value="<?= $s->harga ?>">
                        </div>


                </div>
                <div class="modal-footer float-right">
                    <button type="submit" class="btn btn-primary"><i class="nav-icon fas fa-save"></i> Save changes</button>
                    <!-- <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="nav-icon fas fa-eraser"></i> Reset</button> -->

                </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach ?>
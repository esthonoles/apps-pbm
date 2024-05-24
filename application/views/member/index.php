<div class="row">
    <div class="col-md-12">
        <?= $this->session->flashdata('message'); ?>
        <div class="col-lg-12">
            <a href="<?= base_url('datamember/addmember') ?>" class="btn btn-info mb-2"><i class="fas fa-plus mr-1"></i>Tambah Member</a>
            <div class="card">
                <div class="card-body p-2">
                    <table id="example1" class="table table-hover mt-3 table-bordered">
                        <thead>

                            <tr>
                                <th scope="col">
                                    #</th>
                                <th scope="col">NO KTP</th>
                                <th scope="col">Nama Member</th>
                                <th scope="col">Tgl Lahir</th>
                                <th scope="col">No HP</th>
                                <th scope="col">Tgl Bergabung</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php $no = 1;
                            foreach ($member as $m) :
                            ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><a href="<?= base_url() ?>/datamember/akun_detail/<?= $m->id?>"><?= $m->ktp?></a></td>
                                    <td><?= strtoupper($m->nama) ?></td>
                                    <td><?= $m->tgl_lahir ?></td>
                                    <td><?= $m->no_hp ?></td>
                                    <td><?= date('d F Y', $m->dated_created) ?></td>

                                    <td>
                                        <button class="btn badge badge-info"><i class="fas fa-edit" data-toggle="modal" data-target="#edit<?= $m->id ?>"></i></button>
                                        <a href="<?= base_url('datamember/delete/') ?><?= $m->id ?>" class="btn badge badge-danger" onclick="return confirm('Hapus Data ?');"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- modal update data -->
    <!-- Modal -->
    <?php foreach ($member as $m) : ?>
        <div class="modal fade" id="edit<?= $m->id ?>">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Data Member</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <form action="<?= base_url('datamember/update/' . $m->id) ?>" method="post">
                            <div class="form-group">
                                <label class="form-label">No KTP</label>
                                <input type="number" class="form-control" id="ktp" name="ktp" placeholder="Jenis Sampah" value="<?= $m->ktp ?>">
                                <?= form_error('ktp', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                            <label class="form-label">Nama Nasabah</label>
                                <input type="text" class="form-control" id="nama" name="nama" value="<?= $m->nama ?>">
                            </div>
                            <div class="form-group">
                            <label for="tgl_lahir">Tanggal Lahir</label>
                                <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" value="<?= $m->tgl_lahir ?>">
                            </div>
                            <div class="form-group">
                            <label for="nohp">No Handphone</label>
                                <input type="number" class="form-control" id="notlp" name="notlp" value="<?= $m->no_hp ?>">
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
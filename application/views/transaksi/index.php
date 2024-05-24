<div class="row">
    <div class="col-md-12">
        <?= $this->session->flashdata('message'); ?>
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body p-2">
                    <table id="example1" class="table table-hover mt-3 ">
                        <thead>
                            <tr>
                                <th scope="col">
                                    #</th>
                                <th scope="col">No KTP</th>
                                <th scope="col">Nama Member</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($nasabah as $m) :
                            ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $m->ktp ?></td>
                                    <td><?= strtoupper($m->nama) ?></td>
                                    <td>
                                        <a href="<?= base_url(); ?>transaksi/debit/<?= $m->id ?>" class="btn btn-success "><i class="fas fa-wallet mr-2"></i>Debit</a>
                                        <a href="<?= base_url() ?>/transaksi/kredit/<?= $m->id ?>" class="btn btn-warning ml-1"><i class="fas fa-donate mr-2"></i>Kredit</a>

                                        <a href="<?= base_url() ?>/datamember/akun_detail/<?= $m->id ?>" class="btn btn-primary ml-3"><i class="fas fa-eye mr-3"></i>Lihat Detail Akun</a>
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
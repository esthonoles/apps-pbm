<div class="row">
  <div class="col-md-8">
    <?= $this->session->flashdata('message'); ?>

    <a href="<?= base_url('userapp/adduser') ?>" class="btn btn-info mb-2"><i class="fas fa-plus"></i> Tambah Data</a>
    <div class="card">
      <div class="card-body p-2">
        <table id="example1" class="table table-hover table-bordered">
          <thead>
            <tr>
              <th>#</th>
              <th>Username</th>
              <th>Email</th>
              <th>Role</th>
              <th>Created</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1;
            foreach ($datauser as $m) :
            ?>
              <tr>
                <td><?= $no++ ?></td>
                <td><?= $m->nama ?></td>
                <td><?= $m->email ?></td>
                <td>
                  <?php if ($m->role_id  == 1) : ?>
                    <sup class="badge badge-warning mt-2">administrator</sup>
                  <?php elseif ($m->role_id  == 2) : ?>
                    <sup class="badge badge-success mt-2">Staff</sup>
                  <?php endif; ?>
                </td>
                <td><?= date('d F Y', $m->date_created) ?></td>
                <td></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>


</div>
</form>
</div>
</div>
</div>
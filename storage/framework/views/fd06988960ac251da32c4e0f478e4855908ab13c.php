

<?php $__env->startSection('content'); ?>

<h4 class="mt-5">Data Admin</h4>

<a href="<?php echo e(route('admin.create')); ?>" type="button" class="btn btn-success rounded-3">Tambah Data</a>

<?php if($message = Session::get('success')): ?>
    <div class="alert alert-success mt-3" role="alert">
        <?php echo e($message); ?>

    </div>
<?php endif; ?>

<table class="table table-hover mt-2">
    <thead>
      <tr>
        <th>No.</th>
        <th>Nama</th>
        <th>Alamat</th>
        <th>Username</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $datas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($data->id_admin); ?></td>
                <td><?php echo e($data->nama_admin); ?></td>
                <td><?php echo e($data->alamat); ?></td>
                <td><?php echo e($data->username); ?></td>
                <td>
                    <a href="<?php echo e(route('admin.edit', $data->id_admin)); ?>" type="button" class="btn btn-warning rounded-3">Ubah</a>

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusModal<?php echo e($data->id_admin); ?>">
                        Hapus
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="hapusModal<?php echo e($data->id_admin); ?>" tabindex="-1" aria-labelledby="hapusModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="hapusModalLabel">Konfirmasi</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form method="POST" action="<?php echo e(route('admin.delete', $data->id_admin)); ?>">
                                    <?php echo csrf_field(); ?>
                                    <div class="modal-body">
                                        Apakah anda yakin ingin menghapus data ini?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-primary">Ya</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        
    </tbody>
</table>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\modul2_kel17\resources\views/admin/index.blade.php ENDPATH**/ ?>
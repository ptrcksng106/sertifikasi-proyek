<!-- membuat kerangka dari master.blade.php -->


<!-- membuat komponen title sebagai judul halaman -->
<?php $__env->startSection('title', 'Menambah Artikel'); ?>

<!-- membuat komponen main yang berisi form untuk mengisi judul dan isi artikel -->
<?php $__env->startSection('main'); ?>
    <div class="col-md-8 col-sm-12 bg-light p-4">
        <form method="post" action="/add_process" enctype = "multipart/form-data">
        <?php echo csrf_field(); ?>
            <div class="form-group">
                <label>Judul Artikel</label>
                <input type="text" class="form-control" name="judul" placeholder="Judul artikel">
            </div>
            
            <div class="form-group">
                <label>Isi Artikel</label>
                <textarea class="form-control" name="deskripsi" rows="15"></textarea>
            </div>

            <div class="mb-3">
                <label for="formFile" class="form-label">Gambar Artikel</label>
                <input class="form-control" type="file" id="media" name="media">
            </div>
    </div>
<?php $__env->stopSection(); ?>

<!-- membuat komponen sidebar yang berisi tombol untuk upload artikel -->
<?php $__env->startSection('sidebar'); ?>
    <div class="col-md-3 ml-md-5 col-sm-12 bg-white p-4" style="height:120px !important">
        <div class="form-group">
            <label>Upload</label>
            <input type="submit" class="form-control btn btn-outline-primary" value="Upload">
        </div>
    </div>
    </form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/patricksinaga/example-app/resources/views/add.blade.php ENDPATH**/ ?>
<!-- menggunakan kerangka dari halaman master.blade.php --> 


<!-- membuat komponen title sebagai judul halaman -->
<?php $__env->startSection('title', 'Blog ku'); ?>

<!-- membuat header dan tombol tambah artikel di atas -->
<?php $__env->startSection('header'); ?>
    <center>
        <h2>Blog ku</h2>
        <a href="/admin"><button class="btn btn-outline-info">Menu Admin</button></a>
    </center>
<?php $__env->stopSection(); ?>

<!-- membuat komponen main yang berisi form untuk mengisi judul dan isi artikel -->
<?php $__env->startSection('main'); ?>
    <?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="col-md-4 col-sm-12 mt-4">
        <div class="card">
            <img src="<?php echo e(asset('storage/'. $article->media)); ?>" class="card-img-top" alt="gambar" >
            <div class="card-body">
                <h5 class="card-title"><?php echo e($article->judul); ?></h5>
                <a href="/detail/<?php echo e($article->id); ?>" class="btn btn-primary">Baca Artikel</a>
            </div>
        </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/patricksinaga/example-app/resources/views/show.blade.php ENDPATH**/ ?>
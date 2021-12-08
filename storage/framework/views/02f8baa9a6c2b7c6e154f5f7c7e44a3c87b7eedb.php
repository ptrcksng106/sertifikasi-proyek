<!-- memberikan judul di tab sesuai dengan judul artikel yang sedang dibaca -->
<?php $__env->startSection('title'); ?>
<?php echo e($article->judul); ?>

<?php $__env->stopSection(); ?>

<!-- menampilkan gambar, judul, dan isi artikel -->
<?php $__env->startSection('main'); ?>
<div class="col-md-7 col-sm-12 mb-5 bg-white p-0">
    <img src="<?php echo e(asset('storage/'. $article->media)); ?>" class="card-img-top" alt="gambar" >
    <div class="p-4">
        <h2><?php echo e($article->judul); ?></h2>
        <p class="mt-5"><?php echo e($article->deskripsi); ?></p>
    </div>
</div>
<?php $__env->stopSection(); ?>

<!-- menampilkan tombol kembali ke halaman utama -->
<?php $__env->startSection('sidebar'); ?>
<div class="col-md-4 offset-md-1 col-sm-12 bg-transparent p-4 h-100 mt-3">
    <center> 
        <a href="/"> 
            <button class="btn btn-info text-white w-100">Kembali</button> 
        </a>
    </center>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/patricksinaga/example-app/resources/views/detail.blade.php ENDPATH**/ ?>
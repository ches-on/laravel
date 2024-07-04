<?php $__env->startSection('header'); ?>
<link href="<?php echo e(mix('css/app.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main'); ?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
 
    
    <div class="container mt-3">
                   
        </div>
        <div class="">
            <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <article class="mb-5">
                <h2 ><?php echo e($post->title); ?></h2>
                <p class="text-muted"><strong>Posted on</strong> <?php echo e($post->created_at->format('m,y')); ?> <br><strong>Written By</strong> <?php echo e($post->author); ?> <br>  <strong>Posted by:</strong> <?php echo e($post->user->name); ?></p>
                <p><?php echo Str::limit($post->content, 100); ?></p>
                <a href="<?php echo e(route('blog.show', $post->id)); ?>" class="btn btn-primary">Read More</a>
            </article>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        
        <?php echo e($posts->links()); ?>

        
    </div>
</main>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\blogger\resources\views/search.blade.php ENDPATH**/ ?>
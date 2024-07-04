
<?php $__env->startSection('header'); ?>
<script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main'); ?>
<div class="container col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-secondary" style='text-align:center; color:white; font-size:20px'>EDIT A POST</div>

                <div class="card-body">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>
                       
                        <form method="POST" action="<?php echo e(route('post.update', $post->id)); ?>">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('post'); ?>
                            <div class="mb-3">
                                <label for="title" class="form-label"><?php echo e(__('Title')); ?></label>
                                <input type="text" class="form-control" id="title" name="title" required value="<?php echo e($post->title); ?>">
                            </div>
    
                            <div class="mb-3">
                                <label for="content" class="form-label"><?php echo e(__('Content')); ?></label>
                                <textarea class="form-control" id="content" name="content" rows="10" required value=""><?php echo e($post->content); ?></textarea>
                            </div>
    
                            <div class="mb-3">
                                <label for="author" class="form-label"><?php echo e(__('Author')); ?></label>
                                <input type="text" class="form-control" id="author" name="author" value="<?php echo e($post->author); ?>" required>
                            </div>
    
                            <button type="submit" class="btn btn-primary rounded"><?php echo e(__('Submit')); ?></button>
                        </form>   
                    
                   
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    CKEDITOR.replace('content');
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\blogger\resources\views/edit.blade.php ENDPATH**/ ?>
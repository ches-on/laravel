<?php $__env->startSection('main'); ?>
<div class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AppLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
         <?php $__env->slot('header', null, []); ?> 
            <h2 class="font-semibold text-xl text-gray-800 leading-tight justify-content-center">
                <?php echo e(__('Operations')); ?>

            </h2>
         <?php $__env->endSlot(); ?>
    
        <div >
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header bg-secondary" style='text-align:center; color:white; font-size:20px'>CREATE A POST</div>
        
                        <div class="card-body">
                            <?php if(session('status')): ?>
                                <div class="alert alert-success" role="alert">
                                    <?php echo e(session('status')); ?>

                                </div>
                            <?php endif; ?>
        
                            <form method="POST" action="<?php echo e(route('post.store')); ?>">
                                <?php echo csrf_field(); ?>
        
                                <div class="mb-3">
                                    <label for="title" class="form-label"><?php echo e(__('Title')); ?></label>
                                    <input type="text" class="form-control" id="title" name="title" required>
                                </div>
        
                                <div class="mb-3">
                                    <label for="content" class="form-label"><?php echo e(__('Content')); ?></label>
                                    <textarea class="form-control" id="content" name="content" rows="10" required></textarea>
                                </div>
        
                                <div class="mb-3">
                                    <label for="author" class="form-label"><?php echo e(__('Author')); ?></label>
                                    <input type="text" class="form-control" id="author" name="author" required>
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
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
    
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\blogger\resources\views/create.blade.php ENDPATH**/ ?>
<?php $__env->startSection('header'); ?>
<script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content-header'); ?>
    <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Post</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>">Dashboard</a></li>
            <li class="breadcrumb-item active">Edit</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
      </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>
<section class="content">

    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <!-- Default box -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Edits</h3>
  
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
                <?php if(session('status')): ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo e(session('status')); ?>

                    </div>
                <?php endif; ?>
                   
                    
               
            </div>
            <div class="card-body">
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
            
            <!-- /.card-body -->
            <div class="card-footer">
              Editing post
            </div>
            <!-- /.card-footer-->
          </div>
          <!-- /.card -->
        </div>
      </div>
    </div>
  </section>
<script>
    CKEDITOR.replace('content');
</script>
<?php $__env->stopSection(); ?>






<?php echo $__env->make('admin.main-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\blogger\resources\views/admin/blog/edit.blade.php ENDPATH**/ ?>
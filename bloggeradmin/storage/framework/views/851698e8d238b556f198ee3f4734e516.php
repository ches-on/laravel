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
          <li class="breadcrumb-item active">filter</li>
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
            <h3 class="card-title">Filter </h3>

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
            <form action="" method="get">
              <div class="row mb-2">
                <div class="col-md-3">
                <label for="">Filter by Date</label>
                <input type="date" name="date" value="<?php echo e(Request::get('date')??date('y-m-d')); ?>" class="form-control">
                </div>
                <div class="col-md-3">
                  <button type="submit" class="btn btn-primary">Filter</button>
                </div>
              </div>
            </form>
            <table class="table table-bordered">
              <thead>
                  <tr>

                      <th>Title</th>
                      <th>Created at</th>
                      <th>Author</th>
                      <th>Posted By</th>
                      <th>Action</th>
                  </tr>
              </thead>
              <tbody>
                <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <tr>
                          <td><?php echo e($post->title); ?></td>
                          <td><?php echo e($post->created_at->format('d,m,y')); ?></td>
                          <td><?php echo e($post->author); ?></td>
                          <td><?php echo e($post->user->name); ?></td>
                          <td>

                            
                            <a href="<?php echo e(route('post.delete', $post->id)); ?>"  class="fa fa-trash" style="color:red; margin-left:5%"></a></i>
                          </td>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </tbody>
          </table>


          </div>
          <p style="height: 10px"> <?php echo e($posts->links()); ?></p>
          <!-- /.card-body -->
          <div class="card-footer">
          Posts
          </div>
          <!-- /.card-footer-->
        </div>
        <!-- /.card -->
      </div>
    </div>
  </div>


  <!-- add post form -->





</section>
      <script>
          CKEDITOR.replace('content');
      </script>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.main-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\blogger\resources\views/admin/blog/filter.blade.php ENDPATH**/ ?>
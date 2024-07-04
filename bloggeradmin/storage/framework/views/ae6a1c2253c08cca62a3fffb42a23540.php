<?php $__env->startSection('main'); ?>
<div class="container col-md-9 ms-sm-auto col-lg-10 px-md-4">
    
        <div>
            <div>
                <?php if(auth()->guard()->check()): ?>
                    <?php if(Auth::id() === $post->user_id): ?>
                    <a href="<?php echo e(route('post.edit', $post->id)); ?>" class='btn btn-success rounded'>Edit</a>
                    <form style='float:right' action="<?php echo e(route('post.delete', $post->id)); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('delete'); ?>
                        <button type="submit" class='btn btn-danger rounded'>Delete</button>
                    </form>
                    <?php endif; ?>
                <?php endif; ?>
                
            </div>
            <div class="card">
                <div class="card-header"><?php echo e($post->title); ?></div>
                
                <div class="card-body">
                    
                    <p><strong>Author:</strong> <?php echo e($post->author); ?></p>
                    <p><strong>Posted by:</strong> <?php echo e($post->user->name); ?></p>
                    <p><strong>Posted on:</strong> <?php echo e($post->created_at->format('M, Y')); ?></p>
                    <p><?php echo $post->content; ?></p>
                </div>
            </div>
        </div>
        <div>
            <h1>comments</h1>
            <?php if($post->comments->isEmpty()): ?>
            <p>No comments yet.</p>
        <?php else: ?>
            <div>
                <?php $__currentLoopData = $post->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div>
                    <span style="color: blue; "><i><strong>@</strong></i> <?php echo e($comment->user->name); ?></span>
                    <i>==><?php echo e($comment->comment); ?></i>
                </div>
             
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <?php endif; ?>
            <?php if(auth()->guard()->check()): ?>
            <form action="<?php echo e(route('comment.store', ['id' => $post->id])); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <div class="form-group">
                    <label for="comment">Comment:</label>
                    <textarea name="comment" id="comment" class="form-control" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Add Comment</button>
            </form>
            <?php endif; ?>
            
        </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\blogger\resources\views/show.blade.php ENDPATH**/ ?>
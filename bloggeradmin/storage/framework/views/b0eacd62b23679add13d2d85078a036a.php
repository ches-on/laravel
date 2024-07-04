<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Website</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo e(asset('css/blog.css')); ?>" rel="stylesheet">
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    <link href="<?php echo e(mix('css/app.css')); ?>" rel="stylesheet">
</head>
<body>
<?php echo $__env->yieldContent('header'); ?>
    
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-secondary sidebar">
                <div class="position-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <p class="nav-item text-grey-600" style='text-align:center; font-size:20px' >Lets blog</p>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" style='color:white' aria-current="page" href="<?php echo e(route('welcome')); ?>">Home</a>
                        </li>
                        <?php if(auth()->guard()->check()): ?>
                        <li class="nav-item">
                        <a class="nav-link" style='color:white' href="<?php echo e(route('userdashboard')); ?>">Dashboard</a>
                        </li> 
                         <?php endif; ?>
                        <li class="nav-item">
                            <a class="nav-link" style='color:white' href="<?php echo e(route('about.show')); ?>">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" style='color:white' href="/contact">Contact</a>
                        </li>
                        <?php if(auth()->guard()->guest()): ?>
                        <li class="nav-item">
                            <a class="nav-link" style='color:white' href="<?php echo e(route('login')); ?>">Login</a>
                        </li>
                        
                        
                        <?php endif; ?>
                        <?php if(auth()->guard()->check()): ?>
                        
                        
                        <li class="nav-item">
                            <form method="POST" style='text-decoration:none; color:white' action="<?php echo e(route('logout')); ?>">
                                <?php echo csrf_field(); ?>

                                <?php if (isset($component)) { $__componentOriginal68cb1971a2b92c9735f83359058f7108 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal68cb1971a2b92c9735f83359058f7108 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.dropdown-link','data' => ['style' => 'text-decoration:none; color:white','href' => route('logout'),'onclick' => 'event.preventDefault();
                                                    this.closest(\'form\').submit();']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('dropdown-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['style' => 'text-decoration:none; color:white','href' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('logout')),'onclick' => 'event.preventDefault();
                                                    this.closest(\'form\').submit();']); ?>
                                    <?php echo e(__('Log Out')); ?>

                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal68cb1971a2b92c9735f83359058f7108)): ?>
<?php $attributes = $__attributesOriginal68cb1971a2b92c9735f83359058f7108; ?>
<?php unset($__attributesOriginal68cb1971a2b92c9735f83359058f7108); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal68cb1971a2b92c9735f83359058f7108)): ?>
<?php $component = $__componentOriginal68cb1971a2b92c9735f83359058f7108; ?>
<?php unset($__componentOriginal68cb1971a2b92c9735f83359058f7108); ?>
<?php endif; ?>
                            </form> 
                        </li>
                         <?php endif; ?>
                    </ul>
                    </ul>
                </div>
            </nav>

            <!-- Main Content -->
            <?php echo $__env->yieldContent('main'); ?>
        </div>
    </div>
    <script src="<?php echo e(mix('js/app.js')); ?>"></script>
    <footer class="bg-dark text-white text-center py-3">
        <p>&copy; Justus. All rights reserved.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\blogger\resources\views/layout.blade.php ENDPATH**/ ?>
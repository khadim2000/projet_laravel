<!-- resources/views/login.blade.php -->



<?php $__env->startSection('content'); ?><!-- resources/views/layouts/layout.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Application</title>


</head>
<body>
    <header>
        <div id="app"></div>
        <?php echo app('Illuminate\Foundation\Vite')(["resources/css/app.css", "resources/js/app.js"]); ?> 

    <main>
        <?php echo $__env->yieldContent('content'); ?> <!-- Insère le contenu spécifique à chaque page -->
    </main>

    <footer>
        <!-- Insérez le contenu du footer ici si nécessaire -->
    </footer>
</body>
</html>

    

<?php echo $__env->make('login', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/khadim/projetLaravel/projet_laravel/khadim-laravel/resources/views/login.blade.php ENDPATH**/ ?>
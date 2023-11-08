<div class="container-fluid bg-dark">
    <nav class="navbar navbar-expand-lg navbar-light ">
        <div class="container">
            
            <a class="navbar-brand text-white english" href="<?php echo URL_ROOT; ?>">
                <img src="<?php echo e(asset('images/logo.jpg')); ?>" alt="" width="30" height="30" class="rounded">
                <span class="ms-3">Food Paradise</span>
            </a>
            <button class="navbar-toggler english" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa fa-list text-white"></i>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
            <ul class="navbar-nav ">

                <?php 
                use App\Classes\Auth;
                 if(Auth::check()): ?>
                    <?php if(Auth::user()->is_admin === 1): ?>
                        <li class="nav-item">
                            <a class="nav-link text-white english" href="<?php echo URL_ROOT . 'admin'; ?>">Admin</a>
                        </li>
                    <?php endif; ?>
                <?php endif; ?>

                
                <li class="nav-item">
                    <a class="nav-link text-white english" href="<?php echo URL_ROOT . 'cart'; ?>">
                        Cart
                        <span class="translate-middle badge rounded-pill bg-danger" id="badge">0</span>
                    </a>
                </li>
                

                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-white english" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <?php if(App\Classes\Auth::check()): ?>
                        <?php echo e(App\Classes\Auth::user()->name); ?>

                    <?php else: ?>
                        Member
                    <?php endif; ?>  
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <?php if(App\Classes\Auth::check()): ?>
                        <li><a class="dropdown-item" href="<?php echo URL_ROOT . 'user/logout'; ?>">Logout</a></li>
                    <?php else: ?>
                        <li><a class="dropdown-item" href="<?php echo URL_ROOT . 'user/login'; ?>">Login</a></li>
                        <li><a class="dropdown-item" href="<?php echo URL_ROOT . 'user/register'; ?>">Register</a></li>
                    <?php endif; ?>
                </ul>
                </li>
            </ul>
            </div>
        </div>
    </nav>
</div><?php /**PATH C:\xampp\htdocs\E-Commerce\resources\views/layout/nav.blade.php ENDPATH**/ ?>
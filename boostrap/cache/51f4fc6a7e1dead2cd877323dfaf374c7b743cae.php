<div class="container-fluid bg-dark">
    <nav class="navbar navbar-expand-lg navbar-light ">
        <div class="container">
            <a class="navbar-brand text-white english" href="#">
                <span>Navbar</span>
            </a>
            <button class="navbar-toggler english" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa fa-list text-white"></i>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
            <ul class="navbar-nav ">
                <li class="nav-item">
                <a class="nav-link active text-white english" aria-current="page" href="<?php echo URL_ROOT; ?>">Home</a>
                </li>
                <li class="nav-item">
                <a class="nav-link text-white english" href="<?php echo URL_ROOT . 'admin/category'; ?>">Category</a>
                </li>
                <li class="nav-item">
                <a class="nav-link text-white english" href="#">Pricing</a>
                </li>
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-white english" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Dropdown link
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
                </li>
            </ul>
            </div>
        </div>
    </nav>
</div><?php /**PATH C:\xampp\htdocs\E-Commerce\resources\views/layout/nav.blade.php ENDPATH**/ ?>
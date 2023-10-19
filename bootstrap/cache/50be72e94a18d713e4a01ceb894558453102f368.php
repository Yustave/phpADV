<div class="container-fluid nav-color">
    <nav class="container navbar navbar-expand-lg ">
    <div class="container-fluid">
        <a class="navbar-brand english text-white" href="<?php echo URL_ROOT ?>">
            <img src=<?php echo URL_ROOT."/assets/images/icon.jpg"?> alt="" style="width: 30px; height: 30px;">
            <span>Navbar</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
            <li class="nav-item">
            <a class="nav-link active english text-white"href="<?php echo URL_ROOT ?>">Home</a>
            </li>
            <li class="nav-item">
            <a class="nav-link english text-white" href="admin">Admin Pannel</a>
            </li>
            <li class="nav-item">
            <a class="nav-link english text-white" href="#">Pricing</a>
            </li>
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle english text-white" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
</div>
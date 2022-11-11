<header class="stroem-header bg-onyx">
    <div class="navbar navbar-first">
        <div class="container">
            <a class="navbar-brand" href="./"><img src="<?=API_URL . '/images/logo.png'?>" alt=""></a>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <i class="fas fa-map-marker-alt text-stroem"></i> <span><?=$getContactInformationResult['address'] . ', ' . $getContactInformationResult['zipcity'];?>.</span>
                </li>
                <li class="nav-item mx-lg-3 mx-0">
                    <i class="far fa-clock text-stroem"></i> <span><?=$getContactInformationResult['openinghours'];?></span>
                </li>
                <li class="nav-item">
                    <i class="fas fa-phone-alt text-stroem"></i> <span><?=$getContactInformationResult['phone'];?></span>
                </li>
            </ul>
        </div>
    </div>
    <nav class="navbar navbar-second navbar-expand-lg navbar-dark py-0">
        <div class="container">
            <div class="second-container rounded-1 d-flex justify-content-between w-100">
                <div class="d-flex d-lg-none flex-row justify-content-between w-100">
                    <button class="navbar-toggler me-2" type="button" data-bs-toggle="collapse" data-bs-target="#collapseNavbar" aria-controls="collapseNavbar" aria-expanded="false" aria-label="Vis/skjul navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <form class="d-flex" role="search">
                        <input class="form-control" type="search" placeholder="Søg" aria-label="Søg">
                        <!-- <button class="btn btn-outline-success" type="submit">S</button> -->
                    </form>
                </div>
                <div class="collapse navbar-collapse" id="collapseNavbar">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="./" class="nav-link">Forside</a>
                        </li>
                        <li class="nav-item">
                            <a href="./about" class="nav-link">Om os</a>
                        </li>
                        <li class="nav-item">
                            <a href="./service" class="nav-link">Service</a>
                        </li>
                        <li class="nav-item">
                            <a href="./faq" class="nav-link">FAQ</a>
                        </li>
                        <li class="nav-item">
                            <a href="./news" class="nav-link" data-url="/news?id=<?=isset($_GET['id']) ? $_GET['id'] : '';?>">Nyheder</a>
                        </li>
                        <li class="nav-item">
                            <a href="./contact" class="nav-link">Kontakt os</a>
                        </li>
                    </ul>
                </div>
                <form class="d-none d-lg-flex" role="search">
                    <input class="form-control" type="search" placeholder="Søg" aria-label="Søg">
                    <!-- <button class="btn btn-outline-success" type="submit">S</button> -->
                </form>
            </div>
        </div>
    </nav>
</header>
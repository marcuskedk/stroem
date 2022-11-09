<footer class="stroem-footer">
    <div class="footer-content">
        <div class="footer-list bg-onyx border-bottom border-secondary py-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <ul>
                            <li>
                                <img src="<?=API_URL . '/images/logo.png'?>" alt="">
                            </li>
                            <li>
                                <p>Som medlem ......</p>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-3">
                        <h5>Link</h5>
                        <ul>
                            <li>
                                <a href="#">FAQ</a>
                            </li>
                            <li>
                                <a href="#">Om os</a>
                            </li>
                            <li>
                                <a href="#">Kontakt os</a>
                            </li>
                            <li>
                                <a href="#">Services</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-3">
                        <h5>Kontakt os</h5>
                        <ul>
                            <li>
                                <p class="mb-1"><b><?=$getContactInformationResult['company'];?></b></p>
                                <p class="mb-1"><b>CVR:</b> <?=$getContactInformationResult['cvr'];?></p>
                                <p class="mb-1"><b>Email:</b> <?=$getContactInformationResult['email'];?></p>
                                <p class="mb-1"><b>Adresse:</b> <?=$getContactInformationResult['address'] . ', ' . $getContactInformationResult['zipcity'];?></p>
                                <p class="mb-1"><b>Åbningstider:</b> <?=$getContactInformationResult['openinghours'];?></p>
                                <p class="mb-0"><b>Telefon:</b> <?=$getContactInformationResult['phone'];?></p>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-3">
                        <h5>Nyhedsbrev</h5>
                        <p>Tilmeld dig vores nyhedsbrev her</p>
                        <form method="POST">
                            <input type="text" class="form-control mb-3 rounded-1 py-2 px-3 bg-independence border-independence" placeholder="Din Email">
                            <button class="btn btn-stroem text-uppercase py-2 px-4 rounded-1">Tilmeld</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-onyx py-3">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <p class="mb-0 text-white"><span class="text-stroem">Strøm</span> &copy; 2017 All Right Reserved</p>
                    </div>
                    <div class="col-lg-6"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="go-to-top">
        <a href="#go-to-top" class="btn btn-stroem">/\</a>
    </div>
    <div class="stroem-preloader">
        <div class="stroem-preloader-container">
            <img src="<?=API_URL . '/images/icons/preloader.gif'?>" alt="">
        </div>
    </div>
</footer>

<?php

    require './Config.php'; // Config - diverse indstillinger og hurtig kan ændres, hvis noget skulle ændres
    
    require './inc/data/ControllerData.php'; // ControllerData - funktioner / dataer der bliver hentet, så der ikke skal skrives flere gange

    $getContactInformationResult = api('contactinformation', 'GET', ''); // Vi henter kontakt information dataer fra kontakt information i api'et

    $getSliderResult = api('slider', 'GET', ''); // Vi henter slider dataer fra slider i api'et

    $getAboutResult = api('about', 'GET', ''); // Vi henter om os dataer fra om os i api'et

    $getServiceResult = api('service', 'GET', ''); // Vi henter service dataer fra service i api'et

    $getTestimonialResult = api('testimonial', 'GET', ''); // Vi henter testimonial dataer fra testimonial i api'et

    $getTeamResult = api('team', 'GET', ''); // Vi henter team dataer fra henter i api'et
    
    $getNewsResult = api('news', 'GET', ''); // Vi henter nyheder dataer fra nyheder i api'et

    require './inc/components/Head.php'; // Head components - links, meta, scripts
    require './inc/components/Header.php'; // Header components - Header med navbar

    echo breadcrumbs(
        [
            'Forside' => ['link' => './'],
            'Dashboard' => ['link' => NULL]
        ]
    );

?>

<section class="admin-page">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <h4>Log ind</h4>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quas repudiandae tempora sequi deserunt molestiae porro!</p>
                <form method="POST" class="row g-3" id="loginForm">
                    <div class="col-12">
                        <input type="email" class="form-control py-2 px-3 rounded-1" placeholder="Email" name="email" id="email-validate" value="<?=isset($_POST['email']);?>" required>
                    </div>
                    <div class="col-12">
                        <input type="password" class="form-control py-2 px-3 rounded-1" placeholder="Adgangskode" name="password" id="password-validate" value="<?=isset($_POST['password']);?>" required>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-stroem text-uppercase py-2 px-4 rounded-1">Log ind</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?php require './inc/components/Footer.php'; ?>
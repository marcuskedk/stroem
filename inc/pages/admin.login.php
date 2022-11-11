<?php
    
    echo breadcrumbs(
        [
            'Forside' => ['link' => './'],
            'Log ind' => ['link' => NULL]
        ]
    );

?>

<section class="admin-page">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <h4>Log ind</h4>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quas repudiandae tempora sequi deserunt molestiae porro!</p>
                <form method="POST" class="row g-3">
                    <div class="error-message"></div>
                    <div class="col-12">
                        <input type="email" class="form-control py-2 px-3 rounded-1" placeholder="Email" name="email" id="email-validate" value="<?=isset($_POST['email']) ? $_POST['email'] : '';?>" required>
                    </div>
                    <div class="col-12">
                        <input type="password" class="form-control py-2 px-3 rounded-1" placeholder="Adgangskode" name="password" id="password-validate" value="<?=isset($_POST['password']) ? $_POST['password'] : '';?>" required>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-stroem text-uppercase py-2 px-4 rounded-1" name="login">Log ind</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
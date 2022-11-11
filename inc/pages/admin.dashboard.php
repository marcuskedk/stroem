<?php

    echo breadcrumbs(
        [
            'Forside' => ['link' => './'],
            'Dashboard' => ['link' => NULL]
        ]
    );

    // session_destroy();

?>

<main class="admin">
    <div class="container-fluid">
        <div class="row justify-content-center g-4">
            <?php require './inc/components/Sidebar.php'; ?>
            <div class="admin-content col-lg-10">
                <div class="row">
                    <div class="col-12">
                        <h4>Dashboard</h4>
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quas repudiandae tempora sequi deserunt molestiae porro!</p>
                        <form method="POST" class="row g-3" id="loginForm">
                            <div class="error-message"></div>
                            <div class="col-12">
                                <input type="email" class="form-control py-2 px-3 rounded-1" placeholder="Email" name="email" id="email-validate" value="<?=isset($_POST['email']) ? $_POST['email'] : '';?>" required>
                            </div>
                            <div class="col-12">
                                <input type="password" class="form-control py-2 px-3 rounded-1" placeholder="Adgangskode" name="password" id="password-validate" value="<?=isset($_POST['password']) ? $_POST['password'] : '';?>" required>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-stroem text-uppercase py-2 px-4 rounded-1">Log ind</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

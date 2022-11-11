<?php

    echo breadcrumbs(
        [
            'Forside' => ['link' => './'],
            'Din konto' => ['link' => NULL]
        ]
    );

    if (isset($_POST['account_edit']) === true) {
        $json = array(
            'name' => $_POST['name'],
            'email' => $_POST['email'],
        );
        api('user/admin/' . $_SESSION['id'], 'PUT', json_encode($json));
        header('Location: ./admin?page=account');
    }

?>

<main class="admin">
    <div class="container-fluid">
        <div class="row justify-content-center g-4">
            <?php require './inc/components/Sidebar.php'; ?>
            <div class="admin-content col-lg-10">
                <h5>Din konto</h5>
                <form method="POST" class="row">
                    <div class="error-message"></div>
                    <div class="col-lg-4">
                        <input type="name" class="form-control py-2 px-3 rounded-1 mb-3" placeholder="Navn" name="name" id="name-validate" value="<?=isset($_POST['name']) ? $_POST['name'] : $getUserInformationResult['name'];?>" required>
                        <input type="email" class="form-control py-2 px-3 rounded-1 mb-3" placeholder="Email" name="email" id="email-validate" value="<?=isset($_POST['email']) ? $_POST['email'] : $getUserInformationResult['email'];?>" required>
                        <button type="submit" class="btn btn-stroem text-uppercase py-2 px-4 rounded-1" name="account_edit">Opdater konto</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

<?php

    echo breadcrumbs(
        [
            'Forside' => ['link' => './'],
            'Dashboard' => ['link' => './admin'],
            'Denne side eksistere ikke' => ['link' => NULL]
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
                        <h4>Denne side eksistere ikke</h4>
                        <a href="./admin">Tilbage til dashboard</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

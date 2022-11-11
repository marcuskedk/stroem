<?php

    echo breadcrumbs(
        [
            'Forside' => ['link' => './'],
            'Administrere om os' => ['link' => NULL]
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
                <?php if (isset($_GET['id'])) { ?>
                    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
                    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
                    <form method="POST" class="row g-3">
                        <div class="error-message"></div>
                        <div class="col-lg-6">
                            <input type="name" class="form-control py-2 px-3 rounded-1 mb-3" placeholder="Navn" name="name" id="name-validate" value="<?=isset($_POST['name']) ? $_POST['name'] : $getAboutResult['title'];?>" required>
                        </div>
                        <div class="col-lg-6">
                            <input type="email" class="form-control py-2 px-3 rounded-1 mb-3" placeholder="Email" name="email" id="email-validate" value="<?=isset($_POST['email']) ? $_POST['email'] : $getAboutResult['teaser'];?>" required>
                        </div>
                        <div class="col-12">
                            <div id="toolbar"></div>
                            <div id="editor"></div>
                        </div>
                        <div class="col-lg-6">
                            <button type="submit" class="btn btn-stroem text-uppercase py-2 px-4 rounded-1" name="about_edit">Gem ændringer</button>
                        </div>
                    </form>
                    <script>
                        var toolbarOptions = [
                            ['bold', 'italic', 'underline', 'strike'],        // toggled buttons
                            ['blockquote', 'code-block'],

                            [{ 'header': 1 }, { 'header': 2 }],               // custom button values
                            [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                            [{ 'script': 'sub'}, { 'script': 'super' }],      // superscript/subscript
                            [{ 'indent': '-1'}, { 'indent': '+1' }],          // outdent/indent
                            [{ 'direction': 'rtl' }],                         // text direction

                            [{ 'size': ['small', false, 'large', 'huge'] }],  // custom dropdown
                            [{ 'header': [1, 2, 3, 4, 5, 6, false] }],

                            [{ 'color': [] }, { 'background': [] }],          // dropdown with defaults from theme
                            [{ 'align': [] }],

                            ['clean']                                         // remove formatting button
                        ];

                        var quill = new Quill('#editor', {
                            placeholder: 'Compose an epic...',
                            theme: 'snow',
                            modules: {
                                toolbar: toolbarOptions
                            },
                        });
                    </script>
                <?php } else if (isset($_GET['page']) && $_GET['page'] == "create-about") { ?>
                    <script src="https://cdn.ckeditor.com/ckeditor5/35.3.0/classic/ckeditor.js"></script>
                    <form method="POST" class="row">
                        <div class="error-message"></div>
                        <div class="col-lg-4">
                            <input type="name" class="form-control py-2 px-3 rounded-1 mb-3" placeholder="Navn" name="name" id="name-validate" value="<?=isset($_POST['name']) ? $_POST['name'] : $getUserInformationResult['name'];?>" required>
                            <input type="email" class="form-control py-2 px-3 rounded-1 mb-3" placeholder="Email" name="email" id="email-validate" value="<?=isset($_POST['email']) ? $_POST['email'] : $getUserInformationResult['email'];?>" required>
                            <button type="submit" class="btn btn-stroem text-uppercase py-2 px-4 rounded-1" name="about_edit">Gem ændringer</button>
                        </div>
                    </form>
                <?php } else { ?>
                    <div class="card rounded-1">
                        <div class="card-body">
                            <h5>Alle om os</h5>
                            <hr class="mb-0">
                        </div>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th class="text-end">Handling</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="p-0"><a href="./admin?page=about&id=<?=$getAboutResult['_id'];?>" class="p-2 text-decoration-none text-dark d-block">1</a></td>
                                    <td class="p-0"><a href="./admin?page=about&id=<?=$getAboutResult['_id'];?>" class="p-2 text-decoration-none text-dark d-block"><?=$getAboutResult['title'];?></a></td>
                                    <td class="p-1 text-end"><a href="./admin?page=about&id=<?=$getAboutResult['_id'];?>" class="btn btn-stroem btn-sm py-1 px-3">Gå til</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</main>

<?php

    function breadcrumbs($nav) {
        $list = '';
        $response = <<<HTML
        <nav class="stroem-breadcrumb" style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <div class="container d-flex justify-content-between align-items-center">
        HTML;
                foreach ($nav as $nav_key => $nav_item) {
                    if ($nav_item['link'] > null) {
                        $item = '<li class="breadcrumb-item"><a href="' . $nav_item['link'] . '">' . $nav_key . '</a></li>';
                    } else {
                        $item = '<li class="breadcrumb-item active" aria-current="page">' . $nav_key . '</li>';
                        $title = $nav_key;
                    }
                    $list = $list . $item;
                }
                $response = $response . '
                <h5 class="mb-0 fs-2">' . $title . '</h5>
                <ol class="breadcrumb mb-0">
                    ' . $list . '
                </ol>
            </div>
        </nav>';
        return $response;
    }

?>
<?php

    // Vi finder filerne under mappen functions og starter dem, ved en require - Her bliver der loopet.
    $files = glob(__DIR__ . '/functions/*.php');
    foreach ($files as $file) {
        if ($file != __FILE__) {
            require($file);
        }
    }

?>
<?php
function scanFile($dir, $namafile)
{
    $scan = scandir($dir);
    $status = 0;

    foreach ($scan as $file) {
        if (strstr($file, $namafile . '.php')) {
            $status = 1;
        }
    }
    return $status;
}

<?php
    $r = 112;
    $g = 128;
    $b = 144;

    if (array_key_exists('background', $_GET)) {
        switch ($_GET['background']) {
            case "black":
                $r = 0;
                $g = 0;
                $b = 0;
                break;
            case "white":
                $r = 255;
                $g = 255;
                $b = 255;
                break;
            case "grey":
                $r = 105;
                $g = 105;
                $b = 105;
                break;
            case "lightgrey":
                $r = 211;
                $g = 211;
                $b = 211;
                break;
            case "slate":
                $r = 112;
                $g = 128;
                $b = 144;
                break;
            default:
                $r = 112;
                $g = 128;
                $b = 144;
                break;
        }
    }

    if (array_key_exists('r', $_GET) && array_key_exists('g', $_GET) && array_key_exists('b', $_GET)) {
        $r = $_GET['r'];
        $g = $_GET['g'];
        $b = $_GET['b'];
    }
    
    // Create a BG
    $bg = imagecreatetruecolor(1920, 1080);
    $red = imagecolorallocate($bg, $r, $g, $b);
    imagefill($bg, 0, 0, $red);

    // Build the image URL
    $url = 'https://static-assets.tesla.com/configurator/compositor?&options=' . $_GET['wheels'] . ',' . $_GET['color'] . ',$DV2W,$MT301,$IN3BB,' . $_GET['facing'] . '&view=STUD_3QTR&model=m3&size=1920&bkba_opt=1';

    // Pull in the image
    $im = imagecreatefrompng($url);
    imagealphablending($im, false);
    imagesavealpha($im, true);


    // Show the magic
    imagecopyresampled($bg, $im, 0, 0, 0, 0, 1920, 1080, 1920, 1080);
    header('Content-type: image/png');
    imagepng($bg);
    imagedestroy($bg);

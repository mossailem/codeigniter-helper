<?php defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Created by Muslim Aswaja (23 September 2022)
 * Upload form check valid GIF/JPEG/PNG image
 */

if (!function_exists('is_valid_image')) {
  function is_valid_image($filePath)
  {
    // Check file extension
    $finfo = new finfo();
    $fileMimeType = $finfo->file($filePath, FILEINFO_MIME_TYPE);

    // Generate image object
    if ($fileMimeType == "image/gif") $image = imagecreatefromgif($filePath);
    if ($fileMimeType == "image/png") $image = imagecreatefrompng($filePath);
    if ($fileMimeType == "image/jpeg") $image = imagecreatefromjpeg($filePath);

    // Check image resolution
    $imageResolution = imageresolution($image);

    return $imageResolution ? true : false;
  }
}

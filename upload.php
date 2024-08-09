<?php
$uploadsDir = 'uploads/';
if (!is_dir($uploadsDir)) {
    mkdir($uploadsDir, 0777);
}

$allowedExtensions = array('jpg', 'jpeg', 'png', 'gif');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $photo1 = $_FILES['photo1'];
    $photo2 = $_FILES['photo2'];

    $photo1Name = uniqid() . '.' . pathinfo($photo1['name'], PATHINFO_EXTENSION);
    $photo2Name = uniqid() . '.' . pathinfo($photo2['name'], PATHINFO_EXTENSION);

    $photo1Path = $uploadsDir . $photo1Name;
    $photo2Path = $uploadsDir . $photo2Name;

    if (!in_array(pathinfo($photo1['name'], PATHINFO_EXTENSION), $allowedExtensions)) {
        echo "Error: Photo 1 must be a JPG, JPEG, PNG, or GIF file.";
    } elseif (!in_array(pathinfo($photo2['name'], PATHINFO_EXTENSION), $allowedExtensions)) {
        echo "Error: Photo 2 must be a JPG, JPEG, PNG, or GIF file.";
    } elseif ($photo1['error'] != 0 || $photo2['error'] != 0) {
        echo "Error: Unable to upload photos.";
    } elseif (move_uploaded_file($photo1['tmp_name'], $photo1Path) && move_uploaded_file($photo2['tmp_name'], $photo2Path)) {
        echo "Photos uploaded successfully!";
    } else {
        echo "Error: Unable to upload photos.";
    }
}
?>
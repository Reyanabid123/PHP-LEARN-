<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Check if the image file is valid
if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check === false) {
        die("File is not an image.");
    }
}

// Allow only specific image formats
if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
    die("Sorry, only JPG, JPEG, and PNG files are allowed.");
}

// Check if file already exists
if (file_exists($target_file)) {
    die("Sorry, file already exists.");
}

// Move uploaded file to the 'uploads' folder
if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
    $conn = new mysqli('localhost', 'root', '', 'image_upload');
    $image = basename($_FILES["image"]["name"]);
    $description = $conn->real_escape_string($_POST['description']);
    $tags = $conn->real_escape_string($_POST['tags']);

    // Insert into the database
    $sql = "INSERT INTO images (image, description, tags) VALUES ('$image', '$description', '$tags')";

    if ($conn->query($sql) === TRUE) {
        header("Location: gallery.php"); // Redirect to gallery page
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
} else {
    echo "Sorry, there was an error uploading your file.";
}
// $my-var = $conn->
?>

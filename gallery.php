<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Gallery</title>
    <style>
        body {
            font-family: glory;
            background-color: #f0f0f5;
            padding: 20px;
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
            font-size: 3vw;
            color: #333;
            font-weight: 800;
            text-transform: uppercase;
            border-bottom: 4px solid;
            border: dashed;
        }

        .gallery {
            justify-content: space-between;
            padding: 20px 200px;
            display: flex;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: -200px;
            height: 100vh;
            border: dashed;
        }

        .gallery-item {
            background: white;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            text-align: center;
            height: 50vh;
            width: 30vw;
            box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;
        }

        img {
            object-fit: cover;
            width: 100%;
            height: 100%;
            border-radius: 10px;
            margin-bottom: 10px;

        }

        .description {
            font-size: 28px;
            color: #555;
            text-transform: uppercase;
            margin-bottom: 10px;
        }

        .tags {
            font-size: 14px;
            color: #888;
            text-transform: uppercase;

        }
    </style>
</head>

<body>
    <h1>Uploaded Images</h1>
    <div class="gallery">
        <?php
        $conn = new mysqli('localhost', 'root', '', 'image_upload');
        $sql = "SELECT * FROM images ORDER BY uploaded_at DESC";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="gallery-item">';
                echo '<img src="uploads/' . $row['image'] . '" alt="Image">';
                echo '<div class="description"><strong>Description:</strong> ' . $row['description'] . '</div>';
                echo '<div class="tags"><strong>Tags:</strong> ' . $row['tags'] . '</div>';
                echo '</div>';
            }
        } else {
            echo '<p>No images uploaded yet.</p>';
        }

        $conn->close();
        ?>
    </div>
</body>

</html>
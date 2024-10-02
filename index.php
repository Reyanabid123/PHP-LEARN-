<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Image</title>
    <style>
        body {
            font-family: glory;
            background-color: #f0f0f5;
            padding: 20px;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .upload-container {
            background: #fff;
            padding: 30px;
            box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;
            border-radius: 8px;
            max-width: 500px;
            width: 100%;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        input[type="file"],
        input[type="text"],
        textarea {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #218838;
        }
    </style>
</head>

<body>
    <!-- <pre>https://youtu.be/TyblWn7INd0

    !==pM9nWZwXnPaq
    </pre> -->
    <div class="upload-container">
        <h1>Upload Your Image</h1>
        <form action="upload.php" method="post" enctype="multipart/form-data">
            <label>Select image to upload:</label>
            <input type="file" name="image" required>
            <pre>how do i maka a cup of coffe</pre>

            <label>Image Description:</label>
            <textarea name="description" rows="4" placeholder="Describe the image..." style="resize: none;"></textarea>

            <label>Tags (comma separated):</label>
            <input type="text" name="tags" placeholder="e.g. nature, sunset">

            <button type="submit">Upload Image</button>
        </form>
    </div>
</body>

</html>
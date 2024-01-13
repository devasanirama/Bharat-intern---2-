<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>CMS tool</title>
    <style>
        body {
            background: linear-gradient(45deg, #3498db, #e74c3c);
            font-family: Arial, sans-serif;
            animation: pulse 2s ease infinite;
        }

        @keyframes pulse {
            0%, 100% {
                background: linear-gradient(45deg, #3498db, #e74c3c);
            }
            50% {
                background: linear-gradient(45deg, #e74c3c, #3498db);
            }
        }

        h1 {
            color: #FFFFFF; /* White */
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
            margin-bottom: 15px;
        }

        .con {
            background-color: rgba(255, 255, 255, 0.9);
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 70%;
            align-items: center;
            margin-left: 15%;
            border-radius: 8px;
            padding: 30px;
        }

        .form-control {
            width: 100%;
        }

        .btn {
            width: 100%;
            font-size: 18px;
            background: linear-gradient(45deg, #e74c3c, #3498db);
            color: #FFFFFF; /* White */
            border: none;
            transition: background-color 0.2s ease;
        }

        .btn:hover {
            background: linear-gradient(45deg, #3498db, #e74c3c);
        }

        .table {
            width: 70%;
            margin-left: 15%;
            margin-top: 25px;
        }

        th, td {
            font-size: 18px;
            font-family: Arial, sans-serif;
            padding: 10px;
            color: #FFFFFF; /* White */
        }

        th {
            background: linear-gradient(45deg, #e74c3c, #3498db);
        }
    </style>
</head>
<body>
    <h1>Content Management Tool</h1>
    <div class="con">
        <fieldset>
            <form class="form" action="" method="POST" enctype="multipart/form-data">
                <legend>
                    <div class="mb-3">
                        <label for="inputEmail4" class="form-label">Title</label>
                        <input class="form-control" type="text" name="name" id="name" required>
                    </div>

                    <div class="mb-3">
                        <label for="inputAddress" class="form-label">Content</label>
                        <textarea class="form-control" name="cnt" id="cnt" placeholder="Content here..." rows="4" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="inputCity" class="form-label">Image</label>
                        <input class="form-control" type="file" id="img" name="img" accept="image/*" required>
                    </div>

                    <div class="mb-3">
                        <label for="inputCity" class="form-label">Video</label>
                        <input class="form-control" type="file" id="video" name="video" accept="video/mp4,video/mpeg,video/ogg,video/webm" required>
                    </div>

                    <button type="submit" name="submit" class="btn btn-primary">Upload</button>
                </legend>
            </form>
        </fieldset>
    </div>

    <?php
    if (isset($_POST['submit'])) {
        $name = htmlspecialchars($_POST['name']);
        $content = htmlspecialchars($_POST['cnt']);
        // Handle file uploads using $_FILES array
        $image = $_FILES['img']['name'];
        $video = $_FILES['video']['name'];

        // Create the "uploads" folder if it doesn't exist
        if (!is_dir('uploads')) {
            mkdir('uploads');
        }

        // Move uploaded files to the "uploads" folder
        move_uploaded_file($_FILES['img']['tmp_name'], "uploads/$image");
        move_uploaded_file($_FILES['video']['tmp_name'], "uploads/$video");
    }
    ?>

    <?php if (isset($_POST['submit'])) { ?>
        <table class="table table-bordered">
            <tr>
                <th colspan="2" style="text-align:center;">My Blog</th>
            </tr>
            <tr>
                <th>Title</th>
                <td><?php echo $name; ?></td>
            </tr>
            <tr>
                <th>Content</th>
                <td><?php echo $content; ?></td>
            </tr>
            <tr>
                <th>Image</th>
                <td><img src="uploads/<?php echo $image; ?>" height="200" width="250"></td>
            </tr>
            <tr>
                <th>Video</th>
                <td>
                    <video alt="video" height="200" width="250" controls="controls">
                        <source src="uploads/<?php echo $video; ?>" type="video/mp4">
                    </video>
                </td>
            </tr>
        </table>
    <?php } ?>

    <!-- Optional JavaScript; choose one of the two! -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>

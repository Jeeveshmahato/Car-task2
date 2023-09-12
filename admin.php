<!-- admin.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
</head>
<body>
    <h1>Admin Panel</h1>

    <!-- Form to upload a new banner -->
    <form action="upload_banner.php" method="post" enctype="multipart/form-data">
        <label for="bannerImage">Upload Banner Image:</label>
        <input type="file" name="bannerImage" id="bannerImage">
        <input type="submit" value="Upload Banner">
    </form>
</body>
</html>

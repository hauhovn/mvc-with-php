<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $data['title']; ?></title>
</head>
<body>
    <header>header</header>
    <?php require_once "./src/views/pages/".$data['page'].".php" ?>
</body>
</html>
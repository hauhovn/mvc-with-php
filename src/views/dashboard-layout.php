<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $data['title']; ?></title>
    <style>
        <?php include  "./public/css/dashboard/main.css" ?>
        <?php include  "./public/css/dashboard/header.css" ?>
        <?php include  "./public/css/dashboard/nav.css" ?>
        <?php include  "./public/css/".$data['page'].".css" ?>
    </style>

</head>
<body>
    <?php include  "./public/html/dashboard/header.html" ?>
   <main>
    <?php include  "./public/html/dashboard/nav.html" ?>
    <?php require_once "./src/views/pages/Dashboards/".$data['page'].".php" ?>
   </main>
</body>
</html>

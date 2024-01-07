<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $model['title'] ?></title>
</head>

<body>
    <h1>Welcome</h1>
    <form action="/user" method="post">
        <label for="name">input name :</label>
        <input type="text" name="name">
        <button type="submit">Kirim</button>
    </form>

</body>

</html>
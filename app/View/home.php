<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $model['title'] ?></title>
</head>

<body>
    <h1>Welcome <?= $model['user']->username ?></h1>
    <a href="/logout">logout?</a>

    <h2>TODO LIST</h2>
    <form action="/todo" method="post">
        <label for="todo">input todo</label>
        <input type="text" name="todo">
        <button type="submit">Simpan</button>
    </form>
    <br>
    <table border="1" cellspacing="0" style="padding: 11 px;">
        <tr>
            <td>Todo</td>
            <td>action</td>
        </tr>
        <?php foreach ($model['todos'] as $todo) : ?>
            <tr>
                <td><?= $todo->todo ?></td>
                <td>
                    <a href="/todo/<?= $todo->id ?>/delete">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

</body>

</html>
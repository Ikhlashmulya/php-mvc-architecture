<h1>Login</h1>
<?php if ($this->hasSession('error')) : ?>
    <h3 style="color: red;"><?= $this->getSession('error') ?></h3>
    <?php $this->unsetSession('error') ?>
<?php endif; ?>
<form action="/login" method="post">
    <table>
        <tr>
            <td>
                <label for="name">username</label>
            </td>
            <td>:</td>
            <td>
                <input type="text" name="username">
            </td>
        </tr>
        <tr>
            <td>
                <label for="password">password</label>
            </td>
            <td>:</td>
            <td>
                <input type="password" name="password">
            </td>
        </tr>
        <tr>
            <td>
                <button type="submit">Kirim</button>
            </td>
        </tr>
    </table>
    <a href="/register">register?</a>
</form>
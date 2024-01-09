<h1>Register</h1>
<?php if ($this->hasSession('error')) : ?>
    <h3 style="color: red;"><?= $this->getSession('error') ?></h3>
    <?php $this->unsetSession('error') ?>
<?php endif; ?>
<form action="/register" method="post">
    <table>
        <tr>
            <td>
                <label for="name">username</label>
            </td>
            <td>:</td>
            <td>
                <input type="text" name="username" require>
            </td>
        </tr>
        <tr>
            <td>
                <label for="password">password</label>
            </td>
            <td>:</td>
            <td>
                <input type="password" name="password" require>
            </td>
        </tr>
        <tr>
            <td>
                <label for="confirm-password">confirm password</label>
            </td>
            <td>:</td>
            <td>
                <input type="password" name="confirm-password" require>
            </td>
        </tr>
        <tr>
            <td>
                <button type="submit">Kirim</button>
            </td>
        </tr>
    </table>
    <a href="/login">login?</a>
</form>
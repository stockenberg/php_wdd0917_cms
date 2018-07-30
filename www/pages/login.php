<p><?= \sae\app\helpers\StatusLog::read('login') ?? '' ?></p>
<form action="?p=login&action=login" method="post">
    <div>
        <label for="username">Username</label>
        <input type="text" id="username" name="username">
    </div>

    <div>
        <label for="password">Password</label>
        <input type="password" id="password" name="password">
    </div>

    <button type="submit">Login</button>
</form>
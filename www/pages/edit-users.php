<?php if(\sae\app\helpers\Session::isAllowed([ADMIN])) : ?>
<div class="row">
    <form action="">
        <div class="form-group">
            <label for="username" class="col-form-label">Username</label>
            <input class="form-control" type="text" name="username" id="username">
        </div>
        <div class="form-group">
            <label for="password" class="col-form-label">Password</label>
            <input class="form-control" type="password" name="password" id="password">
        </div>
        <div class="form-group">
            <label for="password_retyped" class="col-form-label">Retype your Password</label>
            <input class="form-control" type="text" name="password_retyped" id="password_retyped">
        </div>
        <div class="form-group">
            <label for="role_id" class="col-form-label">Role Id</label>
            <input class="form-control" type="text" name="role_id" id="role_id">
        </div>
        <button class="submit btn btn-success" type="submit">Speichern</button>
    </form>
</div>
<?php endif; ?>

<div class="row">
    <h2>Users</h2>
    <table class="table table-dark">
        <thead>
        <tr>
            <th>id</th>
            <th>username</th>
            <th>role</th>
            <th>role name</th>
            <th>actions</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach (\sae\app\App::$data as $user) : ?>
            <tr>
                <td><?= $user['id'] ?></td>
                <td><?= $user['username'] ?></td>
                <td><?= $user['role'] ?></td>
                <td><?= $user['name'] ?></td>
                <td><a href="?p=edit-users&action=delete&id=<?= $user['id'] ?>">Delete</a></td>
            </tr>

        <?php endforeach; ?>
        </tbody>
    </table>
</div>

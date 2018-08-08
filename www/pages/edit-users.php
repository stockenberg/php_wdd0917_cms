
<?php if(\sae\app\helpers\Session::isAllowed([ADMIN])) : ?>

<h2><?= \sae\app\helpers\Session::flash('deleted') ?></h2>
<h2><?= \sae\app\helpers\Session::flash('user_updated') ?></h2>

<div class="row">
    <form action="?p=edit-users&action=create" class="col" method="post">
        <div class="form-group">
            <label for="username" class="col-form-label">Username</label>
            <input class="form-control" type="text" name="userform[username]" id="username">
        </div>
        <div class="form-group">
            <label for="password" class="col-form-label">Password</label>
            <input class="form-control" type="password" name="userform[password]" id="password">
        </div>
        <div class="form-group">
            <label for="password_retyped" class="col-form-label">Retype your Password</label>
            <input class="form-control" type="text" name="userform[password_retyped]" id="password_retyped">
        </div>

        <div class="form-group">
            <label for="role_id" class="col-form-label">Role Id</label>
            <select name="userform[role_id]" id="role_id" class="form-control">
                <option disabled selected>bitte wählen</option>
                <?php foreach (\sae\app\App::$data['roles'] as $key => $role) : ?>
                    <option value="<?= $role['role'] ?>"><?= $role['name'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <button class="submit btn btn-success" type="submit">Speichern</button>
    </form>
<?php endif; ?>

<div class="col">
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
        <?php foreach (\sae\app\App::$data['data'] as $user) : ?>
            <tr>
                <td><?= $user['id'] ?></td>
                <td><?= $user['username'] ?></td>
                <td><?= $user['role'] ?></td>
                <td><?= $user['name'] ?></td>
                <td>
                    <a href="?p=edit-users&action=delete&id=<?= $user['id'] ?>">Delete</a>
                    <a href="?p=edit-users&action=edit&id=<?= $user['id'] ?>">Edit</a>
                </td>
            </tr>
            <?php if($_GET['action'] === 'edit' && $_GET['id'] === $user['id']) : ?>
            <tr>
                <td colspan="5">
                    <form action="?p=edit-users&action=update&id=<?= $_GET['id'] ?>" class="col" method="post">

                        <div class="form-group">
                            <label for="username" class="col-form-label">Username</label>
                            <input class="form-control" type="text" value="<?= \sae\app\App::$data['edit'][0]['username'] ?>" name="userform[username]" id="username">
                            <p class="error"><?= \sae\app\helpers\Session::flash('edit_username') ?></p>
                        </div>

                        <div class="form-group">
                            <label for="role_id" class="col-form-label">Role Id</label>
                            <select name="userform[role_id]" id="role_id" class="form-control">
                                <?php foreach (\sae\app\App::$data['roles'] as $key => $role) : ?>
                                    <option value="<?= $role['role'] ?>"  <?= ($role['role'] === \sae\app\App::$data['edit'][0]['role_id']) ? 'selected' : '' ?>  ><?= $role['name'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <p class="error"><?= \sae\app\helpers\Session::flash('edit_role') ?></p>

                        </div>
                        <button class="submit btn btn-success" type="submit">Speichern</button>
                    </form>
                </td>
            </tr>
        <?php endif; ?>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
</div>

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
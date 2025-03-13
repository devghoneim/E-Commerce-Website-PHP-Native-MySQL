<?php

if (!isset($_SESSION["permission"])) {
    die("Permission not defined in the session.");
}

include("Database/settingData.php");


$sql_permission = "SELECT * FROM permission WHERE id = ?";
$stmt_permission = $con->prepare($sql_permission);
$stmt_permission->bind_param("i", $_SESSION["permission"]);
$stmt_permission->execute();
$result_pr = $stmt_permission->get_result();

if ($result_pr && $result_pr->num_rows > 0) {
    $row_pr = $result_pr->fetch_assoc();
} else {
    die("Permission not found in the database.");
}


function GetWhoNow($row_name_pr)
{
    $permissions = [
        'owner' => [1, 3, 4, 5],
        'admin' => [1,3,4,6],
        'subAdmin' => [1, 3 ]
    ];

    return $permissions[$row_name_pr] ;
}


$current_permissions = GetWhoNow($row_pr["name"]);


if ($current_permissions === null) {
    die("Invalid permissions for the current user.");
}


$select_users = "
    SELECT 
        users.id, users.firstname, users.lastname, users.email, 
        users.permission, permission.name AS permission_name 
    FROM users 
    LEFT JOIN permission ON users.permission = permission.id";
$result_users = $con->query($select_users);

?>
<div class="d-flex justify-content-end mr-3">
    <a href="register.php" class="btn btn-success">Add User</a>
</div>

<?php if ($result_users && $result_users->num_rows > 0): ?>
    <h2 class="text-center p-3">Users</h2>
    <div class="table-responsive px-3">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Permission</th>
                    <th>Controls</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row_users = $result_users->fetch_assoc()): ?>
                    <tr>
                        <th scope="row"><?= $row_users["id"] ?></th>
                        <td><?= htmlspecialchars($row_users["firstname"]) ?></td>
                        <td><?= htmlspecialchars($row_users["lastname"]) ?></td>
                        <td><?= htmlspecialchars($row_users["email"]) ?></td>
                        <td><?= htmlspecialchars($row_users["permission_name"]) ?></td>
                        <td>
                        <?php
                                    $resultFromAccepts = $con -> query("select * from accepts WHERE whowillremove = " . $row_users["id"]);
                                    $numsOfAcc = $resultFromAccepts -> num_rows;

                                    if ($numsOfAcc > 0) {
                                        ?>
                                        <div style="width:200px;" class="alert alert-primary" role="alert">
                                            Wating For Accept
                                        </div>


<?php                                        
                                    }else {
                                        ?>

<?php
                                
                                if (in_array($row_users["permission"], $current_permissions)):
                                
                                ?>
                                    <a class="btn btn-warning" href="?edituser&id=<?= $row_users['id'] ?>">Edit</a>
                                    
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal<?= $row_users['id'] ?>">
                                        Delete
                                    </button>
    
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal<?= $row_users['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel<?= $row_users['id'] ?>" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel<?= $row_users['id'] ?>">Are you sure?</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <?= htmlspecialchars($row_users['firstname'] . ' ' . $row_users['lastname']) ?>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <a class="btn btn-danger" href="functions/remove.php?id=<?= $row_users['id'] ?>&f=user">Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
    
                                <?php else: ?>
                                    <span class="text-muted">No actions available</span>
                                <?php endif; ?>
<?php
                                    }

                        
?>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
<?php else: ?>
    <div class="alert alert-danger text-center" role="alert">
        No users found.
    </div>
<?php endif; ?>

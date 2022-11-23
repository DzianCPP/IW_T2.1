<?php include "components/header.html"; ?>

<div class="main-div">
    <table class="all-users-table" id="all-users-table">
            <tr>
                <th>ID</th>
                <th>E-mail</th>
                <th>Full Name</th>
                <th>Gender</th>
                <th>Status</th>
                <th></th>
            </tr>

            <?php foreach ($allUsers as $user): ?>
                <?php $userID = $user['userID']; ?>
                <tr>
                    <td><?php echo $user['userID']; ?></td>
                    <td><?php echo $user['email']; ?></td>
                    <td><?php echo $user['fullName']; ?></td>
                    <td><?php echo $user['gender']; ?></td>
                    <td><?php echo $user['status']; ?></td>
                    <td>
                        <a href='/user/edit?userID={<?php echo $userID;?>}'>Edit</a>
                        <a id="<?php echo $user['userID']; ?>"
                           onclick="sendDeleteRequest(this.id)">
                            Delete
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>

    </table>

    <div class='link-div'>
        <a id="users-link-add-user" href='/user/new'>
            Add user
        </a>
    </div>

    <div class='link-div'>
        <a id="users-link-back" href='/public'>
            Main page
        </a>
    </div>

    <script type="text/javascript" src="/assets/scripts/users/delete.js"></script>
</div>

<?php include "components/footer.html"; ?>
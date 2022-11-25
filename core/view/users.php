<?php include "components/header.html"; ?>

    <div class="container-sm w-100">
    <div class="row w-auto">
    <div class="col-sm-1"></div>
    <div class="col-sm-10">
        <table class="table table-hover table-responsive-sm" id="all-users-table">
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
                            <div class="btn-group-vertical">
                                <a class="btn btn-success" href='/user/edit?userID={<?php echo $userID;?>}'>Edit</a>
                                <a class="btn btn-dark" id="<?php echo $user['userID']; ?>"
                                   onclick="sendDeleteRequest(this.id)">
                                    Delete</a>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>

        </table>
    </div>
        <div class="col-sm-1"></div>
    </div>

        <div class="row w-100">
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <div><a class="btn btn-success w-100 mb-1"  id="users-link-add-user" href='/user/new'>Add user</a></div>
                <div><a class="btn btn-dark w-100 mb-5" id="users-link-back" href='/public'>Main page</a></div>
            </div>
            <div class="col-sm-3"></div>
        </div>
    </div>

    <script type="text/javascript" src="/assets/scripts/users/delete.js"></script>

<?php include "components/footer.html"; ?>
<?php include "components/header.html"; ?>

<div class="container-xs container-sm container-md container-xl pt-5 w-100">
    <div class="row w-auto">
        <div class="col-xs-0 col-sm-0 col-md-1 col-xl-3"></div>
        <div class="col-xs-12 col-sm-12 col-md-10 col-xl-6">
            <div class="table-responsive">
                <table class="table table-sm table-hover" id="all-users-table">
                    <tr>
                        <th scope="col"><input
                        class="checkbox" type="checkbox" id="check-all"></th>
                        <th scope="col">ID</th>
                        <th scope="col">E-mail</th>
                        <th scope="col">Full Name</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Status</th>
                        <th scope="col"></th>
                    </tr>

                    <?php foreach ($allUsers as $user) : ?>
                        <?php $userID = $user['userID']; ?>
                        <tr>
                            <td><input name="select-user" type="checkbox" value="<?php echo $user['userID']; ?>"></td>
                            <td><?php echo $user['userID']; ?></td>
                            <td><?php echo $user['email']; ?></td>
                            <td><?php echo $user['fullName']; ?></td>
                            <td><?php echo $GENDERS[$user['gender']]; ?></td>
                            <td><?php echo $STATUSES[$user['status']]; ?></td>
                            <td>
                                <div class="btn-group-vertical">
                                    <a class="btn btn-success" href='/user/edit/<?php echo $userID; ?>'>Edit</a>
                                    <a class="btn btn-dark" id="<?php echo $user['userID']; ?>" onclick="sendDeleteRequest(this.id)">
                                        Delete</a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>

                </table>
            </div>
        </div>
        <div class="col-xs-0 col-sm-0 col-md-1 col-xl-3"></div>
    </div>

    <div class="row w-100">
        <div class="col-xs-0 col-sm-0 col-md-1 col-xl-3"></div>
        <div class="col-xs-12 col-sm-12 col-md-10 col-xl-6">
            <div>
                <a class="btn btn-success w-auto mb-1" id="delete-all">
                    Delete selected users
                </a>
            </div>
        </div>
        <div class="col-xs-0 col-sm-0 col-md-1 col-xl-3"></div>
    </div>

    <?php if (count($allUsers) > 1) : ?>
        <?php require "components/usersPagination.php"; ?>
    <?php endif; ?>

    <div class="row w-100">
        <div class="col-xs-0 col-sm-0 col-md-1 col-xl-3"></div>
        <div class="col-xs-12 col-sm-12 col-md-10 col-xl-6">
            <div>
                <a class="btn btn-success w-100 mb-1" id="users-link-add-user"
                    href="/user/new">
                        Add user
                </a>
            </div>
            <div>
                <a class="btn btn-dark w-100 mb-5" id="users-link-back" href="/public">
                    Main page
                </a>
            </div>
        </div>
        <div class="col-xs-0 col-sm-0 col-md-1 col-xl-3"></div>
    </div>
</div>

<script type="text/javascript" src="/assets/scripts/users/delete.js"></script>
<script type="text/javascript" src="/assets/scripts/users/selectAll.js"></script>
<script type="text/javascript" src="/assets/scripts/users/deleteAll.js"></script>

<?php include "components/footer.html"; ?>
<?php include "components/header.html"; ?>
<?php $genders = require "components/genders.php"; ?>
<?php $statuses = require "components/status.php"; ?>

<?php $user = $userToEdit[0]; ?>

    <div class="container w-100">
        <div class="row w-100 mt-5">
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
                <h1 class="h1 w-100 m-1" id="main-page-h1">Edit User</h1>
            </div>
            <div class="col-sm-4"></div>
        </div>

        <form class="form">
            <div class="row w-auto mt-2">
                <div class="col-sm-4"></div>
                <div class="col-sm-4">
                    <div class="input-group">
                        <label class="input-group-text w-25" for="email">E-mail</label>
                        <input type="text"
                               class="form-control w-75"
                               name="new-email"
                               id="email"
                               placeholder="Enter your email"
                               onchange="formValid()"
                               value="<?php echo $user['email']; ?>">
                    </div>
                </div>
                <div class="col-sm-4"></div>
            </div>

            <div class="row w-auto mt-2">
                <div class="col-sm-4"></div>
                <div class="col-sm-4">
                    <div class="input-group">
                        <label class="input-group-text w-25" for="name">Full Name</label>
                        <input
                                type="text"
                                class="form-control w-75"
                                name="new-name"
                                id="name"
                                placeholder="Enter your first and last name"
                                onchange="formValid()"
                                value="<?php echo $user['fullName']; ?>">
                    </div>
                </div>
                <div class="col-sm-4"></div>
            </div>

            <div class="row w-auto mt-2">
                <div class="col-sm-4"></div>
                <div class="col-sm-4">
                    <div class="input-group">
                        <label class="input-group-text w-25" for="gender">Gender</label>
                        <select name="gender" id="gender" class="btn btn-success dropdown-toggle w-75">

                        <?php foreach ($genders as $gender): ?>
                  <option value="<?php echo $gender; ?>">
                      <?php echo ucfirst($gender); ?>
                  </option>
              <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-sm-4"></div>

            <div class="row w-auto mt-2 mb-2">
                <div class="col-sm-4"></div>
                <div class="col-sm-4">
                    <div class="input-group">
                        <label class="input-group-text w-25" for="status">Status</label>
                        <select name="status" class="btn btn-success dropdown-toggle w-75" id="status">

                        <?php foreach ($statuses as $status): ?>
                <option value="<?php echo $status; ?>">
                    <?php echo ucfirst($status); ?>
                </option>
            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-sm-4"></div>

            <div class="row w-auto">
                <div class="col-sm-4"></div>
                <div class="col-sm-4">
                    <button type="submit" class="btn btn-success w-100" id="submit-button" value="submit" disabled>Submit</button>
                </div>
                <div class="col-sm-4"></div>
            </div>

            <div class="row w-100">
                <div class="col-sm-4"></div>
                <div class="col-sm-4">
                    <div class="alert alert-danger" id="error-field-div" hidden>
                        <p id="error-field">
                            <?php
                            if ($email !== '' || $fullName !== ''):
                                echo "Not valid information!";
                            endif;
                            ?>
                        </p>
                    </div>
                </div>
            </div>

            <script type="text/javascript" src="/assets/scripts/formValid.js"></script>
        </form>
    </div>

<?php include "components/footer.html"; ?>
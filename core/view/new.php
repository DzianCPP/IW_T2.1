<?php include "components/header.html"; ?>
<?php $genders = require "components/genders.php"; ?>
<?php $statuses = require "components/status.php"; ?>

    <div class="main-div">
        <div class="content-wrap">
            <h1 class="new-user-h1" id="main-page-h1">Add User App</h1>

                <form class="new-user-form" method="POST" action="/user/create">

                    <?php if ($email === ''): ?>
                    <div><label for="email">E-mail</label></div>
                   <div><input type="text"
                               class="input-text"
                               name="email"
                               id="email"
                               placeholder="Enter your email">
                   </div>
                    <?php else: ?>
                    <div><label for="email">E-mail</label></div>
                    <div><input
                            type="text"
                            class="input-text"
                            name="email"
                            id="email"
                            placeholder="Enter your email"
                            value="<?php echo $email; ?>"
                            style="color: red;"></div>
                    <?php endif; ?>


                    <?php if ($fullName === ''): ?>
                    <div><label class="form-label" for="name">Your first and last name</label></div>
                    <div>
                        <input
                                type="text"
                                class="input-text"
                                name="fullName"
                                id="name"
                                placeholder="Enter your first and last name">
                    </div>

                    <?php else: ?>
                    <div><label class="form-label" for="name">Your first and last name</label></div>
                    <div>
                        <input type="text"
                                class="input-text"
                                name="fullName"
                                id="name"
                                placeholder="Enter your first and last name"
                                value="<?php echo $fullName;?>"
                                style="color: red;">
                    </div>

                    <?php endif; ?>

                    <div><label class="form-label" for="gender">Gender</label></div>

                    <div><select name="gender" id="gender" class="input-select">
                        <?php foreach ($genders as $gender): ?>
                            <option value="<?php echo $gender; ?>">
                                <?php echo ucfirst($gender); ?>
                            </option>
                        <?php endforeach; ?>
                    </select></div>

                    <div><label class="form-label" for="status">Status</label>
                    <select name="status" class="input-select" id="status">
                        <?php foreach ($statuses as $status): ?>
                            <option value="<?php echo $status; ?>">
                                <?php echo ucfirst($status); ?>
                            </option>
                        <?php endforeach; ?>
                    </select></div>

                    <button type="submit" class="form-submit" id="submit-button" value="submit" disabled>Submit</button>

                    <div>
                        <p id="error-field">
                            <?php
                                if ($email !== '' || $fullName !== ''):
                                    echo "Not valid information!";
                                endif;
                            ?>
                        </p>
                    </div>

                    <script type="text/javascript" src="/assets/scripts/formValid.js"></script>
                </form>
        </div>

    <?php include "components/footer.html"; ?>
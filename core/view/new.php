<?php include "components/header.html"; ?>

    <div class="main-div">
        <div class="content-wrap">
            <h1 class="new-user-h1" id="main-page-h1">Add User App</h1>

                <form class="new-user-form" method="POST" action="/user/create">

                    <div><label for="email">E-mail</label></div>
                    <div><input
                            type="text"
                            class="input-text"
                            name="email"
                            id="email"
                            placeholder="Enter your email"
                            value="<?php if ($email !== ''):
                                                echo $email;
                                            else:
                                                echo '';
                                            endif;?>"
                            ></div>

                    <div><label class="form-label" for="name">Your first and last name</label></div>
                    <div>
                        <input type="text"
                                class="input-text"
                                name="fullName"
                                id="name"
                                placeholder="Enter your first and last name"
                                value="<?php if ($fullName !== ''):
                                                    echo $fullName;
                                                else:
                                                    echo '';
                                                endif;?>"
                                >
                    </div>

                    <div><label class="form-label" for="gender">Gender</label></div>

                    <div><select name="gender" id="gender" class="input-select">
                            <?php foreach ($genders as $lowerCaseGender => $upperCaseGender): ?>
                                <option
                                    <?php if ($user['gender'] === $upperCaseGender):
                                        echo 'selected="selected"';
                                    endif;?>
                                        value="<?php echo $lowerCaseGender; ?>">
                                    <?php echo $upperCaseGender; ?>
                                </option>
                            <?php endforeach; ?>
                    </select></div>

                    <div><label class="form-label" for="status">Status</label>
                    <select name="status" class="input-select" id="status">
                        <?php foreach ($statuses as $lowerCaseStatus => $upperCaseStatus): ?>
                            <option
                                <?php if ($user['status'] === $upperCaseStatus):
                                    echo 'selected="selected"';
                                endif; ?>
                                    value="<?php echo $lowerCaseStatus; ?>">
                                <?php echo $upperCaseStatus; ?>
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
<?php include "components/header.html"; ?>

    <div class="container w-100">
        <div class="row w-100 mt-5">
            <div class="col-sm-1"></div>
            <div class="col-sm-10">
                <h1 class="h1 w-100 m-1" id="main-page-h1">Add User App</h1>
            </div>
            <div class="col-sm-1"></div>
        </div>

                <form class="form" method="POST" action="/user/create">

                    <div class="row w-auto mt-2">
                        <div class="col-sm-1"></div>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <label class="input-group-text w-25" for="email">E-mail</label>
                                <input
                                    type="text"
                                    class="form-control w-75"
                                    name="email"
                                    id="email"
                                    placeholder="Enter your email"
                                    value="<?php if ($email !== ''):
                                                        echo $email;
                                                    else:
                                                        echo '';
                                                    endif;?>"
                                    >
                            </div>
                        </div>
                        <div class="col-sm-1"></div>
                    </div>

                    <div class="row w-auto mt-2">
                        <div class="col-sm-1"></div>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <label class="input-group-text w-25" for="name">Full Name</label>
                                <input
                                        type="text"
                                        class="form-control w-75"
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
                        </div>
                        <div class="col-sm-1"></div>
                    </div>

                    <div class="row w-auto mt-2">
                        <div class="col-sm-1"></div>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <label class="input-group-text w-25" for="gender">Gender</label>
                                <select name="gender" id="gender" class="btn btn-success dropdown-toggle w-75">
                            <?php foreach ($genders as $key => $upperCaseGender): ?>
                                <option
                                        value="<?php echo $key; ?>">
                                    <?php echo $upperCaseGender; ?>
                                </option>
                            <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-1"></div>

                    <div class="row w-auto mt-2 mb-2">
                        <div class="col-sm-1"></div>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <label class="input-group-text w-25" for="status">Status</label>
                                <select name="status" class="btn btn-success dropdown-toggle w-75" id="status">
                        <?php foreach ($statuses as $key => $upperCaseStatus): ?>
                            <option
                                    value="<?php echo $key; ?>">
                                <?php echo $upperCaseStatus; ?>
                            </option>
                        <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-1"></div>

                    <div class="row w-auto">
                        <div class="col-sm-3"></div>
                        <div class="col-sm-6">
                            <button type="submit" class="btn btn-success w-100" id="submit-button" value="submit" disabled>Submit</button>
                        </div>
                        <div class="col-sm-3"></div>
                    </div>

                    <div class="row w-100">
                        <div class="col-sm-4"></div>
                        <div class="col-sm-4">
                            <div class="alert mt-1" id="error-field-div">
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
                </form>
    </div>

    <script type="text/javascript" src="/assets/scripts/formValid.js"></script>

    <?php include "components/footer.html"; ?>
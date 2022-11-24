<?php include "components/header.html"; ?>

    <div class="container-sm pt-5">
    <div class="container w-100">
    <div class="row w-100 mb-5 mt-5" id="main-page-h1">
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
            <h1 class="h1 w-100 m-1">Add User App</h1>
        </div>
        <div class="col-sm-4"></div>
    </div>

    <div class="row w-100 mb-1" id="main-link-create-div">
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
            <a class="btn btn-dark w-100" id="main-link-create" href="/user/new">Create user</a>
        </div>
        <div class="col-sm-4"></div>
    </div>

    <div class="row w-100 mb-1" id="main-link-show-div">
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
            <a class="btn btn-dark w-100" id="main-link-show" href="/users/show">Show all users</a>
        </div>
        <div class="col-sm-4"></div>
    </div>

    <div class="row w-100 mb-1">
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
            <div class="input-group w-100">
                <input type="text" class="form-control" id="main-input-userID"
                       placeholder="User's ID">
                <button class="btn btn-success" id="main-page-find-button"
                        disabled>Find</button>
            </div>
        </div>
        <div class="col-sm-4"></div>
    </div>

    <div class="row w-100">
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
            <div class="alert alert-danger" id="error-field-div" hidden>
                <strong id="main-error-field"></strong>
            </div>
        </div>
        <div class="col-sm-4"></div>
    </div>
    </div>
    </div>
    </div>
    </div>

    <script type="text/javascript" src="/assets/scripts/users/find.js"></script>
    <script type="text/javascript" src="/assets/scripts/userIdValid.js"></script>

<?php include "components/footer.html"; ?>
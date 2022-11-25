<?php include "components/header.html"; ?>

<div class="main-div">
    <div class="content-wrap">
        <div class="main-page-form">
        <div class="link-div" id="main-link-create-div">
            <a id="main-link-create" href="/user/new">Create user</a>
        </div>

        <div class="link-div" id="main-link-show-div">
            <a id="main-link-show" href="/users/show">Show all users</a>
            <br>
            <input type="text" class="input-text" id="main-input-userID"
                   placeholder="User's ID">
            <button id="main-page-find-button"
                    disabled>Find</button>
            <p id="main-error-field"></p>
        </div>
        </div>

        <script rel="script/javasript" src="/assets/scripts/userIdValid.js"></script>
        <script rel="script/javasript" src="/assets/scripts/users/find.js"></script>
    </div>

    <?php include "components/footer.html"; ?>

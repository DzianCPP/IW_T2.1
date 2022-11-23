<div class="main-div">
    <div class="main-page-form">
    <div class="link-div" id="main-link-create-div">
        <a id="main-link-create" href="/user/new">Create user</a>
    </div>

    <div class="link-div" id="main-link-show-div">
        <a id="main-link-show" href="/users/show">Show all users</a>
        <br>
        <input type="text" class="input-text" id="main-input-userID"
               placeholder="User's ID" onchange="userIdValid()">
        <button id="main-page-find-button" onclick="findUserById()"
                disabled>Find</button>
        <p id="main-error-field"></p>
    </div>

    <script type="text/javascript" src="/assets/scripts/users/find.js"></script>
    <script type="text/javascript" src="/assets/scripts/userIdValid.js"></script>
    </div>
</div>
<?php include "components/header.html"; ?>
<?php $genders = require "components/genders.php"; ?>
<?php $statuses = require "components/status.php"; ?>

<?php $user = $userToEdit[0]; ?>
    <div class="main-div">
        <div class="content-wrap">
            <h1 class="new-user-h1" id="main-page-h1">Edit User</h1>

            <form class="new-user-form">
              <div><label for="email">E-mail</label></div>
              <div><input
                      type="text"
                      class="input-text"
                      name="new-email"
                      id="email"
                      placeholder="Enter your email"
                      value="<?php echo $user['email'];; ?>">
              </div>

              <div>
                <label class="form-label" for="name">Your first and last name</label>
              </div>
              <div>
                <input type="text"
                       class="input-text"
                       name="new-name"
                       id="name"
                       placeholder="Enter your first and last name"
                       value="<?php echo $user['fullName']; ?>">
              </div>

              <div><label class="form-label" for="gender">Gender</label></div>

              <div><select name="new-gender" id="gender" class="input-select">
                      <?php foreach ($genders as $gender): ?>
                          <option value="<?php echo $gender; ?>">
                              <?php echo ucfirst($gender); ?>
                          </option>
                      <?php endforeach; ?>
              </select></div>

              <div><label class="form-label" for="status">Status</label>
                <select name="new-status" class="input-select" id="status">
                    <?php foreach ($statuses as $status): ?>
                        <option value="<?php echo $status; ?>">
                            <?php echo ucfirst($status); ?>
                        </option>
                    <?php endforeach; ?>
                </select></div>

              <button type="button"
                      class="form-submit"
                      id="submit-button"
                      value="submit"
                      disabled>Submit
              </button>

              <div>
                <p id="error-field"></p>
              </div>

              <div>
                <input type="hidden"
                       value="<?php echo $user['userID']; ?>"
                       name="user-id"
                       id="user-id">
              </div>

              <script type="text/javascript" src="/assets/scripts/formValid.js"></script>
              <script type="text/javascript" src="/assets/scripts/users/edit.js"></script>
            </form>
        </div>
    <?php include "components/footer.html"; ?>
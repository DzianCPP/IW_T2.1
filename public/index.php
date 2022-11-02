<!DOCTYPE html>
<html lang="en-US">
<head>
    <link rel="stylesheet" href="/assets/css/style.css">
    <title>AddUserApp</title>
</head>

<body>
<form>
    <label for="email">E-mail</label>
    <input type="text" class="InputText" name="email" placeholder="Enter your email"><br>

    <label for="name">Your first and last name</label>
    <input type="text" class="InputText" name="name" placeholder="Enter your first and last name"><br>

    <label for="gender">Gender</label>
    <select name="gender" class="InputSelect" id="inputSelectGender">
        <option>Male</option>
        <option>Female</option>
        <option>Transgender</option>
        <option>Non-binary</option>
        <option>Other</option>
    </select><br>

    <label for="status">Status</label>
    <select name="status" class="InputSelect" id="inputSelectStatus">
        <option>Active</option>
        <option>Inactive</option>
    </select>
</form>
</body>
</html>
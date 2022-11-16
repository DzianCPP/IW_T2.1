<?php

return [
    "insertUser" => "INSERT INTO usersTable (email, fullName, gender, status)
                    VALUES (:email, :fullName, :gender, :status)",
    "update" => "UPDATE usersTable SET email=:newEmail, fullName=:newFullName, gender=:newGender, status=:newStatus WHERE userID=:userID",
    "delete" => "DELETE FROM usersTable WHERE userID=:id",
    "selectById" => "SELECT * FROM usersTable WHERE userID=:id",
    "selectAll" => "SELECT * FROM usersTable"
];

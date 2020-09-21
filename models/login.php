<?php

function login($email, $password, $connection)
{
   $sql = ('SELECT id, name, email, password 
            FROM user 
            WHERE email = :email
            LIMIT 1');

   $stmt = $connection->prepare($sql);

   $stmt->execute(
       [
           'email' => $email,
       ]

   );

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if($result === false)
    {
        return null;
    }

    return password_verify($password, $result["password"]) ? $result : null;

}


?>

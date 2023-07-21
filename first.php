<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Store</title>
</head>
<body>
    <center>
    <h2>storing form data in database</h2>
    <form action="insert.php"method="post">
       <p><label for="firstname">First Name:</label>
       <input type="text" name="firstname" id="firstname">
    </p> 
    <p><label for="lastname">Last Name:</label>
       <input type="text" name="lastname" id="lastname">
    </p> 
    <p><label for="gender">Gender:</label>
       <input type="text" name="gender" id="gender">
    </p> 
    <p><label for="address">Address:</label>
       <input type="text" name="address" id="address">
    </p> 
    <p><label for="email">Email:</label>
       <input type="text" name="email" id="email">
    </p>
    <input type="submit" value="submit"> 
    </form>
</center>
</body>
</html>
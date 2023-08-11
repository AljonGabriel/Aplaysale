<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplaysale</title>
</head>

<body>
    <form id="myForm" action="inc/formhandler.php" method="post">
        <input type="text" id="username" name="username" placeholder="Username">
        <input type="email" id="email" name="email" placeholder="Email">
        <input type="password" id="pwd" name="pwd" placeholder="Password">
        <button type="submit">Submit</button>
        <div id="errorMessage"></div>


    </form>


</body>
<script src="js/errorHandlers.js"></script>

</html>
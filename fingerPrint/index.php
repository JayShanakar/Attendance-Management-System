<html>
    <head>
        <title>Attendance Management System</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link href="css/layout.css" rel="stylesheet" type="text/css" />
        <link href="css/style.css" rel="stylesheet" type="text/css" />
    </head>
    <body id="page">

        <?php
        session_start();
        if (isset($_GET['q']) && $_GET['q'] === 'invalid') {
            echo "<div id='error'> 'Wrong Id or Password'</div>";
        }

        if (isset($_SESSION['started']) && $_SESSION['loginas'] == "Admin" && ($_SESSION['started'] == 1)) {
            header('Location:adminindex.php');
        }

        if (isset($_SESSION['started']) && $_SESSION['loginas'] == "Faculty" && ($_SESSION['started'] == 1)) {
            header('Location:facindex.php');
        }
        ?>
        <div id="header">
            <br> <br> <br><br><br><br><center>Attendance Management System</center>
        </div>
        <div id="content">

            <div class="wrapper">

                <div id="corner"> View as Student </div>
                <div class="col-center">
               
                    <form name="login" action="login.php" method="post">
                        <fieldset>
                            <div class="field">
                                <label>Login as </label> <select name="loginas" size="1">
                                    <option> Admin </option>
                                    <option> Faculty </option>
                                </select>
                                <br />
                            </div>
                            <div class="field">
                                <label>Id </label><input type="text" name="id" value="" />
                                <br>
                            </div>
                            <div class="field">
                                <label>Password </label><input type="password" name="password" value="" />
                            </div><div class="field">
                                <label></label>
                                <input type="submit" value="Login" name="login" class="submit" />
                            </div>
                        </fieldset>
                    </form>
                </div>

            </div>

    </body>
</html>

<!DOCTYPE html>

<html>

<head>
    <title>VoteIt</title>
    <meta charset="utf-8">
    <link rel=icon href="../../images/icon.jpeg">
    <link rel="stylesheet" href="../../css/new_style.css">
    <link rel="stylesheet" href="../../css/layout.css">
    <link rel="stylesheet" href="../../css/responsive.css">
    <link rel="stylesheet" href="../../css/alerts.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
</head>

<body>
    <header class = "head">
        <div class="middle_box">
            <div class="homepage_link">
                <span class="logo"><img height="35" width="30" href="../index.php" src="../images/icon.png" alt="Potato"></span>
                <h1><a href="../index.php">Potatoe</a></h1>
            </div>
            <div class="search_bar">
                <form class="search_form" action="../actions/action_search.php" method="post">
                    <input type="text" name="input" placeholder="Blow my mind"></textarea>
                    <input type="submit" name="search" value="SEARCH">
                </form>
            </div>
            <div class="profile">
                <?php if(!isset($_SESSION['username'])){ ?>
                    <span class="login_button"> <a href="./login.php">LOGIN</a> </span>
                    <span class="signup_button"><a href="./signup.php">SIGN UP</a></span>
                <?php  } else { ?>
                    <span class="profile_button"><a class="button" href="../pages/profile.php">PROFILE</a></span>
                    <span class="logout_button"><a class="button" href="../actions/action_logout.php">LOGOUT</a> </span>

                <?php }?>
            </div>
        </div>
    </header>

    <section class="content">

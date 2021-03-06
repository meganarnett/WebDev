<?php
session_start();
require_once('Dao.php');
$dao = new Dao();
$name = $_GET['name'];
$loc = $dao->getLoc($name);
$occ = $dao->getOcc($name);
$e = $dao->getEmail($name);
$inst = $dao->getInst($name);
?>
<html>
        <head>
                <link rel="favicon" type="image/x-icon" href="favicon.ico">
                <link rel="stylesheet" type="text/css" href="/cs401/stylesheets/page.css">
                <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Kaushan+Script|Ruthie|Courgette">
        </head>
        <body>
                <div id="header">
                        <a class= "logo" href="/cs401/homepage.php"><img src="/cs401/pics/toplogo.jpg" title="top logo" width="150" height="75" /></a>
                <!--    <h1 class="name">Music Connect</h1> -->
                        <div class= "login">
                                <li>
                                        <?php if(isset($_SESSION['logged_in'])) { ?>
                                        <a class="lLink" href="/cs401/logout.php">Log Out</a>
                                        <?php } else { ?>
                                        <a class="lLink" href="/cs401/login.php">Log In</a>
                                </li>
                                |
                                <li>
                                        <a class="lLink" href="/cs401/signup.php"> Sign Up </a>
                                        <?php } ?>
                        </div>
                </div>
                <div id="navigation">
                        <ul>
                        <li>
                        <li>
                                <a class="nLink" href="/cs401/musicians.php">Students</a>
                        </li>
                        <li>
                                <a class= "nLink" href="/cs401/teachers.php">Teachers</a>
                        </li>
        <!--            <li>
                                <a class= "nLink" href="/cs401/schools.php">Schools</a>
                        </li> -->
                        </ul>
                </div>
                <div id="box">
                        <img src="/cs401/pics/profilepic.png"/>
                        <div> <a class="edit" href="/cs401/pageTest.php">Done</a></div>
                        <div class="text">
                                <h2>Name: <?=$name?></h2>
                        </div>
                        <div class="text">
                                <h2>Email: <?php foreach($e as $email) {
                                        echo $email['email'];
                                } ?></h2>
                        </div>
                        <form method="POST" action="profile_handler.php">
                                <div><label for="location" class="text"> Location: </label>
                                <input type="text" class="loTxt" name="location" value="<?php foreach($loc as $location) {echo $location['location']; }?>">
                                </div>
                                <div><label for="occupation" class="text">Occupation: </label>
                                <input type="text" class="occTxt" name="occupation" value="<?php foreach($occ as $occupation) {echo $occupation['occupation']; }?>">
                                </div>
                                <div><label for="instrument" class="text">Instrument: </label>
                                        <input type="text" class="instTxt" name="inst" value="<?php foreach($inst as $instrument) {echo $instrument['instrument']; }?>">
                                </div>
                        </form>
                </div>
        </body>
</html>

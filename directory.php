<?php

$pageTitle = 'Test Page';
$style = '';
$image = '../images/default_profile.png';
$name = 'Amy Takayesu';
$subtitle = 'Graduate Student';
$description = 'I am studying for a Masters in Computer Science at the Department of Information and Computer Sciences at the University of Hawaii. I expect to graduate in Spring, 2017.';
$social = [
    'facebook' => 'http://facebook.com',
    'twitter' => 'http://twitter.com/test'
];
$skills = [
    'skill1',
    'skill2',
    'skill3'
];
$links = [
    'facebook' => 'http://facebook.com',
    'twitter' => 'http://twitter.com/test'
];

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="mobile-web-app-capable" content="yes">
    <title><?php echo $pageTitle; ?></title>
    <script src="js/jquery.min.js"></script>
    <script src="css/semantic-ui/semantic.min.js"></script>
    <link rel="stylesheet" href="css/semantic-ui/semantic.min.css">

    <link rel="stylesheet" type="text/css" href="css/stylesheet-default.css">
    <link rel="stylesheet" type="text/css" href="css/print-default.css" media="print">

    <link rel="stylesheet" type="text/css" href="css/directory.css">
</head>
<body>
<!-- Website Header -->
<div>

    <ul class="topnav" id="myTopnav">
        <li><a href="#home"> <img src="images/icon.png" style="width:39px;height:57px"> </a></li>
        <li><a class="title">StackUP: Tech Talent Directory</a></li>

    </ul>

</div>

<div align="center" style="margin-top: 50px; margin-left: 100px; margin-right: 100px">
    <div class="ui search fluid">
        <div class="ui icon input">

            <input style="width:800px; height: 70px;" class="prompt" type="text" placeholder="Find Your Tech Talent">
            <i class="search icon"></i>
        </div>
        <div class="results"></div>
    </div>

</div>

<!-- Tiling of Studnet Information -->
<div style="height: 100%; margin-top: -50px; margin-left: 100px; margin-right: 100px">

    <div class="ui three column grid" style="margin-top: 0px">
        <div class="row">
            <div class="column">
                <div style="position: relative; top: 75px; z-index: 1" class="ui fluid centered small circular image">
                    <img src="<?php echo $image; ?>">
                </div>
                <div style="max-width: 500px; padding-top: 75px; margin-top: 0px" class="ui fluid centered card">
                    <div class="center aligned content">
                        <span class="header"><?php echo $name; ?></span>
                        <div class="meta">
                            <span class="date"><?php echo $subtitle; ?></span>
                        </div>
                        <div class="center aligned extra content social">
                            <?php
                            foreach ($social as $key => $value) {
                                echo '<a href="' . $value . '"> <i class="big ' . $key . ' icon icon-color"></i> </a>';
                            }
                            ?>
                        </div>
                        <div class="center aligned content skills">
                            <?php
                            foreach ($skills as $value) {
                                echo '<button class="ui basic button">' . $value . '</button>';
                            }
                            ?>
                        </div>
                        <div class="left aligned description">
                            <?php echo $description; ?>
                        </div>
                        <div class="center aligned content links">
                            <?php
                            foreach ($links as $key => $value) {
                                echo '<a href="' . $value . '"><button class="ui basic button">' . $key . '</button></a>';
                            }
                            ?>
                        </div>
                    </div>
                </div>

            </div>

            <div class="column">
                <div style="position: relative; top: 75px; z-index: 1" class="ui fluid centered small circular image">
                    <img src="<?php echo $image; ?>">
                </div>
                <div style="max-width: 500px; padding-top: 75px; margin-top: 0px" class="ui fluid centered card">
                    <div class="center aligned content">
                        <span class="header"><?php echo $name; ?></span>
                        <div class="meta">
                            <span class="date"><?php echo $subtitle; ?></span>
                        </div>
                        <div class="center aligned extra content social">
                            <?php
                            foreach ($social as $key => $value) {
                                echo '<a href="' . $value . '"> <i class="big ' . $key . ' icon icon-color"></i> </a>';
                            }
                            ?>
                        </div>
                        <div class="center aligned content skills">
                            <?php
                            foreach ($skills as $value) {
                                echo '<button class="ui basic button">' . $value . '</button>';
                            }
                            ?>
                        </div>
                        <div class="left aligned description">
                            <?php echo $description; ?>
                        </div>
                        <div class="center aligned content links">
                            <?php
                            foreach ($links as $key => $value) {
                                echo '<a href="' . $value . '"><button class="ui basic button">' . $key . '</button></a>';
                            }
                            ?>
                        </div>
                    </div>
                </div>

            </div>

            <div class="column">
                <div style="position: relative; top: 75px; z-index: 1" class="ui fluid centered small circular image">
                    <img src="<?php echo $image; ?>">
                </div>
                <div style="max-width: 500px; padding-top: 75px; margin-top: 0px" class="ui fluid centered card">
                    <div class="center aligned content">
                        <span class="header"><?php echo $name; ?></span>
                        <div class="meta">
                            <span class="date"><?php echo $subtitle; ?></span>
                        </div>
                        <div class="center aligned extra content social">
                            <?php
                            foreach ($social as $key => $value) {
                                echo '<a href="' . $value . '"> <i class="big ' . $key . ' icon icon-color"></i> </a>';
                            }
                            ?>
                        </div>
                        <div class="center aligned content skills">
                            <?php
                            foreach ($skills as $value) {
                                echo '<button class="ui basic button">' . $value . '</button>';
                            }
                            ?>
                        </div>
                        <div class="left aligned description">
                            <?php echo $description; ?>
                        </div>
                        <div class="center aligned content links">
                            <?php
                            foreach ($links as $key => $value) {
                                echo '<a href="' . $value . '"><button class="ui basic button">' . $key . '</button></a>';
                            }
                            ?>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <div class="ui three column grid" style="margin-top: 0px">
        <div class="row">
            <div class="column">
                <div style="position: relative; top: 75px; z-index: 1" class="ui fluid centered small circular image">
                    <img src="<?php echo $image; ?>">
                </div>
                <div style="max-width: 500px; padding-top: 75px; margin-top: 0px" class="ui fluid centered card">
                    <div class="center aligned content">
                        <span class="header"><?php echo $name; ?></span>
                        <div class="meta">
                            <span class="date"><?php echo $subtitle; ?></span>
                        </div>
                        <div class="center aligned extra content social">
                            <?php
                            foreach ($social as $key => $value) {
                                echo '<a href="' . $value . '"> <i class="big ' . $key . ' icon icon-color"></i> </a>';
                            }
                            ?>
                        </div>
                        <div class="center aligned content skills">
                            <?php
                            foreach ($skills as $value) {
                                echo '<button class="ui basic button">' . $value . '</button>';
                            }
                            ?>
                        </div>
                        <div class="left aligned description">
                            <?php echo $description; ?>
                        </div>
                        <div class="center aligned content links">
                            <?php
                            foreach ($links as $key => $value) {
                                echo '<a href="' . $value . '"><button class="ui basic button">' . $key . '</button></a>';
                            }
                            ?>
                        </div>
                    </div>
                </div>

            </div>
            <div class="column">
                <div style="position: relative; top: 75px; z-index: 1" class="ui fluid centered small circular image">
                    <img src="<?php echo $image; ?>">
                </div>
                <div style="max-width: 500px; padding-top: 75px; margin-top: 0px" class="ui fluid centered card">
                    <div class="center aligned content">
                        <span class="header"><?php echo $name; ?></span>
                        <div class="meta">
                            <span class="date"><?php echo $subtitle; ?></span>
                        </div>
                        <div class="center aligned extra content social">
                            <?php
                            foreach ($social as $key => $value) {
                                echo '<a href="' . $value . '"> <i class="big ' . $key . ' icon icon-color"></i> </a>';
                            }
                            ?>
                        </div>
                        <div class="center aligned content skills">
                            <?php
                            foreach ($skills as $value) {
                                echo '<button class="ui basic button">' . $value . '</button>';
                            }
                            ?>
                        </div>
                        <div class="left aligned description">
                            <?php echo $description; ?>
                        </div>
                        <div class="center aligned content links">
                            <?php
                            foreach ($links as $key => $value) {
                                echo '<a href="' . $value . '"><button class="ui basic button">' . $key . '</button></a>';
                            }
                            ?>
                        </div>
                    </div>
                </div>

            </div>

            <div class="column">
                <div style="position: relative; top: 75px; z-index: 1" class="ui fluid centered small circular image">
                    <img src="<?php echo $image; ?>">
                </div>
                <div style="max-width: 500px; padding-top: 75px; margin-top: 0px" class="ui fluid centered card">
                    <div class="center aligned content">
                        <span class="header"><?php echo $name; ?></span>
                        <div class="meta">
                            <span class="date"><?php echo $subtitle; ?></span>
                        </div>
                        <div class="center aligned extra content social">
                            <?php
                            foreach ($social as $key => $value) {
                                echo '<a href="' . $value . '"> <i class="big ' . $key . ' icon icon-color"></i> </a>';
                            }
                            ?>
                        </div>
                        <div class="center aligned content skills">
                            <?php
                            foreach ($skills as $value) {
                                echo '<button class="ui basic button">' . $value . '</button>';
                            }
                            ?>
                        </div>
                        <div class="left aligned description">
                            <?php echo $description; ?>
                        </div>
                        <div class="center aligned content links">
                            <?php
                            foreach ($links as $key => $value) {
                                echo '<a href="' . $value . '"><button class="ui basic button">' . $key . '</button></a>';
                            }
                            ?>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>


</div>
<script type="text/javascript">
    $('ui.fluid.search.selection.dropdown')
        .dropdown()
    ;
</script>
</body>
<AutoScroll></AutoScroll>
</html>

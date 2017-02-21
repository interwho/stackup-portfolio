<?php
require('core.php');

session_start();

if (!isset($_SESSION['email'])) {
    header('Location: index.php');
    exit();
}

if (isset($_POST['name']) && isset($_POST['subtitle']) && isset($_POST['summary'])) {
    $name = $_POST['name'];
    $subtitle = $_POST['subtitle'];
    $image = (empty($_POST['image']) ? '../images/default_profile.png' : 'http://' . $_POST['image']);
    $summary = $_POST['summary'];
    $css = $_POST['css'];

    $skills = json_encode($_POST['skills']);

    $bitbucket = (empty($_POST['bitbucket']) ? null : 'http://bitbucket.org/' . $_POST['bitbucket']);
    $bitbucket1 = (empty($_POST['bitbucket']) ? null : $_POST['bitbucket']);
    $facebook = (empty($_POST['facebook']) ? null : 'http://facebook.com/' . $_POST['facebook']);
    $facebook1 = (empty($_POST['facebook']) ? null : $_POST['facebook']);
    $github = (empty($_POST['github']) ? null : 'http://github.com/' . $_POST['github']);
    $github1 = (empty($_POST['github']) ? null : $_POST['github']);
    $instagram = (empty($_POST['instagram']) ? null : 'http://instagram.com/' . $_POST['instagram']);
    $instagram1 = (empty($_POST['instagram']) ? null : $_POST['instagram']);
    $linkedin = (empty($_POST['linkedin']) ? null : 'http://linkedin.com/in/' . $_POST['linkedin']);
    $linkedin1 = (empty($_POST['linkedin']) ? null : $_POST['linkedin']);
    $twitter = (empty($_POST['twitter']) ? null : 'http://twitter.com/' . $_POST['twitter']);
    $twitter1 = (empty($_POST['twitter']) ? null : $_POST['twitter']);


    $link1name = $_POST['link1name'];
    $link1 = (empty($_POST['link1']) ? null : 'http://' . $_POST['link1']);
    $link2name = $_POST['link2name'];
    $link2 = (empty($_POST['link2']) ? null : 'http://' . $_POST['link2']);
    $link3name = $_POST['link3name'];
    $link3 = (empty($_POST['link3']) ? null : 'http://' . $_POST['link3']);

    $social = [];

    if (!empty($bitbucket)) {
        $social['bitbucket'] = $bitbucket;
        $social['bitbucket1'] = $bitbucket1;
    }

    if (!empty($facebook)) {
        $social['facebook'] = $facebook;
        $social['facebook1'] = $facebook1;
    }

    if (!empty($github)) {
        $social['github'] = $github;
        $social['github1'] = $github1;
    }

    if (!empty($instagram)) {
        $social['instagram'] = $instagram;
        $social['instagram1'] = $instagram1;
    }

    if (!empty($linkedin)) {
        $social['linkedin'] = $linkedin;
        $social['linkedin1'] = $linkedin1;
    }

    if (!empty($twitter)) {
        $social['twitter'] = $twitter;
        $social['twitter1'] = $twitter1;
    }

    $social = json_encode($social);

    $links = [];
    if ((!empty($link1)) && !empty($link1name)) {
        $links[$link1name] = $link1;
    }

    if ((!empty($link2)) && !empty($link2name)) {
        $links[$link2name] = $link2;
    }

    if ((!empty($link3)) && !empty($link3name)) {
        $links[$link3name] = $link3;
    }

    $links = json_encode($links);

    updateUserPortfolio($connection, $_SESSION['email'], $name, $subtitle, $image, $summary, $css, $skills, $social, $links);
}

$profile = getUserPortfolio($connection, $_SESSION['email']);

$pageTitle = $profile['name'] . "'s StackUp Profile | Dashboard";
$style = $profile['style'];
$image = translateRelativeLinksUp($profile['image']);
$name = $profile['name'];
$subtitle = $profile['subtitle'];
$description = $profile['description'];
$social = json_decode($profile['social'], true);
$skills = json_decode($profile['skills']);
$links = json_decode($profile['links'], true);

$possibleSkills = getPossibleSkills($connection);
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

    <style type="text/css">
        <?php echo $style; ?>
    </style>

    <link rel="stylesheet" type="text/css" href="css/dashboard.css">
</head>
<body>
<div style="height: 100%; margin-top: -75px" class="ui middle aligned grid ">
    <div class="column">
        <div class="dashboard1">
            <h3>Update your StackUp profile:</h3>

            <form id="form" method="post">
                <div class="ui form">
                    <div class="field">
                        <label>Image: </label>
                    </div>
                    <div class="ui labeled input field fluid">
                        <div class="ui label">
                            http://
                        </div>
                        <input name="image" type="text" placeholder="imgur.com/your_picture.jpeg"
                               value="<?php if (substr($image, 0, 1) != 'i') {
                                   echo ltrim($image, 'http://');
                               } ?>">
                    </div>

                    <div class="field">
                        <label>Skills</label>
                        <select name="skills[]" selected="selected" class="ui fluid search dropdown" id="skill-select"
                                multiple="">
                            <option value="">Your Skills</option>
                            <?php
                            if (is_array($skills)) {
                                $skills = array_unique($skills);
                                foreach ($skills as $value) {
                                    echo '<option selected="selected" value=' . $value . '>' . $value . '</option>';
                                }
                            }

                            foreach ($possibleSkills as $possibleSkill) {
                                echo '<option value="' . $possibleSkill . '">' . $possibleSkill . '</option>';
                            }
                            ?>

                        </select>
                    </div>

                    <div class="field">
                        <label>Social Profiles: </label>
                    </div>

                    <div class="ui labeled input field fluid">
                        <div class="ui label">
                            bitbucket.org/
                        </div>
                        <input name="bitbucket" type="text" placeholder="username"
                               value="<?php echo $social['bitbucket1']; ?>">
                    </div>

                    <div class="ui labeled input field fluid">
                        <div class="ui label">
                            facebook.com/
                        </div>
                        <input name="facebook" type="text" placeholder="username"
                               value="<?php echo $social['facebook1']; ?>">
                    </div>

                    <div class="ui labeled input field fluid">
                        <div class="ui label">
                            github.com/
                        </div>
                        <input name="github" type="text" placeholder="username"
                               value="<?php echo $social['github1']; ?>">
                    </div>

                    <div class="ui labeled input field fluid">
                        <div class="ui label">
                            instagram.com/
                        </div>
                        <input name="instagram" type="text" placeholder="username"
                               value="<?php echo $social['instagram1']; ?>">
                    </div>

                    <div class="ui labeled input field fluid">
                        <div class="ui label">
                            linkedin.com/in/
                        </div>
                        <input name="linkedin" type="text" placeholder="username"
                               value="<?php echo $social['linkedin1']; ?>">
                    </div>

                    <div class="ui labeled input field fluid">
                        <div class="ui label">
                            twitter.com/
                        </div>
                        <input name="twitter" type="text" placeholder="username"
                               value="<?php echo $social['twitter1']; ?>">
                    </div>

                </div>
        </div>
        <div style="position: relative; top: 75px; z-index: 1" class="ui fluid centered small circular image">
            <img src="<?php echo $image; ?>">
        </div>
        <div class='ui form fluid centered card' style="max-width: 500px; padding-top: 75px; margin-top: 0px">

            <div class="center aligned content">
                <div class="field">
                    <input style="text-align:center" name="name" type="text" placeholder="Your Name (required)"
                           value="<?php echo $name; ?>">
                </div>

                <div class="field">
                    <input style="text-align:center" name="subtitle" type="text"
                           placeholder="Your Subheading (required)" value="<?php echo $subtitle; ?>">
                </div>


                <div class="center aligned extra content social">
                    <?php
                    if (is_array($social)) {
                        foreach ($social as $key => $value) {
                            echo '<a href="' . $value . '"target="_blank"> <i class="big ' . $key . ' icon icon-color"></i> </a>';
                        }
                    }
                    ?>
                </div>

                <div class="center aligned content skills">
                    <?php
                    if (is_array($skills)) {
                        foreach ($skills as $value) {
                            echo '<button class="ui basic button">' . $value . '</button>';
                        }
                    }
                    ?>
                </div>

                <div class="field">
                    <textarea name="summary" rows="2"
                              placeholder="Your Summary (required)"><?php echo $description; ?></textarea>
                </div>
                <div class="center aligned content links">
                    <?php
                    if (is_array($links)) {
                        foreach ($links as $key => $value) {
                            echo '<a href="' . $value . '"><button class="ui basic button">' . $key . '</button></a>';
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

</div>
<div class="dashboard2" style="margin-top: -75px" class="ui middle aligned grid ">
    <div class="two ui buttons">
        <button class="ui yellow button" style="color:white"><a href="directory.php">Back to Talent Directory</a>
        </button>
        <button class="ui button"><a href="logout.php">Logout</a></button>
    </div>
    <div class="ui form" style="margin-top:5%">
        <div class="field">
            <label>Custom CSS</label>
            <textarea name="css" rows="2" placeholder="Your CSS"><?php echo $style; ?></textarea>
        </div>

        <div class="field">
            <label>Bottom Link 1</label>
        </div>
        <div class="field">
            <input name="link1name" type="text" placeholder="Link Name">
        </div>
        <div class="ui labeled input field fluid">
            <div class="ui label">
                http://
            </div>
            <input name="link1" type="text" placeholder="mysite.com">
        </div>

        <div class="field">
            <label>Bottom Link 2</label>
        </div>
        <div class="field">
            <input name="link2name" type="text" placeholder="Link Name">
        </div>
        <div class="ui labeled input field fluid">
            <div class="ui label">
                http://
            </div>
            <input name="link2" type="text" placeholder="mysite.com">
        </div>

        <div class="field">
            <label>Bottom Link 3</label>
        </div>
        <div class="field">
            <input name="link3name" type="text" placeholder="Link Name">
        </div>
        <div class="ui labeled input field fluid">
            <div class="ui label">
                http://
            </div>
            <input name="link3" type="text" placeholder="mysite.com">
        </div>

        <button type="submit" class="ui primary button">Save all</button>

    </div>
    </form>
</div>
</div>
</div>
<script type="text/javascript">
    $('#skill-select')
        .dropdown()
    ;

    $('#form')
        .form({
            fields: {
                name: 'empty',
                subtitle: 'empty',
                summary: 'empty'
            }
        })
    ;
</script>
</body>
<AutoScroll></AutoScroll>
</html>

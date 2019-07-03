<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-140627963-1"></script>

    <link href="https://fonts.googleapis.com/css?family=Montserrat:200,500,800&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/78af8b1a18.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

    <script src="index.js"></script>
    <link rel="stylesheet" href="style/index.css">
    <link rel="icon" href="misc/icon.png">
    <title>Contact – ScareMe</title>
</head>

<body>

    <div class="contact">
        <form class="contact-form" action="includes/contactform.php" method="post">
            <h1 class="contact-title">Contact Me</h1>
            <input name="name" type="text" placeholder="Name">
            <input name="subject" type="text" placeholder="Subject">
            <input name="email" type="text" placeholder="Email">
            <textarea class="message" name="message" placeholder="Write something..." style="height:200px"></textarea>
            <button type="submit" name="submit">SUBMIT</button>
        </form>
    </div>

    <footer>
        <div class="footer-container">
            <h1>Stay Connected</h1>
            <div class="footer-social-media">
                <ul>
                    <a href="https://twitter.com/YTScareMe" target="_blank"><i class="fab fa-twitter"></i></a>
                    <a href="https://www.twitch.tv/scaremeyt" target="_blank"><i class="fab fa-twitch"></i></a>
                    <a href="https://www.youtube.com/channel/UCFzlbFEnI6-RtqKjLYA7FNg" target="_blank"><i
                            class="fab fa-youtube"></i></a>
                    <a href="contact.php"><i class="fas fa-envelope"></i></a>
                    <a href="https://discord.gg/WpUcsb" target="_blank"><i class="fab fa-discord"></i></a>
                </ul>
            </div>
        </div>
        <div class="footer-text">
            <p>&copy; Copyright ScareMe Entertainment. All Rights Reserved</p>
        </div>
    </footer>

    <nav>
        <div id="nav-bar" class="global-nav-bar">
            <div class="navigation-open">
                <i id="bars" class="fas fa-bars"></i>
            </div>
            <div class="home-title">
                <h1 class="title"><a href="index.php">Scare<span class="adjust-red">Me</span></a></h1>
                <h2 class="nav-bar">
                    <a href="index.php">Videos</a>
                    <a href="contact.php">Contact</a>
                    <a href="post.php">Posts</a>
                </h2>
            </div>
        </div>

        <div class="slide-nav-bar">
            <nav>
                <div class="slide-close">
                    <i class="fas fa-times"></i>
                </div>
                <ul>
                    <li class="title"><a href="index.php">Scare<span class="adjust-red">Me</span></a></li>
                    <li><a href="index.php">Videos</a></li>
                    <li><a href="post.php">Posts</a></li>
                    <li><a href="contact.php">Contact</a></li>
                    <div class="social-media-icons">
                        <li><a class="youtube-social" href="https://www.youtube.com/channel/UCFzlbFEnI6-RtqKjLYA7FNg"
                                target="_blank"><i class="fab fa-youtube"></i></a></li>
                        <li><a class="twitter-social" href="https://twitter.com/YTScareMe" target="_blank"><i
                                    class="fab fa-twitter"></i></a></li>
                    </div>
                </ul>
            </nav>
        </div>
    </nav>
</body>

</html>
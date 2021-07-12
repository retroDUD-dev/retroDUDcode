<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> About retroDUD</title>

    <link rel="stylesheet" href="./css/style.css">
    <script type="text/javascript" src="./js/scripts.js"></script>
</head>
<body>
    <?php include_once $_SERVER['DOCUMENT_ROOT'].'/php/topBar.php'; ?>
    <div class="header text">About me</div>
    <div class="aboutContainer">
        <div class="about">
            <h3>Hello there!<br>
            And welcome to my page!</h3>
            
            <h4>Let me tell you a bit about myself:</h4>
            
            I've always been interested in computers, programming, and technology. I've been  in contact with computer science and coding in one form or another since my teen years.<br>
            I followed that path in college, where I studied Physics and Computer Science. My studies gave me a good foundation in World Wide Web basics, basics in database structures and use, as well as programming skills in Python, JavaScript, C++, etc.<br>
            My career path has steered away from programming since college, but I've always remained interested in coding.<br>
            My love for programming was recently reignited and I took up PHP programming, as I would like to build a career in backend web development.<br><br>

            I built this page to test my skills, practice, and hopefully get some feedback.<br>
            I hope that you enjoyed your trip to my page!<br>
            I appreciate any feedback, so if you have any suggestions, questions, or just want to say hello, please feel free to write to <a class="mailtoLink" href="mailto:info@retroDUD.eu">info@retroDUD.eu</a>!<br><br>

            Best,<br>
            retroDUD
        </div>
        <div class="contact">
            <div class="innerContainer">
                CONTACT ME<br><br>
                <form id="contact" action="php/emailHandler.php" method="POST">
                    <div style="text-align: right;"><label for="fname">First Name</label>
                        <input form="contact" class="input" type="text" id="fname" name="firstname" placeholder="Your name.." required>
                    <label for="lname">Last Name</label>
                        <input form="contact" class="input" type="text" id="lname" name="lastname" placeholder="Your last name..">
                    </div>
                    <div style="text-align: right;"><label for="subject">Email</label>
                        <input form="contact" class="input" type="email" id="email" name="email" placeholder="Your email.." required>
                    </div>
                    <div style="text-align: right;"><label for="subject">Message</label>
                        <textarea form="contact" id="subject" class="input" style="width: 80%; height:200px;" name="subject" placeholder="Write something.." required></textarea>
                    </div>
                    <div>
                        <input form="contact" class="submit button" type="submit" value="Submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="submitContainer"></div>
</body>
</html>
<?php
include("path.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/faa1fe5a90.js" crossorigin="anonymous"></script>

    <!-- Custom Styling -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- Google Font -->
    <!-- <link href="https://fonts.googleapis.com/css2?family=Candal&family=Lora:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet"> -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@900&display=swap" rel="stylesheet">

    <title>About Us</title>
</head>

<body>

    <?php include(ROOT_PATH . "/app/includes/header.php"); ?>


    <div class="page-wrapper">

        <div class="content clearfix">

            <h1 class="post-title" style="text-align: center; margin-bottom: 100px;">About Us</h1>

            <div class="about-img">
                <img src="<?php echo BASE_URL . '/assets/about.svg'; ?>">
            </div>

            <div class="about-para">

                <div class="wavy hello">
                    <span style="--i:1;">H</span>
                    <span style="--i:2;">E</span>
                    <span style="--i:3;">L</span>
                    <span style="--i:4;">L</span>
                    <span style="--i:5;">O</span>
                    <span style="--i:6;"> </span>
                    <span style="--i:7;">T</span>
                    <span style="--i:8;">H</span>
                    <span style="--i:9;">E</span>
                    <span style="--i:10;">R</span>
                    <span style="--i:11;">E</span>
                    <span style="--i:12;">!</span>
                </div>
                <!-- <p class="hello">
                    Hello There!
                </p> -->

                <!-- Changing Text -->
                <div class="text">
                    <p class="abt-text">Welcome to a place full of
                        <br>
                        <span class="word wisteria"> Imagination</span>
                        <span class="word belize"> Creativity</span>
                        <span class="word pomegranate"> Open-Mindness</span>
                        <span class="word green"> Enjoyment</span>
                        <span class="word midnight"> Freedom</span>
                    </p>
                </div>
                <!--// Changing Text -->
                <br><br><br><br><br><br>
                <div class='console-container'>
                    <p class="abt-text">
                        A place where <b>YOU</b> can
                        <span id='text'>
                        </span>
                    </p>
                    <div class='console-underscore' id='console'>&#95;

                    </div>
                </div>
                <br><br><br><br><br><br><br><br><br><br>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce cursus egestas condimentum. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed pulvinar felis ac mattis feugiat. Nulla tempor in lacus in congue. Praesent in condimentum sem. Aenean a eleifend sem. Nullam a risus turpis. Morbi sit amet risus orci. Etiam elit quam, molestie nec enim vitae, mattis sodales ex. Sed quis sapien a enim interdum lobortis. Donec lobortis urna vel orci ullamcorper, vel mattis lacus fringilla. Donec non ultrices urna. Proin tincidunt maximus volutpat. Mauris eu convallis arcu, non iaculis libero. Fusce nunc ipsum, ullamcorper sit amet commodo dignissim, lobortis vel erat.

                    Fusce malesuada consequat imperdiet. Ut enim felis, ullamcorper non metus nec, ullamcorper faucibus risus. Nunc venenatis pulvinar condimentum. Pellentesque elementum ex sed ex fermentum ultricies. Quisque ornare lectus quam. Ut vel dignissim sapien. Integer feugiat laoreet ligula at viverra. Pellentesque mollis et massa eget lobortis. Duis finibus nibh nec imperdiet rutrum. Suspendisse ac nisi eu magna sollicitudin blandit.

                    Integer lacinia nulla risus, et euismod erat interdum eget. Ut mauris quam, gravida rutrum neque eget, viverra auctor massa. Cras non velit nec lacus fringilla dapibus ut in velit. Vivamus pretium orci eu eros mattis, sed dignissim ipsum porttitor. Cras et maximus quam. Proin quis nisi convallis, luctus risus a, facilisis nunc. Curabitur at ex fringilla, ultricies nisl id, convallis nisl. Sed scelerisque nulla quis malesuada cursus. Donec ut pretium augue. Mauris luctus enim id felis rutrum blandit. Morbi porttitor leo sed bibendum gravida. Vestibulum tempus, urna eget mollis tristique, arcu leo pretium est, ac facilisis leo massa sed turpis. Donec euismod posuere arcu vel consectetur. Pellentesque lacinia finibus quam ut lacinia.
                </p>

            </div>
        </div>
    </div>

    <!-- Footer -->

    <?php include(ROOT_PATH . "/app/includes/footer.php"); ?>

    <!-- //Footer -->

    <!-- Typing Animation - JS -->
    <script>
        // function([string1, string2],target id,[color1,color2])    
        consoleText(['Freely Express Yourself.', 'Share your opinions.', 'Collaborate and Meet other people like you.'], 'text', ['tomato', 'rebeccapurple', 'orange']);

        function consoleText(words, id, colors) {
            if (colors === undefined) colors = ['#fff'];
            var visible = true;
            var con = document.getElementById('console');
            var letterCount = 1;
            var x = 1;
            var waiting = false;
            var target = document.getElementById(id)
            target.setAttribute('style', 'color:' + colors[0])
            window.setInterval(function() {

                if (letterCount === 0 && waiting === false) {
                    waiting = true;
                    target.innerHTML = words[0].substring(0, letterCount)
                    window.setTimeout(function() {
                        var usedColor = colors.shift();
                        colors.push(usedColor);
                        var usedWord = words.shift();
                        words.push(usedWord);
                        x = 1;
                        target.setAttribute('style', 'color:' + colors[0])
                        letterCount += x;
                        waiting = false;
                    }, 1000)
                } else if (letterCount === words[0].length + 1 && waiting === false) {
                    waiting = true;
                    window.setTimeout(function() {
                        x = -1;
                        letterCount += x;
                        waiting = false;
                    }, 1000)
                } else if (waiting === false) {
                    target.innerHTML = words[0].substring(0, letterCount)
                    letterCount += x;
                }
            }, 120)
            window.setInterval(function() {
                if (visible === true) {
                    con.className = 'console-underscore hidden'
                    visible = false;

                } else {
                    con.className = 'console-underscore'

                    visible = true;
                }
            }, 400)
        }
    </script>
    <!-- //Typing Animation - JS -->

    <!-- Changing Text Animation - JS -->

    <script>
        var words = document.getElementsByClassName('word');
        var wordArray = [];
        var currentWord = 0;

        words[currentWord].style.opacity = 1;
        for (var i = 0; i < words.length; i++) {
            splitLetters(words[i]);
        }

        function changeWord() {
            var cw = wordArray[currentWord];
            var nw = currentWord == words.length - 1 ? wordArray[0] : wordArray[currentWord + 1];
            for (var i = 0; i < cw.length; i++) {
                animateLetterOut(cw, i);
            }

            for (var i = 0; i < nw.length; i++) {
                nw[i].className = 'letter behind';
                nw[0].parentElement.style.opacity = 1;
                animateLetterIn(nw, i);
            }

            currentWord = (currentWord == wordArray.length - 1) ? 0 : currentWord + 1;
        }

        function animateLetterOut(cw, i) {
            setTimeout(function() {
                cw[i].className = 'letter out';
            }, i * 80);
        }

        function animateLetterIn(nw, i) {
            setTimeout(function() {
                nw[i].className = 'letter in';
            }, 340 + (i * 80));
        }

        function splitLetters(word) {
            var content = word.innerHTML;
            word.innerHTML = '';
            var letters = [];
            for (var i = 0; i < content.length; i++) {
                var letter = document.createElement('span');
                letter.className = 'letter';
                letter.innerHTML = content.charAt(i);
                word.appendChild(letter);
                letters.push(letter);
            }

            wordArray.push(letters);
        }

        changeWord();
        setInterval(changeWord, 4000);
    </script>

    <!-- Changing Text Animation - JS -->

</body>

</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>
        Generate a Quiz
    </title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,user-scalable=no"/>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="/css/styles.css?<?php echo time() ?>" id="myStyles">
    <link href='https://fonts.googleapis.com/css?family=Damion' rel='stylesheet'>

    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="192x192" href="/android-chrome-192x192.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/manifest.json"/>
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#000000">
    <meta name="msapplication-TileColor" content="#000000">
    <meta name="theme-color" content="#000000">

    <meta name='description' content='A Randomized Quiz Generator'/>
    <meta property="og:title" content="Quizify!">
    <meta property='og:type' content='website'/>
    <meta property="og:image:height" content="503">
    <meta property="og:image:width" content="961">
    <meta property="og:description" content="A Randomized Quiz Generator">
    <meta property="og:url" content="https://quiz-generator.000webhostapp.com/">
    <meta property="og:image" content="https://quiz-generator.000webhostapp.com/og-image.jpg">
    <style>
        a[title*="000webhost"] {
            display: none !important;
        }

    </style>
</head>
<body>
<div class="container">
    <div class="m-scene" id="main">
        <div class="m-aside scene_element scene_element--fadein">
            <div class="jumbotron text-center">
                <h1 style="font-family: 'Damion'; font-size:70px;">
                    <a style="color:inherit" href="/index.php">Quizify!</h1>
                </a>
                <h4>
                    <small>A Randomized Quiz Generator</small>
                </h4>
            </div>
        </div>

        <div class="m-right-panel m-page scene_element scene_element--fadeinright">
            <?php
            require_once 'config.php';
            $sql = "SELECT distinct subject FROM qb";
            $result = $mysqli->query($sql);
            if ($result->num_rows <= 0) {
                echo "
							<div class='jumbotron'>
							<div style=\"text-align: center;\">
							<h2>No Subjects found</h2>
							<hr>
							<a class='btn btn-info' href='/index.php'>Go back</a>
							</div>
							</div>
							";
                $mysqli->close();
                die();
            }
            ?>
            <div class="jumbotron">
                <h1 class="text-center" style="font-family:Damion">Generate a Quiz</h1>
                <hr>
                <br>
                <div class="form-group">
                    <form action="generate.php">
                        <p>Select Subject/Topic</p>
                        <select class="form-control selectpicker" name="subjects[]" multiple data-selected-text-format="count">
                            <?php
                            while ($row = $result->fetch_assoc()) {
                                echo "<option>" . $row['subject'] . "</option>";
                            }
                            ?>
                        </select>
                        <br><br>
                        <p>Enter Number of Questions</p>
                        <input class="form-control" type="number" name="limit" value="5" onfocus="select()">
                        <br>
                        <br>
                        <button class="form-control btn btn-success" type="submit">Quizify!</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>
<script src="/js/site.js"></script>
</body>
</html>
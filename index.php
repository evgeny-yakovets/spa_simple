<?php include_once('php/protected/main.php')?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/scripts.js" ></script>
</head>
<body>
    <div class="main-container">
        <div class="content-container default-width">
            <div>Use {time} to print server time. Use /{time} to print {time}.</div>
            <br>
            <div class="articles-container default-width">
                <?php $main = new Base();
                foreach ($main->loadArticles() as $row){?>
                    <div class="article-container hide-text">
                        <div class="article-title"><?= 'Article №'.$row['id']?></div>
                        <div class="article-text"><?= $row['text']?></div>
                    </div>
                <?}?>
            </div>
            <div class="add-text default-width">
                <textarea class="area" rows="4" cols="54"></textarea>
                <button class="button">Add</button>
            </div>
        </div>
    </div>
</body>
</html>
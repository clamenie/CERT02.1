<?php
include 'src/dao/DBController.php';
$dbController = new DAO\DBController();

const CONNECTED_USER = 1;
?>
<html>
<head>
  <title>Home</title>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="./src/assets/css/style.css">
</head>
<body>

  <div class="leftpane">
    <h2>Abstract</h2>


    <?php
      $debts = $dbController->getDebts(CONNECTED_USER);
      foreach ($debts as $index => $debt){
        $block = "
        <div class='debt'>
            <h4>%s</h4>
            <div>%s</div>
            <div><span class='state'>%s</span> - <span class='cost'>%d</span></div>
        </div>";
        printf($block,$debt->name, $debt->name, $debt->state, $debt->amount);
      }
    ?>


  </div>
  <div class="rightpane">
    <div id="debt-add">
      Ajout Note
    </div>
  </div>
</body>
<script src="src/assets/js/script.js" charset="utf-8"></script>
</html>

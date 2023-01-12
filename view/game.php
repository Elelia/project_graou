<link rel="stylesheet" href="styles/game.css" type="text/css">
<script type="text/javascript">
    function test() {
        var test = <?php echo json_encode($carte) ?>;
        alert(test);
    }
</script>
</head>  
<body>

   <p>Salut</p>
   <div class="container">
    <div class="row">
        <div class="col-4">
            <h2>Bot</h2>
            <a href=""><img src="images\carte0.png" alt="image"/></a>
        </div>
        <div class="col-4">
            <h2>Bot</h2>
            <a href=""><img src="images\carte0.png" alt="image"/></a>
        </div>
        <div class="col-4">
            <h2>Bot</h2>
            <a href=""><img src="images\carte0.png" alt="image"/></a>
        </div>
    </div><br />
    <div class="row">
        <div class="col-4">
            <h2>Bot</h2>
            <a href=""><img src="images\carte0.png" alt="image"/></a>
        </div>
        <div class="col-4">
            <h2>Bot</h2>
            <a href=""><img src="images\carte0.png" alt="image"/></a>
        </div>
        <div class="col-4">
            <h2>Bot</h2>
            <a href=""><img src="images\carte0.png" alt="image"/></a>
        </div>
    </div>
   </div><br />
   <div id="player" class="container">
    <div class="row">
        <div class="col-12 player-section text-center">
            <h1>Salut joueur</h1>
            <a href=""><img class="mx-auto d-block" src="images\<?php echo $carte; ?>" alt="image"/></a><br />
            <button type="button" onclick="test()">Action</button>
        </div>
    </div>
   </div>
</body>
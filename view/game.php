<link rel="stylesheet" href="styles/game.css" type="text/css">
<script type="text/javascript">
    function test() {
        var test = JSON.parse('<?php echo $id; ?>');
        console.log(test);
        carte3 = document.getElementById('3');
        carte2 = document.getElementById('2');
        carte1 = document.getElementById('1');
        if(test == carte1.id) {
            carte1.src = "images/carte2.png";
        } else if(test == carte2.id) {
            carte2.src = "images/carte2.png";
        } else if(test == carte3.id) {
            carte3.src = "images/carte2.png";
        }
        
    }
</script>
</head>  
<body>
   <div class="container">
    <div class="row">
        <div class="col-3">
            <h2>Bot</h2>
            <a href=""><img id="3" src="images\carte0.png" alt="image"/></a>
        </div>
        <div class="col-3">
            <h2>Bot</h2>
            <a href=""><img id="2" src="images\carte0.png" alt="image"/></a>
        </div>
        <div class="col-3">
            <h2>Bot</h2>
            <a href=""><img id="1" src="images\carte0.png" alt="image"/></a>
        </div>
        <div class="col-3">
            <h2>Bot</h2>
            <a href=""><img src="images\carte0.png" alt="image"/></a>
        </div>
    </div><br />
    <div class="row">
        <div class="col-3">
            <h2>Bot</h2>
            <a href=""><img src="images\carte0.png" alt="image"/></a>
        </div>
        <div class="col-3">
            <h2>Bot</h2>
            <a href=""><img src="images\carte0.png" alt="image"/></a>
        </div>
        <div class="col-3">
            <h2>Bot</h2>
            <a href=""><img src="images\carte0.png" alt="image"/></a>
        </div>
        <div class="col-3">
            <h2>Bot</h2>
            <a href=""><img src="images\carte0.png" alt="image"/></a>
        </div>
    </div>
   </div><br />
   <div id="player" class="container">
    <div class="row">
        <div class="card bg-light mb-3" style="max-width: 20rem;">
            <div class="card-header">Partie</div>
            <div class="card-body">
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
        </div>
        <div class="col-9 player-section text-center">
            <h1>Salut <?php echo $pseudo; ?></h1>
            <a href=""><img class="mx-auto d-block" src="images\<?php echo $carte; ?>" alt="image"/></a><br />
            <button type="button" onclick="test()">Action</button>
        </div>
    </div>
   </div>
</body>
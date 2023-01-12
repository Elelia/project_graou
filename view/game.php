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
            <a href=""><img src="images\<?php echo $carte; ?>" alt="image"/></a><br />
            <button type="button" onclick="test()">Action</button>
        </div>
        <div class="col-4">
            <a href=""><img src="images\<?php echo $carte; ?>" alt="image"/></a>
        </div>
        <div class="col-4">
            <a href=""><img src="images\<?php echo $carte; ?>" alt="image"/></a>
        </div>
    </div><br />
    <div class="row">
        <div class="col-4">
            <a href=""><img src="images\<?php echo $carte; ?>" alt="image"/></a>
        </div>
        <div class="col-4">
            <a href=""><img src="images\<?php echo $carte; ?>" alt="image"/></a>
        </div>
        <div class="col-4">
            <a href=""><img src="images\<?php echo $carte; ?>" alt="image"/></a>
        </div>
    </div>
   </div>
</body>
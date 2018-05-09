<header>
    <div id=tipTop>
        <img id=logo src="/images/dotLogo.jpg">
        <div id='cartBlock'>
            <img id='shopCart' src="/images/babyCart.jpg">
            <br><p> 
            <?php
                if(isset($_SESSION['count'])){
                    echo "Items: " . $_SESSION['count'];
                }
            ?>
            </p>
        </div>
    </div>
    <nav class="cNav" id="myNav">
        <ul>
            <a href="javascript:void(0);" class="icon" onclick="myFunction()">&#9776;</a>
            <li><a href="../dot.php">Home</a></li>
            <li><a href="/view/shop.php">Shop</a></li>
            <li><a href="">About</a></li>
            <li><a href="">Contact</a></li>
        </ul>
    </nav>
</header>
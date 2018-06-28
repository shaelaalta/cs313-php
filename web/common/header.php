<header>
    <div id=tipTop>
        <img id=logo src="/images/dotLogo.jpg">
        <div id='cartBlock'>
            <a href="../shop/shopIndex.php?action=viewCart"><img id='shopCart' src="/images/babyCart.jpg"></a>
            <br><p>
            <?php
                if(isset($_SESSION['count'])){
                    if($_SESSION['count'] > 0){
                        echo "Items: " . $_SESSION['count'];
                    }
                }
            ?>
            </p>
        </div>
    </div>
    <nav class="cNav" id="myNav">
        <ul>
            <a href="javascript:void(0);" class="icon" onclick="myFunction()">&#9776;</a>
            <li><a href="../dot.php">Home</a></li>
            <li><a href="../shop/shopIndex.php?action=keepShop">Shop</a></li>
            <li><a href="../shop/shopIndex.php?action=about">About</a></li>
            <li><a href="../view/admin.php">Contact</a></li>
        </ul>
    </nav>
</header>
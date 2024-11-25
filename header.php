
<header>
		<span class="logo-text">HHA PRINTED</span>
		
        <div class="logo"> </div>
		
        <nav>
            <ul>
                <li><a href="home.php" >Home</a></li>
                <li><a href="shop.php">Shop</a></li>
                <li><a href="cart.php">Cart</a></li>
                <li><a href="login.php">Account</a></li>
            </ul>
        </nav>
    </header>



<style>

header {
    justify-content: space-between;
    background-color: black;
	display: grid;
    grid-template-columns: 1fr auto 1fr;  /* Three columns: left, center, and right */
    align-items: center;  /* Vertically center the content */
    padding: 20px;
}
	
.logo-text {
    font-size: 24px;             /* Makes the text bold */
    color: white;                  /* Choose the color for your logo text */
    font-family: "Gill Sans", "Gill Sans MT", "Myriad Pro", "DejaVu Sans Condensed", Helvetica, Arial, "sans-serif";
    letter-spacing: 2px;          /* Adds spacing between letters */
    text-transform: uppercase;    /* Makes the text uppercase */
	padding-left: 30px;
	}
	
nav {
    display: flex;
    justify-content: space-between; /* Distribute the left and right navigation */
    width: 100%; /* Take full width of the header */
	margin-left: 400px;
}
	
nav ul {
    list-style: none;
    display: flex;
    gap: 7px;
    list-style: none;
    padding: 0;
    margin: 0;
}

nav ul li a {
    text-decoration: none;
    color: white;
	font-family: "Gill Sans", "Gill Sans MT", "Myriad Pro", "DejaVu Sans Condensed", Helvetica, Arial, "sans-serif";
	font-size: 20px;
    margin-right: 50px;

}


</style>
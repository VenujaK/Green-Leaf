  <style>
    .heading {
    text-align: center;
    color: var(--main-color);
    text-transform: uppercase;
    padding-bottom: 3.5rem;
    font-size: 4rem;
}


/* body {
    background: #010103;
} */

.heading span {
    color: var(--main-color);
    text-transform: uppercase;
}

.btn {
    margin-top: 1rem;
    display: inline-block;
    padding: .9rem 3rem;
    font-size: 1.7rem;
    color: #fff;
    background: var(--main-color);
    cursor: pointer;
}

.btn:hover {
    letter-spacing: .2rem;
}

.header {
    background: var(--white);
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 1.5rem 7%;
    border-bottom: var(--border);
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    z-index: 1000;
}

.header .logo img {
    height: 4rem;
}

.header .navbar a {
    margin: 0 1rem;
    font-size: 1.6rem;
    color: var(--main-color);
    font-weight: 700;
}

.header .navbar a:hover {
    color: var(--main-color);
    border-bottom: .1rem solid var(--main-color);
    padding-bottom: .5rem;
}

  </style>
  <header class="header">

        <a href="#" class="logo">
            <img src="images/Green_leaf.png" alt="">
        </a>

        <nav class="navbar">
            <a href="./index.php#home">home</a>
            <a href="./index.php#about">about</a>
            <a href="./index.php#contact">Inform</a>
            <a href="./Article_Page.php">blogs</a>
            
        </nav>



    </header>
   
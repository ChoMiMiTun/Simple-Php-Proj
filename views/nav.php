<section id="top-nav">
    <div class="container-fluid bg-primary">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light bg-primary text-white">
                <a class="navbar-brand text-white font" href="#">Simple Blog</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto text-white font">
                        <li class="nav-item active">
                            <a class="nav-link text-white font" href="index.php">Home</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link text-white font" href="#">News</a>
                        </li>
                        <li class="nav-item text-white font">
                            <a class="nav-link text-white font" href="filterpost.php?sid=1">Politic</a>
                        </li>
                        <li class="nav-item text-white font">
                            <a class="nav-link text-white font" href="filterpost.php?sid=2">Fashion</a>
                        </li>
                        <li class="nav-item text-white font">
                            <a class="nav-link text-white font" href="filterpost.php?sid=3">IT News</a>
                        </li>
                        <li class="nav-item dropdown text-white font">
                            <a class="nav-link dropdown-toggle text-white font" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php

                                if (checkSession("username")) {
                                    echo getSession("username");
                                }else{
                                    echo "Member";
                                }

                                ?>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                            <?php

                                if (checkSession("username")) {
                                    echo "<a class='dropdown-item' href='logout.php'>Logout</a>";
                                }else{
                                    echo "<a class='dropdown-item' href='login.php'>Login</a>
                                    <a class='dropdown-item' href='register.php'>Register</a>";
                                }

                                ?>
                        </li>

                    </ul>

                </div>
            </nav>
        </div>
    </div>
</section>
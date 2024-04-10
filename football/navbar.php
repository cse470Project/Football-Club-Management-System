<nav class="navbar bg-primary navbar-expand-lg bg-body-tertiary custom-navbar" style="background-color: #274169;">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">Home</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="club.php">Club</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="player.php">player</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="transfer.php">transfer</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="league.php">league</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="stream.php">Stream</a>
                </li>


                <?php if (!(!isset($_SESSION['admin_login']) || $_SESSION['admin_login'] != true)) {
                    echo '
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="admin.php">Admin</a>
                        </li>';
                }
                ?>
                <li class="nav-item">
                    <form action="logout.php" method="post">
                        <button type="submit" class="btn btn-primary w-100">Log Out</button>
                    </form>
                </li>

                <li class="nav-item">
                    
                        <?php
                        include "darkmode.php";
                        ?>

                    
                </li>


            </ul>
          
        </div>
    </div>
</nav>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel='stylesheet' href='../css/custom.css'>

</head>

<body>
    <?php session_start();
    include('../conn.php'); 
    require ('uplodfunction.php');
    include('../class.php');
    ?>
    <header class='container-flaud'>
        <div class='menu-1'>
            <nav class="navbar navbar-expand-lg navbar-light ">
                <div class="container-fluid">
                    <div class='icon'></div>
                    <a class="navbar-brand">school</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page"
                                    href="index.php?page=logout.php">logout</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="index.php?page=services.php">Service</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link " href="index.php?page=settings.php">settings</a>
                            </li>
                            
                            <li class="nav-item">
                                <a class="nav-link " href="index.php?page=user_roles.php">USER ROLES</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link " href="index.php?page=users.php">USERs</a>
                            </li>
                        </ul>
                        
                        
                        
                        welcom <?php echo $_SESSION['user_name'];?>
                    </div>
                </div>
            </nav>

        </div>
    </header>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
        integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous">
    </script>


</body>

</html>
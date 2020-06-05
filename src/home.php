<?php require './app/Initialize/Start.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php require './app/Setup/Initial.php'; ?>
    <link href="css/home.css" rel="stylesheet" type="text/css" />
    <script src="js/home.js" type="text/javascript"></script>
    <script src="js/routes.js" type="text/javascript"></script>
</head>

<body>
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="home">Site Name</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="home">Option</a>
                    </li>
                    <li class="dropdown">
                        <a href="home" class="dropdown-toggle" data-toggle="dropdown">Dropdown Menu <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="home">Menu Item</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a id="logout-button" href="#">Log Out</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <div class="content">
        <div id="sidebar">
            <div id="sidebar-content">
                <div class="dropdown">
                    <div class="new-box">New</div>
                    <div class="dropdown-content">
                        <button id="generateEvent" class="btn">Option 1</button>
                        <button id="generateList" class="btn">Option 2</button>
                    </div>
                </div>
                <hr>
                <div data-content-trigger="first" class="content-selector">First</div>
                <div data-content-trigger="second" class="content-selector">Second</div>
                <div data-content-trigger="third" class="content-selector">Third</div>


                <div style="position: relative; height: inherit;">
                    <div style="width: 100%; position: absolute; bottom: 210px;">
                        <span><i class="fas fa-cog">&nbsp;</i>Settings</span>
                    </div>
                </div>


            </div>
        </div>
        <div class="main-content">
            <div class="content-box first-content">
                <button class="btn">Default</button>
                <button class="btn green">Success</button>
                <div>Sample Grid Layout</div>
                <div>Resize the browser!</div>
                <input class="timepicker" type="text">
            </div>
            <div class="content-box second-content">Second Content</div>
            <div class="content-box third-content">Third Content</div>
        </div>
    </div>
</body>

</html>
<?php require './app/Initialize/End.php'; ?>
<?php 
   require_once('path-constants.php');
?>
<head> 
   <script src="js/jquery.js" ?>"></script>
   <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen"> 
   <script src="bootstrap/js/bootstrap.min.js" ?>"></script>
</head>

<header class="navbar navbar-fixed-top navbar-inverse">
  <div class="navbar-inner">
    <div class="container">
      <nav>
        <ul class="nav pull-right">
            <li> <a href="add-users.php"> Upload new users </a> </li>

            <li id="fat-menu" class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                Admin <b class="caret"></b>
              </a>
              <ul class="dropdown-menu">
                 <li> <a href="ldif-file-list.php">Download LDIF files</a> </li>
              </ul>
            </li>

        </ul>
      </nav>
    </div>
  </div>
</header> <br /> <br /> <br /> <br />

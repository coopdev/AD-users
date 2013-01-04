<?php 
   require_once('path-constants.php');
?>
<head> 
   <script src="js/jquery.js" ?>"></script>
   <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen"> 
   <link href="bootstrap/css/bootstrap-responsive.css" rel="stylesheet">
   <script src="bootstrap/js/bootstrap.min.js" ?>"></script>

   <!-- This style is used to fix the problem where the page content is going into the header -->
   <style type="text/css">
      body {
         padding-top: 60px;
         padding-bottom: 40px;
      }

   </style>

   <!-- IE 8 and lower do not support HTML5, so below IF
        statement is necessary. -->

   <!--[if lt IE 9]>
       <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
   <![endif]-->
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
</header> 

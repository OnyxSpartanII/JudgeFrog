 <?php
/**
 *
 *
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Pages
 * @since         CakePHP(tm) v 0.10.0.1076
 */

if (!Configure::read('debug')):
  throw new NotFoundException();
endif;

App::uses('Debugger', 'Utility');
?>
<?php $this->layout = 'admin_panel_layout';?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title>Login | Admin Control Panel - HTD</title>
  <link rel="stylesheet" type="text/css" href="css/admin_panel_style.css" media="screen" />
  <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed' rel='stylesheet' type='text/css'/>

  <style type="text/css">
    * { 
  box-sizing: border-box; 
  padding:0 auto; 
  margin: 0 auto;
}

body {
  font-family: "HelveticaNeue-Light","Helvetica Neue Light","Helvetica Neue","Lucida Grande",sans-serif;
  color:white;
  font-size:14px;
  background:#333 ;
  text-align: center;
}

form {
  background:#444; 
  width:300px;
  margin-top: 300px;
  margin-bottom: 300px;
  border:1px solid #444;
  overflow:hidden;
  position:relative;
  box-shadow: 1px 5px 10px 2px rgba(0,0,0,0.5);
}

form:before {
  content:"";
  display:block;
  position:absolute;
  width:8px;
  height:5px;
  border-radius:50%;
  left:34%;
  top:-7px;
  box-shadow: 30px 4px 6px 4px #fff;
}

.inset {
  padding:20px; 
  border-top:1px solid #fff;
}

form h1 {
  font-size:23px;
  text-shadow:0 1px 0 black;
  text-align:center;
  padding:15px 0;
  border-bottom:1px solid rgba(0,0,0,1);
  position:relative;
  letter-spacing: 1px;
}

label {
  font-size:15px;
  color:#EEE;
  display:block;
  padding-bottom:9px;
}

input[type=text],
input[type=password] {
  width:100%;
  padding:8px 5px;
  background:#fff;
  border:1px solid #222;
  box-shadow: 0px 1px 0px rgba(255,255,255,0.1);
  margin-bottom:20px;
}

.p-container {
  padding:0 20px 20px 20px; 
}

input[type=submit] {
  padding:10px 22px;
  border:none;
  text-shadow:0 -1px 0 rgba(0,0,0,0.4);
  box-shadow:
  inset 0 1px 0 rgba(255,255,255,0.3),
  inset 0 10px 10px rgba(255,255,255,0.1);
  background:#fff;
  color: #222;
  float:none;
  font-weight:bold;
  cursor:pointer;
  font-size:18px;
}

input[type=submit]:hover {
  box-shadow:
  inset 0 1px 0 rgba(255,255,255,0.3),
  inset 0 -10px 10px rgba(255,255,255,0.1);
  color:#fff;
  background:#db1a03;
  -webkit-transition: all 0.2s ease-in;
  -moz-transition: all 0.2s ease-in;
  -o-transition: all 0.2s ease-in;
}

input[type=text]:hover,
input[type=password]:hover,
label:hover ~ input[type=text],
label:hover ~ input[type=password] {
  background:#999;
}

input[type=text],
input[type=password]{
color:#222;
font-size:15px;
font-weight:bold;
letter-spacing: 2px;
}

  </style>

</head>


<body>
<div id="wrap">
  <div id="header">
    <h1><a href="index.html">Admin Control Panel | HTD</a></h1>
  </div>


  <div id="content">


    <form name="form1" method="post" action="index.html">
      <h1>Administrator Login</h1>

      <div class="inset">
      <p>
        <label for="username">Username</label>
        <input type="text" name="myusername" id="myusername">
      </p>
      <p>
        <label for="pass">Password</label>
        <input type="password" name="mypassword" id="mypassword">
      </p>
      </div>

      <p class="p-container"> <br/>
        <input type="submit" name="Submit" id="submit" value="Log in">
      </p>

    </form>

  </div>

  <div id="footer">
    <p>Admin Control Panel HTD V 0.1 | <a target="_blank" href="http://humantraffickingdata.org" title="Human Trafficking Data Website">Human Trafficking Data</a>
    </p>
  </div>

</div>


</body>
</html>

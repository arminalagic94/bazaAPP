<?php
    include 'db_konekcija.php';
    $host  = $_SERVER['HTTP_HOST'];
    $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    $extra = 'pocetna.php';
    session_start();
    if(isset($_SESSION['id']))
    {
        header("Location: http://$host$uri/$extra");
    }

    $username=$_POST['username'];
    $password=$_POST['password'];
    $login=$_POST['Login'];
    if($login)
    {
        if( $username != "" && $password != "")
        {
            $sql="select * from korisnik where username like'$username'";
            $query=mysql_query($sql);
            $numrows=mysql_num_rows($query);
            $korisnik_id=array();
            if($numrows!=0)
            {
                while($row=mysql_fetch_assoc($query))
                {
                    $dbidkorisnik=$row['korisnik_id'];
                    $dbusername=$row['username'];
                    $dbpass=$row['password'];
                    $_SESSION['admin']=$row['admin'];
                }
                if($username==$dbusername&&$password==$dbpass)
                {
                    $_SESSION['id']=$dbidkorisnik;
                    $_SESSION['korisnik']=$dbusername;
                    header("Location: http://$host$uri/$extra");  
                }
                else
                    $statusPoruka = '<div class="alert alert-danger"><strong>Greška:</strong> Neispravna lozinka!</div>'; 
            }
            else
                $statusPoruka = '<div class="alert alert-danger"><strong>Greška:</strong> Korisnik ne postoji!</div>';
        }
        else
            $statusPoruka = '<div class="alert alert-danger"><strong>Greška:</strong> Niste unijeli podatke!</div>';
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,800italic,400,700,800">
    <link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Oswald:400,700,300">
    <link type="text/css" rel="stylesheet" href="styles/font-awesome.min.css">
    <link type="text/css" rel="stylesheet" href="styles/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="styles/animate.css">
    <link type="text/css" rel="stylesheet" href="styles/all.css">
    <link type="text/css" rel="stylesheet" href="styles/main.css">
    <link type="text/css" rel="stylesheet" href="styles/style-responsive.css">
</head>
<body style="background: url('images/bg/bg.jpg') center center fixed;">
    <div class="page-form">
        <?php echo $statusPoruka; ?>
        <div class="panel panel-red">
            <div class="panel-heading">Login</div>
            <div class="panel-body pan">
                <form method="POST" class="form-horizontal">
                <div class="form-body pal">
                    <div class="form-group">
                        <div class="col-md-3">
                            <img src="images/avatar/profile-pic.png" class="img-responsive" style="margin-top: -35px;" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputName" class="col-md-3 control-label">
                            Korisničko ime:</label>
                        <div class="col-md-9">
                            <div class="input-icon right">
                                <i class="fa fa-user"></i>
                                <input id="inputName" name="username" type="text" placeholder="********" class="form-control" /></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword" class="col-md-3 control-label">
                            Lozinka:</label>
                        <div class="col-md-9">
                            <div class="input-icon right">
                                <i class="fa fa-lock"></i>
                                <input id="inputPassword" name="password" type="password" placeholder="********" class="form-control" /></div>
                        </div>
                    </div>
                    <div class="form-group mbn">
                        <div class="col-lg-12" align="right">
                            <div class="form-group mbn">
                                <div class="col-lg-3">
                                    &nbsp;
                                </div>
                                <div class="col-lg-9">
                                    <a href="registracija.php" class="btn">Registracija</a>&nbsp;&nbsp;
                                    <input type="submit" class="btn btn-primary" name="Login" value="Prijava" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

<?php
    include 'db_konekcija.php';
    $username = $_POST['username'];
    $password = $_POST['password'];
    $repass = $_POST['repass'];
    $ime=$_POST['ime'];
    $prezime=$_POST['prezime'];
    $mail=$_POST['mail'];
    $token = $_POST['token'];
    $validacija = 'Admin';
    if($_POST['reg'])
    {
        $sqlpr = "SELECT * FROM korisnik WHERE username LIKE '$username'";
        $query2 = mysql_query($sqlpr);
        $izlaz = mysql_num_rows($query2);
        if( (!isset($username) || $username == false) || (!isset($password) || $password == false) )
            $poruka = '<div class="alert alert-danger"><strong>Greška: </strong>Niste unijeli podatke!</div>'; 
        else if($password != $repass)
            $poruka = '<div class="alert alert-danger"><strong>Greška: </strong>Lozinke se ne poklapaju!</div>'; 
        else
        {
            if($izlaz != 0)
                $poruka = '<div class="alert alert-danger"><strong>Greška: </strong>Korisnik već postoji!</div>'; 
            else
            {
                if($token == $validacija)
                {
                    $sql = "INSERT INTO korisnik VALUES (0, '$username', '$password', '$ime', '$prezime', '$mail', 1)";
                    $poruka = '<div class="alert alert-success">Dodali ste novog admina!</div>'; 
                }
                else
                {
                    $sql = "INSERT INTO korisnik VALUES (0, '$username', '$password', '$ime', '$prezime', '$mail', 0)";
                    $poruka = '<div class="alert alert-success">Uspješna registracija!</div>'; 
                }
                $query = mysql_query($sql);
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Registracija</title>
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
<body>
    <div id="reg" class="page-form">
        <?php echo $poruka; ?>
        <div class="panel panel-orange">
            <div class="panel-heading">Registracija</div>
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
                                    <input id="inputName" name="username" type="text" placeholder="Username" class="form-control" /></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword" class="col-md-3 control-label">
                                Lozinka:</label>
                            <div class="col-md-9">
                                <div class="input-icon right">
                                    <i class="fa fa-lock"></i>
                                    <input id="inputPassword" name="password" type="password" placeholder="Password" class="form-control" /></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword" class="col-md-3 control-label">
                                Ponovite lozinku:</label>
                            <div class="col-md-9">
                                <div class="input-icon right">
                                    <i class="fa fa-lock"></i>
                                    <input id="inputPassword" name="repass" type="password" placeholder="Password" class="form-control" /></div>
                            </div>
                        </div>
			
			<div class="form-group">
                            <label for="inputName" class="col-md-3 control-label">
                                Ime:</label>
                            <div class="col-md-9">
                                <div class="input-icon right">
                                    <i class="fa fa-user"></i>
                                    <input id="inputName" name="ime" type="text" placeholder="Ime" class="form-control" /></div>
                            </div>
                        </div>	

			<div class="form-group">
                            <label for="inputName" class="col-md-3 control-label">
                                Prezime:</label>
                            <div class="col-md-9">
                                <div class="input-icon right">
                                    <i class="fa fa-user"></i>
                                    <input id="inputName" name="prezime" type="text" placeholder="Prezime" class="form-control" /></div>
                            </div>
                        </div>
		
			<div class="form-group">
                            <label for="inputName" class="col-md-3 control-label">
                                Mail:</label>
                            <div class="col-md-9">
                                <div class="input-icon right">
                                    <i class="fa fa-user"></i>
                                    <input id="inputName" name="mail" type="text" placeholder="E - mail" class="form-control" /></div>
                            </div>
                        </div>	

                        <div class="form-group">
                            <label for="inputPassword" class="col-md-3 control-label">
                                Token za admina:</label>
                            <div class="col-md-9">
                                <div class="input-icon right">
                                    <i class="fa fa-lock"></i>
                                    <input id="inputPassword" name="token" type="password" placeholder="**********" class="form-control" /></div>
                            </div>
                        </div>
                        <div class="form-group mbn">
                            <div class="col-lg-12" align="right">
                                <div class="form-group mbn">
                                    <div class="col-lg-3">
                                        &nbsp;
                                    </div>
                                    <div class="col-lg-9">
                                        <a href="index.php" class="btn">Prijava</a>&nbsp;&nbsp;
                                        <input type="submit" class="btn btn-primary" name="reg" value="Registracija" />
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
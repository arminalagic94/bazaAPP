<?php
	include "db_konekcija.php";
	include "header.php";

	if(isset($_POST["btn"]))
	{
		$naziv=$_POST["naziv"];
		$proizvodjac=$_POST["proizvodjac"];
		$cijena=$_POST["cijena"];
		$sql2="insert into instrumenti(inst_id, naziv, proizvodjac,cijena) values (0,'$naziv','$proizvodjac','$cijena')";
		$query2=mysql_query($sql2);
		if($query2)
			$statusPoruka = '<div class="alert alert-success"><strong>Poruka:</strong> Uspješan unos!</div>';
		else
			$statusPoruka = '<div class="alert alert-danger"><strong>Greška:</strong> Neuspješan unos!</div>';
	}
?>

        <!--BEGIN TITLE & BREADCRUMB PAGE-->
                <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
                    <div class="page-header pull-left">
                        <div class="page-title">
                            Dodajte instrument</div>
                    </div>
                    <ol class="breadcrumb page-breadcrumb pull-right">
                        <li><i class="fa fa-home"></i>&nbsp;<a href="pocetna.php">Početna</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                        <li class="active">Dodaj instrument</li>
                    </ol>
                    <div class="clearfix">
                    </div>
                </div>
                <!--END TITLE & BREADCRUMB PAGE-->
                <!--BEGIN CONTENT-->
                <div class="page-content">
                    <div id="tab-general">
                        <div class="row">
                          <div class="col-md-12">
                          	<?php echo $statusPoruka; ?>
                            <div class="panel panel-red">
								<div class="panel-heading">Unesite podatke za instrument:</div>
                              	<div class="panel-body pan">

		<form method="POST">
			<div class="form-body pal">
				<div class="form-group"><input class="form-control" type="text" name="naziv" placeholder="Unesite naziv instrumenta"/></div>
				<div class="form-group">
					<select class="form-control" name="proizvodjac" ></li>
						<?php
						
							$sql2="select * from proizvodjaci";
							$query2=mysql_query($sql2);
							while($row=mysql_fetch_array($query2)){
						
						?>
									<option value="<?php echo $row["naziv"]?>"><?php echo $row["naziv"]?></option>						<?php
							}
						?>
					</select>
				</div>

				<div class="form-group"><input class="form-control" type="text" name="cijena" placeholder="Unesite cijenu instrumenta (EUR)"/></div>
			</div>
			<div class="form-actions pal">
				<input class="btn btn-primary" type="submit" name="btn" value="Spremi"/>
			</div>
		</form>
                                </div>
                            </div>
                          </div>
                        </div>
                    </div>

                    
                </div>
                <!--END CONTENT-->

<?php
	include "footer.php";
?>
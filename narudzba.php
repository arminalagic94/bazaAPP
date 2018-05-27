<?php
	include "db_konekcija.php";
	include "header.php";

	if(isset($_POST["btn"]))
	{
		$artikal=$_POST["artikal"];
		$br_komada=$_POST["br_komada"];
		$adresa=$_POST["adresa"];

		$sql2 = "insert into narudzba(narudzba_id,artikal,br_komada,adresa) values(0,'$artikal','$br_komada','$adresa')";
		$query2=mysql_query($sql2);
		if($query2)
			$statusPoruka = '<div class="alert alert-success"><strong>Poruka:</strong> Uspješna narudžba!</div>';
		else
			$statusPoruka = '<div class="alert alert-danger"><strong>Greška:</strong> Greška!</div>';
	}
?>

        <!--BEGIN TITLE & BREADCRUMB PAGE-->
                <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
                    <div class="page-header pull-left">
                        <div class="page-title">
                            Narudžba</div>
                    </div>
                    <ol class="breadcrumb page-breadcrumb pull-right">
                        <li><i class="fa fa-home"></i>&nbsp;<a href="pocetna.php">Početna</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                        <li class="active">Narudžba</li>
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
								<div class="panel-heading">Unesite podatke za artikal koji želite naručiti:</div>
                              	<div class="panel-body pan">

<table class="table">
    <thead>
       <tr>
            <th>ID</th>
            <th>Naziv</th>
            <th>Proizvođač</th>
	    <th>Cijena (EUR)</th>
       </tr>
    </thead>
    <?php 
        $sql1="select * from instrumenti";
        $query1=mysql_query($sql1);
        
        if(mysql_num_rows($query1) > 0){
        while($row = mysql_fetch_array($query1)): 
    ?>
        <tr>
            <td><?php echo $row['inst_id'] ?></td>
            <td><?php echo $row['naziv'] ?></td>
            <td><?php echo $row['proizvodjac'] ?></td>
	    <td><?php echo $row['cijena'] ?></td>
        </tr>
        
            
                
    <?php 
            endwhile;
        }                 
    ?>
    <tbody>

    </tbody>
</table> 


		<form method="POST">
			<div class="form-body pal">
	
				<div class="form-group"><select class="form-control" name="artikal" ></li>
						<?php
						
							$sql2="select * from instrumenti";
							$query2=mysql_query($sql2);
							while($row=mysql_fetch_array($query2)){
						
						?>
									<option value="<?php echo $row["inst_id"]?>"><?php echo $row["inst_id"]?></option>
						<?php
							}
						?>
					</select></div>

				<div class="form-group"><input class="form-control" type="text" name="br_komada" placeholder="Unesite broj komada"/></div>
				<div class="form-group"><input class="form-control" type="text" name="adresa" placeholder="Unesite adresu"/></div>

			</div>

			<div class="form-actions pal">
				<input class="btn btn-primary" type="submit" name="btn" value="Naruči"/>
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
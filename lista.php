<?php
include "db_konekcija.php";
include "header.php";
?>
        <!--BEGIN TITLE & BREADCRUMB PAGE-->
                <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
                    <div class="page-header pull-left">
                        <div class="page-title">
                            Artikli</div>
                    </div>
                    <ol class="breadcrumb page-breadcrumb pull-right">
                        <li><i class="fa fa-home"></i>&nbsp;<a href="pocetna.php">Početna</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                        <li class="active">Ispis</li>
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
                            <div class="panel panel-green">
                              <div class="panel-body">

<h2>Lista artikala :</h2>
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

                                </div>
                            </div>
                          </div>
                        </div>
                    </div>
                </div>
                <!--END CONTENT-->
<?php
mysql_free_result($result);
include "footer.php";
?>

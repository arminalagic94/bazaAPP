<?php
	include "db_konekcija.php";  // ako je niste ukljucili u header.php
	include "header.php";
?>
				<!--BEGIN TITLE & BREADCRUMB PAGE-->
                <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
                    <div class="page-header pull-left">
                        <div class="page-title">
                            Početna</div>
                    </div>
                    <ol class="breadcrumb page-breadcrumb pull-right">
                        <li><i class="fa fa-home"></i>&nbsp;<a href="pocetna.php">Početna</a></li>
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
                        		<div class="panel">
                        			<div class="panel-body">
                           				<p class="text-center">Dobrodošli, <b><?php echo ucfirst($_SESSION['korisnik']); ?></b>!</p>
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
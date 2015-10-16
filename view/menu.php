<nav class="buttonTopMenu row">        
    
        <ul>
            <!-- <li><a href="index.php">ADD</a></li> -->
			<p>
				<label class="glyphicon glyphicon-backward"></label>
			    <button class="btn btn-primary" onclick="openPopUp();"><span class="glyphicon glyphicon-tree-conifer"></span>  Données de fond</button>
			    <button class="btn btn-primary" onclick="window.open('../view/index.php?modeRead=main','_self');"><span class="glyphicon glyphicon-user"></span>  Données sur les personnes</button>
			    <button class="btn btn-primary" onclick="window.open('../view/index.php?relationView=1&modeRead=main','_self');"><span class="glyphicon glyphicon-sort"></span>  Données sur les relations</button>
				<label class="glyphicon glyphicon-forward"></label>
				<button class=<?php echo '"'.'btn  btn-success '; if(isset($_COOKIE['hideModeWrite']) AND $_COOKIE['hideModeWrite']==1) echo 'hideMode'; echo '"';?> style="right:7% ; position:absolute" id="hideAndSeek" onclick="hideAndShowReadPan();">
					<span class="glyphicon glyphicon-transfer"></span> Ajouter</button>
            	<?php //echo $_COOKIE['hideModeWrite']; ?>
			</p>
            <!-- <li><a href="target_read.php">READ</a></li> -->
        </ul>
     
</nav>
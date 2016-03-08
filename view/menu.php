<nav class="buttonTopMenu row">        
    
        <ul>
            <!-- <li><a href="index.php">ADD</a></li> -->
			<p>
				<label></label>
			    <button class="btn btn-primary" onclick="openPopUp();"><span class="glyphicon glyphicon-tree-conifer"></span>  Données de fond</button>
			    <button class="btn btn-primary" onclick="document.cookie = 'mainMenu=0;'; window.open('../view/index.php?modeRead=main','_self');"><span class="glyphicon glyphicon-user"></span>  Données sur les personnes</button>
			    <button class="btn btn-primary" onclick="window.open('../view/index.php?relationView=1&modeRead=main&modeWrite=main','_self');"><span class="glyphicon glyphicon-sort"></span>  Données sur les relations</button>
			    <button class="btn btn-primary" onclick="window.open('../view/index.php?geoView=1&modeRead=main&modeWrite=main','_self');"><span class="glyphicon glyphicon-globe"></span>  Données sur les voyages</button>
				 <button class="btn btn-primary" onclick="window.open('../export/index.php','_self');"><span class="glyphicon glyphicon-floppy-open"></span>  Exportation des données  </button>
				<label></label>
				<button class=<?php echo '"'.'btn  btn-success '; if(isset($_COOKIE['hideModeWrite']) AND $_COOKIE['hideModeWrite']==1) echo 'hideMode'; echo '"';?> style="right:7% ; position:absolute" id="hideAndSeek" onclick="hideAndShowReadPan();">
					<span class="glyphicon glyphicon-transfer"></span> Panneau Outil</button>
            	<?php //if(isset($_COOKIE['mainMenu']))echo $_COOKIE['mainMenu']; ?>
			</p>
            <!-- <li><a href="target_read.php">READ</a></li> -->
        </ul>
     
</nav>
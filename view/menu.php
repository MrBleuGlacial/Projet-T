<nav class="buttonTopMenu row">        
    
        <ul>
            <!-- <li><a href="index.php">ADD</a></li> -->
			<p>
				<label class="glyphicon glyphicon-backward"></label>
			    <button class="btn btn-primary" onclick="openPopUp();"><span class="glyphicon glyphicon-tree-conifer"></span>  Données de fond</button>
			    <button class="btn btn-primary" onclick="alert('Not initialized yet');"><span class="glyphicon glyphicon-user"></span>  Données sur les personnes</button>
			    <button class="btn btn-primary" onclick="alert('Not initialized yet');"><span class="glyphicon glyphicon-sort"></span>  Données sur les relations</button>
				<label class="glyphicon glyphicon-forward"></label>
				<button class=<?php echo '"'.'btn  btn-success '; if(isset($_COOKIE['hideModeWrite']) AND $_COOKIE['hideModeWrite']==1) echo 'hideMode'; echo '"';?> style="right:7% ; position:absolute" id="hideAndSeek" onclick="hideAndShowReadPan();">Ajouter une personne</button>
            	<?php //echo $_COOKIE['hideModeWrite']; ?>
			</p>
            <!-- <li><a href="target_read.php">READ</a></li> -->
        </ul>
     
</nav>
<nav class="buttonTopMenu row">        
    
        <ul>
            <!-- <li><a href="index.php">ADD</a></li> -->
			<p>
				<label></label>
			    <button class="btn btn-primary" onclick="openPopUp();"><span class="glyphicon glyphicon-tree-conifer"></span>  Données de fond</button>
			    
			    <button class=<?php  
			    	if(isset($_COOKIE['mainMenu'])){
			    		if($_COOKIE['mainMenu']==0)
			    			echo '"btn btn-info"';
			    		else
							echo '"btn btn-primary"';			    			
			    	}
			    	else
			    		echo '"btn btn-primary"';
			    ?> 
			    onclick="setCookie('mainMenu',0,7); window.open('../view/index.php?modeRead=main','_self');"><span class="glyphicon glyphicon-user"></span>  Données sur les personnes</button>
			    
			    <button class=<?php  
			    	if(isset($_COOKIE['mainMenu'])){
			    		if($_COOKIE['mainMenu']==1)
			    			echo '"btn btn-info"';
			    		else
							echo '"btn btn-primary"';			    			
			    	}
			    	else
			    		echo '"btn btn-primary"';
			    ?> 
			    onclick="setCookie('mainMenu',1,7); window.open('../view/index.php?relationView=1&modeRead=main&modeWrite=main','_self');"><span class="glyphicon glyphicon-sort"></span>  Données sur les relations</button>
			    
			    <button class=<?php  
			    	if(isset($_COOKIE['mainMenu'])){
			    		if($_COOKIE['mainMenu']==2)
			    			echo '"btn btn-info"';
			    		else
							echo '"btn btn-primary"';			    			
			    	}
			    	else
			    		echo '"btn btn-primary"';
			    ?>  
			    onclick="setCookie('mainMenu',2,7); window.open('../view/index.php?geoView=1&modeRead=main&modeWrite=main','_self');"><span class="glyphicon glyphicon-globe"></span>  Données sur les voyages</button>
				
				<button class=<?php  
			    	if(isset($_COOKIE['mainMenu'])){
			    		if($_COOKIE['mainMenu']==3)
			    			echo '"btn btn-info"';
			    		else
							echo '"btn btn-primary"';			    			
			    	}
			    	else
			    		echo '"btn btn-primary"';
			    ?>  
				onclick="setCookie('mainMenu',3,7); window.open('../export/index.php','_self');"><span class="glyphicon glyphicon-floppy-open"></span>  Exportation des données  </button>
				
				<label></label>
				<button class=<?php echo '"'.'btn  btn-success '; if(isset($_COOKIE['hideModeWrite']) AND $_COOKIE['hideModeWrite']==1) echo 'hideMode'; echo '"';?> style="right:7% ; position:absolute" id="hideAndSeek" onclick="hideAndShowReadPan();">
					<span class="glyphicon glyphicon-transfer"></span> Panneau Outil</button>
			</p>
            <!-- <li><a href="target_read.php">READ</a></li> -->
        </ul>
     
</nav>
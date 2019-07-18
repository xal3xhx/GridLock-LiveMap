<div class="container">
	<ul class="nav nav-pills">
	<li class="nav-item">
		<a class="nav-link <?php if ($CURRENT_PAGE == "Index") {?>active<?php }?>" href="index.php">Message</a>
	  </li>
	<li class="nav-item">
		<a class="nav-link <?php if ($CURRENT_PAGE == "command") {?>active<?php }?>" href="command.php">Command</a>
	  </li>
	<li class="nav-item">
		<a class="nav-link <?php if ($CURRENT_PAGE == "Utilities") {?>active<?php }?>" href="Utilities.php">Utilities</a>
	  </li>
	<li class="nav-item">
		<a class="nav-link <?php if ($CURRENT_PAGE == "StartServer") {?>active<?php }?>" href="StartServer.php">Start Server(s)</a>
	  </li>
	<li class="nav-item">
	    <a class="nav-link <?php if ($CURRENT_PAGE == "rcon test") {?>active<?php }?>" href="rcon test.php">rcon test</a>
	  </li>
	</ul>
</div>
<!DOCTYPE html>
<html lang="en">

<?php
include "header.php";
include "navbar.php";
?>
<body class="wrapper">
<?php	
	$countpage = 0;
if (file_exists(stream_resolve_include_path($alias . ".php"))) {$countpage .= +1;include $alias . ".php";
    
}

if ($countpage == 0 or empty($countpage) ) {
	include "error.php";
		
	// <!--  <script>window.location.href = "https://x2group.com/error";</script>
	//  -->
   }
?>
		
			<?php

include "footer.php";
include "mainjava.php";

?>
</body>
</html>
<?php
include('../require.php');
if (isset($_SESSION['email']))
{
	unset($_SESSION['email']);
}
echo "<script type='text/javascript'>location='/index.php'</script>";
?>

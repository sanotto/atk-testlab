<?php

		$setup->installNode("Security.Users");
	$setup->installNode("Security.Groups");
	$setup->installNode("Security.Users_Groups");
	$setup->installNode("Security.AccessRights");

	$setup->setVersion(3);
  include("after_install.inc");
?>

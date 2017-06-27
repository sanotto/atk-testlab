<?php

namespace App\Modules\Security;

class AccessRights extends AccessRights_base
{
	public function __construct($nodeUri, $flags=null)
	{
		parent::__construct($nodeUri, $flags);
	}	
}

?>

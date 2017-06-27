<?php

namespace App\Modules\Security;

use App\Modules\AtkBuilderNode;
use Sintattica\Atk\Core\Node;
use Sintattica\Atk\Attributes\Attribute as A;
use Sintattica\Atk\Attributes\Attribute;


class AccessRights_base extends AtkBuilderNode 
{
	function __construct($nodeUri, $flags=null)
	{
		$this->table_name="security_accessrights";
		parent::__construct($nodeUri, $flags | NF_ADD_LINK);
		
		$this->setTable($this->table_name);
		$this->addFlag(Node::NF_ADD_LINK);
		$this->add(new Attribute('id', A::AF_AUTOKEY));		
		$this->add(new Attribute('node'), NULL, 10);
		$this->add(new Attribute('action'), NULL, 20);
		$this->add(new Attribute('group_id'), NULL, 30);

			
	}
}

?>

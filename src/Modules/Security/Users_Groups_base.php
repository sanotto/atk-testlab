<?php

namespace App\Modules\Security;

use App\Modules\AtkBuilderNode;
use Sintattica\Atk\Core\Node;
use Sintattica\Atk\Attributes\Attribute as A;
use Sintattica\Atk\Attributes\Attribute;


class Users_Groups_base extends AtkBuilderNode 
{
	function __construct($nodeUri, $flags=null)
	{
		$this->table_name="security_users_groups";
		parent::__construct($nodeUri, $flags | NF_ADD_LINK);
		
		$this->setTable($this->table_name);
		$this->addFlag(Node::NF_ADD_LINK);
		$this->add(new Attribute('id', A::AF_AUTOKEY));		
		$this->add(new Attribute('user_id'), NULL, 10);
		$this->add(new Attribute('group_id'), NULL, 20);

			
	}
}

?>

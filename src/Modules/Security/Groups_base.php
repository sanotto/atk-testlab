<?php

namespace App\Modules\Security;

use App\Modules\AtkBuilderNode;
use Sintattica\Atk\Core\Node;
use Sintattica\Atk\Attributes\Attribute as A;
use Sintattica\Atk\Attributes\Attribute;
use Sintattica\Atk\Attributes\ProfileAttribute;
use Sintattica\Atk\Relations\ShuttleRelation;


class Groups_base extends AtkBuilderNode 
{
	function __construct($nodeUri, $flags=null)
	{
		$this->table_name="security_groups";
		parent::__construct($nodeUri, $flags | NF_ADD_LINK);
		
		$this->setTable($this->table_name);
		$this->addFlag(Node::NF_ADD_LINK);
		$this->add(new Attribute('id', A::AF_AUTOKEY));		
		$this->add(new Attribute('name', A::AF_OBLIGATORY|A::AF_SEARCHABLE, 50), NULL, 10);
		$this->add(new Attribute('description', A::AF_OBLIGATORY|A::AF_SEARCHABLE, 50), NULL, 20);
		$this->add(new ShuttleRelation('users', A::AF_HIDE_LIST|A::AF_HIDE_ADD,'Security.Users_Groups', 'Security.Users', 'group_id', 'user_id'), NULL, 30);
		$this->add(new ProfileAttribute('accessrights', A::AF_BLANKLABEL|A::AF_HIDE_ADD), NULL, 40);

			
	}
}

?>

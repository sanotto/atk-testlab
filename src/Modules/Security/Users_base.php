<?php

namespace App\Modules\Security;

use App\Modules\AtkBuilderNode;
use Sintattica\Atk\Core\Node;
use Sintattica\Atk\Attributes\Attribute as A;
use Sintattica\Atk\Attributes\Attribute;
use Sintattica\Atk\Attributes\BoolAttribute;
use Sintattica\Atk\Attributes\PasswordAttribute;
use Sintattica\Atk\Attributes\YearMonthAttribute;


class Users_base extends AtkBuilderNode 
{
	function __construct($nodeUri, $flags=null)
	{
		$this->table_name="security_users";
		parent::__construct($nodeUri, $flags | null|Node::NF_ADD_LINK);
		
		$this->setTable($this->table_name);
		$this->addFlag(Node::NF_ADD_LINK);
		$this->add(new Attribute('id', A::AF_AUTOKEY));		
		$this->add(new Attribute('username', A::AF_OBLIGATORY|A::AF_SEARCHABLE, 50), NULL, 10);
		$this->add(new PasswordAttribute('passwd', A::AF_HIDE_LIST), NULL, 20);
		$this->add(new Attribute('firstname', A::AF_OBLIGATORY|A::AF_SEARCHABLE, 50), NULL, 30);
		$this->add(new Attribute('lastname', A::AF_OBLIGATORY|A::AF_SEARCHABLE, 50), NULL, 40);
		$this->add(new Attribute('email', A::AF_HIDE_LIST), NULL, 50);
		$this->add(new BoolAttribute('is_admin'), NULL, 60);
		$this->add(new BoolAttribute('disabled'), NULL, 70);
		$this->add(new YearMonthAttribute('periodo'), NULL, 80);

			
	}
}

?>

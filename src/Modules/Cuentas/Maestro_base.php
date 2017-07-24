<?php

namespace App\Modules\Cuentas;

use App\Modules\AtkBuilderNode;
use Sintattica\Atk\Core\Node;
use Sintattica\Atk\Attributes\Attribute as A;
use Sintattica\Atk\Attributes\Attribute;


class Maestro_base extends AtkBuilderNode 
{
	function __construct($nodeUri, $flags=null)
	{
		$this->table_name="cuentas_maestro";
		parent::__construct($nodeUri, $flags | NF_ADD_LINK);
		
		$this->setTable($this->table_name);
		$this->addFlag(Node::NF_ADD_LINK);
		$this->add(new Attribute('id', A::AF_AUTOKEY));		
		$this->add(new Attribute('descripcion', A::AF_OBLIGATORY|A::AF_SEARCHABLE, 50), NULL, 10);

			
	}
}

?>

<?php
 
namespace App\Modules\Setup;

use Sintattica\Atk\Attributes\Attribute;
use Sintattica\Atk\Attributes\NumberAttribute;
use Sintattica\Atk\Attributes\Attribute as A;
use Sintattica\Atk\Core\Node;
	

class Dbsequence extends Node
{
    function __construct($nodeUri, $flags=null)
    {
     	parent::__construct($nodeUri, $flags |  NF_READONLY);
      
      $this->add(new Attribute("seq_name", AF_PRIMARY, 50));
      $this->add(new NumberAttribute("nextid", AF_OBLIGATORY));
     
      $this->setTable("db_sequence");
    }
  }
 
?>

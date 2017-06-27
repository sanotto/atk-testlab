<?php

namespace App\Modules\Setup;

use Sintattica\Atk\Attributes\Attribute;
use Sintattica\Atk\Attributes\Attribute as A;
use Sintattica\Atk\Core\Node;
	
  /**
   * Node for keeping track of moduleversions.
   *
   * @author Ivo Jansch <ivo@achievo.org>
   *
   * @version $Revision: 1.1 $
   *
   * $Id: class.versioninfo.inc,v 1.1 2003/01/30 22:49:27 ivo Exp $
   */
class Versioninfo extends Node
  {
    function __construct($nodeUri, $flags=null)
    {
     	parent::__construct($nodeUri, $flags |  NF_READONLY);
      
      $this->add(new Attribute("module" , A::AF_PRIMARY, 50));
      $this->add(new Attribute("version", 0, 15));
      
      $this->setTable("versioninfo");
    }
  }

?>

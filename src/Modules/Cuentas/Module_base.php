<?php
namespace App\Modules\Cuentas;

use Sintattica\Atk\Core\Atk;
use Sintattica\Atk\Core\Tools;
use Sintattica\Atk\Core\Menu;

class Module_base extends \Sintattica\Atk\Core\Module
{
    static $module = 'Cuentas';

    public function boot()
    {
    			$this->registerNode('Maestro',Maestro::class,['admin', 'add', 'edit', 'delete', 'view']);

    	
    			$this->addMenuItem('cuentas');		$this->addNodeToMenu("maestro",'Maestro', 'admin', 'cuentas');

    }
    
		public function register()
		{
		}

    public function search($expression)
    {
    	$results = array();
    	
    		
    	
    	return $results;
    }
}
?>

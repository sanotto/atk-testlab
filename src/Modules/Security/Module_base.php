<?php
namespace App\Modules\Security;

use Sintattica\Atk\Core\Atk;
use Sintattica\Atk\Core\Tools;
use Sintattica\Atk\Core\Menu;

class Module_base extends \Sintattica\Atk\Core\Module
{
    static $module = 'Security';

    public function boot()
    {
    			$this->registerNode('Users',Users::class,['admin', 'add', 'edit', 'delete', 'view']);
		$this->registerNode('Groups',Groups::class,['admin', 'add', 'edit', 'delete', 'view']);
		$this->registerNode('Users_Groups',Users_Groups::class,['admin', 'add', 'edit', 'delete', 'view']);
		$this->registerNode('AccessRights',AccessRights::class,['admin', 'add', 'edit', 'delete', 'view']);

    	
    			$this->addMenuItem('Security');		$this->addNodeToMenu("Users",'Users', 'admin', 'Security');
		$this->addNodeToMenu("Groups",'Groups', 'admin', 'Security');

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

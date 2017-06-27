<?php
namespace App\Modules\Setup;

use Sintattica\Atk\Core\Atk;
use Sintattica\Atk\Core\Tools;
use Sintattica\Atk\Core\Menu;

class Module extends \Sintattica\Atk\Core\Module
{
	static $module = 'Setup';

	public function register()
	{
	}

	public function boot()
	{
		$this->registerNode('Setup',Setup::class,['admin', 'add', 'edit', 'delete', 'view']);
		$this->registerNode('Versioninfo',Versioninfo::class,['admin', 'add', 'edit', 'delete', 'view']);
		$this->registerNode('Dbsequence',Dbsequence::class,['admin', 'add', 'edit', 'delete', 'view']);

		$this->addNodeToMenu("Setup",'Setup', 'intro');
	}
}
?>

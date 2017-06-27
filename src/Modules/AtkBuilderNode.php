<?php


namespace App\Modules;

use Sintattica\Atk\Core\Node;
use Sintattica\Atk\Core\Tools;
use Sintattica\Atk\Session\SessionManager;
use Sintattica\Atk\Attributes\Attribute as A;

class AtkBuilderNode extends Node
{
  function adminHeader()
	{
    $script='<script type="text/javascript" src="./atk/javascript/newwindow.js"></script> ';
		$filter_bar=$this->getAdminFilterBar();
		$view_bar=$this->getAdminViewBar();
		$script.="<br><table width=100%><tr><td width=50%>$filter_bar</td><td align=right>$view_bar</td></tr></table><br>";
		return $script; 
	}

  function adminFooter()
  {
    return '';
	}

	function getAdminFilterBar()
	{
		if ( (!isset($this->admin_filters)) || (!is_array($this->admin_filters)))
		return "";
		$max_filters = count($this->admin_filters) -1;
		$a = $this->getAdminFilter();
		@$cur_filter = $a['cur_filter'];
		$prev_filter = ($cur_view - 1 ) < 0 ? $max_filters : $cur_filter - 1;
		$next_filter = ($cur_view + 1 ) > $max_filters ? 0 : $cur_filter + 1;
		$bar=Tools::href(Tools::dispatch_url($this->atkNodeUri(),'admin', array('filter_nbr' => $prev_filter)),"<<",SessionManager::SESSION_DEFAULT,false,"class='btn btn-default'")." ";
		for($i=0;$i <= $max_filters ;$i++)
		{
			$style='btn btn-default';
			if ($i == $cur_filter)
				$style='btn btn-primary';
			$a = Tools::href(Tools::dispatch_url($this->atkNodeUri(),'admin', array('filter_nbr' => $i)),$this->admin_filters[$i][0],SessionManager::SESSION_DEFAULT,false,"class='$style'")." ";
			$bar.=$a;
		}
		$bar  .= Tools::href(Tools::dispatch_url($this->atkNodeUri(),'admin', array('filter_nbr' => $next_filter)),">>",SessionManager::SESSION_DEFAULT,false,"class='btn btn-default'");
		return $bar;
	}
	
	function getAdminViewBar()
	{
		if ( (!isset($this->admin_views)) || (!is_array($this->admin_views)))
			return "";
		$max_views = count($this->admin_views) -1;
		$cur_view = $this->getAdminView();
		$prev_view = ($cur_view - 1 ) < 0 ? $max_views : $cur_view - 1;
		$next_view = ($cur_view + 1 ) > $max_views ? 0 : $cur_view + 1;
		$bar=Tools::href(Tools::dispatch_url($this->atkNodeUri(),'admin', array('view_nbr' => $prev_view)),"<<",SessionManager::SESSION_DEFAULT,false,"class='btn btn-default'")." ";
		for($i=0;$i <= $max_views ;$i++)
		{
			$a = Tools::href(Tools::dispatch_url($this->atkNodeUri(),'admin', array('view_nbr' => $i)),"Vista $i",SessionManager::SESSION_DEFAULT,false,"class='btn btn-default'")." ";
			$style="btn btn-default";
			if ($i == $cur_view)
				$style="btn btn-primary";
			$a = Tools::href(Tools::dispatch_url($this->atkNodeUri(),'admin', array('view_nbr' => $i)),"Vista $i",SessionManager::SESSION_DEFAULT,false,"class='$style'")." ";
			$bar.=$a;
		}
		$bar  .= Tools::href(Tools::dispatch_url($this->atkNodeUri(),'admin', array('view_nbr' => $next_view)),">>", SessionManager::SESSION_DEFAULT,false,"class='btn btn-default'");
		return $bar;
	}
	
	function getAdminView()
	{
		$sessionManager=  SessionManager::getInstance();
		$cur_view = $sessionManager->stackVar('view_nbr');
		if ($cur_view == NULL)
			$cur_view = 0;
		return $cur_view;	
	}
	
	function getAdminFilter()
	{
		$sessionManager = SessionManager::getInstance();
		$cur_filter = $sessionManager->stackVar('filter_nbr');
		if ($cur_filter == NULL)
		$cur_filter = 0;
		return $cur_filter;
	}
	
	function setAdminView()
	{
		if ( (!isset($this->admin_views)) || (!is_array($this->admin_views)))
			return;
		
		$cur_view = $this->getAdminView();
		$attributes = $this->getAttributeNames();
		foreach ($attributes as $name)
			$this->getAttribute($name)->addFlag(A::AF_HIDE_LIST|A::AF_FORCE_LOAD);
		foreach ($this->admin_views[$cur_view] as $name)
			$this->getAttribute($name)->removeFlag(A::AF_HIDE_LIST);
	}
	
	function setAdminFilter()
	{
		if ( (!isset($this->admin_filters)) || (!is_array($this->admin_filters)))
			return;
		$cur_filter = $this->getAdminFilter();
		$this->addFilter($this->admin_filters[$cur_filter][1]);
	}
	
	function action_admin(&$handler, $record=null)
	{
		$this->setAdminView();
		$this->setAdminFilter();
		return $handler->action_admin($record);
	}

}

?>

<?php  
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Elements
{	
	private $_headerMenu = array(
        'navbar-left' => array(
            'main' => array(
                'caption' => 'Головна',
                'action' => 'index'
            ),
            'lectures' => array(
                'caption' => 'Лекції',
                'action' => 'index'
            ),
            'students' => array(
                'caption' => 'Студенти',
                'action' => 'index'
            ),
            'groups' => array(
                'caption' => 'Групи',
                'action' => 'index'
            ),                 
            'about' => array(
            	'caption' => 'Про проект',
            	'action' => 'index',
            ),                 
        ),
        'navbar-right' => array(             
            'auth' => array(
                'caption' => 'Вхід',
                'action' => 'login'
            ),
        )
    );

	function __construct()
    {
        $this->ci =& get_instance();    
    }

	public function getTabs($profile = null)
    {
    	$auth = $this->ci->tank_auth->is_logged_in();
    	if ($auth) {
            $this->_headerMenu['navbar-right']['auth'] = array(
                'caption' => '<span class="glyphicon glyphicon-log-out"></span> Вийти',
                'action' => 'logout'
            );
            if($this->ci->tank_auth->get_user_group() == 'student') {
                unset($this->_headerMenu['navbar-left']);                
            }
            unset($this->_headerMenu['navbar-left']['main']);
            unset($this->_headerMenu['navbar-left']['about']);

            $profile = '
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> Профіль <span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="/auth/change_password">Змінити пароль</a></li>
                    <li><a href="/auth/change_email">Змінити ел. пошту</a></li>                                        
                  </ul>
                </li>
                ';
        } else {
            unset($this->_headerMenu['navbar-left']['lectures']);
            unset($this->_headerMenu['navbar-left']['students']);
            unset($this->_headerMenu['navbar-left']['groups']);
            unset($this->_headerMenu['navbar-left']['reports']);
        }

        $controllerName = $this->ci->router->fetch_class();                
        foreach ($this->_headerMenu as $position => $menu) {
            echo '<div class="nav-collapse">';
            echo '<ul class="nav navbar-nav ', $position, '">';
            if($position == 'navbar-right') echo $profile;
            foreach ($menu as $controller => $option) {
                if ($controllerName == $controller) {
                    echo '<li class="active">';
                } else {
                    echo '<li>';
                }                    
                echo '<a href="/'.$controller. '/' . $option['action'].'">'.$option['caption'].'</a>';
                echo '</li>';
            }
            echo '</ul>';
            echo '</div>';

        }
    }

}
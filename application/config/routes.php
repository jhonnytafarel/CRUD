<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "login";
$route['404_override'] = '';


$route['usuario/logout'] = 'conta/sair';
$route['tickets'] = 'conta/tickets';
$route['tickets/novo'] = 'conta/novo_ticket';
$route['tickets/visualizar/(:num)'] = 'conta/visualizar_ticket/$1';
$route['cep'] = 'conta/cep';

/****** ADMINISTRADOR ******/

$route['ctadmin/usuarios/visualizar/(:num)'] = 'ctadmin/visualizar_usuario/$1';
$route['ctadmin/usuarios/editar/(:num)'] = 'ctadmin/editar_usuario/$1';
$route['ctadmin/usuarios/excluir/(:num)'] = 'ctadmin/excluir_usuario/$1';
$route['ctadmin/tickets/visualizar/(:num)'] = 'ctadmin/visualizar_ticket/$1';
$route['ctadmin/tickets/fechar/(:num)'] = 'ctadmin/fechar_ticket/$1';
$route['ctadmin/tickets/reabrir/(:num)'] = 'ctadmin/reabrir_ticket/$1';
$route['ctadmin/users/novo'] = 'ctadmin/novo_user_admin';
$route['ctadmin/users/editar/(:num)'] = 'ctadmin/editar_user_admin/$1';
$route['ctadmin/users/excluir/(:num)'] = 'ctadmin/excluir_user_admin/$1';



/* End of file routes.php */
/* Location: ./application/config/routes.php */
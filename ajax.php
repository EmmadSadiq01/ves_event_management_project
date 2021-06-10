<?php
ob_start();
$action = $_GET['action'];
include 'admin_class.php';
$crud = new Action();

if($action == 'login'){
	$login = $crud->login();
	if($login)
		echo $login;
}
if($action == 'login2'){
	$login = $crud->login2();
	if($login)
		echo $login;
}
if($action == 'logout'){
	$logout = $crud->logout();
	if($logout)
		echo $logout;
}
if($action == 'logout2'){
	$logout = $crud->logout2();
	if($logout)
		echo $logout;
}
if($action == 'save_user'){
	$save = $crud->save_user();
	if($save)
		echo $save;
}

if($action == "save_employee"){
	$save = $crud->save_employee();
	if($save)
		echo $save;
}
if($action == "delete_employee"){
	$save = $crud->delete_employee();
	if($save)
		echo $save;
}
if($action == "active_employee"){
	$save = $crud->active_employee();
	if($save)
		echo $save;
}
if($action == "save_department"){
	$save = $crud->save_department();
	if($save)
		echo $save;
}
if($action == "delete_department"){
	$save = $crud->delete_department();
	if($save)
		echo $save;
}
if($action == "save_position"){
	$save = $crud->save_position();
	if($save)
		echo $save;
}
if($action == "delete_position"){
	$save = $crud->delete_position();
	if($save)
		echo $save;
}
if($action == "save_maintenance"){
	
	$save = $crud->save_maintenance();
	if($save)
		echo $save;
}
if($action == "delete_maintenance"){
	$save = $crud->delete_maintenance();
	if($save)
		echo $save;
}
if($action == "save_image"){
	
	$save = $crud->save_image();
	if($save)
		echo $save;
}
if($action == "remove_image"){
	$save = $crud->remove_image();
	if($save)
		echo $save;
}
if($action == "calculate_maintenance"){
	$save = $crud->calculate_maintenance();
	if($save)
		echo $save;
}
if($action == "save_allowances"){
	$save = $crud->save_allowances();
	if($save)
		echo $save;
}
if($action == "delete_allowances"){
	$save = $crud->delete_allowances();
	if($save)
		echo $save;
}

if($action == "save_employee_allowance"){
	$save = $crud->save_employee_allowance();
	if($save)
		echo $save;
}
if($action == "delete_employee_allowance"){
	$save = $crud->delete_employee_allowance();
	if($save)
		echo $save;
}
if($action == "save_deductions"){
	$save = $crud->save_deductions();
	if($save)
		echo $save;
}
if($action == "delete_deductions"){
	$save = $crud->delete_deductions();
	if($save)
		echo $save;
}
if($action == "save_employee_deduction"){
	$save = $crud->save_employee_deduction();
	if($save)
		echo $save;
}
if($action == "delete_employee_deduction"){
	$save = $crud->delete_employee_deduction();
	if($save)
		echo $save;
}

if($action == "save_employee_attendance"){
	$save = $crud->save_employee_attendance();
	if($save)
		echo $save;
}
if($action == "delete_employee_attendance"){
	$save = $crud->delete_employee_attendance();
	if($save)
		echo $save;
}
if($action == "delete_employee_attendance_single"){
	$save = $crud->delete_employee_attendance_single();
	if($save)
		echo $save;
}
if($action == "save_payroll"){
	$save = $crud->save_payroll();
	if($save)
		echo $save;
}
if($action == "delete_payroll"){
	$save = $crud->delete_payroll();
	if($save)
		echo $save;
}
if($action == "calculate_payroll"){
	$save = $crud->calculate_payroll();
	if($save)
		echo $save;
}
if($action == "save_utilities"){
	
	$save = $crud->save_utilities();
	if($save)
		echo $save;
}
if($action == "save_vender"){
	
	$save = $crud->save_vender();
	if($save)
		echo $save;
}
if($action == "del_vender"){
	
	$save = $crud->del_vender();
	if($save)
		echo $save;
}
if($action == "delete_utilities"){
	$save = $crud->delete_utilities();
	if($save)
		echo $save;
}
if($action == "save_utility_image"){
	
	$save = $crud->save_utility_image();
	if($save)
		echo $save;
}
if($action == "remove_utility_image"){
	$save = $crud->remove_utility_image();
	if($save)
		echo $save;
}
if($action == "calculate_utilities"){
	$save = $crud->calculate_utilities();
	if($save)
		echo $save;
}

if($action == "save_procurements"){
	
	$save = $crud->save_procurements();
	if($save)
		echo $save;
}
if($action == "delete_procurements"){
	$save = $crud->delete_procurements();
	if($save)
		echo $save;
}
if($action == "save_procurement_image"){
	
	$save = $crud->save_procurement_image();
	if($save)
		echo $save;
}
if($action == "remove_procurement_image"){
	$save = $crud->remove_procurement_image();
	if($save)
		echo $save;
}
if($action == "calculate_procurements"){
	$save = $crud->calculate_procurements();
	if($save)
		echo $save;
}


if($action == "save_cashout"){
	
	$save = $crud->save_cashout();
	if($save)
		echo $save;
}
if($action == "delete_cashout"){
	$save = $crud->delete_cashout();
	if($save)
		echo $save;
}
if($action == "save_cashout_image"){
	
	$save = $crud->save_cashout_image();
	if($save)
		echo $save;
}
if($action == "remove_cashout_image"){
	$save = $crud->remove_cashout_image();
	if($save)
		echo $save;
}
if($action == "calculate_cashout"){
	$save = $crud->calculate_cashout();
	if($save)
		echo $save;
}
if($action == "generate_cashout_maintenance"){
	$save = $crud->generate_cashout_maintenance();
	if($save)
		echo $save;
}
if($action == "generate_cashout_utility"){
	$save = $crud->generate_cashout_utility();
	if($save)
		echo $save;
}
if($action == "generate_cashout_procurement"){
	$save = $crud->generate_cashout_procurement();
	if($save)
		echo $save;
}


if($action == "save_cashin"){
	
	$save = $crud->save_cashin();
	if($save)
		echo $save;
}
if($action == "delete_cashin"){
	$save = $crud->delete_cashin();
	if($save)
		echo $save;
}
if($action == "save_cashin_image"){
	
	$save = $crud->save_cashin_image();
	if($save)
		echo $save;
}
if($action == "remove_cashin_image"){
	$save = $crud->remove_cashin_image();
	if($save)
		echo $save;
}
if($action == "calculate_cashin"){
	$save = $crud->calculate_cashin();
	if($save)
		echo $save;
}
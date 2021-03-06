<?php
session_start();
ini_set('display_errors', 1);
class Action
{
	private $db;

	public function __construct()
	{
		ob_start();
		include 'db_connect.php';

		$this->db = $conn;
	}
	function __destruct()
	{
		$this->db->close();
		ob_end_flush();
	}

	function login()
	{
		extract($_POST);	
		// $qry = $this->db->query("SELECT * FROM users where username = '".$username."' and password = '".$password."' ");
		// $qry = $this->db->query("SELECT * FROM users Inner join userrelation ON users.id = userrelation.user_id where username = '".$username."' and password = '".$password."' ");

		$qry = $this->db->query("SELECT *, halls.id as 'hid', users.id as 'uid' FROM ((users
		INNER JOIN userrelation ON users.id = userrelation.user_id)
		INNER JOIN halls ON userrelation.hall_id = halls.id) where username = '" . $username . "' and password = '" . $password . "' ");

		if ($qry->num_rows > 0) {
			foreach ($qry->fetch_array() as $key => $value) {
				if ($key != 'passwors' && !is_numeric($key))
					$_SESSION['login_' . $key] = $value;
			}
			return 1;
		} else {
			return 3;
		}
	}
	function login2()
	{
		extract($_POST);
		$qry = $this->db->query("SELECT * FROM users where username = '" . $email . "' and password = '" . md5($password) . "' ");
		if ($qry->num_rows > 0) {
			foreach ($qry->fetch_array() as $key => $value) {
				if ($key != 'passwors' && !is_numeric($key))
					$_SESSION['login_' . $key] = $value;
			}
			return 1;
		} else {
			return 3;
		}
	}
	function logout()
	{
		session_destroy();
		foreach ($_SESSION as $key => $value) {
			unset($_SESSION[$key]);
		}
		header("location:login.php");
	}
	function logout2()
	{
		session_destroy();
		foreach ($_SESSION as $key => $value) {
			unset($_SESSION[$key]);
		}
		header("location:../index.php");
	}

	function save_user()
	{
		extract($_POST);
		$data = " name = '$name' ";
		$data .= ", hall_id = '$hallid' ";
		$data .= ", username = '$username' ";
		$data .= ", password = '$password' ";
		$data .= ", type = '$type' ";
		if (empty($id)) {
			$save = $this->db->query("INSERT INTO users set " . $data);
		} else {
			$save = $this->db->query("UPDATE users set " . $data . " where id = " . $id);
		}
		if ($save) {
			return 1;
		}
	}

	function save_employee()
	{
		extract($_POST);
		$hallid = $_SESSION['login_hid'];
		$userid = $_SESSION['login_uid'];
		$data = " firstname='$firstname' ";
		$data .= ", middlename='$middlename' ";
		$data .= ", lastname='$lastname' ";
		$data .= ", department_id='$department_id' ";
		$data .= ", position_id='$position_id' ";
		$data .= ", salary='$salary' ";
		$data .= ", email='$email' ";
		$data .= ", cnic='$cnic' ";
		$data .= ", contact='$contact' ";
		$data .= ", address='$address' ";
		$data .= ", emergency_contact='$emergency_contact' ";
		$data .= ", responsiblity='$responsiblity' ";
		$data .= ", status='1' ";
		$data .= ", hallid='$hallid' ";
		$data .= ", userid='$userid' ";

		if (empty($id)) {
			$i = 1;
			while ($i == 1) {
				$e_num = date('Y') . '-' . mt_rand(1, 9999);
				$chk  = $this->db->query("SELECT * FROM employee where employee_no = '$e_num' ")->num_rows;
				if ($chk <= 0) {
					$i = 0;
				}
			}
			$data .= ", employee_no='$e_num' ";

			$save = $this->db->query("INSERT INTO employee set " . $data);
		} else {
			$save = $this->db->query("UPDATE employee set " . $data . " where id=" . $id);
		}
		if ($save)
			return 1;
	}

	function delete_employee()
	{
		extract($_POST);
		$data = " status=0";

		$save = $this->db->query("UPDATE employee set " . $data . " where id=" . $id);

		if ($save)
			return 1;
	}
	function active_employee()
	{
		extract($_POST);
		$data = " status=1";

		$save = $this->db->query("UPDATE employee set " . $data . " where id=" . $id);

		if ($save)
			return 1;
	}


	function save_maintenance()
	{
		extract($_POST);
		$hallid = $_SESSION['login_hid'];
		$userid = $_SESSION['login_uid'];
		$data = " description='$description' ";
		$data .= ", resolution='$resolution' ";
		$data .= ", assign='$assign' ";
		$data .= ", priority='$priority' ";
		$data .= ", amount='$amount' ";
		$data .= ", owner_remarks='$owner_remarks' ";
		$data .= ", hallid='$hallid' ";
		$data .= ", userid='$userid' ";


		if (empty($id)) {
			$i = 1;
			while ($i == 1) {
				$e_num = 'M' . '-' . mt_rand(1, 9999) . '-' . date('Y');
				$chk  = $this->db->query("SELECT * FROM maintenance where maintenance_no = '$e_num' ")->num_rows;
				if ($chk <= 0) {
					$i = 0;
				}
			}
			$data .= ", maintenance_no='$e_num' ";

			$save = $this->db->query("INSERT INTO maintenance set " . $data);
		} else {
			$save = $this->db->query("UPDATE maintenance set " . $data . " where id=" . $id);
		}

		if ($save)
			return 1;
	}
	function delete_maintenance()
	{
		extract($_POST);
		$delete = $this->db->query("DELETE FROM maintenance where id = " . $id);
		if ($delete)
			return 1;
	}
	function save_image()
	{
		extract($_POST);
		$data = " image_description='$description' ";

		if (empty($id)) {
			$save = $this->db->query("INSERT INTO maintenanace_img set " . $data);
		} else {
			$save = $this->db->query("UPDATE maintenanace_img set " . $data . " where id=" . $id);
		}
		if ($save)
			return 1;
	}
	function remove_image()
	{
		extract($_POST);
		$delete = $this->db->query("DELETE FROM maintenanace_img where id = " . $id);
		if ($delete)
			return 1;
	}
	function calculate_maintenance()
	{
		extract($_POST);
		$data = " status=1";

		$save = $this->db->query("UPDATE maintenance set " . $data . " where id=" . $id);

		if ($save)
			return 1;
	}
	function save_department()
	{
		extract($_POST);
		$hallid = $_SESSION['login_hid'];
		$data = " name='$name' ";
		$data .= ", hallid='$hallid' ";


		if (empty($id)) {
			$save = $this->db->query("INSERT INTO department set " . $data);
		} else {
			$save = $this->db->query("UPDATE department set " . $data . " where id=" . $id);
		}
		if ($save)
			return 1;
	}
	function delete_department()
	{
		extract($_POST);
		$delete = $this->db->query("DELETE FROM department where id = " . $id);
		if ($delete)
			return 1;
	}

	function save_position()
	{
		extract($_POST);
		$hallid = $_SESSION['login_hid'];
		$data = " name='$name' ";
		$data .= ", hallid='$hallid' ";
		$data .= ", department_id = '$department_id' ";


		if (empty($id)) {
			$save = $this->db->query("INSERT INTO position set " . $data);
		} else {
			$save = $this->db->query("UPDATE position set " . $data . " where id=" . $id);
		}
		if ($save)
			return 1;
	}
	function delete_position()
	{
		extract($_POST);
		$delete = $this->db->query("DELETE FROM position where id = " . $id);
		if ($delete)
			return 1;
	}
	function save_allowances()
	{
		extract($_POST);
		$data = " allowance='$allowance' ";
		$data .= ", description = '$description' ";


		if (empty($id)) {
			$save = $this->db->query("INSERT INTO allowances set " . $data);
		} else {
			$save = $this->db->query("UPDATE allowances set " . $data . " where id=" . $id);
		}
		if ($save)
			return 1;
	}
	function delete_allowances()
	{
		extract($_POST);
		$delete = $this->db->query("DELETE FROM allowances where id = " . $id);
		if ($delete)
			return 1;
	}
	function save_employee_allowance()
	{
		extract($_POST);

		foreach ($allowance_id as $k => $v) {
			$data = " employee_id='$employee_id' ";
			$data .= ", allowance_id = '$allowance_id[$k]' ";
			$data .= ", type = '$type[$k]' ";
			$data .= ", amount = '$amount[$k]' ";
			$data .= ", effective_date = '$effective_date[$k]' ";
			$save[] = $this->db->query("INSERT INTO employee_allowances set " . $data);
		}

		if (isset($save))
			return 1;
	}
	function delete_employee_allowance()
	{
		extract($_POST);
		$delete = $this->db->query("DELETE FROM employee_allowances where id = " . $id);
		if ($delete)
			return 1;
	}
	function save_deductions()
	{
		extract($_POST);
		$data = " deduction='$deduction' ";
		$data .= ", description = '$description' ";


		if (empty($id)) {
			$save = $this->db->query("INSERT INTO deductions set " . $data);
		} else {
			$save = $this->db->query("UPDATE deductions set " . $data . " where id=" . $id);
		}
		if ($save)
			return 1;
	}
	function delete_deductions()
	{
		extract($_POST);
		$delete = $this->db->query("DELETE FROM deductions where id = " . $id);
		if ($delete)
			return 1;
	}
	function save_employee_deduction()
	{
		extract($_POST);

		foreach ($deduction_id as $k => $v) {
			$data = " employee_id='$employee_id' ";
			$data .= ", deduction_id = '$deduction_id[$k]' ";
			$data .= ", type = '$type[$k]' ";
			$data .= ", amount = '$amount[$k]' ";
			$data .= ", effective_date = '$effective_date[$k]' ";
			$save[] = $this->db->query("INSERT INTO employee_deductions set " . $data);
		}

		if (isset($save))
			return 1;
	}
	function delete_employee_deduction()
	{
		extract($_POST);
		$delete = $this->db->query("DELETE FROM employee_deductions where id = " . $id);
		if ($delete)
			return 1;
	}
	function save_employee_attendance()
	{
		extract($_POST);

		$hallid = $_SESSION['login_hid'];
		$userid = $_SESSION['login_uid'];

		foreach ($employee_id as $k => $v) {
			$datetime_log[$k] = date("Y-m-d H:i", strtotime($datetime_log[$k]));
			$data = " employee_id='$employee_id[$k]' ";
			$data .= ", log_type = '$log_type[$k]' ";
			$data .= ", datetime_log = '$datetime_log[$k]' ";
			$data .= ", hallid='$hallid' ";
			$data .= ", userid='$userid' ";
			$save[] = $this->db->query("INSERT INTO attendance set " . $data);
		}

		if (isset($save))
			return 1;
	}
	function delete_employee_attendance()
	{
		extract($_POST);
		$date = explode('_', $id);
		$dt = date("Y-m-d", strtotime($date[1]));

		$delete = $this->db->query("DELETE FROM attendance where employee_id = '" . $date[0] . "' and date(datetime_log) ='$dt' ");
		if ($delete)
			return 1;
	}
	function delete_employee_attendance_single()
	{
		extract($_POST);


		$delete = $this->db->query("DELETE FROM attendance where id = $id ");
		if ($delete)
			return 1;
	}
	function save_payroll()
	{
		extract($_POST);
		$hallid = $_SESSION['login_hid'];
		$userid = $_SESSION['login_uid'];
		$data = " date_from='$date_from' ";
		$data .= ", date_to = '$date_to' ";
		$data .= ", type = '$type' ";
		$data .= ", hallid='$hallid' ";
		$data .= ", userid='$userid' ";


		if (empty($id)) {
			$i = 1;
			while ($i == 1) {
				$ref_no = date('Y') . '-' . mt_rand(1, 9999);
				$chk  = $this->db->query("SELECT * FROM payroll where ref_no = '$ref_no' ")->num_rows;
				if ($chk <= 0) {
					$i = 0;
				}
			}
			$data .= ", ref_no='$ref_no' ";
			$save = $this->db->query("INSERT INTO payroll set " . $data);
		} else {
			$save = $this->db->query("UPDATE payroll set " . $data . " where id=" . $id);
		}
		if ($save)
			return 1;
	}
	function delete_payroll()
	{
		extract($_POST);
		$delete = $this->db->query("DELETE FROM payroll where id = " . $id);
		$delete2 = $this->db->query("DELETE FROM payroll_items where payroll_id=" . $id);
		if ($delete && $delete2)
			return 1;
	}
	function calculate_payroll()
	{
		extract($_POST);
		$hallid = $_SESSION['login_hid'];
		$am_in = "09:00";
		$am_out = "17:00";
		$pm_in = "15:00";
		$pm_out = "24:00";
		$this->db->query("DELETE FROM payroll_items payroll_id=" . $id);
		$pay = $this->db->query("SELECT * FROM payroll where hallid = $hallid AND id = " . $id)->fetch_array();
		$employee = $this->db->query("SELECT * FROM employee where hallid = $hallid AND status=1");
		if ($pay['type'] == 1)
			$dm = 30.14;
		else
			$dm = 111;
		$calc_days = abs(strtotime($pay['date_to'] . " 23:59:59")) - strtotime($pay['date_from'] . " 00:00:00 -1 day");
		$calc_days = floor($calc_days / (60 * 60 * 24));
		$att = $this->db->query("SELECT * FROM attendance where hallid = $hallid AND date(datetime_log) between '" . $pay['date_from'] . "' and '" . $pay['date_from'] . "' order by UNIX_TIMESTAMP(datetime_log) asc  ") or die(mysqli_error($conn));
		while ($row = $att->fetch_array()) {
			$date = date("Y-m-d", strtotime($row['datetime_log']));
			if ($row['log_type'] == 1 || $row['log_type'] == 3) {
				if (!isset($attendance[$row['employee_id'] . "_" . $date]['log'][$row['log_type']]))
					$attendance[$row['employee_id'] . "_" . $date]['log'][$row['log_type']] = $row['datetime_log'];
			} else {
				$attendance[$row['employee_id'] . "_" . $date]['log'][$row['log_type']] = $row['datetime_log'];
			}
		}

		while ($row = $employee->fetch_assoc()) {
			$salary = $row['salary'];
			$daily = $salary / 22;
			$min = (($salary / 22) / 8) / 60;
			$absent = 0;
			$late = 0;
			$dp = 22 / $pay['type'];
			$present = 0;
			$net = 0;


			for ($i = 0; $i < $calc_days; $i++) {
				$dd = date("Y-m-d", strtotime($pay['date_from'] . " +" . $i . " days"));
				$count = 0;
				$p = 0;
				if (isset($attendance[$row['id'] . "_" . $dd]['log']))
					$count = count($attendance[$row['id'] . "_" . $dd]['log']);

				if (isset($attendance[$row['id'] . "_" . $dd]['log'][1]) && isset($attendance[$row['id'] . "_" . $dd]['log'][2])) {
					$att_mn = abs(strtotime($attendance[$row['id'] . "_" . $dd]['log'][2])) - strtotime($attendance[$row['id'] . "_" . $dd]['log'][1]);
					$att_mn = floor($att_mn  / 60);
					$net += ($att_mn * $min);
					$late += (240 - $att_mn);
					$present += .5;
				}
				if (isset($attendance[$row['id'] . "_" . $dd]['log'][3]) && isset($attendance[$row['id'] . "_" . $dd]['log'][4])) {
					$att_mn = abs(strtotime($attendance[$row['id'] . "_" . $dd]['log'][4])) - strtotime($attendance[$row['id'] . "_" . $dd]['log'][3]);
					$att_mn = floor($att_mn  / 60);
					$net += ($att_mn * $min);
					$late += (240 - $att_mn);
					$present += .5;
				}
			}

			$absent = $dp - $present;
			$data = " payroll_id = '" . $pay['id'] . "' ";
			$data .= ", employee_id = '" . $row['id'] . "' ";
			$data .= ", absent = '$absent' ";
			$data .= ", present = '$present' ";
			$data .= ", late = '$late' ";
			$data .= ", salary = '$salary' ";
			$data .= ", net = '$net' ";
			$data .= ", hallid='$hallid' ";
			$save[] = $this->db->query("INSERT INTO payroll_items set " . $data);
		}
		if (isset($save)) {
			$this->db->query("UPDATE payroll set status = 1 where id = " . $pay['id']);
			return 1;
		}
	}
	function save_utilities()
	{
		extract($_POST);
		$hallid = $_SESSION['login_hid'];
		$userid = $_SESSION['login_uid'];
		$data = " description='$description' ";
		$data .= ", amount='$amount' ";
		$data .= ", priority='$priority' ";
		$data .= ", owner_remarks='$owner_remarks' ";
		$data .= ", hallid='$hallid' ";
		$data .= ", userid='$userid' ";


		if (empty($id)) {
			$i = 1;
			while ($i == 1) {
				$e_num = 'U' . '-' . mt_rand(1, 9999) . '-' . date('Y');
				$chk  = $this->db->query("SELECT * FROM utilities where utility_no = '$e_num' ")->num_rows;
				if ($chk <= 0) {
					$i = 0;
				}
			}
			$data .= ", utility_no='$e_num' ";

			$save = $this->db->query("INSERT INTO utilities set " . $data);
		} else {
			$save = $this->db->query("UPDATE utilities set " . $data . " where id=" . $id);
		}

		if ($save)
			return 1;
	}
	function save_vender()
	{
		extract($_POST);
		$hallid = $_SESSION['login_hid'];
		$userid = $_SESSION['login_uid'];
		$data = " name='$name' ";
		$data .= ", contact='$contact' ";
		$data .= ", cnic='$cnic' ";
		$data .= ", description='$description' ";
		$data .= ", address='$address' ";
		$data .= ", hall_id='$hallid' ";
		$data .= ", user_id='$userid' ";


		if (empty($id)) {
			$i = 1;
			while ($i == 1) {
				$v_num = 'V' . '-' . mt_rand(1, 9999) . '-' . date('Y');
				$chk  = $this->db->query("SELECT * FROM venders where vender_no = '$v_num' ")->num_rows;
				if ($chk <= 0) {
					$i = 0;
				}
			}
			$data .= ", vender_no='$v_num' ";

			$save = $this->db->query("INSERT INTO venders set " . $data);
		} else {
			$save = $this->db->query("UPDATE venders set " . $data . " where id=" . $id);
		}

		if ($save)
			return 1;
	}
	function add_ledger()
	{
		extract($_POST);
		$hallid = $_SESSION['login_hid'];
		$userid = $_SESSION['login_uid'];
		$data = "type='$type' ";
		$data .= ", amount='$amount' ";
		$data .= ", description='$description' ";
		$data .= ", hall_id='$hallid' ";
		$data .= ", user_id='$userid' ";
		$data .= ", vender_id='$id' ";


		// if (empty($id)) {
		// $i = 1;
		// while ($i == 1) {
		// 	$v_num = 'V' . '-' . mt_rand(1, 9999) . '-' . date('Y');
		// 	$chk  = $this->db->query("SELECT * FROM venders where vender_no = '$v_num' ")->num_rows;
		// 	if ($chk <= 0) {
		// 		$i = 0;
		// 	}
		// }
		// $data .= ", vender_no='$v_num' ";

		// 	$save = $this->db->query("INSERT INTO venders set " . $data);
		// } else {
		// 	$save = $this->db->query("UPDATE venders set " . $data . " where id=" . $id);
		// }
		$save = $this->db->query("INSERT INTO vender_ledger set " . $data);

		if ($save)
			return 1;
	}
	function del_vender()
	{
		extract($_POST);
		$delete = $this->db->query("DELETE FROM venders where id =$id");
		if ($delete)
			return 1;
	}
	function delete_utilities()
	{
		extract($_POST);
		$delete = $this->db->query("DELETE FROM utilities where id = " . $id);
		if ($delete)
			return 1;
	}
	function save_utility_image()
	{
		extract($_POST);
		$data = " image_description='$description' ";

		if (empty($id)) {
			$save = $this->db->query("INSERT INTO utility_img set " . $data);
		} else {
			$save = $this->db->query("UPDATE utility_img set " . $data . " where id=" . $id);
		}
		if ($save)
			return 1;
	}
	function remove_utility_image()
	{
		extract($_POST);
		$delete = $this->db->query("DELETE FROM utility_img where id = " . $id);
		if ($delete)
			return 1;
	}
	function calculate_utilities()
	{
		extract($_POST);
		$data = " status=1";
		$save = $this->db->query("UPDATE utilities set " . $data . " where id=" . $id);
		if ($save)
			return 1;
	}

	function save_procurements()
	{
		extract($_POST);
		$hallid = $_SESSION['login_hid'];
		$userid = $_SESSION['login_uid'];
		$data = " description='$description' ";
		$data .= ", amount='$amount' ";
		$data .= ", supplier_name='$supplier' ";
		$data .= ", priority='$priority' ";
		$data .= ", owner_remarks='$owner_remarks' ";
		$data .= ", hallid='$hallid' ";
		$data .= ", userid='$userid' ";

		if (empty($id)) {
			$i = 1;
			while ($i == 1) {
				$e_num = 'P' . '-' . mt_rand(1, 9999) . '-' . date('Y');
				$chk  = $this->db->query("SELECT * FROM procurement where procurement_no = '$e_num' ")->num_rows;
				if ($chk <= 0) {
					$i = 0;
				}
			}
			$data .= ", procurement_no='$e_num' ";

			$save = $this->db->query("INSERT INTO procurement set " . $data);
		} else {
			$save = $this->db->query("UPDATE procurement set " . $data . " where id=" . $id);
		}

		if ($save)
			return 1;
	}
	function delete_procurements()
	{
		extract($_POST);
		$delete = $this->db->query("DELETE FROM procurement where id = " . $id);
		if ($delete)
			return 1;
	}
	function save_procurement_image()
	{
		extract($_POST);
		$data = " image_description='$description' ";

		if (empty($id)) {
			$save = $this->db->query("INSERT INTO procurement_img set " . $data);
		} else {
			$save = $this->db->query("UPDATE procurement_img set " . $data . " where id=" . $id);
		}
		if ($save)
			return 1;
	}
	function save_vender_description()
	{
		extract($_POST);
		$data = " img_desc='$description' ";

		if (empty($id)) {
			$save = $this->db->query("INSERT INTO vender_img set " . $data);
		} else {
			$save = $this->db->query("UPDATE vender_img set " . $data . " where id=" . $id);
		}
		if ($save)
			return 1;
	}
	function remove_procurement_image()
	{
		extract($_POST);
		$delete = $this->db->query("DELETE FROM procurement_img where id = " . $id);
		if ($delete)
			return 1;
	}
	function remove_vender_image()
	{
		extract($_POST);
		$delete = $this->db->query("DELETE FROM vender_img where id = " . $id);
		if ($delete)
			return 1;
	}
	function calculate_procurements()
	{
		extract($_POST);
		$data = " status=1";

		$save = $this->db->query("UPDATE procurement set " . $data . " where id=" . $id);

		if ($save)
			return 1;
	}

	function save_cashout()
	{
		extract($_POST);
		$hallid = $_SESSION['login_hid'];
		$userid = $_SESSION['login_uid'];
		$data = " description='$description' ";
		$data .= ", amount='$amount' ";
		$data .= ", providby='$providby' ";
		$data .= ", priority='$priority' ";
		$data .= ", hallid='$hallid' ";
		$data .= ", userid='$userid' ";

		if (empty($id)) {
			$i = 1;
			while ($i == 1) {
				$e_num = 'CO' . '-' . mt_rand(1, 9999) . '-' . date('Y');
				$chk  = $this->db->query("SELECT * FROM cashout where cashout_no = '$e_num' ")->num_rows;
				if ($chk <= 0) {
					$i = 0;
				}
			}
			$data .= ", cashout_no='$e_num' ";
			$data .= ", bill_no='$e_num' ";

			$save = $this->db->query("INSERT INTO cashout set " . $data);
		} else {
			$save = $this->db->query("UPDATE cashout set " . $data . " where id=" . $id);
		}

		if ($save)
			return 1;
	}
	function delete_cashout()
	{
		extract($_POST);
		$delete = $this->db->query("DELETE FROM cashout where id = " . $id);
		if ($delete)
			return 1;
	}
	function save_cashout_image()
	{
		extract($_POST);
		$data = " image_description='$description' ";

		if (empty($id)) {
			$save = $this->db->query("INSERT INTO cashout_img set " . $data);
		} else {
			$save = $this->db->query("UPDATE cashout_img set " . $data . " where id=" . $id);
		}
		if ($save)
			return 1;
	}
	function remove_cashout_image()
	{
		extract($_POST);
		$delete = $this->db->query("DELETE FROM cashout_img where id = " . $id);
		if ($delete)
			return 1;
	}
	function calculate_cashout()
	{
		extract($_POST);
		$data = " status=1";
		$save = $this->db->query("UPDATE cashout set " . $data . " where id=" . $id);
		if ($save)
			return 1;
	}
	function generate_cashout_maintenance()
	{
		extract($_POST);
		$hallid = $_SESSION['login_hid'];
		$userid = $_SESSION['login_uid'];
		$data1 = " gen_cashout=1";

		$save2 = $this->db->query("UPDATE maintenance set " . $data1 . " where id=" . $id);

		$data2 = " description='$description' ";
		$data2 .= ", bill_no='$maintenance_no' ";
		$data2 .= ", priority='$priority' ";
		$data2 .= ", amount='$amount' ";
		$data2 .= ", hallid='$hallid' ";
		$data2 .= ", userid='$userid' ";

		$i = 1;
		while ($i == 1) {
			$e_num = 'CO' . '-' . mt_rand(1, 9999) . '-' . date('Y');
			$chk  = $this->db->query("SELECT * FROM cashout where cashout_no = '$e_num' ")->num_rows;
			if ($chk <= 0) {
				$i = 0;
			}
		}
		$data2 .= ", cashout_no='$e_num' ";

		$save3 = $this->db->query("INSERT INTO cashout set " . $data2);
		if ($save2 && $save3)
			return 1;
	}
	function generate_cashout_utility()
	{
		extract($_POST);
		$hallid = $_SESSION['login_hid'];
		$userid = $_SESSION['login_uid'];
		$data1 = " gen_cashout=1";

		$save2 = $this->db->query("UPDATE utilities set " . $data1 . " where id=" . $id);

		$data2 = " description='$description' ";
		$data2 .= ", bill_no='$utility_no' ";
		$data2 .= ", amount='$amount' ";
		$data2 .= ", priority='$priority' ";
		$data2 .= ", hallid='$hallid' ";
		$data2 .= ", userid='$userid' ";

		$i = 1;
		while ($i == 1) {
			$e_num = 'CO' . '-' . mt_rand(1, 9999) . '-' . date('Y');
			$chk  = $this->db->query("SELECT * FROM cashout where cashout_no = '$e_num' ")->num_rows;
			if ($chk <= 0) {
				$i = 0;
			}
		}
		$data2 .= ", cashout_no='$e_num' ";

		$save3 = $this->db->query("INSERT INTO cashout set " . $data2);
		if ($save2 && $save3)
			return 1;
	}
	function generate_cashout_procurement()
	{
		extract($_POST);
		$hallid = $_SESSION['login_hid'];
		$userid = $_SESSION['login_uid'];
		$data1 = " gen_cashout=1";

		$save2 = $this->db->query("UPDATE procurement set " . $data1 . " where id=" . $id);

		$data2 = " description='$description' ";
		$data2 .= ", bill_no='$procurement_no' ";
		$data2 .= ", amount='$amount' ";
		$data2 .= ", priority='$priority' ";
		$data2 .= ", hallid='$hallid' ";
		$data2 .= ", userid='$userid' ";

		$i = 1;
		while ($i == 1) {
			$e_num = 'CO' . '-' . mt_rand(1, 9999) . '-' . date('Y');
			$chk  = $this->db->query("SELECT * FROM cashout where cashout_no = '$e_num' ")->num_rows;
			if ($chk <= 0) {
				$i = 0;
			}
		}
		$data2 .= ", cashout_no='$e_num' ";

		$save3 = $this->db->query("INSERT INTO cashout set " . $data2);
		if ($save2 && $save3)
			return 1;
	}

	function save_cashin()
	{
		extract($_POST);
		$data = " Description='$Description' ";
		$data .= ", price='$price' ";
		$data .= ", 	hall_id='$hallid' ";

		if (empty($id)) {
			$i = 1;
			while ($i == 1) {
				$e_num = 'CI' . '-' . mt_rand(1, 9999) . '-' . date('Y');
				$chk  = $this->db->query("SELECT * FROM cashin where cashin_no = '$e_num' ")->num_rows;
				if ($chk <= 0) {
					$i = 0;
				}
			}
			$data .= ", cashin_no='$e_num' ";
			$data .= ", 	recept_id='$e_num' ";

			$save = $this->db->query("INSERT INTO cashin set " . $data);
		} else {
			$save = $this->db->query("UPDATE cashin set " . $data . " where id=" . $id);
		}

		if ($save)
			return 1;
	}
	function delete_cashin()
	{
		extract($_POST);
		$delete = $this->db->query("DELETE FROM cashin where id = " . $id);
		if ($delete)
			return 1;
	}
	function save_cashin_image()
	{
		extract($_POST);
		$data = " image_description='$description' ";

		if (empty($id)) {
			$save = $this->db->query("INSERT INTO cashin_img set " . $data);
		} else {
			$save = $this->db->query("UPDATE cashin_img set " . $data . " where id=" . $id);
		}
		if ($save)
			return 1;
	}
	function remove_cashin_image()
	{
		extract($_POST);
		$delete = $this->db->query("DELETE FROM cashin_img where id = " . $id);
		if ($delete)
			return 1;
	}
	function calculate_cashin()
	{
		extract($_POST);
		$data = " status=1";
		$save = $this->db->query("UPDATE cashin set " . $data . " where id=" . $id);
		if ($save)
			return 1;
	}
}

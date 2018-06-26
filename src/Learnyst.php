<?php

namespace Donnie\Learnyst;

/**
* Author: Donnie Ashok
* Email: hello@donnieashok.in
* Date: 26-06-2018
* Description: Learnyst API for Adding and Enrolling Students
*/

class Learnyst
{
	public $name;
	public $email;
	public $password;
	public $mobile;

	public $courseID;
	public $dripDate;

	private $auth;
	
	function __construct($auth, $domain)
	{
		$this->auth = $auth;
		$this->addUrl = 'https://www.'.$domain.'/api/rest/registerUser.json';
		$this->enrolUrl = 'https://www.'.$domain.'/api/rest/addEnrollment.json';
		$this->loginUrl = 'https://www.'.$domain.'/api/rest/login.json';
	}

	public function addStudent()
	{
		$params = [
			'name' => $this->name,
			'email' => $this->email,
			'password' => $this->password,
			'mobile' => $this->mobile,
			'auth_token' => $this->auth
		];

		$query = http_build_query($params);

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $this->addUrl);
		curl_setopt($ch, CURLOPT_POST, count($params));
		curl_setopt($ch, CURLOPT_POSTFIELDS, $query);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		// execute post
		$result = curl_exec($ch);
		// close connection
		curl_close($ch);
		return $result;
	}

	public function enrolStudent()
	{
		$params = [
			'session_id' => $this->courseID,
			'drip_start_date' => $this->dripDate,
			'email' => $this->email,
			'auth_token' => $this->auth
		];

		$query = http_build_query($params);

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $this->enrolUrl);
		curl_setopt($ch, CURLOPT_POST, count($params));
		curl_setopt($ch, CURLOPT_POSTFIELDS, $query);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		// execute post
		$result = curl_exec($ch);
		// close connection
		curl_close($ch);
		return $result;
	}

	public function loginStudent()
	{
		$params = [
			'password' => $this->password,
			'email' => $this->email,
			'auth_token' => $this->auth
		];

		$query = http_build_query($params);

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $this->loginUrl);
		curl_setopt($ch, CURLOPT_POST, count($params));
		curl_setopt($ch, CURLOPT_POSTFIELDS, $query);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		// execute post
		$result = curl_exec($ch);
		// close connection
		curl_close($ch);
		return $result;
	}
}

<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
		//Mostramos la vista principal del proyecto
		return view('index');
    }
	
	public function books()
	{
		//Validamos los campos requeridos en el formulario
		$validation = \Config\Services::validation();
		$validation->setRules([
			'username' => [
				'label'  => 'Usuario',
				'rules'  => 'required',
				'errors' => ['required' => 'El Usuario es requerido.']
			],
			'password' => [
				'label'  => 'Clave',
				'rules'  => 'required',
				'errors' => ['required' => 'La Clave es requerida.']
			]
		]);
		$is_valid_form = $validation->withRequest($this->request)->run();
		//Validamos que el metodo sea POST y el formulario sea correcto
		if($this->request->getMethod() === 'post' AND $is_valid_form){
			//Obtenemos las variables del formulario
			$params = $this->request->getPost();
			$url = site_url('dao');//URL a donde hacemos la peticion
			$curl = curl_init();
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt_array($curl, [
				CURLOPT_URL => $url,
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_ENCODING => "",
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 30,
				CURLOPT_POST => 1,
				CURLOPT_POSTFIELDS => json_encode(['username' => $params['username'],'password' => $params['password']]),
				CURLOPT_HTTPHEADER => [
					"cache-control: no-cache",
					"accept: application/json"
				]
			]);
			$response = curl_exec($curl);
			$err = curl_error($curl);
			curl_close($curl);
			echo $response;//Mostramos la respuesta
		} else {
			echo $validation->listErrors();//Mostramos errores si el formulario es incorrecto
		}
	}
}

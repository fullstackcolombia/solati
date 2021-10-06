<?php

namespace App\Controllers;

class Book extends BaseController
{
	
	public function index()
	{
		//Obtenemos la informacion de la peticion realizada
		$json = file_get_contents('php://input');
		$data = json_decode($json);//Convertimos el json a objeto php
		$username = $data->username;//Obtenemos el usuario
		$password = $data->password;//Obtenemos la clave
		//validamos que las credenciales no sean nulas y sean correctas
		if(!empty($username) AND $username == 'pruebas' AND !empty($password) AND $password == 'prueba123'){
			//devolvemos la lista de libros
			echo service('books_fsc');exit();
		} else {
			//mostramos un error en las credenciales
			echo json_encode(['error' => 'Credenciales no validas'],true);
		}
	}
}

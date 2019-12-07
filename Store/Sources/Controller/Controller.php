<?php

require ROOT_PATH.'/Sources/DAO/DAO.php';
require ROOT_PATH.'/Sources/Model/Model.php';

class Controller {
	public function listar(){
		$dao = new DAO();
		$res = $dao->getAll();

		return $res;
	}

	public function listarUnico(int $id){
		$dao = new DAO();
		$res = $dao->getOnly($id);

		return $res;
	}
}

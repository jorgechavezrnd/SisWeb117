<?php

	// CLASE DE CONEXIÓN INCLUIDA
	include_once('conexion.php');

	class Curso {

		// Atributos
		private $curso_id;
		private $sigla;
		private $titulo;
		private $resumen;
		private $fecha_inicio;
		private $docente_id;
		
		private $con;

		// Metodos
		public function __construct() {
			$this->con = new Conexion();
		}

		public function set($atributo, $contenido) {
			$this->$atributo = $contenido;
		}

		public function get($atributo) {
			return $this->$atributo;
		}

		public function listar() {
			$sql = "SELECT * FROM Cursos,Docente WHERE Cursos.docente_id=Docente.id";
			$resultado = $this->con->consultaRetorno($sql);
			return $resultado;
		}

		public function crear() {

			$sql2 = "SELECT * FROM Cursos WHERE curso_id = '{$this->curso_id}'";
			$resultado = $this->con->consultaRetorno($sql2);
			$num = mysql_num_rows($resultado);

			if ($num != 0) {
				return false;
			} else {
				$sql = "INSERT INTO Cursos (curso_id,sigla, titulo, resumen, fecha_inicio, docente_id) VALUES (
					'{$this->curso_id}','{$this->sigla}', '{$this->titulo}', '{$this->resumen}', '{$this->fecha_inicio}', '{$this->docente_id}')";

				$this->con->consultaSimple($sql);
				return true;
			}
		}

		public function eliminar() {
			$sql = "DELETE FROM Cursos WHERE curso_id = '{$this->curso_id}'";
			$this->con->consultaSimple($sql);
		}

		public function ver() {
			$sql = "SELECT * FROM Cursos,Docente WHERE  Cursos.docente_id=Docente.id AND curso_id = '{$this->curso_id}' LIMIT 1";
			$resultado = $this->con->consultaRetorno($sql);
			$row = mysql_fetch_assoc($resultado);

			// Set
			$this->curso_id = $row['curso_id'];
			$this->sigla = $row['sigla'];
			$this->titulo = $row['titulo'];
			$this->resumen = $row['resumen'];
			$this->fecha_inicio = $row['fecha_inicio'];
			$this->docente_id = $row['docente_id'];

			return $row;
		}

		public function editar() {
			$sql = "UPDATE Cursos SET titulo = '{$this->titulo}', resumen = '{$this->resumen}', fecha_inicio = '{$this->fecha_inicio}', docente_id = '{$this->docente_id}' ,sigla='{$this->sigla}' WHERE curso_id = '{$this->curso_id}'";

			$this->con->consultaSimple($sql);
		}

		public function getdocentes(){
			$sql = "SELECT * FROM Docente";
			$resultado = $this->con->consultaRetorno($sql);
			return $resultado;
		}


	}

?>
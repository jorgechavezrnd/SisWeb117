<?php

	// CLASE DE CONEXIÓN INCLUIDA
	include_once('conexion.php');

	class Curso {

		// Atributos
		private $id;
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
			$sql = "SELECT * FROM Cursos";
			$resultado = $this->con->consultaRetorno($sql);
			return $resultado;
		}

		public function crear() {

			$sql2 = "SELECT * FROM Cursos WHERE id = '{$this->id}'";
			$resultado = $this->con->consultaRetorno($sql2);
			$num = mysql_num_rows($resultado);

			if ($num != 0) {
				return false;
			} else {
				$sql = "INSERT INTO Cursos (id, titulo, resumen, fecha_inicio, docente_id) VALUES (
					'{$this->id}', '{$this->titulo}', '{$this->resumen}', '{$this->fecha_inicio}', '{$this->docente_id}')";

				$this->con->consultaSimple($sql);
				return true;
			}
		}

		public function eliminar() {
			$sql = "DELETE FROM Cursos WHERE id = '{$this->id}'";
			$this->con->consultaSimple($sql);
		}

		public function ver() {
			$sql = "SELECT * FROM Cursos WHERE  id = '{$this->id}' LIMIT 1";
			$resultado = $this->con->consultaRetorno($sql);
			$row = mysql_fetch_assoc($resultado);

			// Set
			$this->id = $row['id'];
			$this->titulo = $row['titulo'];
			$this->resumen = $row['resumen'];
			$this->fecha_inicio = $row['fecha_inicio'];
			$this->docente_id = $row['docente_id'];

			return $row;
		}

		public function editar() {
			$sql = "UPDATE Cursos SET titulo = '{$this->titulo}', resumen = '{$this->resumen}', fecha_inicio = '{$this->fecha_inicio}', docente_id = '{$this->docente_id}' WHERE id = '{$this->id}'";

			$this->con->consultaSimple($sql);
		}



	}

?>
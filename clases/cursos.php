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
		private $docente;
		private $name;
		private $image;
		
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
			$sql = "INSERT INTO Cursos (sigla, titulo, resumen, fecha_inicio, docente, imagename, imagecontent) VALUES ('{$this->sigla}', '{$this->titulo}', '{$this->resumen}', '{$this->fecha_inicio}', '{$this->docente}','{$this->name}','{$this->image}')";
			$this->con->consultaSimple($sql);

		}

		public function eliminar() {
			$sql = "DELETE FROM Cursos WHERE curso_id = '{$this->curso_id}'";
			$this->con->consultaSimple($sql);
		}

		public function ver() {
			$sql = "SELECT * FROM Cursos WHERE  curso_id = '{$this->curso_id}' LIMIT 1";
			$resultado = $this->con->consultaRetorno($sql);
			$row = mysql_fetch_assoc($resultado);

			// Set
			$this->curso_id = $row['curso_id'];
			$this->sigla = $row['sigla'];
			$this->titulo = $row['titulo'];
			$this->resumen = $row['resumen'];
			$this->fecha_inicio = $row['fecha_inicio'];
			$this->docente = $row['docente'];
			$this->name=$row['imagename'];
			$this->image=$row['imagecontent'];

			return $row;
		}

		public function editar() {
			$sql = "UPDATE Cursos SET titulo = '{$this->titulo}', resumen = '{$this->resumen}', fecha_inicio = '{$this->fecha_inicio}', docente = '{$this->docente}' ,sigla='{$this->sigla}' , imagename='{$this->name}' , imagecontent='{$this->image}' WHERE curso_id = '{$this->curso_id}'";

			$this->con->consultaSimple($sql);
		}

	}

?>
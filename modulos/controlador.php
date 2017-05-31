<?php 

	include_once("./clases/cursos.php");

	class ControladorCursos {

		// Atributos
		private $cursos;

		// Metodos
		public function __construct() {
			$this->cursos = new Curso();
		}

		public function index() {
			$resultado = $this->cursos->listar();
			return $resultado;
		}

		public function crear($curso_id,$sigla, $titulo, $resumen, $fecha_inicio, $docente_id) {

			$this->cursos->set("curso_id", $curso_id);
			$this->cursos->set("sigla", $sigla);
			$this->cursos->set("titulo", $titulo);
			$this->cursos->set("resumen", $resumen);
			$this->cursos->set("fecha_inicio", $fecha_inicio);
			$this->cursos->set("docente_id", $docente_id);

			$resultado = $this->cursos->crear();
			return $resultado;
		}

		public function eliminar($curso_id) {
			$this->cursos->set("curso_id", $curso_id);
			$this->cursos->eliminar();
		}

		public function ver($curso_id) {
			$this->cursos->set("curso_id", $curso_id);
			$datos = $this->cursos->ver();
			return $datos;
		}

		public function editar($curso_id,$sigla, $titulo, $resumen, $fecha_inicio, $docente_id) {
			$this->cursos->set("curso_id", $curso_id);
			$this->cursos->set("sigla", $sigla);
			$this->cursos->set("titulo", $titulo);
			$this->cursos->set("resumen", $resumen);
			$this->cursos->set("fecha_inicio", $fecha_inicio);
			$this->cursos->set("docente_id", $docente_id);
			$this->cursos->editar();
		}
		
		public function getdocentes() {
			$resultado = $this->cursos->getdocentes();
			return $resultado;
		}

	}

?>
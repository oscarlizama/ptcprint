<?php 
	require_once 'validaciones.php';
	$valores = $_POST['valores'];
	if($_POST['tabla'] == 1){
		$where = "id_usuario=?";
		$tabla = 'usuarios';
		$estado = 'estado_usuario=0';
		$campos_tabla = array('nombre_usuario','correo_usuario','clave_usuario','apellido_usuario','id_permiso');
		// Verificar que cada campo (excepto el ID) sea valido
		// Solo cuando no elimine, si elimino, no me importa como sean los campos
		if ($_POST['accion'] == 1 &&  (

			!validarNombrePersona($valores[0]) ||
			!validarCorreo($valores[1]) ||
			!validarTexto($valores[2]) ||
			!validarNombrePersona($valores[3]) ||
			!validarNumeroEntero($valores[4])

			)) exit("invalid");

		if ($_POST['accion'] == 2 &&  (
			!validarNumeroEntero($valores[0])

			)) exit("invalid");
		// Validar ID, cuando no inserte (cuando modifique o elimine, solo en esos casos se pasa el id)
		// El ID siempre es el ultimo elemento de $valores,
		// Por tanto, esta linea no hace falta modificarla
		if ($_POST['accion'] != 1 && !validarNumeroEntero($valores[count($valores)-1]))
			exit( "invalid");


		if($_POST['accion'] == 1){
			include 'insertar.php';
			mthAgregar($tabla,$campos_tabla,$valores);
		}

		if($_POST['accion'] == 2){
			include 'actualizar.php';
			$campos_tabla = array('id_permiso');
			mthActualizar($tabla,$campos_tabla,$valores,$where);
		}

		if($_POST['accion'] == 3){
			include 'eliminar.php';
			mthEliminar($tabla,$where,$estado,$valores);
		}

		if($_POST['accion'] == 4){
			require 'conexion.php';
			$sql = "UPDATE usuarios SET id_permiso=? WHERE id_usuario=?";
			$stmt = $con->prepare($sql);
			if ($stmt->execute($valores)) {
				$resp = "success";
				echo $resp;	
			}
		}
	}

	if($_POST['tabla'] == 2){
		$tabla = "permisos";
		$estado = "estado_permiso=0";
		$where = "id_permiso=?";
		$campos_tabla = array('nombre_permiso','tbl_configuraciones','tbl_usuarios','tbl_permisos','tbl_fotospr',
			'tbl_clientes','tbl_informacion_corporativa','tbl_redes_sociales','tbl_proveedores','tbl_facturacion','tbl_productos','tbl_medidas_productos','tbl_tipo_contactos','tbl_tipo_productos','tbl_mano_obra','tbl_contactos_proveedor','tbl_equipos','estado_permiso');

		if($_POST['accion'] == 1){
			include 'insertar.php';
			mthAgregar($tabla,$campos_tabla,$valores);
		}

		if($_POST['accion'] == 2){
			include 'actualizar.php';
			mthActualizar($tabla,$campos_tabla,$valores,$where);
		}

		if($_POST['accion'] == 3){
			include 'eliminar.php';
			mthEliminar($tabla,$where,$estado,$valores);
		}
	}

	if ($_POST['tabla'] == 3) {
		$tabla = "clientes";
		$estado = "estado_cliente=0";
		$where = "id_cliente=?";
		$campos_tabla = array('nombre_cliente','apellido_cliente','correo_cliente','clave_cliente');
		// Verificar que cada campo (excepto el ID) sea valido
		// Solo cuando no elimine, si elimino, no me importa como sean los campos
		if ($_POST['accion'] != 3 && (

			!validarNombrePersona($valores[0]) ||
			!validarNombrePersona($valores[1]) ||
			!validarCorreo($valores[2]) ||
			!validarTexto($valores[3])

			)) exit("invalid");

		// Validar ID, cuando no inserte (cuando modifique o elimine, solo en esos casos se pasa el id)
		// El ID siempre es el ultimo elemento de $valores,
		// Por tanto, esta linea no hace falta modificarla
		if ($_POST['accion'] != 1 && !validarNumeroEntero($valores[count($valores)-1]))
			exit( "invalid");

		if($_POST['accion'] == 1){
			$error = "";
			if (validarTexto($_POST['repetida'])){
				if($valores[3] == $_POST['repetida']){
					if(validar_clave($valores[3],$error)){
						include 'registrarcliente.php';
						agregarCliente($valores);
					}else{
						exit($error);
					}
				}else{
					exit($error);
				}
			}
		}
		if($_POST['accion'] == 2){
			include 'actualizar.php';
			$campos_tabla = array('nombre_cliente','clave_cliente','apellido_cliente');
			mthActualizar($tabla,$campos_tabla,$valores,$where);
		}
	}

	if($_POST['tabla'] == 15){
		$where = "id_configuracion=?";
		$tabla = 'configuraciones';
		$estado = 'estado_configuracion=0';
		$campos_tabla = array('nombre_configuracion','configuracion','descripcion_configuracion');
		// Verificar que cada campo (excepto el ID) sea valido
		// Solo cuando no elimine, si elimino, no me importa como sean los campos
		if ($_POST['accion'] != 3 && (

			!validarNombrePersona($valores[0]) ||
			!validarTexto($valores[1]) ||
			!validarTexto($valores[2])

			)) exit("invalid");

		// Validar ID, cuando no inserte (cuando modifique o elimine, solo en esos casos se pasa el id)
		// El ID siempre es el ultimo elemento de $valores,
		// Por tanto, esta linea no hace falta modificarla
		if ($_POST['accion'] != 1 && !validarNumeroEntero($valores[count($valores)-1]))
			exit( "invalid");

		if($_POST['accion'] == 1){
			include 'insertar.php';
			mthAgregar($tabla,$campos_tabla,$valores);
		}

		if($_POST['accion'] == 2){
			include 'actualizar.php';
			mthActualizar($tabla,$campos_tabla,$valores,$where);
		}

		if($_POST['accion'] == 3){
			include 'eliminar.php';
			mthEliminar($tabla,$where,$estado,$valores);
		}
	}

	if($_POST['tabla'] == 16){
		$where = "id_tipo_contacto=?";
		$tabla = 'tipos_contacto';
		$estado = 'estado_tipo_contacto=0';
		$campos_tabla = array('tipo_contacto');
		// Verificar que cada campo (excepto el ID) sea valido
		// Solo cuando no elimine, si elimino, no me importa como sean los campos
		if ($_POST['accion'] != 3 && (

			!validarTexto($valores[0])

			)) exit("invalid");

		// Validar ID, cuando no inserte (cuando modifique o elimine, solo en esos casos se pasa el id)
		// El ID siempre es el ultimo elemento de $valores,
		// Por tanto, esta linea no hace falta modificarla
		if ($_POST['accion'] != 1 && !validarNumeroEntero($valores[count($valores)-1]))
			exit( "invalid");


		if($_POST['accion'] == 1){
			include 'insertar.php';
			mthAgregar($tabla,$campos_tabla,$valores);
		}

		if($_POST['accion'] == 2){
			include 'actualizar.php';
			mthActualizar($tabla,$campos_tabla,$valores,$where);
		}

		if($_POST['accion'] == 3){
			include 'eliminar.php';
			mthEliminar($tabla,$where,$estado,$valores);
		}
	}

	if($_POST['tabla'] == 17){
		$where = "id_contacto_proveedor=?";
		$tabla = 'contactos_proveedor';
		$estado = 'estado_contacto_proveedor=0';
		$campos_tabla = array('id_proveedor','contacto_proveedor','id_tipo_contacto');
		// Verificar que cada campo (excepto el ID) sea valido
		// Solo cuando no elimine, si elimino, no me importa como sean los campos
		if ($_POST['accion'] != 3 && (

			!validarNumeroEntero($valores[0]) ||
			!validarTexto($valores[1]) ||
			!validarNumeroEntero($valores[2])

			)) exit("invalid");

		// Validar ID, cuando no inserte (cuando modifique o elimine, solo en esos casos se pasa el id)
		// El ID siempre es el ultimo elemento de $valores,
		// Por tanto, esta linea no hace falta modificarla
		if ($_POST['accion'] != 1 && !validarNumeroEntero($valores[count($valores)-1]))
			exit( "invalid");


		if($_POST['accion'] == 1){
			include 'insertar.php';
			mthAgregar($tabla,$campos_tabla,$valores);
		}

		if($_POST['accion'] == 2){
			include 'actualizar.php';
			mthActualizar($tabla,$campos_tabla,$valores,$where);
		}

		if($_POST['accion'] == 3){
			include 'eliminar.php';
			mthEliminar($tabla,$where,$estado,$valores);
		}
	}

	if($_POST['tabla'] == 18){
		$where = "id_empresa=?";
		$tabla = 'empresa';
		$estado = 'estado_empresa=0';
		$campos_tabla = array('nombre_empresa','mision','vision','valores','logo_empresa');
		// Verificar que cada campo (excepto el ID) sea valido
		// Solo cuando no elimine, si elimino, no me importa como sean los campos
		if ($_POST['accion'] != 3 && (

			!validarNombrePersona($valores[0]) ||
			!validarTexto($valores[1]) ||
			!validarTexto($valores[2]) ||
			!validarTexto($valores[3])
			)) exit("invalid");

		// Validar ID, cuando no inserte (cuando modifique o elimine, solo en esos casos se pasa el id)
		// El ID siempre es el ultimo elemento de $valores,
		// Por tanto, esta linea no hace falta modificarla
		if ($_POST['accion'] != 1 && !validarNumeroEntero($valores[count($valores)-1]))
			exit( "invalid");

		if($_POST['accion'] == 1){
			include 'insertar.php';
			mthAgregar($tabla,$campos_tabla,$valores);
		}
		if($_POST['accion'] == 2){
			include 'actualizar.php';
			mthActualizar($tabla,$campos_tabla,$valores,$where);
		}

		if($_POST['accion'] == 3){
			include 'eliminar.php';
			mthEliminar($tabla,$where,$estado,$valores);
		}
	}

	if($_POST['tabla'] == 20){
		$where = "id_red_social=?";
		$tabla = 'redes_sociales';
		$estado = 'estado_red=0';
		$campos_tabla = array('nombre_red_social','link_red_social','icono_red_social');
		// Verificar que cada campo (excepto el ID) sea valido
		// Solo cuando no elimine, si elimino, no me importa como sean los campos
		if ($_POST['accion'] != 3 && (

			!validarNombrePersona($valores[0]) ||
			!validarTexto($valores[1]) 
			)) exit("invalid");

		// Validar ID, cuando no inserte (cuando modifique o elimine, solo en esos casos se pasa el id)
		// El ID siempre es el ultimo elemento de $valores,
		// Por tanto, esta linea no hace falta modificarla
		if ($_POST['accion'] != 1 && !validarNumeroEntero($valores[count($valores)-1]))
			exit( "invalid");

		if($_POST['accion'] == 1){
			include 'insertar.php';
			mthAgregar($tabla,$campos_tabla,$valores);
		}

		if($_POST['accion'] == 2){
			include 'actualizar.php';
			mthActualizar($tabla,$campos_tabla,$valores,$where);
		}

		if($_POST['accion'] == 3){
			include 'eliminar.php';
			mthEliminar($tabla,$where,$estado,$valores);
		}
	}

	if($_POST['tabla'] == 7){  // del CRUD de productos
		$where = "id_producto=?";
		$tabla = 'productos';
		$estado = 'estado_producto=0';
		$campos_tabla = array('nombre_producto','id_tipo_producto','descripcion_producto');
		// Verificar que cada campo (excepto el ID) sea valido
		// Solo cuando no elimine, si elimino, no me importa como sean los campos
		if ($_POST['accion'] != 3 && (

			!validarNombrePersona($valores[0]) ||
			!validarNumeroEntero($valores[1]) ||
			!validarTexto($valores[2])
			)) exit("invalid");

		// Validar ID, cuando no inserte (cuando modifique o elimine, solo en esos casos se pasa el id)
		// El ID siempre es el ultimo elemento de $valores,
		// Por tanto, esta linea no hace falta modificarla
		if ($_POST['accion'] != 1 && !validarNumeroEntero($valores[count($valores)-1]))
			exit( "invalid");

		if($_POST['accion'] == 1){
			include 'insertar.php';
			mthAgregar($tabla,$campos_tabla,$valores);
		}

		if($_POST['accion'] == 2){
			include 'actualizar.php';
			mthActualizar($tabla,$campos_tabla,$valores,$where);
		}

		if($_POST['accion'] == 3){
			include 'eliminar.php';
			mthEliminar($tabla,$where,$estado,$valores);
		}
	}

	if($_POST['tabla'] == 8){ //CRUD de tipo de productos
		$where = "id_tipo_producto=?";
		$tabla = 'tipos_producto';
		$estado = 'estado_tipo_producto=0';
		$campos_tabla = array('nombre_tipo_producto',"icono_producto"); //orden segun diseño en html
		// Verificar que cada campo (excepto el ID) sea valido
		// Solo cuando no elimine, si elimino, no me importa como sean los campos
		if ($_POST['accion'] != 3 && (

			!validarNombrePersona($valores[0]) ||
			!validarTexto($valores[1])

			)) exit("invalid");

		// Validar ID, cuando no inserte (cuando modifique o elimine, solo en esos casos se pasa el id)
		// El ID siempre es el ultimo elemento de $valores,
		// Por tanto, esta linea no hace falta modificarla
		if ($_POST['accion'] != 1 && !validarNumeroEntero($valores[count($valores)-1]))
			exit( "invalid");

		if($_POST['accion'] == 1){
			include 'insertar.php';
			mthAgregar($tabla,$campos_tabla,$valores);
		}

		if($_POST['accion'] == 2){
			include 'actualizar.php';
			mthActualizar($tabla,$campos_tabla,$valores,$where);
		}

		if($_POST['accion'] == 3){
			include 'eliminar.php';
			mthEliminar($tabla,$where,$estado,$valores);
		}
	}

	if($_POST['tabla'] == 9){ //CRUD de medidas de productos
		$where = "id_medida=?";
		$tabla = 'medidas_producto';
		$estado = 'estado_medida=0';
		$campos_tabla = array('id_producto','medida'); //orden segun diseño en html
		if($_POST['accion'] == 1){
			include 'insertar.php';
			mthAgregar($tabla,$campos_tabla,$valores);
		}

		if($_POST['accion'] == 2){
			include 'actualizar.php';
			mthActualizar($tabla,$campos_tabla,$valores,$where);
		}

		if($_POST['accion'] == 3){
			include 'eliminar.php';
			mthEliminar($tabla,$where,$estado,$valores);
		}
	}

	if($_POST['tabla'] == 10){
		$where = "id_foto_producto=?";
		$tabla = 'fotos_productos';
		$estado = 'estado_foto_producto=0';
		$campos_tabla = array('id_producto','foto_producto');
		if($_POST['accion'] == 1){
			include 'insertar.php';
			mthAgregar($tabla,$campos_tabla,$valores);
		}

		if($_POST['accion'] == 2){
			include 'actualizar.php';
			mthActualizar($tabla,$campos_tabla,$valores,$where);
		}

		if($_POST['accion'] == 3){
			include 'eliminar.php';
			mthEliminar($tabla,$where,$estado,$valores);
		}
	}

	if($_POST['tabla'] == 21){
		$where = "id_proveedor=?";
		$tabla = 'proveedores';
		$estado = 'estado_proveedor=0';
		$campos_tabla = array('proveedor','direccion_proveedor');

		// Verificar que cada campo (excepto el ID) sea valido
		// Solo cuando no elimine, si elimino, no me importa como sean los campos
		if ($_POST['accion'] != 3 && (

			!validarNombrePersona($valores[0]) ||
			!validarTexto($valores[1])

			)) exit("invalid");

		// Validar ID, cuando no inserte (cuando modifique o elimine, solo en esos casos se pasa el id)
		// El ID siempre es el ultimo elemento de $valores,
		// Por tanto, esta linea no hace falta modificarla
		if ($_POST['accion'] != 1 && !validarNumeroEntero($valores[count($valores)-1]))
			exit( "invalid");

		if($_POST['accion'] == 1){
			include 'insertar.php';
			mthAgregar($tabla,$campos_tabla,$valores);
		}

		if($_POST['accion'] == 2){
			include 'actualizar.php';
			mthActualizar($tabla,$campos_tabla,$valores,$where);
		}

		if($_POST['accion'] == 3){
			include 'eliminar.php';
			mthEliminar($tabla,$where,$estado,$valores);
		}
	}

	if($_POST['tabla'] == 22){
		$where = "id_equipo=?";
		$tabla = 'equipos';
		$estado = 'estado_equipo=0';
		$campos_tabla = array('equipo','costo_click_equipo');
		// Verificar que cada campo (excepto el ID) sea valido
		// Solo cuando no elimine, si elimino, no me importa como sean los campos
		if ($_POST['accion'] != 3 && (

			!validarTexto($valores[0]) ||
			!validarPrecio($valores[1])

			)) exit("invalid");

		// Validar ID, cuando no inserte (cuando modifique o elimine, solo en esos casos se pasa el id)
		// El ID siempre es el ultimo elemento de $valores,
		// Por tanto, esta linea no hace falta modificarla
		if ($_POST['accion'] != 1 && !validarNumeroEntero($valores[count($valores)-1]))
			exit( "invalid");


		if($_POST['accion'] == 1){
			include 'insertar.php';
			mthAgregar($tabla,$campos_tabla,$valores);
		}

		if($_POST['accion'] == 2){
			include 'actualizar.php';
			mthActualizar($tabla,$campos_tabla,$valores,$where);
		}

		if($_POST['accion'] == 3){
			include 'eliminar.php';
			mthEliminar($tabla,$where,$estado,$valores);
		}
	}

	if($_POST['tabla'] == 23){
		$where = "id_actividad=?";
		$tabla = 'mano_obra';
		$estado = 'estado_obra=0';
		$campos_tabla = array('actividad','costo_hora', 'descripcion_actividad');
		// Verificar que cada campo (excepto el ID) sea valido
		// Solo cuando no elimine, si elimino, no me importa como sean los campos
		if ($_POST['accion'] != 3 && (

			!validarNombrePersona($valores[0]) ||
			!validarPrecio($valores[1]) ||
			!validarTexto($valores[2]) 
			)) exit("invalid");

		// Validar ID, cuando no inserte (cuando modifique o elimine, solo en esos casos se pasa el id)
		// El ID siempre es el ultimo elemento de $valores,
		// Por tanto, esta linea no hace falta modificarla
		if ($_POST['accion'] != 1 && !validarNumeroEntero($valores[count($valores)-1]))
			exit( "invalid");


		if($_POST['accion'] == 1){
			include 'insertar.php';
			mthAgregar($tabla,$campos_tabla,$valores);
		}

		if($_POST['accion'] == 2){
			include 'actualizar.php';
			mthActualizar($tabla,$campos_tabla,$valores,$where);
		}

		if($_POST['accion'] == 3){
			include 'eliminar.php';
			mthEliminar($tabla,$where,$estado,$valores);
		}
	}

	if($_POST['tabla'] == 30){
		$where = "id_conversacion=?";
		$tabla = 'mensajes';
		$estado = 'msj_leido=1';
		$campos_tabla = array('msj_leido');
		if($_POST['accion'] == 2){
			include 'actualizar.php';
			mthActualizar($tabla,$campos_tabla,$valores,$where);
		}
	}
	if($_POST['tabla'] == 31){
		$tabla = "archivos";
		$campos_tabla = array('nombre_archivo','archivo','tipo_archivo','id_conversacion');
		if($_POST['accion'] == 1){
			include 'insertar.php';
			mthAgregar($tabla,$campos_tabla,$valores);
		}
	}
	if($_POST['tabla'] == 32){
		$tabla = "carritos";
		$estado = 'estado_carrito=1';
		$where = "id_carrito=?";
		$campos_tabla = array('id_cliente','id_medida','cantidad','fecha_solicitud');
		if($_POST['accion'] == 1){
			include 'insertar.php';
			mthAgregar($tabla,$campos_tabla,$valores);
		}
		if($_POST['accion'] == 3){
			include 'eliminar.php';
			mthEliminar($tabla,$where,$estado,$valores);
		}
		if($_POST['accion'] == 4){
			include 'eliminar.php';
			$estado = 'recogido=1';
			mthEliminar($tabla,$where,$estado,$valores);
		}
	}
	if($_POST['tabla'] == 34){
		$tabla = "pedidos";
		$estado = "estado_pedido=1";
		$where = "id_pedido=?";
		$campos_tabla = array('id_archivo','fecha_pedido');
		if($_POST['accion'] == 1){
			include 'insertar.php';
			mthAgregar($tabla,$campos_tabla,$valores);
		}
		if($_POST['accion'] == 3){
			include 'eliminar.php';
			mthEliminar($tabla,$where,$estado,$valores);
		}
		if($_POST['accion'] == 4){
			include 'eliminar.php';
			$estado = 'recogido=1';
			mthEliminar($tabla,$where,$estado,$valores);
		}
	}
?>
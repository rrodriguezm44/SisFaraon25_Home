<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

// Verificar si el usuario está autenticado
if (isset($_SESSION['usuario'])) {
  $nombre_usuario = $_SESSION["usuario"]->nombre_usuario;
  $usuarioID = $_SESSION["usuario"]->id_usuario;
} else {
  //header("Location: login.php");
  exit();
}
?>
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Ingresos | Ventas</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Inicio</a></li>
          <li class="breadcrumb-item active">Ingresos-Ventas</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">

  <div class="row">

    <div class="col-lg-12">

      <div class="card card-primary card-outline card-outline-tabs">

        <div class="card-header p-0 border-bottom-0">

          <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">

            <li class="nav-item">
              <a class="nav-link active my-0" id="listado-ventas-tab" data-bs-toggle="tab" href="#listado-ventas"
                role="tab" aria-controls="listado-ventas" aria-selected="true"> <i class="fas fa-list"></i> Administrar Ingresos-Ventas</a>
            </li>

            <li class="nav-item">
              <a class="nav-link my-0" id="registrar-ventas-tab" data-bs-toggle="tab"
                href="#registrar-ventas" role="tab" aria-controls="registrar-ventas"
                aria-selected="false"><i class="fas fa-file-signature"></i> Crear Ingreso-Venta</a>
            </li>

          </ul>

        </div>

        <div class="card-body">
          <div class="tab-content" id="custom-tabs-four-tabContent">

            <!-- TAB CONTENT REGISTRO DE VENTAS -->
            <div class="tab-pane fade" id="registrar-ventas" role="tabpanel" aria-labelledby="registrar-ventas-tab">
              <h1>Registro | Ventas</h1>
              <!-- --------------------------------------------------------- -->
              <!-- COMPROBANTE DE VENTAS -->
              <!-- --------------------------------------------------------- -->
              <form id="frm-datos-registro-compras" class="needs-validation-registro-compras" novalidate>

                <input type="hidden" name="id_compra" id="id_compra" value="0">

                <div class="row mb-2">

                  <!-- CLIENTES -->
                  <div class="col-12 col-md-5 col-lg-3">

                    <div class="form-group mb-3">

                      <label class="col-form-label" for="selCliente">
                        <i class="fas fa-users fs-6"></i>
                        <span class="small">Clientes</span><span class="text-danger">*</span>
                      </label>

                      <select class="form-select form-select-sm" aria-label=".form-select-sm example" id="selCliente"
                        name="selCliente" required>
                        <option value="0"> ---Clientes--- </option>
                      </select>

                      <!-- <span class="input-group-text my-bg btnBuscarProveedor" style="cursor: pointer;max-height: 59px"
                        style="position: absolute">
                        <i class="fas fa-search fs-5 text-white  "></i>
                      </span> -->

                    </div>

                  </div>

                  <!-- SELECCIONAR TIPO DE DOCUMENTO -->
                  <div class="col-12 col-md-7 col-lg-6">
                    <div class="form-group mb-2">
                      <label class="col-form-label" for="selDocumentoVenta">
                        <i class="fas fa-file-alt fs-6"></i>
                        <span class="small">Documento</span><span class="text-danger">*</span>
                      </label>

                      <select class="form-select form-select-sm" aria-label=".form-select-sm example" id="selDocumentoVenta">
                        <option value="0">Seleccione Documento</option>
                        <option value="1" selected="true">Nota de Pago</option>
                        <option value="2">Factura</option>
                      </select>
                    </div>
                  </div>

                  <!-- FECHA DE VENTA -->
                  <div class="col-12 col-md-4 col-lg-3">
                    <div class="form-group mb-3">

                      <label class="col-form-label" for="iptFechaVenta">
                        <i class="fas fa-calendar fs-6"></i>
                        <span class="small">Fecha Venta</span><span class="text-danger">*</span>
                      </label>

                      <input type="date" class="form-control form-control-sm" id="iptFechaVenta" name="iptFechaVenta"
                        placeholder="Ingrese Fecha de Venta">
                      <input type="hidden" name="codUsuario" id="codUsuario" value="<?php echo $usuarioID; ?>">
                    </div>
                  </div>


                  <!-- SERIE -->
                  <div class="form-group">

                    <div class="row">

                      <div class="col-md-4">

                        <label for="iptNroSerie">Gestion</label>

                        <input type="text" min="0" name="iptEfectivo" id="iptNroSerie" class="form-control form-control-sm"
                          placeholder="<?php echo date("Y"); ?>" disabled>
                      </div>

                      <div class="col-md-8">

                        <label for="iptNroVenta">Nro Venta</label>

                        <input type="text" min="0" name="iptEfectivo" id="iptNroVenta" class="form-control form-control-sm"
                          placeholder="Nro Venta" disabled>

                      </div>

                    </div>

                  </div>

                  <!-- INPUT DE EFECTIVO ENTREGADO -->
                  <div class="form-group">
                    <label for="iptEfectivoRecibido">Efectivo recibido</label>
                    <input type="number" min="0" name="iptEfectivo" id="iptEfectivoRecibido"
                      class="form-control form-control-sm" placeholder="Cantidad de efectivo recibida">
                  </div>

                  <!-- INPUT CHECK DE EFECTIVO EXACTO -->
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="chkEfectivoExacto">
                    <label class="form-check-label" for="chkEfectivoExacto">
                      Efectivo Exacto
                    </label>
                  </div>

                  <!-- MOSTRAR MONTO EFECTIVO ENTREGADO Y EL VUELTO -->
                  <div class="row mt-2">

                    <div class="col-12">
                      <h6 class="text-start fw-bold">Monto Efectivo: Bs. <span id="EfectivoEntregado">0.00</span></h6>
                    </div>

                    <div class="col-12">
                      <h6 class="text-start text-danger fw-bold">Vuelto: Bs. <span id="Vuelto">0.00</span>
                      </h6>
                    </div>

                  </div>

                  <!-- MOSTRAR EL SUBTOTAL, IGV Y TOTAL DE LA VENTA -->
                  <div class="row">
                    <div class="col-md-7">
                      <span>TOTAL DESC.%</span>
                    </div>
                    <div class="col-md-5 text-right">
                      Bs. <span class="" id="boleta_descuento">0.00</span>
                    </div>

                    <div class="col-md-7">
                      <span>TOTAL</span>
                    </div>
                    <div class="col-md-5 text-right">
                      Bs. <span class="" id="boleta_total">0.00</span>
                    </div>
                  </div>

                  <!-- BUSCAR PRODUCTO -->
                  <div class="col-12 col-md-6 col-lg-3 my-lg-3">
                    <!-- <a class="btn btn-info  w-100 rounded btnBuscarProducto">
                                            BUSCAR PRODUCTOS
                                            <i class="fas fa-search fs-5 mx-2"></i>
                                        </a> -->

                    <a class="btn btn-info w-100 fw-bold btnBuscarProducto" style="position: relative;">
                      <span class="text-button">BUSCAR PRODUCTOS</span>
                      <span class="btn fw-bold icon-btn-custom">
                        <i class="fas fa-search fs-2"></i>
                      </span>
                    </a>
                  </div>

                  <!-- BOTONES: CANCELAR - GUARDAR -->
                  <div class="col-lg-9 text-right mt-3 ">
                    <a class="btn btn-danger w-25 fw-bold" id="btnCancelarCompra" style="position: relative;">
                      <span class="text-button">CANCELAR</span>
                      <span class="btn fw-bold icon-btn-danger">
                        <i class="fas fa-times-circle fs-5"></i>
                      </span>
                    </a>

                    <a class="btn btn-success w-25 fw-bold" id="btnGuardarCompra" style="position: relative;">
                      <span class="text-button">GUARDAR</span>
                      <span class="btn fw-bold icon-btn-success">
                        <i class="fas fa-save fs-5"></i>
                      </span>
                    </a>
                  </div>

                </div>

              </form>

              <!-- --------------------------------------------------------- -->
              <!--LISTADO DE PRODUCTOS -->
              <!-- --------------------------------------------------------- -->
              <div class="row mb-3">

                <!--LISTADO DE PRODUCTOS COMPRADOS -->
                <div class="col-md-12">
                  <table id="tbl_ListadoProductos" class="table  w-100 shadow border border-secondary">
                    <thead class="bg-main text-left">
                      <th></th>
                      <th>Cod Producto</th>
                      <th>Producto</th>
                      <th>Cantidad</th>
                      <th>Cantidad Temp</th>
                      <th>Costo Unit.</th>
                      <th>Costo Unit. Temp</th>
                      <th>Descuento</th>
                      <th>Descuento Temp</th>
                      <th>SubTotal</th>
                      <th>Total</th>
                    </thead>
                  </table>
                </div>

              </div>

              <!-- --------------------------------------------------------- -->
              <!--RESUMEN DE LA COMPRA -->
              <!-- --------------------------------------------------------- -->
              <div class="row">

                <div class="col-12 offset-md-6 col-md-6 offset-lg-8 col-lg-4">

                  <div class="card card-gray shadow float-right">

                    <div class="card-header">
                      <h3 class="card-title fs-6">RESUMEN</h3>
                    </div> <!-- ./ end card-header -->

                    <div class="card-body py-2">

                      <div class="row fw-bold">

                        <!-- OP. GRAVADAS -->
                        <div class="col-12">
                          <span>OP. GRAVADAS</span>
                          <span class="float-right" id="resumen_opes_gravadas">S/ 0.00</span>
                        </div>

                        <!-- OP. INAFECTAS -->
                        <div class="col-12">
                          <span>OP. INAFECTAS</span>
                          <span class="float-right" id="resumen_opes_inafectas">S/ 0.00</span>
                        </div>

                        <!-- OP. EXONERADAS -->
                        <div class="col-12">
                          <span>OP. EXONERADAS</span>
                          <span class="float-right" id="resumen_opes_exoneradas">S/
                            0.00</span>
                        </div>

                        <!-- SUBTOTAL -->
                        <div class="col-12">
                          <span>SUBTOTAL</span>
                          <span class="float-right" id="resumen_subtotal">S/ 0.00</span>
                        </div>

                        <!-- IGV -->
                        <div class="col-12">
                          <span>IGV</span>
                          <span class="float-right" id="resumen_total_igv">S/ 0.00</span>
                        </div>

                        <!-- DESCUENTO -->
                        <div class="col-12 text-danger">
                          <span>DESCUENTO</span>
                          <span class="float-right" id="resumen_total_descuento">S/ 0.00</span>
                          <hr class="m-1" />
                        </div>

                        <!-- TOTAL -->
                        <div class="col-12 fs-5">
                          <span>TOTAL</span>
                          <span class="float-right" id="resumen_total_venta">S/ 0.00</span>
                        </div>

                      </div>

                    </div>

                  </div>

                </div>

              </div>

            </div>

            <!-- TAB CONTENT LISTADO DE COMPRAS -->
            <div class="tab-pane fade active show" id="listado-ventas" role="tabpanel"
              aria-labelledby="listado-ventas-tab">
              <h1>Listado | Ventas</h1>
            </div>

          </div>
        </div>

      </div>

    </div>
  </div>
</div>
<!-- /.content -->

<!-- =============================================================================================================================
MODAL LISTADO DE PRODUCTOS
===============================================================================================================================-->
<div class="modal fade" id="mdlListadoProductos" role="dialog" tabindex="-1">

  <div class="modal-dialog modal-xl" role="document">

    <!-- contenido del modal -->
    <div class="modal-content">

      <!-- cabecera del modal -->
      <div class="modal-header bg-gray py-1">

        <h5 class="modal-title">Listado de Productos | Vender</h5>

        <button type="button" class="btn btn-danger text-white border-0 fs-5" data-bs-dismiss="modal">
          <i class="far fa-times-circle"></i>
        </button>

      </div>

      <!-- cuerpo del modal -->
      <div class="modal-body">

        <div class="row">

          <div class="col-12">
            <!--LISTADO DE PRODUCTOS -->
            <table id="tbl_productos" class="table table-striped w-100 shadow border border-secondary">
              <thead class="bg-main">
                <tr style="font-size: 15px;">
                  <th> </th> <!-- 0 -->
                  <th class="text-cetner"></th> <!-- 1 -->
                  <th>id</th> <!-- 2 -->
                  <th>Codigo</th> <!-- *3 -->
                  <th>Descripcion</th><!-- *4 -->
                  <th>Categoria</th><!-- *5 -->
                  <th>SubCateg.</th><!-- *6 -->
                  <th>Stock</th><!-- *7 -->
                  <th>P. Compra</th><!-- *8 -->
                  <th>P. Venta</th><!-- *9 -->
                  <th>Desct.%</th><!-- *10 -->
                  <th>Proveedor</th><!-- *11 -->
                  <th>P. Feria</th><!-- 12 -->
                  <th>P. Oferta</th><!-- 13 -->
                  <th>CategoriaId</th><!-- 14 -->
                  <th>SubCategoriaId</th><!-- 15 -->
                  <th>U.Medida</th><!-- 16 -->
                  <th>DocuCompra</th><!-- 17 -->
                  <th>ProvId</th><!-- 18 -->
                  <!--<th>Estado</th>  24 -->
                </tr>
              </thead>
              <tbody class="text-small">
              </tbody>
            </table>
          </div>

        </div>

      </div>

    </div>

  </div>

</div>
<!-- /. End -->

<script>
  var itemProducto = 1;
  $(document).ready(function() {

    fnc_CargarDataTableProductos();
    fnc_CargarDataTableListadoProductos();


    $('#iptFechaVenta').datetimepicker({
      format: 'YYYY-MM-DD',
      locale: moment.lang('es', {
        months: 'Enero_Febrero_Marzo_Abril_Mayo_Junio_Julio_Agosto_Septiembre_Octubre_Noviembre_Diciembre'
          .split('_'),
        monthsShort: 'Enero._Feb._Mar_Abr._May_Jun_Jul._Ago_Sept._Oct._Nov._Dec.'.split(
          '_'),
        weekdays: 'Domingo_Lunes_Martes_Miercoles_Jueves_Viernes_Sabado'.split('_'),
        weekdaysShort: 'Dom._Lun._Mar._Mier._Jue._Vier._Sab.'.split('_'),
        weekdaysMin: 'Do_Lu_Ma_Mi_Ju_Vi_Sa'.split('_')
      }),
      defaultDate: moment(),
    });

    /* ======================================================================================
  EVENTO PARA MODIFICAR LA CANTIDAD DEL PRODUCTOS A COMPRAR
  ======================================================================================*/
  $('#tbl_ListadoProductos tbody').on('change', '.iptCantidad', function() {

    cantidad_actual = $(this)[0]['value'];
    cod_producto_actual = $(this)[0]['attributes']['codigoproducto']['value'];


    $('#tbl_ListadoProductos').DataTable().rows().eq(0).each(function(index) {

      var row = $('#tbl_ListadoProductos').DataTable().row(index);

      var data = row.data();

      if (data['codigo_producto'] == cod_producto_actual) {

        // cantidad_actual
        $('#tbl_ListadoProductos').DataTable().cell(index, 4).data(cantidad_actual)

      }
    })

    fnc_ActualizarDatos();

  })

  /* ======================================================================================
  EVENTO PARA MODIFICAR EL COSTO UNITARIO DEL PRODUCTO A COMPRAR
  ======================================================================================*/
  $('#tbl_ListadoProductos tbody').on('change', '.iptCostoUnitario', function() {

    $costo_actual = $(this)[0]['value'];
    $cod_producto_actual = $(this)[0]['attributes']['codigoproducto']['value'];


    $('#tbl_ListadoProductos').DataTable().rows().eq(0).each(function(index) {

      var row = $('#tbl_ListadoProductos').DataTable().row(index);

      var data = row.data();

      if (data['codigo_producto'] == $cod_producto_actual) {

        $('#tbl_ListadoProductos').DataTable().cell(index, 6).data($costo_actual)

        // // obtener cantidad
        // $cantidad = $('#tbl_ListadoProductos').DataTable().cell(index, 4).data()

      }
    })

    fnc_ActualizarDatos();

  })

  /* ======================================================================================
  EVENTO PARA MODIFICAR EL DESCUENTO DEL PRODUCTOS A COMPRAR
  ======================================================================================*/
  $('#tbl_ListadoProductos tbody').on('change', '.iptDescuento', function() {

    $descuento_actual = $(this)[0]['value'];
    $cod_producto_actual = $(this)[0]['attributes']['codigoproducto']['value'];

    $('#tbl_ListadoProductos').DataTable().rows().eq(0).each(function(index) {

      var row = $('#tbl_ListadoProductos').DataTable().row(index);

      var data = row.data();

      if (data['codigo_producto'] == $cod_producto_actual) {

        $('#tbl_ListadoProductos').DataTable().cell(index, 8).data($descuento_actual)

        // // obtener cantidad
        // $cantidad = $('#tbl_ListadoProductos').DataTable().cell(index, 4).data()

        // //obtener costo unitario
        // $costo_unitario = $('#tbl_ListadoProductos').DataTable().cell(index, 6).data()

      }
    })

    fnc_ActualizarDatos();

  })

    $('#tbl_productos tbody').on('click', '.btnSeleccionarProducto', function() {
      fnc_SeleccionarProducto($("#tbl_productos").DataTable().row($(this).parents('tr')).data());
    })

    $(".btnBuscarProducto").on('click', function() {
      fnc_CargarDataTableProductos();
      $("#mdlListadoProductos").modal('show');
    })

    /* ======================================================================================
  EVENTO PARA ELIMINAR UN PRODUCTO DEL LISTADO
  ======================================================================================*/
  $('#tbl_ListadoProductos tbody').on('click', '.btnEliminarproducto', function() {
    $('#tbl_ListadoProductos').DataTable().row($(this).parents('tr')).remove().draw();
    fnc_ActualizarDatos();
  });

  }); //fin document ready

  /*===================================================================*/
  // C O N S U L T A   D E   P R O D U C T O S  (DATATABLE)
  /*===================================================================*/
  function fnc_CargarDataTableProductos() {

    //alert("dentro la funcion busqueda productos");

    if ($.fn.DataTable.isDataTable('#tbl_productos')) {
      $('#tbl_productos').DataTable().destroy();
      $('#tbl_productos tbody').empty();
    }

    $("#tbl_productos").DataTable({
      dom: 'Bfrtip',
      buttons: [{
          text: 'Agregar Producto Ventas',
          className: 'addNewRecord',
          action: function(e, dt, node, config) {
            $("#mdlGestionarProducto").modal('show')
          }
        },
        'pageLength'
      ],
      pageLength: [5, 10, 15, 30, 50, 100],
      pageLength: 10,
      ajax: {
        url: "ajax/productos_inventario.ajax.php",
        dataSrc: '',
        type: "POST",
        data: {
          'accion': 'listar_productos' //1: LISTAR PRODUCTOS
        },
      },
      scrollX: true,
      autoWidth: true,
      responsive: {
        details: {
          type: 'column'
        }
      },
      columnDefs: [{
          targets: 0,
          orderable: false,
          className: 'control'
        },
        {
          targets: [0, 2, 5, 6, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18],
          visible: false
        },
        {
          targets: 1,
          orderable: false,
          createdCell: function(td, cellData, rowData, row, col) {
            $(td).html(
              "<span class='btnSeleccionarProducto text-primary px-1' style='cursor:pointer;'>" +
              "<i class='fas fa-check-circle fs-6 text-center text-success'></i>" +
              "</span>")
          }
        },
        // {
        //   targets: 4,
        //   createdCell: function(td, cellData, rowData, row, col) {
        //     if (rowData['imagen'] != 'no_image.jpg') {
        //       $(td).html('<img src="vistas/assets/imagenes/productos/' + rowData['imagen'] +
        //         '" class="border text-center border-secondary zoom" style="object-fit: cover; width: 40px; height: 40px; transition: transform .2s;" alt="">'
        //       )
        //     } else {
        //       $(td).html(
        //         '<img src="vistas/assets/imagenes/no_image.jpg" class="border text-center border-secondary" style="object-fit: cover; width: 40px; height: 40px;" alt="">'
        //       )
        //     }
        //   }
        // },


      ],
      language: {
        url: "https://cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json"
      },
      initComplete: function(settings, json) {
        // El modal se mostrará cuando la tabla termine de cargar
        if (!$("#mdlListadoProductos").hasClass('show')) {
          $("#mdlListadoProductos").modal('show');
        }
      }
    })

    ajustarHeadersDataTables($("#tbl_productos"))

  }

  function ajustarHeadersDataTables(element) {

    var observer = window.ResizeObserver ? new ResizeObserver(function(entries) {
      entries.forEach(function(entry) {
        $(entry.target).DataTable().columns.adjust();
      });
    }) : null;

    // Function to add a datatable to the ResizeObserver entries array
    resizeHandler = function($table) {
      if (observer)
        observer.observe($table[0]);
    };

    // Initiate additional resize handling on datatable
    resizeHandler(element);

  }

  /*===================================================================*/
//CARGAR DATATABLE DE PRODUCTOS A COMPRAR
/*===================================================================*/
function fnc_CargarDataTableListadoProductos() {

  if ($.fn.DataTable.isDataTable('#tbl_ListadoProductos')) {
    $('#tbl_ListadoProductos').DataTable().destroy();
    $('#tbl_ListadoProductos tbody').empty();
  }

  $('#tbl_ListadoProductos').DataTable({
    dom: 'Bfrtip',
    buttons: ['pageLength'],
    pageLength: [5, 10, 15, 30, 50, 100],
    pageLength: 10,
    columnDefs: [{
        targets: [4, 6, 8],
        visible: false
      },
      {
        targets: [0],
        orderable: false
      }
    ],

    "columns": [{
        "data": "acciones"
      },
      {
        "data": "codigo_producto"
      },
      {
        "data": "producto"
      },
      {
        "data": "cantidad"
      },
      {
        "data": "cantidad_temp"
      },
      {
        "data": "costo_unitario"
      },
      {
        "data": "costo_unitario_temp"
      },
      {
        "data": "descuento"
      },
      {
        "data": "descuento_temp"
      },
      {
        "data": "subTotal"
      },
      {
        "data": "total"
      }
    ],
    // "order": [
    //     [1, 'desc']
    // ],

    fixedColumns: {
      left: 2,
      right: 1
    },
    scrollX: true,
    "language": {
      "url": "https://cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json"
    }
  });

  ajustarHeadersDataTables($("#tbl_ListadoProductos"))
}

  function CargarProductos(producto = "") {

    /*===================================================================*/
    // AUMENTAMOS LA CANTIDAD SI EL PRODUCTO YA EXISTE EN EL LISTADO
    /*===================================================================*/
    $('#tbl_ListadoProductos').DataTable().rows().eq(0).each(function(index) {

      var row = $('#tbl_ListadoProductos').DataTable().row(index);
      var data = row.data();

      if (producto == data['codigo_producto']) {
        mensajeToast("warning", "El producto la fue agregado al listado");
        exit;
      }
    })


    $.ajax({
      url: "ajax/productos_inventario.ajax.php",
      method: "POST",
      data: {
        'accion': 'obtener_producto', //BUSCAR PRODUCTOS POR SU CODIGO DE BARRAS
        'codigo_producto': producto
      },
      dataType: 'json',
      success: function(respuesta) {

        /*===================================================================*/
        //SI LA RESPUESTA ES VERDADERO, TRAE ALGUN DATO
        /*===================================================================*/
        if (respuesta) {

          $('#tbl_ListadoProductos').DataTable().row.add({
            'acciones': "<center>" +
              "<span class='btnEliminarproducto text-danger px-1'style='cursor:pointer;' data-bs-toggle='tooltip' data-bs-placement='top' title='Eliminar producto'> " +
              "<i class='fas fa-trash fs-6'> </i> " +
              "</span>" +
              "</center>",
            'codigo_producto': respuesta['codigo_producto'],
            'producto': respuesta['nombre'],
            'cantidad': '<input min="0" type="number" step="0.01" onkeypress="return (event.charCode == 8 || event.charCode == 0) ? null : (event.charCode >= 46 && event.charCode <= 57) || event.charCode == 13" style="width:80px; height:28px;" codigoProducto = "' +
              respuesta['codigo_producto'] +
              '" class="form-control text-center iptCantidad p-0 m-0 px-2" value="1">',
            'cantidad_temp': 1,
            'costo_unitario': '<input min="0" type="number" step="0.01" onkeypress="return (event.charCode == 8 || event.charCode == 0) ? null : (event.charCode >= 46 && event.charCode <= 57) || event.charCode == 13" style="width:80px; height:28px;" codigoProducto = "' +
              respuesta['codigo_producto'] +
              '" class="form-control text-center iptCostoUnitario p-0 m-0 px-2" value="' +
              respuesta['precio_compra'] + '">',
            'costo_unitario_temp': respuesta['precio_compra'],
            'descuento': '<input min="0" type="number" step="0.01" onkeypress="return (event.charCode == 8 || event.charCode == 0) ? null : (event.charCode >= 46 && event.charCode <= 57) || event.charCode == 13" style="width:80px; height:28px;" codigoProducto = "' +
              respuesta['codigo_producto'] +
              '" class="form-control text-center iptDescuento p-0 m-0 px-2" value="0">',
            'descuento_temp': 0,
            'subTotal': 0,
            'total': 0


          }).draw();

          fnc_ActualizarDatos();
          mensajeToast("success", "Producto agreggado")

        } else {
          mensajeToast('error', 'EL PRODUCTO NO EXISTE O NO TIENE STOCK');
        }



      }
    });
  }

  function fnc_ActualizarDatos() {

    $total_subtotal = 0;
    $total_impuesto = 0;
    $total_descuento = 0.00;
    $total_compra = 0.00;

    $('#tbl_ListadoProductos').DataTable().rows().eq(0).each(function(index) {

      var row = $('#tbl_ListadoProductos').DataTable().row(index);

      var data = row.data();

      // obtener cantidad
      $cantidad = $('#tbl_ListadoProductos').DataTable().cell(index, 4).data()

      //obtener costo unitario
      $costo_unitario = $('#tbl_ListadoProductos').DataTable().cell(index, 6).data()

      //obtener costo unitario
      $descuento = $('#tbl_ListadoProductos').DataTable().cell(index, 8).data()

      $subtotal = ($costo_unitario * $cantidad);
      $total = $subtotal - $descuento;

      
      $total_subtotal = $total_subtotal + $subtotal;
      $total_compra = $total_compra + $total;
      $total_descuento = $total_descuento + parseFloat($descuento)
      console.log("🚀 ~ file: compras.php:1495 ~ $ ~ $total_descuento:", $total_descuento)

      $('#tbl_ListadoProductos').DataTable().cell(index, 9).data(parseFloat($subtotal).toFixed(2))
      $('#tbl_ListadoProductos').DataTable().cell(index, 10).data(parseFloat($total).toFixed(2));

    })

    // $("#resumen_opes_gravadas").html($("#simbolo_moneda").val() + ' ' + $ope_gravadas.toFixed(2));
    // $("#resumen_opes_exoneradas").html($("#simbolo_moneda").val() + ' ' + $ope_exoneradas.toFixed(2));
    // $("#resumen_opes_inafectas").html($("#simbolo_moneda").val() + ' ' + $ope_inafectas.toFixed(2));
    // $("#resumen_subtotal").html($("#simbolo_moneda").val() + ' ' + $total_subtotal.toFixed(2));
    // $("#resumen_total_igv").html($("#simbolo_moneda").val() + ' ' + $total_impuesto.toFixed(2));
    // $("#resumen_total_descuento").html($("#simbolo_moneda").val() + ' ' + $total_descuento.toFixed(2));
    // $("#resumen_total_venta").html($("#simbolo_moneda").val() + ' ' + $total_compra.toFixed(2));

  }

  function fnc_SeleccionarProducto(data) {
    //alert("Producto seleccionado: " + data["codigo_producto"]);
    CargarProductos(data["codigo_producto"])
  }
</script>
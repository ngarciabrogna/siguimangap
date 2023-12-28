<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- footer -->
<!-- ============================================================== -->
<footer class="footer">
    © 2021-<?php $year = date("Y"); echo $year; ?> SiquimanGAP | Gestion de Actividades & Personas
</footer>
<!-- ============================================================== -->
<!-- End footer -->
<!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Page wrapper  -->
<!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->

<!-- All Jquery -->
<!-- ============================================================== -->





<script src="<?php echo base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="<?php echo base_url() ?>assets/plugins/bootstrap/js/popper.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<!-- slimscrollbar scrollbar JavaScript -->
<script src="<?php echo base_url() ?>assets/js/jquery.slimscroll.js"></script>
<!--Wave Effects -->
<script src="<?php echo base_url() ?>assets/js/waves.js"></script>
<!--Menu sidebar -->
<script src="<?php echo base_url() ?>assets/js/sidebarmenu.js"></script>


<!--stickey kit -->
<!--  ????????-->
<script src="<?php echo base_url() ?>assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/sparkline/jquery.sparkline.min.js"></script>

<script src="<?php echo base_url() ?>assets/js/clock.js"></script> <!-- El reloj del amor-->

<!--Custom JavaScript -->
<script src="<?php echo base_url() ?>assets/js/custom.min.js"></script>
<!-- ============================================================== -->

<!-- sweet aleret -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<!--Chart-->
<script src='https://cdn.plot.ly/plotly-latest.min.js'></script>


<script src="<?php echo base_url(); ?>assets/plugins/chart/Chart.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/chart/Chart.min.js"></script>

<!-- ============================================================== -->
<!-- Style switcher -->
<!-- ============================================================== -->
<script src="<?php echo base_url() ?>assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
<!-- ============================================================== -->
<!-- Calendar JavaScript -->
<script src="<?php echo base_url() ?>assets/plugins/calendar/jquery-ui.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/moment/moment.js"></script>
<script src='<?php echo base_url() ?>assets/plugins/calendar/dist/fullcalendar.min.js'></script>
<script src="<?php echo base_url() ?>assets/plugins/calendar/dist/cal-init.js"></script>
<!-- ============================================================== -->
<!-- Footable -->
<script src="<?php echo base_url() ?>assets/plugins/footable/js/footable.all.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/bootstrap-select/bootstrap-select.min.js" type="text/javascript"></script>
<!--FooTable init-->
<script src="<?php echo base_url() ?>assets/js/footable-init.js"></script>
<!-- jQuery peity -->
<script src="<?php echo base_url() ?>assets/plugins/tablesaw-master/dist/tablesaw.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/tablesaw-master/dist/tablesaw-init.js"></script>
<!-- datatable-->
<script src="<?php echo base_url() ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>


<!-- iCHECK-->
<script src="<?php echo base_url() ?>assets/plugins/icheck/icheck.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/icheck/icheck.init.js"></script>

<!-- pop up imagenesss-->
<script src="<?php echo base_url() ?>assets/plugins/Magnific-Popup-master/dist/jquery.magnific-popup.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/Magnific-Popup-master/dist/jquery.magnific-popup-init.js"></script>

<script src="<?php echo base_url() ?>assets/js/validation.js"></script>


<script>
    $(document).ready(function() {
        var base_url = "<?php echo base_url(); ?>";
        var year1 = (new Date).getFullYear();

        elemento = document.getElementById("grafico");
        if (elemento) {


            dataGrafico(base_url, year1);
            $("#year1").on("change", function() {
                yearselect = $(this).val();
                dataGrafico(base_url, yearselect);

            });
        }
        var year2 = (new Date).getFullYear();
        elemento1 = document.getElementById("graficoPaquete");
        if (elemento1) {
            paquetesGrafico(base_url, year2);
            $("#year2").on("change", function() {
                yearselect = $(this).val();
                paquetesGrafico(base_url, yearselect);

            });
        }

        var yearCanceladas = (new Date).getFullYear();
        elemento2 = document.getElementById("graficoCanceladas");
        if (elemento2) {
            dataGraficoCanceladas(base_url, yearCanceladas);
            $("#yearCanceladas").on("change", function() {
                yearselectCancel = $(this).val();
                dataGraficoCanceladas(base_url, yearselectCancel);

            });

        }

        var yearCanceladas = (new Date).getFullYear();
        elemento3 = document.getElementById("graficoEmpresasCanceladas");
        if (elemento3) {
            empresasCanceladas(base_url, yearCanceladas);
            $("#yearCanceladas").on("change", function() {
                yearselectCancel = $(this).val();
                empresasCanceladas(base_url, yearselectCancel);

            });
        }
        var yearPasajero = (new Date).getFullYear();
        elemento3 = document.getElementById("graficoEmpresas");
        if (elemento3) {
            dataGraficoPasajeros(base_url, yearPasajero);
            $("#yearPasajero").on("change", function() {
                yearselectPasajero = $(this).val();
                dataGraficoPasajeros(base_url, yearselectPasajero);

            });
        }
        var yearPasajero = (new Date).getFullYear();
        elemento4 = document.getElementById("graficoCoordinador");
        if (elemento4) {
            coordinadoresGrupo(base_url, yearPasajero);
            $("#yearPasajero").on("change", function() {
                yearselectPasajero = $(this).val();
                coordinadoresGrupo(base_url, yearselectPasajero);

            });
        }
        var yearPasajero = (new Date).getFullYear();
        elemento5 = document.getElementById("graficoEmpresasGrupos");
        if (elemento5) {
            empresasGrupos(base_url, yearPasajero);
            $("#yearPasajero").on("change", function() {
                yearselectPasajero = $(this).val();
                empresasGrupos(base_url, yearselectPasajero);

            });
        }

        var yearPasajero = (new Date).getFullYear();
        elemento6 = document.getElementById("graficoPasajeros");
        if (elemento6) {
            datGraficoPasajeros(base_url, yearPasajero);
            $("#yearPasajero").on("change", function() {
                yearselectPasajero = $(this).val();
                datGraficoPasajeros(base_url, yearselectPasajero);

            });
        }
        var yearPasajero = (new Date).getFullYear();
        elemento7 = document.getElementById("graficoEmpresasConcretas");
        if (elemento7) {
            empresasConcretas(base_url, yearPasajero);
            $("#yearPasajero").on("change", function() {
                yearselectPasajero = $(this).val();
                empresasConcretas(base_url, yearselectPasajero);

            });
        }
        elemento8 = document.getElementById("graficoAnio");
        if (elemento8) {
            dataGraficoAnio(base_url);
        }
        elemento9 = document.getElementById("graficoPasajerosAnio");
        if (elemento9) {
            datGraficoPasajerosAnio(base_url);
        }

        elemento10 = document.getElementById("graficoCanceladasAnio");
        if (elemento10) {
            dataGraficoCanceladasAnio(base_url);

        }





        $('#myTable').DataTable();
        $(document).ready(function() {
            var table = $('#example').DataTable({
                "columnDefs": [{
                    "visible": false,
                    "targets": 2
                }],
                "order": [
                    [2, 'asc']
                ],
                "displayLength": 25,
                "drawCallback": function(settings) {
                    var api = this.api();
                    var rows = api.rows({
                        page: 'current'
                    }).nodes();
                    var last = null;
                    api.column(2, {
                        page: 'current'
                    }).data().each(function(group, i) {
                        if (last !== group) {
                            $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
                            last = group;
                        }
                    });
                }
            });
            // Order by the grouping
            $('#example tbody').on('click', 'tr.group', function() {
                var currentOrder = table.order()[0];
                if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                    table.order([2, 'desc']).draw();
                } else {
                    table.order([2, 'asc']).draw();
                }
            });
        });
    });
    $('#example23').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
</script>



<!-- callback del modalcito-->
<script>
    ///////////////////////
    //Modales ABM Gestion//
    //////////////////////

    $(document).ready(function() {
        $(document).on('click', '.editarrowbtn', function() {
            var idemp = $(this).attr("id");

            $.ajax({
                url: "<?php echo base_url(); ?>empleados/main/modal",
                method: "POST",
                data: {
                    idemp: idemp
                },
                dataType: "Json",
                success: function(data) {
                    $('#idEmpleado').val(data.id);
                    $('#nombreEdit').val(data.nombre);
                    $('#dniEdit').val(data.dni);
                    $('#direccionEdit').val(data.direccion);
                    $('#telefonoEdit').val(data.telefono);
                    $('#edadEdit').val(data.edad);
                    $('#edit-contact').modal('show');
                }


            })
        });

        $(document).on('click', '.editarUsuarios', function() {
            var idusuarios = $(this).attr("id");

            $.ajax({
                url: "<?php echo base_url(); ?>usuarios/main/modal",
                method: "POST",
                data: {
                    idusuarios: idusuarios
                },
                dataType: "Json",
                success: function(data) {
                    console.log(data);
                    $('#idUsuario').val(data.id);
                    $('#editempleado').val(data.empleado);
                    $('#rolEdit').val(data.rol);
                    $('#usernameEdit').val(data.username);
                    $('#passwordEdit').val(data.password);
                    $('#password2').val(data.password);
                    $('#edit-usuario').modal('show');


                }


            })
        });


        $(document).on('click', '.editarPermisos', function() {
            var idpermiso = $(this).attr("id");

            $.ajax({
                url: "<?php echo base_url(); ?>permisos/main/modal",
                method: "POST",
                data: {
                    idpermiso: idpermiso
                },
                dataType: "Json",
                success: function(data) {
                    $('#idPermiso').val(data.id);
                    $('#editrol').val(data.rol);
                    $('#editmenu').val(data.menu);
                    if (data.leer == 0) {
                        radiobtn1 = document.getElementById("editleer1");
                        radiobtn1.checked = true;
                    } else {
                        radiobtn = document.getElementById("editleer");
                        radiobtn.checked = true;
                    }
                    if (data.insertar == 0) {
                        radiobtn3 = document.getElementById("editinsertar1");
                        radiobtn3.checked = true;
                    } else {
                        radiobtn2 = document.getElementById("editinsertar");
                        radiobtn2.checked = true;
                    }
                    if (data.actualizar == 0) {
                        radiobtn5 = document.getElementById("editactualizar1");
                        radiobtn5.checked = true;
                    } else {
                        radiobtn4 = document.getElementById("editactualizar");
                        radiobtn4.checked = true;
                    }
                    if (data.borrar == 0) {
                        radiobtn7 = document.getElementById("editborrar1");
                        radiobtn7.checked = true;
                    } else {
                        radiobtn6 = document.getElementById("editborrar");
                        radiobtn6.checked = true;
                    }

                    $('#edit-permiso').modal('show');


                }


            })
        });


        $(document).on('click', '.editActividad', function() {
            var idactividad = $(this).attr("id");

            $.ajax({
                url: "<?php echo base_url(); ?>actividades/main/modal",
                method: "POST",
                data: {
                    idactividad: idactividad
                },
                dataType: "Json",
                success: function(data) {

                    $('#idActividad').val(data.id);
                    $('#nombreEdit').val(data.nombre);
                    $('#descripcionEdit').val(data.descripcion)
                    $('#edit-actividad').modal('show');


                }


            })
        });

        $(document).on('click', '.editEmpresa', function() {
            var idempresa = $(this).attr("id");

            $.ajax({
                url: "<?php echo base_url(); ?>empresas/main/modal",
                method: "POST",
                data: {
                    idempresa: idempresa
                },
                dataType: "Json",
                success: function(data) {
                    $('#idEmpresa').val(data.id);
                    $('#nombreEdit').val(data.nombre);
                    $('#cuitEdit').val(data.cuit);
                    $('#telefonoEdit').val(data.telefono);
                    $('#razonEdit').val(data.razon);
                    $('#edit-empresa').modal('show');
                }


            })
        });


        $(document).on('click', '.editcoordinador', function() {
            var idcoordinador = $(this).attr("id");

            $.ajax({
                url: "<?php echo base_url(); ?>coordinadores/main/modal",
                method: "POST",
                data: {
                    idcoordinador: idcoordinador
                },
                dataType: "Json",
                success: function(data) {
                    console.log(data);
                    $('#idCoordinador').val(data.id);
                    $('#empresaEdit').val(data.empresa);
                    $('#nombreEdit').val(data.nombre);
                    $('#dniEdit').val(data.dni);

                    $('#edit-coordinador').modal('show');
                }


            })
        });
        $(document).on('click', '.editComentario', function() {
            var idcomentario = $(this).attr("id");

            $.ajax({
                url: "<?php echo base_url(); ?>coordinadores/main/getComentariosEdit",
                method: "POST",
                data: {
                    idcomentario: idcomentario
                },
                dataType: "Json",
                success: function(data) {
                    $('#idcomentario').val(idcomentario);
                    $('#comentarioEdit').val(data.descripcion);


                    $('#edit-comentario').modal('show');
                }


            })
        });
        $(document).on('click', '.comentario', function() {
            var idgrupo = $(this).attr("id");

            $.ajax({
                url: "<?php echo base_url(); ?>planilla_grupos/main/getCoor",
                method: "POST",
                data: {
                    idgrupo: idgrupo
                },
                dataType: "Json",
                success: function(data) {
                    $('#grupo').val(data.id);
                    $('#coordinador').val(data.id_coordinador);


                    $('#comentario').modal('show');
                }


            })
        });
        $(document).on('click', '.comentarioCarga', function() {
            var idcoordinadorCarga = $(this).attr("id");


            $('#coordinadorCarga').val(idcoordinadorCarga);



            $('#comentarioCarga').modal('show');



        });
        data = 1;
        $.ajax({
            url: "<?php echo base_url(); ?>grupos/main/sumas",
            method: "POST",
            data: data,
            dataType: "Json",

            success: function(data) {
                if (data.choferes == 0) {
                    $('#coor').html(data.coordinadores);
                    $('#eya').html(data.eya);
                } else {
                    $('#cho').html(data.choferes);
                    $('#coor').html(data.coordinadores);
                    $('#eya').html(data.eya);
                }
            }


        })

        //////////////////////////
        //FINModales ABM Gestion//
        //////////////////////////

        $.post('<?php echo base_url(); ?>reservas/main/cargar', function(data) {
            // alert(data);
            $('#calendar1').fullCalendar({

                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: '' //month,
                },
                eventLimit: true,
                eventLimitText: "Mas",
                events: $.parseJSON(data),
                eventClick: function(calEvent, JsEvent, view) {


                    $('#idReserva').val(calEvent.id);
                    $('#empresa').val(calEvent.title);
                    $('#paquete').val(calEvent.paquete);
                    $('#fecha').val(calEvent.start.format("YYYY-MM-DD"));
                    $('#pasajeros').val(calEvent.pasajeros);
                    $('#idR').val(calEvent.id);


                    $('#modalEventos').modal();
                },
                dayClick: function(event, JsEvent, view) {

                    $('#ffecha').val(event.format("YYYY-MM-DD"));
                    $('#agregarEvento').modal();


                },
                editable: true,
                eventDrop: function(event) {

                    var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD:mm:ss");

                    var id = event.id;
                    $.ajax({
                        url: "<?php echo base_url(); ?>reservas/main/actualizar1",
                        type: "POST",
                        data: {
                            start: start,
                            id: id
                        },
                        success: function() {
                            calendar.fullCalendar('refetchEvents');

                        }

                    })


                },

            });
        });


    });
    var randomColor = '#' + Math.floor(Math.random() * 16777215).toString(16);

    function generateRandomColor() {
        var randomColor = '#' + Math.floor(Math.random() * 16777215).toString(16);
        return randomColor;

    }
    var someDiv;
    document.body.style.backgroundColor = generateRandomColor() // -> #e1ac94
    someDiv.style.color = generateRandomColor() // -> #34c7aa
    // Grafico reservas completadas
    function dataGrafico(base_url, year1) {

        namesMonth = ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"];
        $.ajax({
            url: base_url + "reportes/main/getData",
            type: "POST",
            data: {
                year1: year1
            },
            dataType: "json",
            success: function(data) {

                var meses = new Array();
                var cantidades = new Array();
                var color1 = new Array();
                $.each(data, function(key, value) {
                    meses.push(namesMonth[value.mes - 1]);
                    valor = Number(value.cantidad);
                    cantidades.push(valor);
                    color1.push(generateRandomColor());
                });
                graficar(meses, cantidades, year1, color1);
            }
        });

    }

    function graficar(meses, cantidades, year1, color1) {


        const data = [{
            x: meses,
            y: cantidades,
            type: 'bar',
            marker: {
                color: color1
            }
        }];

        const layout = {
            yaxis: {
                autotick: true,
                ticks: 'outside',
                tick0: 1,
                title: 'CANTIDAD DE RESERVAS',
            },
            xaxis: {
                autotick: false,
                ticks: 'outside',
                tick0: 1,
                title: 'MESES',
            },
            title: 'Reservas completadas mensualmente',
        };

        Plotly.newPlot('grafico', data, layout, {
            displayModeBar: false
        });
    }



    function dataGraficoAnio(base_url) {


        $.ajax({
            url: base_url + "reportes/main/getDataAnio",
            type: "POST",
            dataType: "json",
            success: function(data) {

                var anios = new Array();
                var cantidadesA = new Array();
                var color1 = new Array();
                $.each(data, function(key, value) {

                    anios.push(value.anio);
                    valor = Number(value.cantidadAnio);
                    cantidadesA.push(valor);
                    color1.push(generateRandomColor());
                });
                graficarAnio(anios, cantidadesA, color1);
            }
        });

    }

    function graficarAnio(anios, cantidadesA, color1) {

        const data = [{
            x: anios,
            y: cantidadesA,
            type: 'bar',
            marker: {
                color: color1
            }
        }];

        const layout = {
            yaxis: {
                autotick: true,
                ticks: 'outside',
                tick0: 1,
                title: 'CANTIDAD DE RESERVAS',
            },
            xaxis: {
                autotick: false,
                ticks: 'outside',
                tick0: 1,
                title: 'AÑOS',
            },
            title: 'Reservas concretadas anualmente',
        };

        Plotly.newPlot('graficoAnio', data, layout, {
            displayModeBar: false
        });
    }


    //Reservas canceladas
    function dataGraficoCanceladas(base_url, yearCanceladas) {

        namesMonth = ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"];
        $.ajax({
            url: base_url + "reportes/main/getCanceladas",
            type: "POST",
            data: {
                yearCanceladas: yearCanceladas
            },
            dataType: "json",
            success: function(data) {

                var meses = new Array();
                var canceladas = new Array();
                var color4 = new Array();
                $.each(data, function(key, value) {
                    meses.push(namesMonth[value.mes - 1]);
                    valor = Number(value.canceladaa);
                    canceladas.push(valor);
                    color4.push(generateRandomColor());

                });
                graficarCanceladas(meses, canceladas, yearCanceladas, color4);
            }
        });

    }

    function graficarCanceladas(meses, canceladas, yearCanceladas, color4) {

        const data = [{
            x: meses,
            y: canceladas,
            type: 'bar',
            marker: {
                color: color4
            }
        }];

        const layout = {
            yaxis: {
                autotick: false,
                ticks: 'outside',
                tick0: 1,
                title: 'CANTIDAD RESERVAS CANCELADAS'
            },
            xaxis: {
                autotick: false,
                ticks: 'outside',
                tick0: 1,
                title: 'MESES'
            },
            title: 'Reservas canceladas mensualmente',
        };

        Plotly.newPlot('graficoCanceladas', data, layout, {
            displayModeBar: false
        });

    }
    //GRAFICO COORDINADORES a ver 
    function coordinadoresGrupo(base_url, yearPasajero) {

        $.ajax({
            url: base_url + "reportes/main/getCoordinadores",
            type: "POST",
            data: {
                yearPasajero: yearPasajero
            },
            dataType: "json",
            success: function(data) {

                var coordinadores = new Array();
                var grupos = new Array();
                var color1 = new Array();
                $.each(data, function(key, value) {



                    valor1 = value.coordinador;
                    coordinadores.push(valor1);

                    valor = Number(value.grupo);
                    grupos.push(valor);
                    color1.push(generateRandomColor());

                });
                graficarCoor(coordinadores, grupos, yearPasajero, color1);
            }
        });

    }

    function graficarCoor(coordinadores, grupos, yearPasajero, color1) {

        const data = [{
            x: coordinadores,
            y: grupos,
            type: 'bar',
            marker: {
                color: color1
            }
        }];

        const layout = {
            yaxis: {
                autotick: false,
                ticks: 'outside',
                tick0: 1,
                title: 'CANTIDAD GRUPOS'
            },
            xaxis: {
                autotick: false,
                ticks: 'outside',
                tick0: 1,
                title: 'COORDINADORES'
            },
            title: 'Grupos por coordinador',
        };

        Plotly.newPlot('graficoCoordinador', data, layout, {
            displayModeBar: false
        });

    }

    function empresasCanceladas(base_url, yearCanceladas) {


        $.ajax({
            url: base_url + "reportes/main/getEmpresasCanceladas",
            type: "POST",
            data: {
                yearCanceladas: yearCanceladas
            },
            dataType: "json",
            success: function(data) {

                var empresas = new Array();
                var canceladas = new Array();
                var color4 = new Array();
                $.each(data, function(key, value) {

                    valor1 = value.empresa;
                    empresas.push(valor1);

                    valor = Number(value.reserva);
                    canceladas.push(valor);
                    color4.push(generateRandomColor());

                });
                graficarEmpresasCanceladas(empresas, canceladas, yearCanceladas, color4);
            }
        });

    }

    function graficarEmpresasCanceladas(empresas, canceladas, yearCanceladas, color4) {

        const data = [{
            x: empresas,
            y: canceladas,
            type: 'bar',
            marker: {
                color: color4
            }
        }];

        const layout = {
            yaxis: {
                autotick: false,
                ticks: 'outside',
                tick0: 1,
                title: 'CANTIDAD RESERVAS CANCELADAS'
            },
            xaxis: {
                autotick: false,
                ticks: 'outside',
                tick0: 1,
                title: 'EMPRESAS'
            },
            title: 'reservas canceladas por empresa',
        };

        Plotly.newPlot('graficoEmpresasCanceladas', data, layout, {
            displayModeBar: false
        });

    }

    function dataGraficoCanceladasAnio(base_url) {


        $.ajax({
            url: base_url + "reportes/main/getCanceladasAnio",
            type: "POST",
            dataType: "json",
            success: function(data) {

                var anios = new Array();
                var canceladasA = new Array();
                var color4 = new Array();
                $.each(data, function(key, value) {

                    anios.push(value.anio);
                    valor = Number(value.canceladaAnio);
                    canceladasA.push(valor);
                    color4.push(generateRandomColor());
                });
                graficarCanceladasAnio(anios, canceladasA, color4);
            }
        });

    }

    function graficarCanceladasAnio(anios, canceladasA, color4) {

        const data = [{
            x: anios,
            y: canceladasA,
            type: 'bar',
            marker: {
                color: color4
            }
        }];

        const layout = {
            yaxis: {
                autotick: true,
                ticks: 'outside',
                tick0: 1,
                title: 'CANTIDAD RESERVAS CANCELADAS'
            },
            xaxis: {
                autotick: false,
                ticks: 'outside',
                tick0: 1,
                title: 'AÑOS'
            },
            title: 'Reservas canceladas anualmente',
        };

        Plotly.newPlot('graficoCanceladasAnio', data, layout, {
            displayModeBar: false
        });
    }







    // Grafico pasajeros
    function datGraficoPasajeros(base_url, yearPasajero) {

        namesMonth = ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"];
        $.ajax({
            url: base_url + "reportes/main/getDataPasajeros",
            type: "POST",
            data: {
                yearPasajero: yearPasajero
            },
            dataType: "json",
            success: function(data) {

                var mesesPasajeros = new Array();
                var cantidadesPasajeros = new Array();
                var color3 = new Array();
                $.each(data, function(key, value) {
                    mesesPasajeros.push(namesMonth[value.mesP - 1]);
                    valor = Number(value.cantidadP);
                    cantidadesPasajeros.push(valor);
                    color3.push(generateRandomColor());
                });
                graficarPasajeros(mesesPasajeros, cantidadesPasajeros, yearPasajero, color3);
            }
        });

    }

    function graficarPasajeros(mesesPasajeros, cantidadesPasajeros, yearPasajero, color3) {

        const data = [{
            x: mesesPasajeros,
            y: cantidadesPasajeros,
            type: 'bar',
            marker: {
                color: color3
            }
        }];

        const layout = {

            yaxis: {
                autotick: true,
                ticks: 'outside',
                tick0: 50,
                title: 'PASAJEROS'
            },
            xaxis: {
                autotick: true,
                ticks: 'outside',
                tick0: 50,
                title: 'MESES'
            },

            title: 'cantidad de pasajeros',
        };

        Plotly.newPlot('graficoPasajeros', data, layout, {
            displayModeBar: false
        });
    }

    function datGraficoPasajerosAnio(base_url) {


        $.ajax({
            url: base_url + "reportes/main/getDataPasajerosAnio",
            type: "POST",
            dataType: "json",
            success: function(data) {

                var anios = new Array();
                var cantidadesPasajeros = new Array();
                var color4 = new Array();
                $.each(data, function(key, value) {

                    anios.push(value.anio);
                    valor = Number(value.cantidadP);
                    cantidadesPasajeros.push(valor);
                    color4.push(generateRandomColor());
                });
                graficarPasajerosAnio(anios, cantidadesPasajeros, color4);
            }
        });

    }

    function graficarPasajerosAnio(anios, cantidadesPasajeros, color4) {

        const data = [{
            x: anios,
            y: cantidadesPasajeros,
            type: 'bar',
            marker: {
                color: color4
            }
        }];

        const layout = {
            yaxis: {
                autotick: true,
                ticks: 'outside',
                tick0: 1,
                tile: 'PASAJEROS'
            },
            xaxis: {
                autotick: false,
                ticks: 'outside',
                tick0: 1,
                tile: 'AÑOS'
            },
            title: 'pasajeros por año',
        };

        Plotly.newPlot('graficoPasajerosAnio', data, layout, {
            displayModeBar: false
        });
    }



    //Reporte empresa
    function dataGraficoPasajeros(base_url, yearPasajero) {


        $.ajax({
            url: base_url + "reportes/main/getDataEmpresas",
            type: "POST",
            data: {
                yearPasajero: yearPasajero
            },
            dataType: "json",
            success: function(data) {

                var empresas = new Array();
                var cantidadesGrupos = new Array();
                var color2 = new Array();
                $.each(data, function(key, value) {

                    valor1 = value.empresa;
                    empresas.push(valor1);

                    valor = Number(value.grupo);
                    cantidadesGrupos.push(valor);
                    color2.push(generateRandomColor());

                });
                graficarEmpresas(empresas, cantidadesGrupos, yearPasajero, color2);
            }
        });

    }


    function graficarEmpresas(empresass, cantidadesGrupos, yearPasajero, color2) {

        const data = [{
            x: empresass,
            y: cantidadesGrupos,
            type: 'bar',
            marker: {
                color: color2
            }
        }];

        const layout = {
            yaxis: {
                autotick: true,
                ticks: 'outside',
                tick0: 1,
                title: 'PASAJEROS',
            },
            xaxis: {
                autotick: true,
                ticks: 'outside',
                tick0: 1,
                title: 'EMPRESAS',
            },
            title: 'cantidad de pasajeros por empresa',
        };

        Plotly.newPlot('graficoEmpresas', data, layout, {
            displayModeBar: false
        });
    }


    ///////////////////
    function empresasGrupos(base_url, yearPasajero) {


        $.ajax({
            url: base_url + "reportes/main/getDataEmpresasGrupos",
            type: "POST",
            data: {
                yearPasajero: yearPasajero
            },
            dataType: "json",
            success: function(data) {
                console.log(data);
                var empresas = new Array();
                var cantidadesGrupos = new Array();
                var color2 = new Array();
                $.each(data, function(key, value) {

                    valor1 = value.empresa;
                    empresas.push(valor1);

                    valor = Number(value.grupo);
                    cantidadesGrupos.push(valor);
                    color2.push(generateRandomColor());

                });
                graficarEmpresasGrupos(empresas, cantidadesGrupos, yearPasajero, color2);
            }
        });

    }

    function graficarEmpresasGrupos(empresas, cantidadesGrupos, yearPasajero, color2) {

        const data = [{
            x: empresas,
            y: cantidadesGrupos,
            type: 'bar',
            marker: {
                color: color2
            }
        }];

        const layout = {
            yaxis: {
                autotick: false,
                ticks: 'outside',
                tick0: 1,
                title: 'GRUPOS',
            },
            xaxis: {
                autotick: true,
                ticks: 'outside',
                tick0: 1,
                title: 'EMPRESAS',
            },
            title: 'cantidad de grupos por empresa',
        };

        Plotly.newPlot('graficoEmpresasGrupos', data, layout, {
            displayModeBar: false
        });
    }


    function empresasConcretas(base_url, yearPasajero) {


        $.ajax({
            url: base_url + "reportes/main/getDataEmpresasConcretas",
            type: "POST",
            data: {
                yearPasajero: yearPasajero
            },
            dataType: "json",
            success: function(data) {

                var empresas = new Array();
                var cantidadesReservas = new Array();
                var color2 = new Array();
                $.each(data, function(key, value) {

                    valor1 = value.empresa;
                    empresas.push(valor1);

                    valor = Number(value.reserva);
                    cantidadesReservas.push(valor);
                    color2.push(generateRandomColor());

                });
                graficarEmpresasConcretas(empresas, cantidadesReservas, yearPasajero, color2);
            }
        });

    }

    function graficarEmpresasConcretas(empresas, cantidadesReservas, yearPasajero, color2) {

        const data = [{
            x: empresas,
            y: cantidadesReservas,
            type: 'bar',
            marker: {
                color: color2
            }
        }];

        const layout = {
            yaxis: {
                autotick: false,
                ticks: 'outside',
                tick0: 1,
                title: 'RESERVAS',
            },
            xaxis: {
                autotick: true,
                ticks: 'outside',
                tick0: 1,
                title: 'EMPRESAS',
            },
            title: 'cantidad de reservas por empresa',
        };

        Plotly.newPlot('graficoEmpresasConcretas', data, layout, {
            displayModeBar: false
        });
    }
    ////////////PAQUETES
    function paquetesGrafico(base_url, year2) {


        $.ajax({
            url: base_url + "reportes/main/getDataPaquetes",
            type: "POST",
            data: {
                year2: year2
            },
            dataType: "json",
            success: function(data) {

                var paquetes = new Array();
                var cantidadesReservas = new Array();
                var color2 = new Array();
                $.each(data, function(key, value) {

                    valor1 = value.paquete;
                    paquetes.push(valor1);

                    valor = Number(value.reserva);
                    cantidadesReservas.push(valor);
                    color2.push(generateRandomColor());

                });
                graficarPaquetes(paquetes, cantidadesReservas, year2, color2);
            }
        });

    }

    function graficarPaquetes(paquetes, cantidadesReservas, year2, color2) {

        const data = [{
            x: paquetes,
            y: cantidadesReservas,
            type: 'bar',
            marker: {
                color: color2
            }
        }];

        const layout = {
            yaxis: {
                autotick: true,
                ticks: 'outside',
                tick0: 1,
                title: 'RESERVAS',
            },
            xaxis: {
                autotick: true,
                ticks: 'outside',
                tick0: 1,
                title: 'PAQUETES',
            },
            title: 'paquetes mas populares',
        };

        Plotly.newPlot('graficoPaquete', data, layout, {
            displayModeBar: false
        });
    }

    /* $('#btnAgregar').click(function(){

            var nuevoEvento={
              title:$('#empresa').val(),
              paquete:$('#paquete').val(),
              start:$('#fecha').val(),
              cantPasajeros:$('#cantPasajeros').val(), 
          };
          $('#calendar').fullCalendar('renderEvent',nuevoEvento);
          $('#modalEventos').modal('toggle');
    }); */

    function confirmar(id) { // confirmaciones de eliminaciones

        swal({
                title: "¿Esta seguro que desea eliminar al empleado?",
                text: "Una vez eliminado no se podra recuperar",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: "<?php echo base_url(); ?>empleados/main/eliminar/" + id,
                        type: "post",
                        data: {
                            id: id
                        },
                        success: function() {
                            swal("Empleado eliminado", "", "success").then((confirmed) => {
                                window.location.reload();
                            });

                        },
                        error: function() {
                            swal("Algo salio mal", "", "error")
                        }

                    });
                } else {
                    swal("El empleado no fue eliminado");
                }
            });
    }

    /////////////////////////////////////////////////////

    function confirmarPermiso(id) { // confirmaciones de eliminaciones

        swal({
                title: "¿Esta seguro que desea eliminar los permisos?",
                text: "Una vez eliminado no se podra recuperar",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: "<?php echo base_url(); ?>permisos/main/eliminar/" + id,
                        type: "post",
                        data: {
                            id: id
                        },
                        success: function() {
                            swal("Permisos eliminados", "", "success").then((confirmed) => {
                                window.location.reload();
                            });

                        },
                        error: function() {
                            swal("Algo salio mal", "", "error")
                        }

                    });
                } else {
                    swal("Los permisos no fueron eliminados");
                }
            });
    }

    function confirmarCoordinador(id) { // confirmaciones de eliminaciones

        swal({
                title: "¿Esta seguro que desea eliminar al coordinador?",
                text: "Una vez eliminado no se podra recuperar",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: "<?php echo base_url(); ?>coordinadores/main/eliminar/" + id,
                        type: "post",
                        data: {
                            id: id
                        },
                        success: function() {
                            swal("Coordinador eliminado", "", "success").then((confirmed) => {
                                window.location.reload();
                            });

                        },
                        error: function() {
                            swal("Algo salio mal", "", "error")
                        }

                    });
                } else {
                    swal("El coordinador no fue eliminado");
                }
            });
    }

    function confirmarUsuario(id) { // confirmaciones de eliminaciones

        swal({
                title: "¿Esta seguro que desea eliminar el usuario?",
                text: "Una vez eliminado no se podra recuperar",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: "<?php echo base_url(); ?>usuarios/main/eliminar/" + id,
                        type: "post",
                        data: {
                            id: id
                        },
                        success: function() {
                            swal("Usuario eliminado", "", "success").then((confirmed) => {
                                window.location.reload();
                            });

                        },
                        error: function() {
                            swal("Algo salio mal", "", "error")
                        }

                    });
                } else {
                    swal("El usuario no fue eliminado");
                }
            });
    }

    function confirmarComentario(id) { // confirmaciones de eliminaciones

        swal({
                title: "¿Esta seguro que desea eliminar el comentario?",
                text: "Una vez eliminado no se podra recuperar",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: "<?php echo base_url(); ?>coordinadores/main/eliminarComentario/" + id,
                        type: "post",
                        data: {
                            id: id
                        },
                        success: function() {
                            swal("Comentario eliminado", "", "success").then((confirmed) => {
                                window.location.reload();
                            });

                        },
                        error: function() {
                            swal("Algo salio mal", "", "error")
                        }

                    });
                } else {
                    swal("El comentario no fue eliminado");
                }
            });
    }

    function confirmarGrupo(id) { // confirmaciones de eliminaciones

        swal({
                title: "¿Esta seguro que desea eliminar el grupo?",
                text: "Una vez eliminado no se podra recuperar",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: "<?php echo base_url(); ?>grupos/main/eliminar/" + id,
                        type: "post",
                        data: {
                            id: id
                        },
                        success: function() {
                            swal("Grupo eliminado", "", "success").then((confirmed) => {
                                window.location.reload();
                            });

                        },
                        error: function() {
                            swal("Algo salio mal", "", "error")
                        }

                    });
                } else {
                    swal("El grupo no fue eliminado");
                }
            });
    }

    function confirmarEmpresa(id) { // confirmaciones de eliminaciones

        swal({
                title: "¿Esta seguro que desea eliminar la empresa?",
                text: "Una vez eliminada no se podra recuperar",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: "<?php echo base_url(); ?>empresas/main/eliminar/" + id,
                        type: "post",
                        data: {
                            id: id
                        },
                        success: function() {
                            swal("Empresa eliminada", "", "success").then((confirmed) => {
                                window.location.reload();
                            });

                        },
                        error: function() {
                            swal("Algo salio mal", "", "error")
                        }

                    });
                } else {
                    swal("La empresa no fue eliminada");
                }
            });
    }

    function confirmarEmpresaLiberar(id) { // confirmaciones de eliminaciones

        swal({
            title: "¡Cuidado!",
            text: "Esto desactivara la empresa sin actualizar datos, si ya registro algun grupo de esta empresa el dia de hoy cancele esta accion.",
            icon: "warning",
            dangerMode: true,
        }).then((eliminar) => {
            swal({
                title: "Confirmar",
                text: "¿Está seguro de que quiere hacer esto?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: "<?php echo base_url(); ?>empresas/main/liberarEmpresa/" + id,
                        type: "post",
                        data: {
                            id: id
                        },
                        success: function() {
                            swal("Empresa desactivada", "", "success").then((confirmed) => {
                                window.location.reload();
                            });

                        },
                        error: function() {
                            swal("Algo salio mal", "", "error")
                        }

                    });
                } else {
                    swal("¡No se desactivo la empresa!");
                }
            });
        });
    }

    function confirmarToDo() { // confirmaciones de eliminaciones
        var id = 1;

        swal({
                title: "¿Esta seguro que desea eliminar la lista?",
                text: "Una vez eliminada no se podra recuperar",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: "<?php echo base_url(); ?>main/borrarToDoList",
                        type: "post",
                        data: {
                            id: id
                        },
                        success: function() {
                            swal("Lista eliminada", "", "success").then((confirmed) => {
                                window.location.reload();
                            });

                        },
                        error: function() {
                            swal("Algo salio mal", "", "error")
                        }

                    });
                } else {
                    swal("La lista no fue eliminada");
                }
            });
    }

    function confirmarReserva() { // confirmaciones de eliminaciones
        var id = document.getElementById("idR").value;

        swal({
                title: "¿Esta seguro que desea cancelar la reserva?",
                text: "Una vez cancelada no se podra recuperar",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: "<?php echo base_url(); ?>reservas/main/eliminar",
                        type: "post",
                        data: {
                            id: id
                        },
                        success: function() {
                            swal("Reserva cancelada", "", "success").then((confirmed) => {
                                window.location.reload();
                            });

                        },
                        error: function() {
                            swal("Algo salio mal", "", "error")
                        }

                    });
                } else {
                    swal("La reserva no fue cancelada");
                }
            });
    }
    ////////////// actividades activasss


    function confirmarActiva() { // confirmaciones de eliminaciones

        id = 1;
        swal({
                title: "¿Esta seguro que desea desactivar todas las empresas?",
                text: "Una vez desactivadas no se podra recuperar",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: "<?php echo base_url(); ?>empresas/main/reset",
                        type: "post",
                        data: {
                            id: id
                        },
                        success: function() {
                            swal("Empresas desactivadas", "", "success").then((confirmed) => {
                                window.location.reload();
                            });

                        },
                        error: function() {
                            swal("Algo salio mal", "", "error")
                        }

                    });
                } else {
                    swal("Las empresas no fueron desactivadas");
                }
            });
    }

    function updateTarea(id, estado) {
        var data = {
            "id": id,
            "estado": estado
        };
        //console.log(data);

        $.ajax({
            data: data,
            url: "<?php echo base_url(); ?>main/update_tarea",
            type: 'post',


        }).done(function(data) {
            //en esta parte leemos que nos devuelve el servidor, si nos responde "edited" mostramos la función de sweetalert success, cualquier otro caso lo marcamos como error.
            switch (data) {
                case "edited":
                    swal(
                        'Datos actualizados',
                        'Buen trabajo',
                        'success'
                    )

                    break;

                default:
                    swal({
                        type: 'error',
                        title: 'Oops...',
                        text: 'Error desconocido, intente de nuevo',
                    })

                    break;
            }

        });
    };
</script>


<!--funcion de la validacion-->
<script>
    ! function(window, document, $) {
        "use strict";
        $("input,select,textarea").not("[type=submit]").jqBootstrapValidation(), $(".skin-square input").iCheck({
            checkboxClass: "icheckbox_square-green",
            radioClass: "iradio_square-green"
        }), $(".touchspin").TouchSpin(), $(".switchBootstrap").bootstrapSwitch();
    }(window, document, jQuery);
</script>



</body> <!-- OJO CONMIGO-->

</html>
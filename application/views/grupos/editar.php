<!-- <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4"><div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div> -->





<section id="cover">
    <div id="cover-caption">
        <div id="container" class="container">
            <div class="row">

                <div class="col-sm-8 offset-sm-2 text-center">
                    <h3 class="col-sm-4 offset-sm-2 text-center">Editar Grupo</h3>
                    <div class="info-form">
                        <form action="<?php echo base_url() ?>grupos/main/update" method="post">
                            <fieldset>

                                <input id="idGrupo" name="idGrupo" type="hidden" class="form-control" value="<?php echo $grupo->id; ?>">


                                <div class="col-md-8">

                                    <label for="coordinador"></label>
                                    <select name="coordinador" id="coordinador" class="form-control">
                                        <?php foreach ($coordinadores as $coordinador) : ?>
                                            <?php if ($coordinador->id == $grupo->id_coordinador) : ?>
                                                <option value="<?php echo $coordinador->id ?>" selected><?php echo $coordinador->nombre; ?></option>
                                            <?php else : ?>
                                                <option value="<?php echo $coordinador->id ?>"><?php echo $coordinador->nombre; ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </select>
                                </div>





                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="empresa"></label>
                                        <select name="empresa" id="empresa" class="form-control">
                                            <?php foreach ($empresas as $empresa) : ?>
                                                <?php if ($empresa->id == $grupo->id_empresa) : ?>
                                                    <option value="<?php echo $empresa->id ?>" selected><?php echo $empresa->nombre; ?></option>
                                                <?php else : ?>
                                                    <option value="<?php echo $empresa->id ?>"><?php echo $empresa->nombre; ?></option>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>


                                <div class="form-group">

                                    <div class="col-md-8">
                                        <input id="fecha" name="fecha" type="date" class="form-control" value="<?php echo $grupo->fecha; ?>">
                                    </div>
                                </div>
                                <div class="form-group">

                                    <div class="col-md-8">
                                        <input id="cantidad_egresados" name="cantidad_egresados" type="number" placeholder="Ingrese cantidad de egresados" class="form-control" min="1" value="<?php echo $grupo->cantidad_egresados; ?>">
                                    </div>
                                </div>
                                <div class="form-group">

                                    <div class="col-md-8">
                                        <input id="cantidad_acompanantes" name="cantidad_acompanantes" type="number" placeholder="Ingrese cantidad de acompañantes" class="form-control" min="0" value="<?php echo $grupo->cantidad_acompanantes; ?>">
                                    </div>
                                </div>
                                <div class="form-group">

                                    <div class="col-md-8">
                                        <input id="cantidad_choferes" name="cantidad_choferes" type="number" placeholder="Ingrese cantidad de choferes" class="form-control" min="1" value="<?php echo $grupo->cantidad_choferes; ?>">
                                    </div>
                                </div>
                                <div class="form-group">

                                    <div class="col-md-8">
                                        <input id="cantidad_coordinadores" name="cantidad_coordinadores" type="number" placeholder="Ingrese cantidad de coordinadores" class="form-control" min="0" value="<?php echo $grupo->cantidad_coordinadores; ?>">
                                    </div>
                                </div>


                                <div class="form-group">

                                    <div class="col-md-8">
                                        <input id="total_personas" name="total_personas" type="number" class="form-control" disabled value="<?php echo $grupo->total_personas; ?>">
                                    </div>
                                </div>
                                <div class="form-group">

                                    <div class="col-md-8">
                                        <input id="dieta" name="dieta" type="text" autocomplete="off" placeholder="dietas especiales" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">

                                    <div class="col-md-8">
                                        <input id="hora_salida" name="hora_salida" type="time" class="form-control" value="<?php echo $grupo->hora_salida; ?>">
                                    </div>
                                </div>


                                <div class="form-group">

                                    <div class="col-md-8">
                                        <input id="descripcion" name="descripcion" type="text" placeholder="informacion extra sobre el grupo" autocomplete="off" class="form-control" value="<?php echo $grupo->descripcion; ?>">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-12 text-center">
                                        <button type="submit" class="btn btn-success btn-small">Actualizar</button>
                                    </div>
                                </div>
                            </fieldset>


                        </form>
                    </div>
                    <br>


                </div>
            </div>
        </div>
    </div>
</section>


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="well well-sm text-center">

            </div>
        </div>
    </div>
</div>
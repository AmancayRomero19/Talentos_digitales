<div class="container row align-items-center">
    <div class="col"></div>
    <div class="container mt-5 col">
        <div class="col-md mx-auto">
            <div class="card" style="width: 120%"; >
                <div class="card-header text-center">
                    <h4 class="mb-4 p-2" style="border: 2px solid #f8fcff;
                    background-color: #ffcef4;">
                        Enviar consulta
                    </h4>
                </div>

                <!--Si los campos no estan vacios y hay error, con "getFlasdata" no tira un msj de error-->
                <!--El usuario no pudo ser registrado-->
                <?php if (!empty(session()->getFlashdata('fail'))): ?>
                <div class="alert alert-danger"><?= session()->getFlashdata('fail'); ?></div>
                <?php endif; ?>
                 <!--Si los campos no estan vacios y no hay error, con "getFlasdata" no tira un msj de exito-->
                <!--El usuario fue registrado con exito-->
                <?php if (!empty(session()->getFlashdata('success'))): ?>
                <div class="alert alert-success"><?= session()->getFlashdata('success'); ?></div>
                <?php endif; ?>
                
                <div class="card-body">
                    <?php $validation = \Config\Services::validation(); ?>
                <!--Formulario por método Post: los datos no se van a ver en la navbar-->
                <!--en el "action" se indica donde van a ser procesados esos datos-->
                    <form method="post" action="<?php echo base_url('/enviar-consulta') ?>">
                        <?= csrf_field(); ?>

                        <div class="mb-3">
                            <label for="nombreInput" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" 
                            placeholder="Nombre">
                            <!-- Error de campo Tipo -->
                            <?php if ($validation->getError('nombre')) {?>
                                <div class="alert alert-danger mt-2">
                                    <?= $error = $validation->getError('nombre'); ?>
                                </div>
                            <?php }?>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" class="form-control" id="email" name="email" 
                            placeholder="email">
                            <!-- Error de campo Precio -->
                            <?php if ($validation->getError('email')) {?>
                                <div class="alert alert-danger mt-2">
                                    <?= $error = $validation->getError('email'); ?>
                                </div>
                            <?php }?>
                        </div>

                        <div class="mb-3">
                            <label for="motivoInput" class="form-label">Motivo</label>
                            <input type="text" class="form-control" id="motivoInput" name="motivo" 
                            placeholder="motivo">
                            <!-- Error de campo Color-->
                            <?php if ($validation->getError('motivo')) {?>
                                <div class="alert alert-danger mt-2">
                                    <?= $error = $validation->getError('motivo'); ?>
                                </div>
                            <?php }?>
                        </div>

                        <div class="mb-3">
                            <label for="descripcionInput" class="form-label">Descripcion</label>
                            <input type="text" class="form-control" id="descripcionInput" name="descripcion" 
                            placeholder="descripcion">
                            <!-- Error de campo Color-->
                            <?php if ($validation->getError('descripcion')) {?>
                                <div class="alert alert-danger mt-2">
                                    <?= $error = $validation->getError('descripcion'); ?>
                                </div>
                            <?php }?>
                        </div>


                        <div class="mb-3">
                            <input type="submit" value="Enviar consulta" class="btn btn-success">
                            <a href="<?php echo base_url('/'); ?>" class="btn btn-danger">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="col"></div>
</div>
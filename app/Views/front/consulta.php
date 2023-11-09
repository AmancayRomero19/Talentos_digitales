<!-- Vistas/consulta.php -->
<div class="table-responsive">
    <table class="table">
        <thead>
            <tr class="bg-dark bg-gradient">
                <th scope="col">Número de consulta</th>
                <th scope="col">Nombre</th>
                <th scope="col">Correo electrónico</th>
                <th scope="col">Motivo</th>
                <th scope="col">Descripción</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($consulta as $consulta): ?>
            <tr>
                <th scope="row"><?= $consulta['id_producto']; ?></th>
                <td><?= $consulta['numero de consulta']; ?></td>
                <td><?= $consulta['nombre']; ?></td>
                <td><?= $consulta['email']; ?></td>
                <td><?= $consulta['motivo']; ?></td>
                <td><?= $consulta['descripcion']; ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

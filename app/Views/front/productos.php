<!-- Vistas/catalogo.php -->
<div class="table-responsive">
  <table class="table">
    <thead>
      <tr class="bg-dark bg-gradient">
        <th scope="col">id_producto</th>
        <th scope="col">Nombre</th>
        <th scope="col">Precio</th>
        <th scope="col">Stock</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($productos as $producto): ?>
      <tr>
        <th scope="row"><?= $producto['id_producto']; ?></th>
        <td><?= $producto['nombre']; ?></td>
        <td><?= $producto['precio']; ?></td>
        <td><?= $producto['stock']; ?></td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>

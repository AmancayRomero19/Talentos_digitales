import { Router } from 'express';
import { producto } from './controller.js';

export const router = Router()

//Consulta todos los productos que estan en la base de datos
router.get('/producto', producto.getAll);
router.post('/producto/add', producto.add);
router.delete('/producto/delete', producto.deleteID);
router.put('/producto/update', producto.update);
router.get('/producto/:id_producto', producto.getOne);




import { pool } from './database.js';

class ProductoController {

    async getAll(req, res) {
        try {
            //genera una variable un resultado
            const[result]  = await pool.query('SELECT * FROM productos');
            //respuesta de la consulta
            res.json(result);

            } catch (error) {
            res.status(500).json({"Error": "Ocurrio un error al buscar los productos"});
        }
        }
        async getOne(req, res) {
            try {
                const producto = req.params.id_producto;
                const [result] = await pool.query('SELECT * FROM productos WHERE id_producto=?', [producto]);
            //Si la longitud es mayor a cero te muestra lo que coincide
            if (result.length > 0){
                //muestra los datos del id de correspondiente al producto
                res.json(result[0]);
            }else{
                //Mensaje de error
                res.status(404).json({"Error":`No hay producto registrado con el id ${producto.id_producto}`});
            }
            }catch (error) {
                res.status(500).json({"Error": "Ocurrió un error al obtener el producto"});
            }
        }
    
    async add (req, res) {
        try {
            const producto = req.body;
            //todos los campos deben estar completos par avanzar
            if(!producto.nombre||!producto.precio||!producto.stock){
                res.status(400).json({"Error": "Completar los campos obligatorios"});
                return;
            }
            const[result]=await pool.query(`INSERT INTO productos(nombre, precio, stock) VALUES (?, ?, ?)`,
            [producto.nombre, producto.precio, producto.stock]);
            res.json({"ID insertado": result.insertId, "Mensaje":"Producto agregado exitosamente"});
        }catch (error){
            res.status(500).json({"Error": "Ocurrio un error al agregar el producto"});
        }
        }
        
        async deleteID (req, res) {
            try {
                const id = req.body.id_producto;
                const[result]=await pool.query(`DELETE FROM productos WHERE id_producto=(?)`, [id]);
                if(result.affectedRows > 0) {
                    res.json({"Mensaje":`Producto con id ${id} eliminado con exito`});
                }else {
                    res.status(404).json({"Error":`Ocurrio un error al eliminar, el id ${id} no existe `});
                }
            }catch (error){
                res.status(500).json({"Error": "Ocurrio un error al eliminar el producto"});
            }
            }

        async update (req, res) {
            try{
                const producto = req.body;
                const [result] = await pool.query(`UPDATE productos SET nombre=(?), precio=(?), stock=(?) WHERE id_producto=(?)`,
                [producto.nombre, producto.precio, producto.stock, producto.id_producto]);
                if (result.changedRows ===1){
                    res.json({"Mensaje": `Producto de id ${producto.id_producto} actualizado con exito`});
                } else if (result.changedRows === 0){
                    res.status(404).json({"Error": `No se encontro ningun cambio con el id ${producto.id_producto}`});

                }else {
                    res.status(500).json({ "Error": "No se pudo actualizar el producto" });
            }
             }catch (error){
                    res.status(500).json({"Error": "Ocurrio un error al agregar el producto"});
               }
            }
                 

        }


    export const producto = new ProductoController();


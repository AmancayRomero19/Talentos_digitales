//inicializa el servicio de api rest
//servidor de api rest
import express from 'express';
//muestra por consola
import morgan from 'morgan';
import {router} from './routes.js';

const app = express();
app.set('port', 3000);

app.use(morgan('dev'));
app.use(express.json());
app.use(router);

app.listen(app.get('port'), () => {
    //define una funcion que se pasa por parametro
    console.log(`Server on port ${app.get('port')}`);
});
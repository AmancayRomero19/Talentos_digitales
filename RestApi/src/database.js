import mysqlConnection from 'mysql2/promise'

const properties = {
    host: 'localhost',
    user: 'root',
    password: '',
    //nombre de la base de dato phpmyadmi
    database: 'romero_a',
};

//exportamos la base de dato con la constante pool
export const pool = mysqlConnection.createPool(properties);
import mysql from "mysql2/promise";

export async function query({query, data = []}) {

    const  dbConnection = await mysql.createConnection({
        host: process.env.MYSQL_HOST,
        database: process.env.MYSQL_DATABASE,
        user: process.env.MYSQL_USER,
        password: process.env.MYSQL_PASSWORD
    });

    try {

        const [results] = await dbConnection.execute(query, data);
        await dbConnection.end();
        return results;

    } catch (error) {

        return new Error(error);

    }

}
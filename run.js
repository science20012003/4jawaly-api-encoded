const { exec } = require("child_process");
var mysql      = require('mysql');
require('dotenv').config();
var con = mysql.createConnection({
    host: process.env.DB_HOST,
    port:process.env.DB_PORT,
    user: process.env.DB_USERNAME,
    password: process.env.DB_PASSWORD,
    database:process.env.DB_DATABASE,
    socketPath: '/var/run/mysqld/mysqld.sock'
});

async function my_asyncFunction() {
    con.query("SELECT\n" +
        "whatsapp_number_id,\n" +
        "Sum(is_working) AS w\n" +
        "FROM\n" +
        "whatsapp_messages_notes\n" +
        "WHERE\n" +
        "queue_percentage > 0\n" +
        "GROUP BY\n" +
        "whatsapp_number_id\n" +
        "HAVING\n" +
        "w <= 1\n", function (err, result, fields) {
        if (err) throw err;
        Object.keys(result).forEach(function(key) {
            var row = result[key];
                exec("php7.4 artisan whatsapp:number "+row.whatsapp_number_id, (error, stdout, stderr) => {
                    if (error) {
                        console.log(`error: ${error.message}`);
                        return;
                    }
                    if (stderr) {
                        console.log(`stderr: ${stderr}`);
                        return;
                    }
                    console.log(`stdout: ${stdout}`);
                });
        });
    });

    await sleep(500);
    console.log("will retry after 4 s");
    my_asyncFunction();
}

function sleep(ms) {
    return new Promise((resolve) => {
        setTimeout(resolve, ms);
    });
}
con.connect(function(err) {
    if (err) throw err;
    my_asyncFunction();
});


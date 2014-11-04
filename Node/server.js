var mysql = require('mysql');
 
var connection = mysql.createConnection(
    {
      host     : process.env.IP,
      user     : 'jewpaltz_1',
      password : '',
      database : 'c9',
    }
);
 
connection.connect();
 
var queryString = 'SELECT * FROM 2014Fall_Keywords';
 
connection.query(queryString, function(err, rows, fields) {
    if (err) throw err;
        console.log(rows);
});
 
connection.end();
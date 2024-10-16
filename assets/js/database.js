// Import the MySQL package
const mysql = require('mysql');

// Create a connection to the database
const connection = mysql.createConnection({
  host: 'localhost',
  user: 'root',
  password: 'Koko&1402',
  database: 'flask_db'
});

// Connect to MySQL
connection.connect((err) => {
  if (err) {
    console.error('Error connecting to the database:', err);
    return;
  }
  console.log('Connected to MySQL database!');
});

// Query the database
const sql = 'SELECT * FROM user';
connection.query(sql, (err, results) => {
  if (err) {
    console.error('Error executing query:', err);
    return;
  }
  console.log('User:', results);
});

// Close the connection
connection.end((err) => {
  if (err) {
    console.error('Error closing the connection:', err);
    return;
  }
  console.log('Connection closed.');
});

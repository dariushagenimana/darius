const express = require('express');
const mysql = require('mysql2');

const app = express();


const db = mysql.createConnection({
  host: 'localhost',
  user: 'root',
  password: 'your_password',
  database: 'shift3'
});

db.connect(err => {
  if (err) {
    console.error('DB connection failed:', err);
  } else {
    console.log('Connected to MySQL');
  }
});

// API route
app.get('/studentb', (req, res) => {
  db.query('SELECT * FROM ', (err, results) => {
    if (err) return res.send(err);
    res.json(results);
  });
});

app.listen(3000, () => {
  console.log('Server running at http://localhost:3000');
});
CREATE DATABASE IF NOT EXISTS hospital_db;
USE hospital_db;
CREATE TABLE IF NOT EXISTS appointments (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100),
  doctor VARCHAR(100),
  date DATE,
  time TIME,
  notes TEXT
);

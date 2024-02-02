-- Create the database if it doesn't exist
CREATE DATABASE IF NOT EXISTS db_products.sql;

-- Switch to the newly created database
USE db_products;

-- Create the products table
CREATE TABLE IF NOT EXISTS products (
    product_id INT AUTO_INCREMENT PRIMARY KEY,
    product_name VARCHAR(100),
    url VARCHAR(255),
    image BLOB
);

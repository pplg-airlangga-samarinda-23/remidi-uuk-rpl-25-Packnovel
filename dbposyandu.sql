-- 1. Create the database
CREATE DATABASE IF NOT EXISTS dbposyandu;
USE dbposyandu;

-- 2. Table: pengguna
CREATE TABLE pengguna (
    id_pengguna INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    username VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin', 'kader') NOT NULL
);

-- 3. Table: bayi
CREATE TABLE bayi (
    id_bayi INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    nama_ibu VARCHAR(100),
    nama_ayah VARCHAR(100),
    tanggal_lahir DATE
);

-- 4. Table: catatan
CREATE TABLE catatan (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_kader INT NOT NULL,
    id_bayi INT NOT NULL,
    tinggi DECIMAL(5,2),
    berat DECIMAL(5,2),
    tanggal DATE DEFAULT CURRENT_DATE,

    FOREIGN KEY (id_kader) REFERENCES pengguna(id_pengguna)
        ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (id_bayi) REFERENCES bayi(id_bayi)
        ON DELETE CASCADE ON UPDATE CASCADE
);

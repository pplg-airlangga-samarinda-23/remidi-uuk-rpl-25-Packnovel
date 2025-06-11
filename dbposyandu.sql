-- Table: pengguna
CREATE TABLE pengguna (
    id_pengguna INT PRIMARY KEY AUTO_INCREMENT,
    nama VARCHAR(100) NOT NULL,
    username VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin', 'kader') NOT NULL
);

-- Table: bayi
CREATE TABLE bayi (
    id_bayi INT PRIMARY KEY AUTO_INCREMENT,
    nama VARCHAR(100) NOT NULL,
    nama_ibu VARCHAR(100) NOT NULL,
    nama_ayah VARCHAR(100) NOT NULL,
    tanggal_lahir DATE NOT NULL
);

-- Table: catatan
CREATE TABLE catatan (
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_kader INT NOT NULL,
    id_bayi INT NOT NULL,
    tinggi DECIMAL(5,2) NOT NULL,
    berat DECIMAL(5,2) NOT NULL,
    tanggal DATE NOT NULL,
    FOREIGN KEY (id_kader) REFERENCES pengguna(id_pengguna),
    FOREIGN KEY (id_bayi) REFERENCES bayi(id_bayi)
);

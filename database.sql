-- CREATE DATABASE

CREATE DATABASE wargaweb_db;

-- CREATE TABLE ADMIN AND WARGA

CREATE TABLE admin_table
(
    id_admin INT auto_increment,
    email_admin VARCHAR (50) NOT NULL,
    password_admin VARCHAR (50) NOT NULL,
    PRIMARY KEY (id_admin)
);

CREATE TABLE warga_table
(
    id_warga INT auto_increment,
    nama_warga VARCHAR(100) NOT NULL,
    nik_warga VARCHAR(50) NOT NULL,
    no_kartu_keluarga VARCHAR(50) NOT NULL,
    agama_warga VARCHAR(20) NOT NULL,
    jenis_kelamin VARCHAR(20) NOT NULL,
    tanggal_lahir DATE,
    pekerjaan VARCHAR(30) NOT NULL,
    alamat TEXT NOT NULL,
    PRIMARY KEY (id_warga)
);


-- USE wargaweb_db database

INSERT INTO admin_table
(
    email_admin,
    password_admin
) VALUES
(
    'admin@wargaweb.com',
    MD5('admin123')
)


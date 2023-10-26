CREATE DATABASE db_ukt;
USE db_ukt;

CREATE TABLE `admin` (
	id_admin INT PRIMARY KEY NOT NULL,
	nama VARCHAR(50) NOT NULL,
	username VARCHAR(50) NOT NULL,
	`password` VARCHAR(50) NOT NULL
);

INSERT INTO `admin` (`id_admin`, `nama`, `username`, `password`) VALUES
(1, 'Kukuh', 'kadmin', 'kadmin123');

CREATE TABLE kelas_pembayaran (
	id_kls INT PRIMARY KEY,
    tingkatan VARCHAR(50) NOT NULL,
    biaya_ukt DECIMAL(10,2) NOT NULL
);

CREATE TABLE mahasiswa (
	id_mahasiswa INT PRIMARY KEY, 
    nama_lengkap VARCHAR(45) NOT NULL, 
    nim INT NOT NULL, 
    username VARCHAR(45), 
    `password`VARCHAR(45), 
    angkatan INT NOT NULL, 
    id_kls INT, 
    fakultas VARCHAR(45), 
    prodi VARCHAR(45), 
    status_pembayaran VARCHAR(50)
);

ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `mahasiswa_ibfk_1` FOREIGN KEY (`id_kls`) REFERENCES `kelas_pembayaran` (`id_kls`) ON DELETE CASCADE ON UPDATE CASCADE;

CREATE TABLE pembayaran (
	id_pembayaran INT PRIMARY KEY, 
    id_mahasiswa INT, 
    tgl_pembayaran DATE,
    jml_pembayaran DECIMAL(10,2)
);

ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`id_mahasiswa`) REFERENCES `mahasiswa` (`id_mahasiswa`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;



-- VIEW UNTUK MENAMPILKAN DATA GOLONGAN UKT
CREATE OR REPLACE VIEW dataGolUKT AS
SELECT * FROM kelas_pembayaran ORDER BY tingkatan DESC;
SELECT * FROM dataGolUKT;



-- VIEW UNTUK MENAMPILKAN DATA MAHASISWA
CREATE OR REPLACE VIEW dataMhs AS
SELECT mahasiswa.id_mahasiswa, mahasiswa.nama_lengkap, mahasiswa.nim, mahasiswa.angkatan, mahasiswa.fakultas, mahasiswa.prodi, kelas_pembayaran.tingkatan, kelas_pembayaran.biaya_ukt
FROM mahasiswa INNER JOIN kelas_pembayaran ON mahasiswa.id_kls = kelas_pembayaran.id_kls;
SELECT * FROM dataMhs;



-- VIEW UNTUK MENAMPILKAN DATA USER ADMIN
CREATE OR REPLACE VIEW dataAdmin AS
SELECT * FROM `admin`;



-- VIEW UNTUK MENAMPILKAN DATA USER MAHASISWA
CREATE OR REPLACE VIEW dataUserMhs AS 
SELECT mahasiswa.id_mahasiswa, mahasiswa.nama_lengkap, mahasiswa.username, mahasiswa.`password`
FROM mahasiswa;
SELECT * FROM dataUserMhs;



-- VIEW UNTUK MENAMPILKAN DATA PEMBAYARAN MAHASISWA
CREATE OR REPLACE VIEW statusMhs AS
SELECT mahasiswa.id_mahasiswa, mahasiswa.nama_lengkap, mahasiswa.fakultas, mahasiswa.prodi, kelas_pembayaran.tingkatan, kelas_pembayaran.biaya_ukt, mahasiswa.status_pembayaran
FROM mahasiswa INNER JOIN kelas_pembayaran ON mahasiswa.id_kls = kelas_pembayaran.id_kls;

SELECT * FROM statusMhs;





-- PROCEDURE UNTUK MENAMBAH DATA GOLONGAN UKT
DELIMITER //
CREATE PROCEDURE InsertGolUKT(IN p_tingkatan VARCHAR(50), IN p_biaya_ukt DECIMAL(10,2), IN p_count INT)
BEGIN
    DECLARE last_id INT;
    DECLARE i INT;
    SET last_id = (SELECT IFNULL(MAX(id_kls), 0) FROM kelas_pembayaran);
    SET last_id = last_id + 1;
    SET i = 1;
    WHILE i <= p_count DO
        INSERT INTO kelas_pembayaran (id_kls, tingkatan, biaya_ukt) VALUES (last_id, p_tingkatan, p_biaya_ukt);
        SET last_id = last_id + 1;
        SET i = i + 1;
    END WHILE;
END //
DELIMITER ;

-- SUDAH DIREVISI LOOPING
-- DROP PROCEDURE InsertGolUKT;



-- PROCEDURE UNTUK MENGUPDATE DATA GOLONGAN UKT
DELIMITER //
CREATE PROCEDURE UpdateGolUKT(IN p_id_kls INT, IN p_tingkatan VARCHAR(50), IN p_biaya_ukt DECIMAL(10,2))
BEGIN
    UPDATE kelas_pembayaran SET tingkatan = p_tingkatan, biaya_ukt = p_biaya_ukt WHERE id_kls = p_id_kls;
END //
DELIMITER ;

-- DROP PROCEDURE UpdateGolUKT;



-- PROCEDURE UNTUK MENGHAPUS DATA GOLONGAN UKT
DELIMITER //
CREATE PROCEDURE DeleteGolUKT(IN p_tingkatan VARCHAR(50))
BEGIN
    DELETE FROM kelas_pembayaran WHERE tingkatan = p_tingkatan;
END //
DELIMITER ;

-- DROP PROCEDURE DeleteGolUKT;



-- PROCEDURE UNTUK MENAMBAHKAN DATA MAHASISWA
DELIMITER //
CREATE PROCEDURE InsertMhs(IN p_nama_lengkap VARCHAR(45), IN p_nim INT(45), IN p_username VARCHAR(45), IN p_password VARCHAR(45),
                           IN p_angkatan INT(11), IN p_id_kls INT(11), IN p_fakultas VARCHAR(45), IN p_prodi VARCHAR(45))
BEGIN
    DECLARE last_id INT;
    SET last_id = (SELECT IFNULL(MAX(id_mahasiswa), 0) FROM mahasiswa);
    SET last_id = last_id + 1;
    WHILE p_nim <= 100
    DO
        INSERT INTO mahasiswa (id_mahasiswa, nama_lengkap, nim, username, `password`, angkatan, id_kls, fakultas, prodi)
        VALUES (last_id, p_nama_lengkap, p_nim, p_username, p_password, p_angkatan, p_id_kls, p_fakultas, p_prodi);
        SET p_nim = p_nim + 1;
        SET last_id = last_id + 1;
    END WHILE;
END //
DELIMITER ;
-- SUDAH DIREVISI LOOPING
-- DROP PROCEDURE InsertMhs;

SELECT * FROM dataMhs;




-- PROCEDURE UNTUK MENGUPDATE DATA MAHASISWA
DELIMITER //
CREATE PROCEDURE UpdateMhs(
	IN p_id_mhs INT, IN p_nama_lengkap VARCHAR(45), IN p_nim INT(45),
	IN p_angkatan INT(11), IN p_fakultas VARCHAR(45), 
	IN p_prodi VARCHAR(45), IN p_id_kls INT(11)
)
BEGIN
    UPDATE mahasiswa SET nama_lengkap = p_nama_lengkap, nim = p_nim,
    angkatan = p_angkatan, id_kls = p_id_kls, fakultas = p_fakultas, prodi = p_prodi 
    WHERE id_mahasiswa = p_id_mhs;
END //
DELIMITER ;





-- PROCEDURE UNTUK MENGHAPUS DATA MAHASISWA
DELIMITER //
CREATE PROCEDURE DeleteMhs(IN p_nim INT(11))
BEGIN
    DELETE FROM mahasiswa WHERE nim = p_nim;
END //
DELIMITER ;

-- DROP PROCEDURE DeleteMhs;




-- PROCEDURE UNTUK MENGUPDATE USER ADMIN
DELIMITER //
CREATE PROCEDURE UpdateAdmin(IN p_id_admin INT, IN p_nama VARCHAR(45), IN p_username VARCHAR(45), IN p_password VARCHAR(45))
BEGIN
    UPDATE `admin` SET  nama = p_nama, username = p_username, `password` = p_password  WHERE id_admin = p_id_admin;
END //
DELIMITER ;

-- DROP PROCEDURE UpdateAdmin;




-- PROCEDURE UNTUK MENGHAPUS DATA USER ADMIN
DELIMITER //
CREATE PROCEDURE DeleteAdmin(IN p_nama VARCHAR(45))
BEGIN
    DELETE FROM `admin` WHERE nama = p_nama;
END //
DELIMITER ;

-- DROP PROCEDURE DeleteAdmin;




-- PROCEDURE UNTUK MENAMBAH DATA USER ADMIN
DELIMITER //
CREATE PROCEDURE InsertAdmin(IN p_nama VARCHAR(45), IN p_username VARCHAR(45), IN p_password VARCHAR(45))
BEGIN
    DECLARE last_id INT;
    SET last_id = (SELECT IFNULL(MAX(id_admin), 0) FROM `admin`);
    SET last_id = last_id + 1;

    INSERT INTO `admin` (id_admin, nama, username, `password`) VALUES (last_id, p_nama, p_username, p_password);
END //
DELIMITER ;
-- DROP PROCEDURE InsertAdmin




-- PROCEDURE UNTUK MENGEDIT USER MAHASISWA
DELIMITER //
CREATE PROCEDURE UpdateUserMhs(IN p_id_Mhs INT, IN p_nama VARCHAR(45), IN p_username VARCHAR(45), IN p_password VARCHAR(45))
BEGIN
    UPDATE mahasiswa SET  nama_lengkap = p_nama, username = p_username, `password` = p_password  WHERE id_mahasiswa = p_id_Mhs;
END //
DELIMITER ;




-- PROCEDURE UNTUK MENAMBAHKAKN PEMBAYARAN MAHASISWA
DELIMITER //
CREATE PROCEDURE InsertPembayaran(
    IN p_id_mahasiswa INT,
    IN p_tgl_pembayaran DATE,
    IN p_jml_pembayaran DECIMAL(10,2)
)
BEGIN
	DECLARE last_id INT;
    SET last_id = (SELECT IFNULL(MAX(id_pembayaran), 0) FROM pembayaran);
    SET last_id = last_id + 1;
    
    INSERT INTO pembayaran (id_pembayaran, id_mahasiswa, tgl_pembayaran, jml_pembayaran)
    VALUES (last_id, p_id_mahasiswa, p_tgl_pembayaran, p_jml_pembayaran);
END //
DELIMITER ;
-- DROP PROCEDURE InsertPembayaran;




-- PROCEDURE UNTUK MENGHAPUS DATA TRANSAKSI
DELIMITER //
CREATE PROCEDURE deleteTransaksi(IN p_nama VARCHAR(45))
BEGIN
    DELETE FROM statusMhs WHERE nama_lengkap = p_nama;
END //
DELIMITER ;






-- TRIGGERRRRRRR

-- TRIGER UNTUK AUTO BELUM LUNAS SAAT INPUT DATA MAHASISWA BARU
DELIMITER //
CREATE TRIGGER SetStatusPembayaran
AFTER INSERT ON mahasiswa
FOR EACH ROW
BEGIN
    UPDATE mahasiswa
    SET status_pembayaran = 'Belum Lunas'
    WHERE id_mahasiswa = NEW.id_mahasiswa;
END //
DELIMITER ;


-- TRIGER UNTUK AUTO LUNAS SAAT SUDAH INPUT DATA PEMBAYARAN OLEH PENGGUNA
DELIMITER //
CREATE TRIGGER trg_update_status_pembayaran
AFTER INSERT ON pembayaran
FOR EACH ROW
BEGIN
    UPDATE mahasiswa m
    SET m.status_pembayaran = CASE
        WHEN EXISTS (
            SELECT 1
            FROM pembayaran p
            WHERE p.id_mahasiswa = m.id_mahasiswa
        ) THEN 'Lunas'
        ELSE 'Belum Lunas'
    END
    WHERE m.id_mahasiswa = NEW.id_mahasiswa;
END //
DELIMITER ;





-- REVISI LAIN :

-- UNIQ NAMA MAHASISWA
ALTER TABLE mahasiswa
ADD CONSTRAINT uk_nama_lengkap UNIQUE (nama_lengkap);

-- UNIQ GOLONGAN UKT
ALTER TABLE kelas_pembayaran
ADD CONSTRAINT uk_tingkatan UNIQUE (tingkatan);

-- NIM HARUS 12 KARAKTER
DELIMITER //
CREATE TRIGGER ValidateNimLength
BEFORE INSERT ON mahasiswa
FOR EACH ROW
BEGIN
    DECLARE nim_length INT;
    SET nim_length = CHAR_LENGTH(NEW.nim);
    IF nim_length < 12 THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Panjang NIM Harus Minimal 12 Karakter';
    END IF;
END //
DELIMITER ;


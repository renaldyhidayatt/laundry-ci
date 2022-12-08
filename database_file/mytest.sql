CREATE TABLE `user` (
  `user_id` int(10) primary key auto_increment, -- mengidentifikasi suatu baris dalam tabel
  `firstname` varchar(30) DEFAULT NULL,
  `lastname` varchar(30) DEFAULT NULL,
  `email` varchar(20) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
);


CREATE TABLE `categories` (
  `category_id` int(30) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `nama` text NOT NULL,
  `harga` double NOT NULL,
  `created_by` varchar(70) NOT NULL
); 

CREATE TABLE `pelanggan` (
  `pelanggan_id` int primary key auto_increment,
  `nama_pelanggan` varchar(50) NOT NULL,
  `jeniskelamin` varchar(10) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `created_by` varchar(70) NOT NULL
);

CREATE TABLE `karyawan` (
  `karyawan_id` int(255) primary key auto_increment,
  `user_id`int NOT NULL,
  `nama_karyawan` varchar(50) NOT NULL,
  `jeniskelamin` varchar(10) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `tgl_bergabung` date NOT NULL,
  `tgl_berhenti` date NULL,
  `created_by` varchar(50) NOT NULL,
  CONSTRAINT fk_user
    FOREIGN KEY (user_id) 
        REFERENCES user(user_id)
        ON UPDATE CASCADE
        ON DELETE CASCADE
);

CREATE TABLE `laundry` (
  `laundry_id` int(30) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `pelanggan_id` int(30) NOT NULL,
  `status` varchar(20) NOT NULL COMMENT 'Pending, Ongoing,ready,claimed',
  `berat` int(10) NOT NULL,
  `jumlah_total` double NOT NULL,
  `status_pembayaran` varchar(10), -- 
  `category_id` int(30) NOT NULL,
  `keterangan` text NOT NULL, -- keterangan
  `created_by` varchar(50) NOT NULL,
  CONSTRAINT fk_category
    FOREIGN KEY (category_id) 
        REFERENCES categories(category_id)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
  CONSTRAINT fk_pelanggan
    FOREIGN KEY (pelanggan_id) 
        REFERENCES pelanggan(pelanggan_id)
        ON UPDATE CASCADE
        ON DELETE CASCADE
);

SELECT laundry.laundry_id, pelanggan.nama_pelanggan as nama_pelanggan , laundry.status, laundry.berat,laundry.jumlah_total,laundry.status_pembayaran,categories.nama as nama_categories, laundry.keterangan FROM laundry JOIN pelanggan ON pelanggan.pelanggan_id = laundry.pelanggan_id JOIN categories ON categories.category_id = laundry.category_id WHERE laundry.laundry_id = 1;


SELECT posts.id AS post_id, posts.title, comments.id AS comment_id, comments.id_post_comment, comments.user_name_comment,comments.comment FROM comments JOIN posts ON posts.id = comments.id_post_comment WHERE posts.id = 2;
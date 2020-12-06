# sentmail
API function for sent email


pg_connect("host=localhost port=5432 dbname=maildb user=root password=admin123");

--- create table log in postgre ---
CREATE TABLE [IF NOT EXISTS] mail_log(
    mail_id SERIAL primary_key,
    mail_from VARCHAR ( 50 )  NOT NULL,
    mail_subject VARCHAR ( 50 )  NOT NULL,
    mail_to VARCHAR ( 50 ) NOT NULL,
    mail_status  BOOLEAN NOT NULL,
	  created_on TIMESTAMP NOT NULL,
);

Fungsi email menggunakan library PHP Mailer memanfaatkan server Google SMTP
maka pada file call.php, silahkan masukkan alamat email gmail dan password nya, untuk dijadikan smtp server


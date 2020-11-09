DROP TABLE IF EXISTS details;
DROP TABLE IF EXISTS orders;
DROP TABLE IF EXISTS products;
DROP TABLE IF EXISTS students;
DROP TABLE IF EXISTS categories;
DROP TABLE IF EXISTS groups;

CREATE TABLE groups (
	id VARCHAR(5) PRIMARY KEY,
	description VARCHAR(200)
);

CREATE TABLE students (
	login INT(6) UNSIGNED PRIMARY KEY,
	first_name VARCHAR(20) NOT NULL,
	last_name VARCHAR(20) NOT NULL,
	password VARCHAR(100) NOT NULL,
	group_code VARCHAR(5) NOT NULL,
	FOREIGN KEY fk_group(group_code) REFERENCES groups(id)
);

CREATE TABLE categories(
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	name VARCHAR(50) NOT NULL,
	description VARCHAR(300) NOT NULL
);

CREATE TABLE products (
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	id_cat INT(6) UNSIGNED NOT NULL,	
	name VARCHAR(50) NOT NULL,
	description VARCHAR(300) NULL,
	price INT(6) UNSIGNED NOT NULL,
	qstock INT(6) UNSIGNED NOT NULL,
	FOREIGN KEY fk_cat(id_cat) REFERENCES categories(id)
);


CREATE TABLE orders (
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	id_student INT(6) UNSIGNED NOT NULL,
	date_com TIMESTAMP,
	FOREIGN KEY fk_student(id_student) REFERENCES students(login)
);

CREATE TABLE details (
	id_order INT(6) UNSIGNED NOT NULL,
	id_product INT(6) UNSIGNED NOT NULL,
	qcom INT(6) NOT NULL,
	CONSTRAINT detailsPK PRIMARY KEY (id_order, id_product),
	FOREIGN KEY fk_order(id_order) REFERENCES orders(id) ON DELETE CASCADE,
	FOREIGN KEY fk_product(id_product) REFERENCES products(id) ON DELETE CASCADE
);



INSERT INTO categories VALUES(1, "Ecran", "Les écrans permettent de voir ce qu'il se passe sur l'ordinateur");
INSERT INTO categories VALUES(2, "Clavier", "Les claviers permettent d'écrire des choses sur l'écran");
INSERT INTO categories VALUES(3, "Souris", "La souris est un matériel de pointage qui permet de diriger le curseur");
INSERT INTO categories VALUES(4, "Ordinateur", "C'est un ordinateur");

INSERT INTO products VALUES (1,1,"BENQ - GW2280 21.5\"/1920X1080/3000:1/5MS", "Ecran standard qui remplit parfaitement son rôle pour la bureautique et la navigation internet. ", 99, 50);
INSERT INTO products VALUES (2,1, "MSI - Optix MAG341CQ 24\" UWQHD/244Hz Gaming Monitor", "Ecran gamer UWQHD avec une résolution de 244Hz. Parfait pour vos sessions de jeux.", 250, 35);
INSERT INTO products VALUES (3,2,"Logitech - Keyboard K120 for Business", "Clavier basique mais néanmoins efficace pour la bureautique.",50, 100);
INSERT INTO products VALUES (4,3,"Rapoo", "Souris standard adaptée pour toutes les tâches du quotidient.", 30, 100);
INSERT INTO products VALUES (5,4,"Microsoft - Surface Pro 7", "Pc ultra portable - tablette de 12.3\"", 749.99, 25);
INSERT INTO products VALUES (6,4,"Apple - MacBook pro 2019", "Pc ultra portable de 13\"", 1499, 10);

INSERT INTO groups VALUES("E11", "Groupe de gestion");
INSERT INTO groups VALUES("E12", "Groupe de gestion");
INSERT INTO groups VALUES("E00", "Groupe de l'admin");

INSERT INTO students VALUES(1,"Admin","Admin","root", "E00");
INSERT INTO students VALUES(52818,"Thuy An","Nguyen","mdp", "E11");
INSERT INTO students VALUES(52088,"Thomas","Guldentops","mdp", "E11");
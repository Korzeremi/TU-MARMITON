CREATE DATABASE IF NOT EXISTS marmiton;

USE marmiton;

CREATE TABLE Categorie (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255),
    img VARCHAR(255)
);

CREATE TABLE Recette (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(80),
    img VARCHAR(255),
    etape1 VARCHAR(255),
    etape2 VARCHAR(255),
    etape3 VARCHAR(255),
    etape4 VARCHAR(255),
    etape5 VARCHAR(255),
    etape6 VARCHAR(255),
    etape7 VARCHAR(255),
    etape8 VARCHAR(255),
    id_categorie INT,
    FOREIGN KEY (id_categorie) REFERENCES Categorie(id)
);

CREATE TABLE Ingredient (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(80),
    quantite VARCHAR(80),
    img VARCHAR(255),
    id_recette INT,
    FOREIGN KEY (id_recette) REFERENCES Recette(id)
);

INSERT INTO Categorie (nom, img) VALUES ('Entrée', 'https://cdn-icons-png.flaticon.com/512/8033/8033081.png');
INSERT INTO Categorie (nom, img) VALUES ('Plat principal', 'https://cdn-icons-png.flaticon.com/512/1065/1065715.png');
INSERT INTO Categorie (nom, img) VALUES ('Dessert', 'https://cdn-icons-png.flaticon.com/512/1888/1888907.png');
INSERT INTO Categorie (nom, img) VALUES ('Burger', 'https://cdn-icons-png.flaticon.com/512/5787/5787016.png');
INSERT INTO Categorie (nom, img) VALUES ('Japonais', 'https://cdn-icons-png.flaticon.com/512/6920/6920188.png');
INSERT INTO Categorie (nom, img) VALUES ('Coréen', 'https://cdn-icons-png.flaticon.com/512/3978/3978806.png');


INSERT INTO Recette (nom, img, etape1, etape2, etape3, etape4, id_categorie)
VALUES ('Salade César', 'https://assets.afcdn.com/recipe/20190704/94709_w600.jpg', 'Laver les feuilles de laitue...', 'Préparer la sauce avec de la mayonnaise...', 'Mélanger le tout et servir.', NULL, 1);

INSERT INTO Recette (nom, img, etape1, etape2, etape3, etape4, id_categorie)
VALUES ('Poulet rôti', 'https://assets.afcdn.com/recipe/20130909/63747_w1024h768c1cx1872cy2808.jpg', 'Préchauffer le four...', 'Assaisonner le poulet...', 'Cuire au four pendant 1 heure.', NULL, 2);


INSERT INTO Recette (nom, img, etape1, etape2, etape3, etape4, etape5, etape6, etape7, etape8, id_categorie)
VALUES ('Tarte aux pommes', 'https://assets.afcdn.com/recipe/20230127/139908_w600.jpg', 'Préparer la pâte...', 'Éplucher et couper les pommes...', 'Cuire au four pendant 30 minutes.', NULL, NULL, NULL, NULL, NULL, 3);


INSERT INTO Ingredient (nom, quantite, img, id_recette) VALUES ('Poulet', '1 kg', 'https://assets.afcdn.com/recipe/20170607/67769_origin.jpg', 2);
INSERT INTO Ingredient (nom, quantite, img, id_recette) VALUES ('Pommes', '4', 'https://assets.afcdn.com/recipe/20170607/67365_origin.jpg', 3);
INSERT INTO Ingredient (nom, quantite, img, id_recette) VALUES ('Huile', '4', 'https://assets.afcdn.com/recipe/20220117/127496_origin.png', 3);
INSERT INTO Ingredient (nom, quantite, img, id_recette) VALUES ('Sucre vanillé', '4', 'https://assets.afcdn.com/recipe/20170607/67644_origin.jpg', 3);
INSERT INTO Ingredient (nom, quantite, img, id_recette) VALUES ('Sucre en poudre', '4', 'https://assets.afcdn.com/recipe/20170607/67377_origin.jpg', 3);
INSERT INTO Ingredient (nom, quantite, img, id_recette) VALUES ('Crême fraiche', '4', 'https://assets.afcdn.com/recipe/20170607/67763_origin.jpg', 3);
INSERT INTO Ingredient (nom, quantite, img, id_recette) VALUES ('Pâte brisée', '4', 'https://assets.afcdn.com/recipe/20221207/138285_origin.jpg', 3);
INSERT INTO Ingredient (nom, quantite, img, id_recette) VALUES ('Oeuf', '4', 'https://assets.afcdn.com/recipe/20220126/128066_origin.jpg', 3);
INSERT INTO Ingredient (nom, quantite, img, id_recette) VALUES ('Laitue', '4', 'https://assets.afcdn.com/recipe/20171229/76431_origin.jpg', 3);
INSERT INTO Ingredient (nom, quantite, img, id_recette) VALUES ('Parmesan', '4', 'https://assets.afcdn.com/recipe/20170607/67344_origin.jpg', 3);
INSERT INTO Ingredient (nom, quantite, img, id_recette) VALUES ('Tranche de pain', '4', 'https://assets.afcdn.com/recipe/20170607/67639_origin.jpg', 3);
INSERT INTO Ingredient (nom, quantite, img, id_recette) VALUES ('Sel', '4', 'https://assets.afcdn.com/recipe/20170607/67687_origin.jpg', 3);
INSERT INTO Ingredient (nom, quantite, img, id_recette) VALUES ('Poivre', '4', 'https://assets.afcdn.com/recipe/20170607/67563_origin.jpg', 3);
INSERT INTO Ingredient (nom, quantite, img, id_recette) VALUES ('Tabasco', '4', 'https://assets.afcdn.com/recipe/20170607/67548_origin.jpg', 3);
INSERT INTO Ingredient (nom, quantite, img, id_recette) VALUES ('Moutarde', '4', 'https://assets.afcdn.com/recipe/20171121/75409_origin.jpg', 3);
INSERT INTO Ingredient (nom, quantite, img, id_recette) VALUES ('Câpre', '4', 'https://assets.afcdn.com/recipe/20170607/67470_origin.jpg', 3);
INSERT INTO Ingredient (nom, quantite, img, id_recette) VALUES ('Citron', '4', 'https://assets.afcdn.com/recipe/20170607/67457_origin.jpg', 3);
INSERT INTO Ingredient (nom, quantite, img, id_recette) VALUES ("Gousse d'ail", '4', 'https://assets.afcdn.com/recipe/20170607/67514_origin.jpg', 3);
INSERT INTO Ingredient (nom, quantite, img, id_recette) VALUES ('Vinaigre de riz', '4', 'https://assets.afcdn.com/recipe/20170621/69188_origin.jpg', 3);
INSERT INTO Ingredient (nom, quantite, img, id_recette) VALUES ('Sésame', '4', 'https://assets.afcdn.com/recipe/20170607/67391_origin.jpg', 3);
INSERT INTO Ingredient (nom, quantite, img, id_recette) VALUES ('Avocat', '4', 'https://assets.afcdn.com/recipe/20170607/67382_origin.jpg', 3);
INSERT INTO Ingredient (nom, quantite, img, id_recette) VALUES ('Concombre', '4', 'https://assets.afcdn.com/recipe/20170607/67693_origin.jpg', 3);
INSERT INTO Ingredient (nom, quantite, img, id_recette) VALUES ('Crabe', '4', 'https://assets.afcdn.com/recipe/20170607/67697_origin.jpg', 3);
INSERT INTO Ingredient (nom, quantite, img, id_recette) VALUES ('Feuille de nori', '4', 'https://assets.afcdn.com/recipe/20171110/74694_origin.jpg', 3);
INSERT INTO Ingredient (nom, quantite, img, id_recette) VALUES ('Riz', '4', 'https://assets.afcdn.com/recipe/20170607/67482_origin.jpg', 3);
INSERT INTO Ingredient (nom, quantite, img, id_recette) VALUES ('Wasabi', '4', 'https://assets.afcdn.com/recipe/20170621/69191_origin.jpg', 3);
INSERT INTO Ingredient (nom, quantite, img, id_recette) VALUES ('Sauce soja salée', '4', 'https://assets.afcdn.com/recipe/20170607/67466_origin.jpg', 3);
INSERT INTO Ingredient (nom, quantite, img, id_recette) VALUES ('Sauce soja sucrée', '4', 'https://assets.afcdn.com/recipe/20170607/67466_origin.jpg', 3);

INSERT INTO Recette(nom, img, id_categorie) VALUES ('Dinde','https://assets.afcdn.com/recipe/20180209/77491_w600.jpg',2);
INSERT INTO Recette(nom, img, id_categorie) VALUES ('Alligot','https://assets.afcdn.com/recipe/20191231/105959_w600.jpg',2);
INSERT INTO Recette(nom, img, id_categorie) VALUES ('Sushi Maki','https://assets.afcdn.com/recipe/20131025/16373_w600.jpg',2);
INSERT INTO Recette(nom, img, id_categorie) VALUES ('Tiramisu','https://assets.afcdn.com/recipe/20170614/69362_w600.jpg',2);
INSERT INTO Recette(nom, img, id_categorie) VALUES ('Dinde','https://assets.afcdn.com/recipe/20180209/77491_w600.jpg',2);
INSERT INTO Recette(nom, img, id_categorie) VALUES ('Alligot','https://assets.afcdn.com/recipe/20191231/105959_w600.jpg',2);
INSERT INTO Recette(nom, img, id_categorie) VALUES ('Sushi Maki','https://assets.afcdn.com/recipe/20131025/16373_w600.jpg',2);
INSERT INTO Recette(nom, img, id_categorie) VALUES ('Tiramisu','https://assets.afcdn.com/recipe/20170614/69362_w600.jpg',2);
INSERT INTO Recette(nom, img, id_categorie) VALUES ('Dinde','https://assets.afcdn.com/recipe/20180209/77491_w600.jpg',2);
INSERT INTO Recette(nom, img, id_categorie) VALUES ('Alligot','https://assets.afcdn.com/recipe/20191231/105959_w600.jpg',2);
INSERT INTO Recette(nom, img, id_categorie) VALUES ('Sushi Maki','https://assets.afcdn.com/recipe/20131025/16373_w600.jpg',2);
INSERT INTO Recette(nom, img, id_categorie) VALUES ('Tiramisu','https://assets.afcdn.com/recipe/20170614/69362_w600.jpg',2);
/*
  creation de la table unite
 */
 create table categorie(  
     id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
     libelle VARCHAR(180) NOT NULL
     IdUnite INT NOT NULL,
     FOREIGN KEY (IdUnite) REFERENCES unite(id))
/*
creation de la table unite
 */
 create table unite(  
     id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
     libelle VARCHAR(180) NOT NULL,
    )
    /*
    creation de la table role
    */
    create table role(
        id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
        libelleRole VARCHAR(180) NOT NULL,
    )
    /*
    creation de la table fournisseur
    */
    CREATE TABLE user (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nomU VARCHAR(180) NOT NULL,
    prenomU VARCHAR(180) NOT NULL,
    mailU VARCHAR(180) NOT NULL,
    passwordU VARCHAR(180) NOT NULL,
    IdRole INT NOT NULL,
    FOREIGN KEY (IdRole) REFERENCES role(id)
);

    
 /*
  creation de la table Article de confection
 */
 CREATE TABLE article_confection (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    libelle VARCHAR(180) NOT NULL,
    prixAchat INT NOT NULL,
    quantiteAV INT NOT NULL,
    reference VARCHAR(180) NOT NULL,
    photo VARCHAR(180) NOT NULL,
    IdCategorie INT NOT NULL,
    IdUnite INT NOT NULL,
    idFournisseur INT NOT NULL,
    FOREIGN KEY (IdCategorie) REFERENCES categorie(id),
    FOREIGN KEY (IdUnite) REFERENCES unite(id),
    FOREIGN KEY (idFournisseur) REFERENCES fournisseur(id)
);
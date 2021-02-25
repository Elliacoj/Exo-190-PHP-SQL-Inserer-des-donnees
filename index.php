<?php

/**
 * Pour cet exercice, vous allez utiliser la base de données table_test_php créée pendant l'exo 189
 * Vous utiliserez également les deux tables que vous aviez créées au point 2 ( créer des tables avec PHP )
 */

try {
    /**
     * Créez ici votre objet de connection PDO, et utilisez à chaque fois le même objet $pdo ici.
     */
    $pdo = new PDO("mysql:host=localhost;dbname=table_test_php;charset=utf8", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    /**
     * 1. Insérez un nouvel utilisateur dans la table utilisateur.
     */

    $utilisateur1 = "
        INSERT INTO utilisateur (nom, prenom, email, password, adresse, code_postal, pays)
        VALUES ('Jocaille', 'Amaury', 'aerzra@hotmail.com', 'azerty', 'Rue lalala', '4560', 'Belgique')
    ";
    $pdo->exec($utilisateur1);


    /**
     * 2. Insérez un nouveau produit dans la table produit
     */

    $produit1 = "
        INSERT INTO produit (titre, prix, description_courte, description_longue)
        VALUES ('titre1', '3', 'ezraerr', 'dfahuheufiazhfihuazhiuzhafeuiyg')
    ";
    $pdo->exec($produit1);

    /**
     * 3. En une seule requête, ajoutez deux nouveaux utilisateurs à la table utilisateur.
     */

    $utilisateur2 = "
        INSERT INTO utilisateur (nom, prenom, email, password, adresse, code_postal, pays)
        VALUES ('ezraezr', 'zar', 'avvvvv@hotmail.com', 'azerty', 'Rue lalala', '4560', 'Belgique'),
               ('dgsgd', 'azze', 'aerr@hotmail.com', 'azerty', 'Rue lalala', '4560', 'Belgique')
    ";
    $pdo->exec($utilisateur2);

    /**
     * 4. En une seule requête, ajoutez deux produits à la table produit.
     */

    $produit2 = "
        INSERT INTO produit (titre, prix, description_courte, description_longue)
        VALUES ('titre2', '5', 'ezraerr', 'dfahuheufiazhfihuazhiuzhafeuiyg'),
               ('titre3', '7', 'ezraerr', 'dfahuheufiazhfihuazhiuzhafeuiyg')
    ";
    $pdo->exec($produit2);

    /**
     * 5. A l'aide des méthodes beginTransaction, commit et rollBack, insérez trois nouveaux utilisateurs dans la table utilisateur.
     */

    $pdo->beginTransaction();

    $insertUtilisateur = "INSERT INTO utilisateur (nom, prenom, email, password, adresse, code_postal, pays) VALUES";

    $utilisateur3 = $insertUtilisateur . "('edbfdbd', 'zdfg', 'adfdfgggfd@hotmail.com', 'azerty', 'Rue lalala', '4560', 'Belgique')";

    $pdo->exec($utilisateur3);

    $utilisateur4 = $insertUtilisateur . "('zerzdbd', 'sdffg', 'kljgggfd@hotmail.com', 'azerty', 'Rue lalala', '4560', 'Belgique')";

    $pdo->exec($utilisateur4);

    $utilisateur5 = $insertUtilisateur . "('ugiuibfdbd', 'hkgfg', 'guigggfd@hotmail.com', 'azerty', 'Rue lalala', '4560', 'Belgique')";

    $pdo->exec($utilisateur5);

    $pdo->commit();

    /**
     * 6. A l'aide des méthodes beginTransaction, commit et rollBack, insérez trois nouveaux produits dans la table produit.
     */
    $pdo->beginTransaction();

    $insertProduit = "INSERT INTO produit (titre, prix, description_courte, description_longue) VALUES";

    $produit3 = $insertProduit . "('titre4', '54', 'ezraerr', 'dfahuheufiazhfihuazhiuzhafeuiyg')";

    $pdo->exec($produit3);

    $produit4 = $insertProduit . "('titre5', '45', 'ezraerr', 'dfahuheufiazhfihuazhiuzhafeuiyg')";

    $pdo->exec($produit4);

    $produit5 = $insertProduit . "('titre6', '21', 'ezraerr', 'dfahuheufiazhfihuazhiuzhafeuiyg')";

    $pdo->exec($produit5);

    $pdo->commit();

}
catch (Exception $exception) {
    echo "Erreur" . $exception->getMessage();
    $pdo->rollBack();
}
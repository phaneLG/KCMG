<?php

require_once '../db/bdd.php';
class ModelProduit
{
    public function addProduit($nomPro, $quantitPro, $prixUnitairePro, $niv, $user_create, $date_create)
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("INSERT INTO produits(id_yaourt, quantite_pro, prix_produit, niveauPro, user_create, date_create) VALUES (?,?,?,?,?,?)");
            $executProd = $query->execute(array($nomPro, $quantitPro, $prixUnitairePro, $niv, $user_create, $date_create));
            return $executProd;
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    public function getProduit()
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("SELECT * FROM produits, yaourt, type_yaout WHERE produits.id_yaourt = yaourt.id_yaourt AND yaourt.idType_yaourt = type_yaout.id_ty ORDER BY id_prod DESC LIMIT 0,10");
            $query->execute();
            return $query->fetchall(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    public function getAllProduits()
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("SELECT * FROM produits, yaourt, type_yaout, ingrediants WHERE produits.id_yaourt = yaourt.id_yaourt AND yaourt.idType_yaourt = type_yaout.id_ty AND ingrediants.id_ing = yaourt.id_ingred ORDER BY nom_yaourt");
            $query->execute();
            return $query->fetchall(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    public function getAllGroupProduits()
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("SELECT * FROM yaourt, type_yaout, ingrediants WHERE yaourt.idType_yaourt = type_yaout.id_ty AND ingrediants.id_ing = yaourt.id_ingred GROUP BY yaourt.idType_yaourt  ORDER BY nom_yaourt");
            $query->execute();
            return $query->fetchall(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    public function produitDetail($idProd)
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("SELECT * FROM produits, yaourt, type_yaout, ingrediants WHERE produits.id_yaourt = yaourt.id_yaourt AND yaourt.idType_yaourt = type_yaout.id_ty AND ingrediants.id_ing = yaourt.id_ingred AND id_prod=?");
            $query->execute(array($idProd));
            if ($query->rowCount() > 0) {
                return $query->fetch(PDO::FETCH_OBJ);
            }
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    public function updateProduit($idProd, $nomY, $prixUniatre, $quantite)
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("UPDATE produits SET id_yaourt = ?, quantite_pro = ?, prix_produit =? WHERE id_prod = '" . $idProd . "'");
            $executProd = $query->execute(array($nomY, $prixUniatre, $quantite));
            return $executProd;
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    public function deleteProduit($idPro)
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("DELETE FROM produits WHERE id_prod=?");
            $delProd = $query->execute(array($idPro));
            return $delProd;
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    public function updateVenduPro($idProd, $quantite)
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("UPDATE produits SET quantite_pro = ? WHERE id_prod = '" . $idProd . "'");
            $executProd = $query->execute(array($quantite));
            return $executProd;
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    public function updateNivoPro($idProd, $nivo)
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("UPDATE produits SET niveauPro = ? WHERE id_prod = '" . $idProd . "'");
            $executProd = $query->execute(array($nivo));
            return $executProd;
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
}
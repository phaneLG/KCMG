<?php
$title = 'Facture des Achats';
require('head.php');
require('header.php');
require('sibar.php');

require('../controller/controllerCompte.php');
require('../controller/controllerFactureAchat.php');
?>

<section class="wrapper">
    <div id='sectionAimprimer'>
        <div class="row">
            <div class="col-lg-12">
                <div class="form-panel">
                    <div class="row">
                        <div class="col-xs-6 col-sm-6">
                            <?php foreach ($allCompte as $Compte) :; ?>
                                <div class="row">
                                    <div class="col-xs-6 col-sm-6">
                                        <b><?= $Compte->nom_societe; ?></b>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-6 col-sm-6">
                                        <?= $Compte->telComp; ?> <br>
                                        <?= $Compte->emailSocet; ?><br>
                                        <?= $Compte->adresseSociet; ?>
                                    </div>
                                </div>
                            <?php endforeach ?>
                        </div>
                        <div class="col-xs-6 col-sm-6">
                            <b>Facutre</b>
                            <div class="row">
                                <div class="col-xs-6 col-sm-6">

                                    <b>Référence : </b><?= $getOne->designation_ach; ?><br>
                                    <b>Date de Facture : </b> <?= $getOne->dateFactAchat; ?> <br>
                                    <b>Fournisseur : </b> <?= $getOne->nom_four; ?><br>
                                </div>
                            </div>
                            <br>
                        </div>
                    </div>
                    <div class="row mt">
                        <div class="col-md-12">
                            <h4><i></i> </h4>
                            <hr>
                            <table class="table table-striped table-advance table-hover">
                                <thead>
                                    <tr>
                                        <th>Réference</th>
                                        <th>Désignation</th>
                                        <th>Quantité</th>
                                        <th>Prix Unitaire</th>
                                        <th>Total</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $somme = 0;
                                    foreach ($allFactAch as $echo_factureF) : ?>
                                        <tr>
                                            <td><?= $echo_factureF->references_ing; ?></td>
                                            <td><?= $echo_factureF->nom_ing; ?></td>
                                            <td><?= $echo_factureF->quantite_pro_ach; ?></td>
                                            <td><?= $echo_factureF->prixUnitaire_prod; ?></td>
                                            <td><?= $echo_factureF->prixUnitaire_prod * $echo_factureF->quantite_pro_ach;
                                                $somme = $echo_factureF->prixUnitaire_prod * $echo_factureF->quantite_pro_ach + $somme;

                                                ?></td>
                                            <td>
                                                <a href="../controller/controllerFactureAchat.php?idDel_Fact=<?= $echo_factureF->id_stock_fac_a; ?>" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                                                <a href="../controller/controllerFactureAchat.php?idDel_Fact=<?= $echo_factureF->id_stock_fac_a; ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                    <tr>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                    <tr>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th>Montant Total</th>
                                        <th><?= $somme; ?></th>
                                        <th></th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /col-md-12 -->
                    </div>
                    &copy;<?= $Compte->nom_societe; ?>
                </div>
            </div>
        </div>
    </div>
    <?php require('foot.php'); ?>
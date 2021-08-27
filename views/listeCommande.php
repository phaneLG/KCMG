<?php $title = 'Commande';
require('head.php');
require('header.php');
require('sibar.php');
require('../controller/controllerCommande.php');
?>

<section class="wrapper">
  <h3><i class="fa fa-angle-right"></i> Commande - Liste des Commandes</h3>
  <!-- row -->
  <div class="row mt">
    <div class="col-md-12">
      <div class="content-panel">
        <h4>
          <div class="col-lg-6">
            <i class="fa fa-angle-right"></i><b>Listes des commande disponible</b>
          </div>
          <div class="col-lg-4-right">
            <a href="commandLiv.php" class="btn btn-success btn-xs" title="Cliqué pour faire livré">faire Livré</a>
          </div>
        </h4>
        <hr>

        <table class="table table-striped table-advance table-hover">
          <thead>
            <tr>
              <th>Référence</th>
              <th>Date Commande</th>
              <th>Status</th>
              <th> Produit</th>
              <th> Quantité</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($n_yLiv as $echoComD) : ?>
              <tr>
                <td rowspan="<?= $echoComD->comptDate + 1; ?>"><?= $echoComD->reference_commande ?></td>
                <td rowspan="<?= $echoComD->comptDate + 1; ?>"><?= $echoComD->date_com ?></td>
                <td rowspan="<?= $echoComD->comptDate + 1; ?>">
                  <?php
                  $liv = $echoComD->livraison;
                  if ($liv == "non_livre") :; ?>
                    <span class="label label-warning label-mini">Non Livré</span>
                  <?php else : ?>
                    <span class="label label-info label-mini">Livré</span>
                  <?php endif; ?>
                </td>
                <?php
                $cltComid = $echoComD->id_com;
                $db = dbConnect();
                $query = $db->prepare("SELECT * FROM commande, produits, prod_commande WHERE prod_commande.id_comma_pro = commande.id_com AND prod_commande.id_produit_com = produits.id_prod AND commande.id_com  = '" . $cltComid . "'");
                $query->execute();
                $idCltDate = $query->fetchall(PDO::FETCH_OBJ);

                foreach ($idCltDate as $dayClt) :;
                ?>
              <tr>
                <td><?= $dayClt->id_yaourt ?></td>
                <td><?= $dayClt->quantite_com ?></td>
              </tr>
            <?php endforeach; ?>
            </tr>
          <?php endforeach; ?>
          </tbody>
        </table>
      </div>
      <!-- /content-panel -->
    </div>
    <!-- /col-md-12 -->
  </div>
  <!-- /row -->
</section>
<?php require('foot.php'); ?>
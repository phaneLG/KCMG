<?php $title = 'Type Yaourt';
 ob_start();
?>

      <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i> Type Yaourt </h3>
        <!-- FORM VALIDATION -->
        <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel">
            <h4><i class="fa fa-angle-right"></i> Form Yaourt</h4>
            <hr>
              <div class=" form">
                <form class="cmxform form-horizontal style-form" id="commentForm" method="POST" action="">
                    <div class="row">
                        <div class="col-xs-3 col-sm-3">
                            <div class="form-group ">
                            <label for="cname" class="control-label col-lg-2"></label>
                                <div class="col-lg-8">
                               <br><br>
                                </div>
                            </div>
                            
                        </div>
                        <div class="col-xs-6 col-sm-6">
                            <div class="form-group ">
                            <label for="cname" class="control-label col-lg-2">Type Yaourt</label>
                                <div class="col-lg-8">
                                <input class=" form-control" id="cname" name="typeY" minlength="2" type="text"  required />
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-3 col-sm-3">
                            <div class="form-group ">
                            <label for="cname" class="control-label col-lg-2"></label>
                                <div class="col-lg-8">
                                <br><br>
                                </div>
                            </div>
                        </div>
                    </div>
                  <div class="form-group">
                    <div class="col-lg-offset-4 col-lg-8">
                      <button class="btn btn-theme" type="submit">Ajouter</button>
                      <button class="btn btn-theme04" type="reset">Cancel</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <!-- /form-panel -->
          </div>
          <!-- /col-lg-12 -->
        </div>
        <!-- /row -->
        <!-- row -->
        <div class="row mt">
          <div class="col-md-12">
            <div class="content-panel">
                <h4><i class="fa fa-angle-right"></i> Listes des Yaourts</h4>
                <hr>
              <table class="table table-striped table-advance table-hover">
                <thead>
                  <tr>
                    <th>Yaourt</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td class="hidden-phone">Lorem Ipsum dolor</td>
                    <td>
                      <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
                      <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            <!-- /content-panel -->
          </div>
          <!-- /col-md-12 -->
        </div>
        <!-- /row -->
      </section>
      <?php $content = ob_get_clean();
 require ('main.php');
?>
<?php require_once 'Template/header.php'
?>
    <div class="container">


        <!-- l'utilisation de la methode base_url() et form_error()
            implique le chargement des helper par defaut de CI(url et form)
            dans le fichier autoload-->
        <div class="row">
            <div class="col-md-3">
                <h4>Insertion des données à l'aide de codeIgniter</h4>
        <form method="post" action="<?=base_url()?>main/form_validation">
            <!--si l'action(methode) est inserted alors ..-->
            <?php if($this->uri->segment(2)=="inserted")
            {
                echo "<div class='alert alert-success'>
                            Données Ajoutées avec succés
                            </div>";

            }
            if($this->uri->segment(2)=="deleted")
            {
                echo "<div class='alert alert-danger'>
                            Données Supprimer avec succés
                            </div>";

            }
            if($this->uri->segment(2)=="update")
            {
                echo "<div class='alert alert-warning'>
                            Données Modifiées avec succés
                            </div>";

            }
            ?>
            <?php if(isset($utilisateur)): ?>

                <?php   foreach($utilisateur->result() as $user) :?>
                    <div class="form-group">
                        <label>Nom</label>
                        <input class="form-control" value="<?=$user->First_name?>" type="text" name="first_name"/>
                        <span class="text-danger"><?=form_error("first_name")?></span>
                    </div>
                    <div class="form-group">
                        <label>Prenom</label>
                        <input class="form-control" value="<?=$user->last_name?>" type="text" name="last_name"/>
                        <span class="text-danger"><?=form_error("last_name")?></span>
                    </div>
                    <div class="form-group">
                        <label>Login</label>
                        <input class="form-control" value="<?=$user->login?>" type="text" name="login"/>
                        <span class="text-danger"><?=form_error("login")?></span>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input class="form-control" value="<?=$user->password?>" type="text" name="password"/>
                        <span class="text-danger"><?=form_error("password")?></span>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="id_cacher" value="<?=$user->id?>"/>
                        <input class="btn-info" type="submit" name="update" value="update"/>
                    </div>
                  <?php  endforeach?>
            <?php  endif ?>
            <?php if(!isset($utilisateur)): ?>
                <div class="form-group">
                    <label>Nom</label>
                    <input class="form-control"  type="text" name="first_name"/>
                    <span class="text-danger"><?=form_error("first_name")?></span>
                </div>
                <div class="form-group">
                    <label>Prenom</label>
                    <input class="form-control"  type="text" name="last_name"/>
                    <span class="text-danger"><?=form_error("last_name")?></span>
                </div>
                <div class="form-group">
                   <label class="control-label">login</label>
                   <input class="form-control" type="text" name="login" />
                    <span class="text-danger"><?=form_error("login")?></span>
                </div>
                <div class="form-group">
                        <label class="control-label">password</label>
                        <input class="form-control"  type="password" name="password" />
                    <span class="text-danger"><?=form_error("password")?></span>
                </div>
                <div class="form-group">
                    <input class="btn-info" type="submit" name="inserer" value="inserer"/>
                </div>
            <?php  endif ?>
        </form>
            </div>
            <div class="col-md-9 ">
        <h2><center>Listes des users</center></h2>
                <br>
        <div class="table-responsive">
            <table  class="table table-bordered">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Nom</th>
                    <th>prenom</th>
                    <th>login</th>
                    <th>Action</th>
                    <th>Action</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                    if($users->num_rows()>0)
                    {
                        foreach($users->result() as $user)
                        {
                     ?>
                            <tr>
                                <td><?=$user->id?></td>
                                <td><?=$user->First_name?></td>
                                <td><?=$user->last_name?></td>
                                <td><?=$user->login?></td>
                                <td><a href="#" class="delete_data" id="<?=$user->id?>"><i class='fa fa-trash-o text-danger'></i>Supprimer</a> </td>
                                <td><a   href="<?=base_url();?>main/modifier/<?=$user->id?>"><i class='fa fa-edit text-info' style="color: #00CC00" ></i>Modifier</a> </td>
                                <td><a   href="<?=base_url();?>roles_user/Traitement/<?=$user->id?>"><i class='fa fa-plus text-primary' style="color: #003399" ></i>Ajouter roles</a> </td>
                            </tr>
                     <?php
                        }
                    }
                    else
                    {
                    ?>
                        <tr>
                          <td colspan="7"><center>Données non trouvées !</center></td>
                      </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
                </div>

        </div>
    </div>

    <script src="<?php echo base_url(); ?>public/JS/jquery-2.1.1.min.js"></script>
    <script src="<?php echo base_url(); ?>public/JS/jquery.dataTables.js"></script>
    <script src="<?php echo base_url(); ?>public/JS/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>public/JS/dataTables.bootstrap.js"></script>
    <script type="text/javascript">
        $("table").DataTable(
            {
                "bInfo" : false,
                "aLengthMenu": [[3, 5, 7, -1], [3, 5, 7, "All"]],
                "pageLength": 3,
                "oLanguage":{
                    "sLengthMenu": "Afficher _MENU_ Users par page",
                    "sSearch" : "Rechercher ",
                    "zeroRecords": "No Data Found",
                    "info": "Total",
                    "infoEmpty": "No records available",
                    "infoFiltered": "(filtered from _MAX_ total records)"

                }

            }
        );

    </script>

    <script>
        $(document).ready(function(){
            $('.delete_data').click(function()
            {
               var id =$(this).attr("id");
                if(confirm("Etes vous sûr de supprimer cet User  ?"))
                {
                    /* si on  confirme la suppression alors
                     *on insert au niveau du navigateur une url permettant
                     * de référencier la methode supprimer du controller
                     * Main avec un param id
                      */
                    window.location = "<?php echo base_url();?>main/supprimer/"+id;
                }else
                {
                    return false;
                }
            });

        });
    </script>
<?php require_once 'Template/footer.php';?>
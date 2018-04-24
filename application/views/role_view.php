<?php
include_once 'template/header.php';
?>
<div class="container" style="margin-top: 75px;">
    <div class="row">
    <div class="col-md-4">
    <div class="panel panel-default">
        <div class="panel-heading">Formulaire d'ajout des Role</div>
        <div class="panel-body">
            <form action="<?=base_url()?>role/form_validation" method="POST">

                <div class="form-group">
                    <label class="control-label" require for="libelle">Libelle</label>
                    <input class="form-control"  type="text" id="libelle" name="libelle"  />
                </div>

                <div class="form-group">
                    <input class="btn btn-success" type="submit" name="valider" id="valider" value="Envoyer"/>
                </div>
            </form>
        </div>
    </div>
    </div>
    <div class="col-md-8">
    <div class="panel-heading"><center>Liste des Roles</center></div>
    <div class="panel-body">
        <table  class="table table-bordered">
            <thead>
            <tr style="background-color: #289e89;">
                <th style="color: #FFF;">Name role</th>
                <th style="color: #FFF;"  align="center" >Action</th>
                <th style="color: #FFF;" colspan="1" align="center" >Action</th>
            </tr>
            </thead>

            <tbody>
            <?php if($roles->num_rows()>0): ?>
               <?php foreach ($roles->result()  as $role_user): ?>
                    <tr class="odd gradeX">
                        <td><?=$role_user->libR?></td>
                        <td><a href="<?=base_url();?>role/modifier/<?=$role_user->idR?>"><i style="color: #00CC00" class='fa fa-trash-o text-default'></i>editer</a> </td>
                        <td >
                            <a class="delete_data" href="#" id="<?=$role_user->idR?>" ><i  class='fa fa-trash-o text-danger'></i>Supprimer</a>
                        </td>
                    </tr>
                <?php endforeach?>
            <?php endif;?>
             <?php if($roles->num_rows()<0):?>
                <tr>
                    <td colspan="3">Données non trouvées !</td>
                </tr>
             <?php endif;?>
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
                    "sLengthMenu": "Afficher _MENU_ Role par page",
                    "sSearch" : "Rechercher ",
                    "zeroRecords": "No Data Found",
                    "info": "Total",
                    "infoEmpty": "No records available",
                    "infoFiltered": "(filtered from _MAX_ total records)",

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
                    window.location = "<?php echo base_url();?>role/supprimer/"+id;
                }else
                {
                    return false;
                }
            });

        });
    </script>
<?php include_once 'template/footer.php' ?>
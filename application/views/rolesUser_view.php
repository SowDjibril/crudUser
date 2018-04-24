
<?php
include_once 'template/header.php';
?>
<div class="container" style="margin-top: 75px;">
    <div class="panel panel-default">

        <?php
        if($this->uri->segment(4)=="existe")
        {
            echo "<div class='alert alert-danger'>
                            <center>Ce rôle existe déjà pour cet utilisateur</center>
                   </div>";

        }
        if($this->uri->segment(4)=="inserted")
        {
            echo "<div class='alert alert-success'>
                             <center>   Le role est attribué avec succès</center>
                                </div>";

        }
        ?>
        <div class="panel-body">
    <div class="col-sm-3">
        <table class="table table-bordered table-responsive table-striped">
            <form action="<?=base_url().'/roles_user/inserRole' ?>" method="POST">
                <div class="form-group">

                    <label for="name">Nom de l'utilisateur</label>
                    <?php if(isset($user)):?>
                        <?php foreach($user->result() as $r):?>
                    <input value="<?=$r->First_name?>" readonly class="form-control" name="nom">
                    <input value="<?=$r->id?>"   readonly class="hidden" name="id">
                        <?php endforeach;?>
                    <?php endif;?>
                </div>
                <div class="form-group">
                    <label for="id">Liste</label>
                    <select class='form-control' id='id' name='role'>
                        <?php if(isset($roles)):?>
                            <?php foreach($roles->result() as $role):?>
                                <option value='<?=$role->idR?>'><?=$role->libR?></option>
                            <?php endforeach;?>
                        <?php endif;?>
                    </select>
                </div>
                <div class="form-group">
                    <input class="btn btn-success" type="submit" name="ajouter" id="valider" value="Ajouter"/>
                </div>
            </form>
        </table>

    </div>
    <div class="col-sm-9">
        <h2><center>Les Rôles</center></h2>
        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
            <tr style="background-color: #289e89;">
                <th style="color: #FFF;">Role</th>
                <th style="color: #FFF;">Action</th>
                <th style="color: #FFF;" colspan="2" align="center" >Etat du Role</th>
            </tr>
            </thead>

            <tbody>
            <?php
            /*foreach ($requis as $role_user):*/ ?>
                <tr class="odd gradeX">
                    <!-- liste libelle associé à un  id libelle-->
                     <?php if(isset($lib)): ?>
                    <!-- affiche le libelle associé à un  id libelle-->
                    <?php  foreach ($lib->result() as $L): ?>
                        <td><?=$L->libR?></td>
                        <td style="width: 10%;">
                            <?php
                            if($L->etat==1)
                            {
                                echo    '
                                             <form action="'.base_url().'roles_user/Rouge" method="POST">
                                                <div class="form-group">
                                                    <input class="hidden"  type="text"  name="idU" value="'.$r->id.'"  />
                                                    <input class="hidden"  type="text"  name="idR" value="'.$L->idR.'"  />
                                                    <input class="hidden"  type="text"  name="nom" value="'.$L->libR.'"  />
                                                    <input class="hidden"  type="text"  name="desactive" value="0"  />
                                                    <input class="btn btn-danger" type="submit" name="Rouge" value="Desactiver"/>
                                                 </div>
                                            </form>   ';
                            }else
                            {
                                echo    '
                                                 <form action="'.base_url().'roles_user/vert" method="POST">
                                                    <div class="form-group">
                                                        <input class="hidden"  type="text"  name="idU" value="'.$r->id.'"  />
                                                        <input class="hidden"  type="text"  name="idR" value="'.$L->idR.'"  />
                                                        <input class="hidden"  type="text"  name="nom" value="'.$L->libR.'"  />
                                                        <input class="hidden"  type="text"  name="active1" value="1"  />
                                                        <input class="btn btn-success" type="submit" name="vert"  value="Activer"/>
                                                    </div>
                                                 </form>';
                            }
                            ?>
                        </td>
                    <td>
                        <?php
                        if($L->etat==1)
                            echo '<center><input type="checkbox" title="activé" width="100%" checked disabled/></center>';
                        else
                            echo '<center><input type="checkbox" title="desactivé" width="100%" disabled /></center>';
                        ?>
                    </td>
                </tr>
            <?php endforeach?>
            <?php endif?>
            </tbody>
        </table>
    </div>
 </div></div>
    </div>
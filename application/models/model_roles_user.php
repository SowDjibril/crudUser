<?php
class Model_roles_user extends CI_Model
{
    public function getUserRole($id)
    {
        $this->db->where("id",$id);
        //$this->db->where("idR",$idR);
        $requet =$this->db->get("user_role");
        return $requet;

    }
    public function  getRUlibEtat($id)
    {
        $requet =(" SELECT R.libR , R.idR, RU.etat From roles R , user_role RU
          WHERE  R.idR =RU.idR AND RU.id =?");
        $query=$this->db->query($requet, $id);
        return $query;
    }
    public  function UpdateEtat($id,$idR,$etat)
    {
        $this->db->where("id",$id);
        $this->db->where("idR",$idR);
        $this->db->update("user_role",$etat);
    }
    public function insert($donne)
    {
        try{

           $result= $this->db->insert("user_role",$donne);
            if(!$result)
            {
                throw new Exception();
                echo 'Non Inserer';
            }
        }catch (Exception $e)
        {
            echo "pas inserer";
        }
    }
    public  function existe($id,$idR)
    {
        $this->db->where('id',$id);
        $this->db->where('idR',$idR);
        $requet = $this->db->get("user_role");
        if($requet->num_rows()>0)
        {
            return true;
        }else
        {
            return false;
        }

    }

}
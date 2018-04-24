 <?php
    class Role_model extends CI_Model{

    	public function listeRole()
    	{
    		$requet=$this->db->get("roles");
    		return $requet;
    	}
        public function supprimerRole($id){
            $this->db->where('idR',$id);
            $this->db->delete("roles");
        }
        public function modifierR($id,$donnee)
        {
            $this->db->where("id",$id);
            $this->db->update("roles",$donnee);
        }
        public  function addRole($donne)
        {
            $this->db->insert("roles",$donne);
        }

    }
?>
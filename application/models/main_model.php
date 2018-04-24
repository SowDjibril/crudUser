    <?php
    class Main_model extends CI_Model{


        /** permet d'inserer dans la base de données un user
         * @param $donnees
         */
        public function addUser($donnees)
        {
            $this->db->insert("users",$donnees);
        }
        /*
         * Affiche les données de la
         * table Users
         */
        public function listUser()
        {
            //$requet= $this->db->get("tbl_user") est equivalent à :
            $this->db->select("*");
            $this->db->from("users");
            $requet =$this->db->get();
            return $requet;
        }
        public function supprimerUser($id)
        {
            $this->db->where("id",$id);
            $this->db->delete("users"); /* equivaut à
            delete from tbl_user where id =$id;
                */
        }
        public function can_login($username,$password)
        {
            $this->db->where('login',$username);
            $this->db->where('password',$password);
            $requet = $this->db->get("users");
                if($requet->num_rows()>0)
                {
                    return true;
                }else
                {
                    return false;
                }

        }

        public  function getUserById($id)
        {
            $this->db->where("id",$id);
            $requet=$this->db->get("users");
            return $requet;
        }

        public function modifier($data,$id)
        {
            //$this->db->from("id",$id);
            $this->db->where("id",$id);
            $this->db->update("users",$data);
        }

    }
 ?>
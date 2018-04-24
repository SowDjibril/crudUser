<?php
class Roles_user extends CI_Controller{
    public function Traitement()
    {
        $id = $this->uri->segment(3);
        $this->load->model("main_model");
        $this->load->model("Role_model");
        $this->load->model("model_roles_user");
        $data['user']=$this->main_model->getUserById($id);
        $data['role']=$this->model_roles_user->getUserRole($id);
        $data['roles']=$this->Role_model->listeRole();
        $data['lib'] =$this->model_roles_user->getRUlibEtat($id);
        $test=$data['role'];

        $this->load->view("rolesUser_view",$data);
    }
    public function vert()
    {
        $id=$this->input->post('idU');
        $idR=$this->input->post('idR');
        $etat=array(
            'etat'=> $this->input->post('active1')
        );
        $this->load->model("model_roles_user");
        $this->model_roles_user->UpdateEtat($id,$idR,$etat);
        redirect(base_url().'roles_user/Traitement/'.$id);
    }
    public function Rouge()
    {
        $id=$this->input->post('idU');
        $idR=$this->input->post('idR');
        $etat=array(
            'etat'=> $this->input->post('desactive')
        );
        $this->load->model("model_roles_user");
        $this->model_roles_user->UpdateEtat($id,$idR,$etat);
        redirect(base_url().'roles_user/Traitement/'.$id);
    }
    public function inserRole()
    {
        $this->load->model("model_roles_user");

        $donnees =array(
            "id" => $this->input->post("id"),
            "idR"  => $this->input->post("role"),
            "etat"      =>1
        );
        $id =$this->input->post("id");
        $idR=$this->input->post("role");
        if($this->model_roles_user->existe($id,$idR)) //si le role existe deja
        {
            redirect(base_url().'roles_user/Traitement/'.$id.'/existe');

        }else
        {
            $result=$this->model_roles_user-> insert($donnees);
            redirect(base_url().'roles_user/Traitement/'.$id.'/inserted');
        }






    }
}
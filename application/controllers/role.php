<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Role extends CI_Controller {

	public function index()
	{
		$this->load->model("role_model");
		$data["roles"] =$this->role_model->listeRole();
		$this->load->view('role_view',$data);
		
	}
    public function form_validation()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules("libelle","libelle ",'required|alpha');

        if($this->form_validation->run())
        {
            $this->load->model("role_model");
            $donnees =array(
                "libR" => $this->input->post("libelle")
            );
            if($this->input->post("update"))
            {
                $id =$this->input->post("id_cacher");
                $this->role_model->modifierR($donnees,$id);
                redirect(base_url()."role/update");
            }
            else if($this->input->post("valider"))
            {
                // on fait une insertion
                $this->role_model->addRole($donnees);// appelle de la methode du model
                redirect(base_url()."role/inserted");
            }
            else
            {
                $this->index();
            }
        }
    }
    public function inserted()
    {
        $this->index();
    }
    public function deleted()
    {
        $this->index();
    }
    public function update()
    {
        $this->index();
    }

    public function supprimer()
    {
        $id = $this->uri->segment(3);// recupere l'id depuis l'url
        $this->load->model("role_model");
        $this->role_model->supprimerRole($id);
        redirect(base_url()."role/deleted"); //indiquer la suppression
    }
    public function modifier()
    {
        $id = $this->uri->segment(3);// recupere l'id depuis l'url
        $this->load->model("role_model");
        $this->role_model->modifierR($id);
        redirect(base_url()."role/deleted"); //indiquer la suppression
    }
}

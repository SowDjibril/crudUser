<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class main extends CI_Controller {
    //  les fonctions
    public function  login()
    {

        $this->load->view("login");
    }
    public function login_validation()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username',"nom d'utilisateur",'required');
        $this->form_validation->set_rules('password',"mot de passe",'required');
        if($this->form_validation->run())
        {
            $username =$this->input->post("username");
            $password =$this->input->post("password");
            // fonction du model
            $this->load->model("main_model");
            if($this->main_model->can_login($username,$password))
            {
                $sesssion_data = array(
                    'username'  =>  $username,
                );
                $this->session->set_userdata($sesssion_data);
                redirect(base_url()."main/entrer");
            }
            else
            {
                $this->session->set_flashdata("error","Mot de passe ou le
                nom de l'utilisateur n'est pas correct");
                //redirect(base_url()."main/login");
                $this->index();
            }
        }else
        {
            $this->index();
        }
    }

    public function index()
    {
        $this->login();
    }

    public function entrer()
    {
        $this->load->model("main_model");
        $listes["users"] =$this->main_model->listUser();
        $this->load->view("main_view",$listes);
    }

    /**
     * fonction qui permet verifier si les champs
     * du formulaire sont alphanumérique ou bien s'ils
     * ne sont pas vide
     */
    public function form_validation()
    {
        // chargement de la librairie de validation de formulaire
        $this->load->library('form_validation');
        $this->form_validation->set_rules("first_name"," nom ",'required|alpha');// nom pas vide &alfaNum
        $this->form_validation->set_rules("last_name","prenom",'required|alpha');// prenom non vide&alfaNum
        $this->form_validation->set_rules("login","login",'required|alpha');// login non vide&alfaNum
        $this->form_validation->set_rules("password","mot de passe",'required|alpha');// login non vide&alfaNum




        if($this->form_validation->run()) //ok
        {
            $this->load->model("main_model");// chargmnt du model
            $donnees =array(
                "first_name" => $this->input->post("first_name"),
                "last_name"  => $this->input->post("last_name"),
                "login"      => $this->input->post("login"),
                "password"   => $this->input->post("password")

            );


            //s'il s'agit d'une mis à jours alors..
            if($this->input->post("update"))
            {
                $id =$this->input->post("id_cacher");
                $this->main_model->modifier($donnees,$id);
                redirect(base_url()."main/inserted");
            }// insertion
            if($this->input->post("inserer"))
            {
                $this->main_model->addUser($donnees);// appelle de la methode du model
                redirect(base_url()."main/inserted");
            }
            else
            {
                $this->index();
            }
        }
        else{

            $errors = $this->form_validation->error_array();
            //print_r($errors);
            $this->index();
        }
        //
    }

    /*
     * fonction de confirmation de CRUD
     */

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


    /**
     * permet de sup user
     */
    public function supprimer()
    {
        $id = $this->uri->segment(3);// recupere l'id depuis l'url
        $this->load->model("main_model");
        $this->main_model->supprimerUser($id);
        redirect(base_url()."main/deleted"); //indiquer la suppression
    }


    public function modifier()
    {
        $id =$this->uri->segment(3);
        $this->load->model("main_model");
        $donnees["utilisateur"]= $this->main_model->getUserById($id);
        $donnees["users"] =$this->main_model->listUser();
        $this->load->view("main_view",$donnees); // retransmet l'user selectioner et la listes
    }


}

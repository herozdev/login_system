<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    if ($this->session->userdata('username')) {
      redirect('home', 'refresh');
    }

    $this->form_validation->set_rules('username', 'Username', 'trim|required');
    $this->form_validation->set_rules('password', 'Password', 'trim|required');

    if ($this->form_validation->run() == FALSE) {
      $data['title'] = "Login System | HerozDev";

      $this->load->view('template/auth_header', $data);
      $this->load->view('auth/login', $data);
      $this->load->view('template/auth_footer', $data);
    } else {
      $this->_login();
    }
  }

  private function _login()
  {
    if ($this->input->post()) {
      $username = $this->input->post('username');
      $password = $this->input->post('password');
    }

    $user = $this->db->get_where('user', ['username' => $username])->row_array();

    if (!empty($user)) {
      //jika user aktif
      if ($user['is_active'] == 1) {
        if (password_verify($password, $user['password'])) {
          $data = array(
            'username' => $user['username'],
            'role_id' => $user['role_id'],
          );

          $this->session->set_userdata($data);
          if ($user['role_id'] == 'USR01') {
            redirect('admin', 'refresh');
          } else {
            redirect('user', 'refresh');
          }
        } else {
          $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong email and password!</div>');

          redirect('auth', 'refresh');
        }
      } else {
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">This Email has not been activated!</div>');

        redirect('auth', 'refresh');
      }
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email is not registered!</div>');

      redirect('auth', 'refresh');
    }
  }

  public function register()
  {
    $this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[user.username]', [
      'is_unique' => 'Username has already used!',
    ]);
    $this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[5]|matches[password2]', [
      'matches' => 'The password not match!',
      'min_length' => 'Minimal 5 characters for password!'
    ]);
    $this->form_validation->set_rules('password2', 'Password', 'trim|required|matches[password1]');
    $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[user.email]', [
      'valid_email' => 'Please use a valid email!',
      'is_unique' => 'This email has already registered!',
    ]);

    if ($this->form_validation->run() == FALSE) {
      $data['title'] = "Registration | HerozDev";

      $this->load->view('template/auth_header', $data);
      $this->load->view('auth/register', $data);
      $this->load->view('template/auth_footer', $data);
    } else {
      $data = array(
        'id' => random_string('numeric', 6),
        'username' => htmlspecialchars($this->input->post('username', true)),
        'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
        'email' => htmlspecialchars($this->input->post('email', true)),
        'full_name' => $this->input->post('full_name'),
        'image' => 'default.jpg',
        'role_id' => 'USR02',
        'is_active' => 1,
        'date_created' => time()
      );

      $this->db->insert('user', $data);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Success! Your account has been registered.</div>');

      redirect('auth', 'refresh');
    }
  }

  public function logout()
  {
    $this->session->unset_userdata('username');
    $this->session->unset_userdata('role_id');

    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You have been logged out!</div>');

    redirect('auth', 'refresh');
  }

  public function blocked()
  {
    $this->load->view('auth/blocked');
  }
}

/* End of file Auth.php */

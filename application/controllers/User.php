<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        // MENGECEK APAKAH SUDAH LOGIN ATAU BELUM
        // JIKA BELUM DIKEMBALIKAN KE PAGE LOGIN
        parent::__construct();
        is_logged_in();
        $this->load->library('form_validation');
        $this->load->model('Order_model');
    }

    public function index()
    {
        $data['produk'] = $this->model_produk->tampil_data_semua_produk()->result();
        $data['review'] = $this->model_produk->tampil_data_review()->result();
        $data['title'] = 'Home';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }

    public function produk()
    {
        $data['semua_produk'] = $this->model_produk->tampil_data_semua_produk()->result();
        $data['title'] = 'Products';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('user/produk', $data);
        $this->load->view('templates/footer');
    }

    public function order($product_id) {
        $data['title'] = 'Order Product';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['product'] = $this->db->get_where('tb_produk', ['id' => $product_id])->row_array();

        $this->form_validation->set_rules('quantity', 'Quantity', 'required|integer');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('user/newOrder', $data);
            $this->load->view('templates/footer');
        } else {
            $order_data = [
                'id_produk' => $product_id,
                'id_user' => $data['user']['id'],
                'name' => $data['user']['name'],
                'product_name' => $data['product']['product_name'],
                'quantity' => $this->input->post('quantity'),
                'price' => $data['product']['price'] / 2 * $this->input->post('quantity'),
                'address' => $this->input->post('address'),
                'service' => $this->input->post('service'),
                'contact' => $this->input->post('contact'),
            ];
            $this->Order_model->create_order($order_data);
            $this->session->set_flashdata('message', '<div class="flex p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800" role="alert">
			<svg aria-hidden="true" class="inline flex-shrink-0 mr-3 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
			<span class="sr-only">Info</span>
			<div>
			  <span class="font-medium">Your order is successfully submitted!</span>
			</div>
		  	</div>');
            redirect('user/profil');
        }
    }

    public function tentang()
    {
        $data['title'] = 'About';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('user/tentang', $data);
        $this->load->view('templates/footer');
    }

    public function terms()
    {
        $data['title'] = 'Terms and Conditions';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('user/terms', $data);
        $this->load->view('templates/footer');
    }

    public function profil()
    {
        $data['title'] = 'Profile';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['review'] = $this->model_produk->tampil_data_review()->result();
        $this->load->view('templates/header', $data);
        $this->load->view('user/profil', $data);
        $this->load->view('templates/footer');
    }

    public function testimoni()
    {
        $data['review'] = $this->model_produk->tampil_data_review()->result();
        $data['title'] = 'Review';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('user/testimoni', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_testimoni()
    {
        $data['review'] = $this->model_produk->tampil_data_review()->result();
        $data['title'] = 'Add Review';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('user/tambahReview', $data);
        $this->load->view('templates/footer');
    }

    public function edit()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('name', 'Nama Lengkap', 'required|trim', [
            'required' => 'Name must be filled in'
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Edit Profile';
            $this->load->view('templates/header', $data);
            $this->load->view('user/editProfil', $data);
            $this->load->view('templates/footer');
        } else {
            $name   = $this->input->post('name');
            $email  = $this->input->post('email');

            // Cek jika ada gambar yang diupload
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|jpeg|png|JPG|JPEG|PNG';
                $config['upload_path'] = './assets/img/profil/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $old_image = $data['user']['image'];
                    if ($old_image != 'default.png') {
                        unlink(FCPATH . 'assets/img/profil/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            } else {
                $where = array('email' => $email);
                $files = $this->db->get_where('user', $where)->row_array();
                $new_image = $files['image'];
                $this->db->set('image', $new_image);
            }

            $this->db->set('name', $name);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->set_flashdata('message', '<div class="flex p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800" role="alert">
			<svg aria-hidden="true" class="inline flex-shrink-0 mr-3 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
			<span class="sr-only">Info</span>
			<div>
			  <span class="font-medium">Your profile is successfully updated!</span>
			</div>
		  	</div>');
            redirect('user/profil');
        }
    }

    public function ubah_password()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('current_password', 'Kata Sandi Lama', 'required|trim', [
            'required'      => 'Password must be filled in!'
        ]);
        $this->form_validation->set_rules('new_password1', 'Kata Sandi Baru', 'required|min_length[8]|matches[new_password2]', [
            'matches'       => 'Password is incorrect!',
            'min_length'    => 'Password must be at least 8 characters!',
            'required'      => 'Password must be filled in!'
        ]);

        $this->form_validation->set_rules('new_password2', 'Ulangi Kata Sandi', 'required|min_length[8]|matches[new_password1]', [
            'matches'       => 'Password is incorrect!',
            'min_length'    => 'Password must be at least 8 characters!',
            'required'      => 'Password must be filled in!'
        ]);

        if ($this->form_validation->run() == false) {

            $data['title'] = 'Change Password';
            $this->load->view('templates/header', $data);
            $this->load->view('user/ubahPassword', $data);
            $this->load->view('templates/footer');
        } else {
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password1');
            if (!password_verify($current_password, $data['user']['password'])) {
                $this->session->set_flashdata('message', '<div class="flex p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
			    <svg aria-hidden="true" class="inline flex-shrink-0 mr-3 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
			    <span class="sr-only">Info</span>
			    <div>
			  <span class="font-medium">Old password is incorrect!</span>
			    </div>
		  	    </div>');
                redirect('user/ubah_password');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('message', '<div class="flex p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
                    <svg aria-hidden="true" class="inline flex-shrink-0 mr-3 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Info</span>
                    <div>
                     <span class="font-medium">New password must not be the old password!</span>
                    </div>
                    </div>');
                    redirect('user/ubah_password');
                } else {
                    // PASSWORD SUDAH BENAR
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('user');

                    $this->session->set_flashdata('message', '<div class="flex p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800" role="alert">
                    <svg aria-hidden="true" class="inline flex-shrink-0 mr-3 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Info</span>
                    <div>
                    <span class="font-medium">Password is successfully updated!</span>
                    </div>
                    </div>');
                    redirect('user/profil');
                }
            }
        }
    }

    public function detail_produk($id)
    {
        $data['review_detail'] = $this->model_produk->tampil_data_review_detail()->result();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['produk'] = $this->model_produk->detail_semua_produk($id);
        $data['title'] = 'Product Details';

        $this->load->view('templates/header', $data);
        $this->load->view('user/detailProduk', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_aksi_testimoni()
    {
        $name           = $this->input->post('name');
        $image_profile  = $this->input->post('image_profile');
        $review         = $this->input->post('review');
        $image_review  = $_FILES['image_review']['name'];

        if ($image_review = '') {
        } else {
            $config['upload_path'] = './assets/img/testimoni/';
            $config['allowed_types'] = 'jpg|jpeg|png|JPG|JPEG|PNG|gif|mp4|MP4|webm';

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('image_review')) {
                echo "Image is unsuccessfully uploaded";
            } else {
                $image_review = $this->upload->data('file_name');
            }
        }

        $data = [
            'name'              => $name,
            'review'            => $review,
            'image_profile'     => $image_profile,
            'image_review'      => $image_review,
            'posting_time'      => time(),
            'favorite'          => 0
        ];

        $this->model_produk->tambah_testimoni($data, 'tb_review');
        $this->session->set_flashdata('message', '<div class="flex p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800" role="alert">
                    <svg aria-hidden="true" class="inline flex-shrink-0 mr-3 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Info</span>
                    <div>
                    <span class="font-medium">Your review has recorded!</span>
                    </div>
                    </div>');
        redirect('user/testimoni');
    }

    public function tambah_aksi_testimoni_detail()
    {
        $id_product     = $this->input->post('id_product');
        $name           = $this->input->post('name');
        $image_profile  = $this->input->post('image_profile');
        $review         = $this->input->post('review');
        $image_review  = $_FILES['image_review']['name'];

        if ($image_review = '') {
        } else {
            $config['upload_path'] = './assets/img/testimoni/';
            $config['allowed_types'] = 'jpg|jpeg|png|JPG|JPEG|PNG|gif|mp4|MP4|webm';

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('image_review')) {
                echo "Image is unsuccessfully uploaded";
            } else {
                $image_review = $this->upload->data('file_name');
            }
        }

        $data = [
            'id_product'        => $id_product,
            'name'              => $name,
            'review'            => $review,
            'image_profile'     => $image_profile,
            'image_review'      => $image_review,
            'posting_time'      => time(),
            'favorite'          => 0
        ];

        $this->model_produk->tambah_testimoni($data, 'tb_review_detail');
        $this->session->set_flashdata('message', '<div class="flex p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800" role="alert">
                    <svg aria-hidden="true" class="inline flex-shrink-0 mr-3 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Info</span>
                    <div>
                    <span class="font-medium">Your review has recorded!</span>
                    </div>
                    </div>');
        redirect('user/produk');
    }

    public function tambah_testimoni_detail($id)
    {
        $where = array('id_product' => $id);
        $data['review_detail'] = $this->model_produk->edit_testimoni($where, 'tb_review_detail')->result();

        $data['title'] = 'Add Review';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['produk'] = $this->model_produk->detail_semua_produk($id);

        $this->load->view('templates/header', $data);
        $this->load->view('user/tambahReviewDetail', $data);
        $this->load->view('templates/footer', $data);
    }

    public function hapus_testimoni($id)
    {
        $where = array('id' => $id);
        $this->model_produk->hapus_data($where, 'tb_review');
        $this->session->set_flashdata('message', '<div class="flex p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800" role="alert">
                    <svg aria-hidden="true" class="inline flex-shrink-0 mr-3 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Info</span>
                    <div>
                    <span class="font-medium">Your review is successfully deleted</span>
                    </div>
                    </div>');
        redirect('user/profil');
    }
}

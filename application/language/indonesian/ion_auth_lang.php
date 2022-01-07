<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Name:  Ion Auth Lang - Indonesian
*
* Author: Toni Haryanto
* 		  toha.samba@gmail.com
*         @yllumi
*
* Author: Daeng Muhammad Feisal
*         daengdoang@gmail.com
*         @daengdoang
*
* Author: Suhindra
*         suhindra@hotmail.co.id
*         @suhindra
*
* Location: https://github.com/benedmunds/CodeIgniter-Ion-Auth
*
* Created:  11.15.2011
* Last-Edit: 28.04.2016
*
* Description:  Indonesian language file for Ion Auth messages and errors
*
*/

// Account Creation
$lang['account_creation_successful']				= '<div class="alert alert-success">Akun Berhasil Dibuat</div>';
$lang['account_creation_unsuccessful']				= '<div class="alert alert-danger">Tidak Dapat Membuat Akun</div>';
$lang['account_creation_duplicate_email']			= '<div class="alert alert-warning">Email Sudah Digunakan atau Tidak Valid</div>';
$lang['account_creation_duplicate_identity']	    = '<div class="alert alert-warning">Identitas Sudah Digunakan atau Tidak Valid</div>';

// TODO Please Translate
$lang['account_creation_missing_default_group']		= '<div class="alert alert-warning">Standar grup tidak diatur</div>';
$lang['account_creation_invalid_default_group']		= '<div class="alert alert-warning">Pengaturan Nama Grup Standar Tidak Valid</div>';


// Password
$lang['password_change_successful']					= '<div class="alert alert-success">Kata Sandi Berhasil Diubah</div>';
$lang['password_change_unsuccessful']				= '<div class="alert alert-danger">Tidak Dapat Mengganti Kata Sandi</div>';
$lang['forgot_password_successful']					= '<div class="alert alert-success">Email untuk Set Ulang Kata Sandi Telah Dikirim</div>';
$lang['forgot_password_unsuccessful']				= '<div class="alert alert-danger">Tidak Dapat Set Ulang Kata Sandi</div>';

// Activation
$lang['activate_successful']						= '<div class="alert alert-success">Akun Telah Diaktifkan</div>';
$lang['activate_unsuccessful']						= '<div class="alert alert-danger">Tidak Dapat Mengaktifkan Akun</div>';
$lang['deactivate_successful']						= '<div class="alert alert-danger">Akun Telah Dinonaktifkan</div>';
$lang['deactivate_unsuccessful']					= '<div class="alert alert-danger">Tidak Dapat Menonaktifkan Akun</div>';
$lang['activation_email_successful']			    = '<div class="alert alert-success">Email untuk Aktivasi Telah Dikirim. Silahkan cek inbox atau spam</div>';
$lang['activation_email_unsuccessful']		        = '<div class="alert alert-danger">Tidak Dapat Mengirimkan Email Aktivasi</div>';

// Login / Logout
$lang['login_successful']							= '<div class="alert alert-success">Log In Berhasil</div>';
$lang['login_unsuccessful']							= '<div class="alert alert-danger">Log In Gagal</div>';
$lang['login_unsuccessful_not_active']	            = '<div class="alert alert-warning">Akun Tidak Aktif</div>';
$lang['login_timeout']								= '<div class="alert alert-warning">Sementara Terkunci. Coba Beberapa Saat Lagi.</div>';
$lang['logout_successful']							= '<div class="alert alert-success">Log Out Berhasil</div>';

// Account Changes
$lang['update_successful']							= '<div class="alert alert-success">Informasi Akun Berhasil Diperbaharui</div>';
$lang['update_unsuccessful']						= '<div class="alert alert-danger">Gagal Memperbaharui Informasi Akun</div>';
$lang['delete_successful']							= '<div class="alert alert-success">Pengguna Telah Dihapus</div>';
$lang['delete_unsuccessful']						= '<div class="alert alert-danger">Gagal Menghapus Pengguna</div>';

// Groups
$lang['group_creation_successful']				    = '<div class="alert alert-success">Grup Berhasil Dibuat</div>';
$lang['group_already_exists']						= '<div class="alert alert-warning">Nama Grup Sudah Digunakan</div>';
$lang['group_update_successful']					= '<div class="alert alert-success">Rincian Grup Berhasil Diubah</div>';
$lang['group_delete_successful']					= '<div class="alert alert-success">Grup Berhasil Dihapus</div>';
$lang['group_delete_unsuccessful']				    = '<div class="alert alert-danger">Gagal Menghapus Grup</div>';
$lang['group_delete_notallowed']					= '<div class="alert alert-warning">Tidak Dapat menghapus Grup Administrator</div>';
$lang['group_name_required']						= '<div class="alert alert-warning">Nama Grup Tidak Boleh Kosong</div>';
$lang['group_name_admin_not_alter']			    	= '<div class="alert alert-warning">Nama Grup Admin Tidak Bisa Diubah</div>';

// Activation Email
$lang['email_activation_subject']					= 'Aktivasi Akun';
$lang['email_activate_heading']						= 'Aktifkan Akun dari %s';
$lang['email_activate_subheading']				    = 'Silahkan klik tautan berikut untuk %s.';
$lang['email_activate_link']						= 'Aktifkan Akun Anda';

// Forgot Password Email
$lang['email_forgotten_password_subject']			= 'Verifikasi Lupa Password';
$lang['email_forgot_password_heading']				= 'Setel Ulang Kata Sandi untuk %s';
$lang['email_forgot_password_subheading']			= 'Silahkan klik tautan berikut untuk %s.';
$lang['email_forgot_password_link']					= 'Setel Ulang Kata Sandi';

// New Password Email
$lang['email_new_password_subject']					= 'Kata Sandi Baru';
$lang['email_new_password_heading']					= 'Kata Sandi Baru Untuk %s';
$lang['email_new_password_subheading']			    = 'Kata Sandi Telah Diubah Ke: %s';

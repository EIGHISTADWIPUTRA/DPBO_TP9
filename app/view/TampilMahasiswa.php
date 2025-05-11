<?php

/******************************************
 Asisten Pemrogaman 13 & 14
******************************************/

include("KontrakView.php");
include("presenter/ProsesMahasiswa.php");

class TampilMahasiswa implements KontrakView
{
	private $prosesmahasiswa; 
	private $tpl;

	function __construct()
	{
		//konstruktor
		$this->prosesmahasiswa = new ProsesMahasiswa();
	}

	function prosesAdd($data)
	{
		// Memproses penambahan data mahasiswa
		$this->prosesmahasiswa->prosesAddMahasiswa($data);
		header("Location: index.php");
		exit();
	}

	function prosesEdit($id, $data)
	{
		// Memproses update data mahasiswa
		$this->prosesmahasiswa->prosesUpdateMahasiswa($id, $data);
		header("Location: index.php");
		exit();
	}

	function tampil()
	{
		$action = isset($_GET['action']) ? $_GET['action'] : '';
		$id = isset($_GET['id']) ? $_GET['id'] : null;

		$form = ''; // Variabel untuk menyimpan HTML form

		// Logika untuk menangani aksi CRUD
		if ($action == 'add') {
			$form = $this->generateForm(); // Tampilkan form tambah
		} elseif ($action == 'edit' && $id !== null) {
			$mhs = $this->prosesmahasiswa->prosesGetMahasiswaById($id);
			if ($mhs) {
				$form = $this->generateForm($mhs); // Tampilkan form edit dengan data
			}
		} elseif ($action == 'delete' && $id !== null) {
			$this->prosesmahasiswa->prosesDeleteMahasiswa($id);
			header("Location: index.php"); // Redirect setelah delete
			exit();
		}
		
		$this->prosesmahasiswa->prosesDataMahasiswa();
		$data = "";

		//semua terkait tampilan adalah tanggung jawab view
		for ($i = 0; $i < $this->prosesmahasiswa->getSize(); $i++) {
			$no = $i + 1;
			$data .= "<tr>
			<td>" . $no . "</td>
			<td>" . $this->prosesmahasiswa->getNim($i) . "</td>
			<td>" . $this->prosesmahasiswa->getNama($i) . "</td>
			<td>" . $this->prosesmahasiswa->getTempat($i) . "</td>
			<td>" . $this->prosesmahasiswa->getTl($i) . "</td>
			<td>" . $this->prosesmahasiswa->getGender($i) . "</td>
			<td>" . $this->prosesmahasiswa->getEmail($i) . "</td>
			<td>" . $this->prosesmahasiswa->getTelp($i) . "</td>
			<td>
				<a href='index.php?action=edit&id=" . $this->prosesmahasiswa->getId($i) . "' class='btn btn-warning btn-sm'>Edit</a>
				<a href='index.php?action=delete&id=" . $this->prosesmahasiswa->getId($i) . "' class='btn btn-danger btn-sm' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data ini?\")'>Hapus</a>
			</td>
			</tr>";
		}

		$this->tpl = new Template("templates/skin.html");
		$this->tpl->replace("DATA_TABEL", $data);
		$this->tpl->replace("DATA_FORM", $form);
		$this->tpl->replace("TOMBOL_TAMBAH", "<a href='index.php?action=add' class='btn btn-primary mb-3'>Tambah Data Mahasiswa</a>");

		$this->tpl->write();
	}

	function generateForm($mahasiswa = null)
	{
		$action_url = ($mahasiswa) ? 'index.php?action=submit_edit&id=' . $mahasiswa->getId() : 'index.php?action=submit_add';
		$nim_val = ($mahasiswa) ? $mahasiswa->getNim() : '';
		$nama_val = ($mahasiswa) ? $mahasiswa->getNama() : '';
		$tempat_val = ($mahasiswa) ? $mahasiswa->getTempat() : '';
		$tl_val = ($mahasiswa) ? $mahasiswa->getTl() : '';
		$gender_lk_checked = ($mahasiswa && $mahasiswa->getGender() == 'Laki-laki') ? 'checked' : '';
		$gender_pr_checked = ($mahasiswa && $mahasiswa->getGender() == 'Perempuan') ? 'checked' : '';
		$email_val = ($mahasiswa) ? $mahasiswa->getEmail() : '';
		$telp_val = ($mahasiswa) ? $mahasiswa->getTelp() : '';
		$form_title = ($mahasiswa) ? 'Edit Data Mahasiswa' : 'Tambah Data Mahasiswa';
		$submit_button_text = ($mahasiswa) ? 'Update' : 'Simpan';

		return '
		<div class="card">
			<div class="card-header">
				' . $form_title . '
			</div>
			<div class="card-body">
				<form action="' . $action_url . '" method="post">
					<div class="mb-3">
						<label for="nim" class="form-label">NIM</label>
						<input type="text" class="form-control" id="nim" name="nim" value="' . $nim_val . '" required>
					</div>
					<div class="mb-3">
						<label for="nama" class="form-label">Nama</label>
						<input type="text" class="form-control" id="nama" name="nama" value="' . $nama_val . '" required>
					</div>
					<div class="mb-3">
						<label for="tempat" class="form-label">Tempat Lahir</label>
						<input type="text" class="form-control" id="tempat" name="tempat" value="' . $tempat_val . '" required>
					</div>
					<div class="mb-3">
						<label for="tl" class="form-label">Tanggal Lahir</label>
						<input type="date" class="form-control" id="tl" name="tl" value="' . $tl_val . '" required>
					</div>
					<div class="mb-3">
						<label class="form-label">Jenis Kelamin</label>
						<div>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="gender" id="gender_lk" value="Laki-laki" ' . $gender_lk_checked . ' required>
								<label class="form-check-label" for="gender_lk">Laki-laki</label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="gender" id="gender_pr" value="Perempuan" ' . $gender_pr_checked . ' required>
								<label class="form-check-label" for="gender_pr">Perempuan</label>
							</div>
						</div>
					</div>
					<div class="mb-3">
						<label for="email" class="form-label">Email</label>
						<input type="email" class="form-control" id="email" name="email" value="' . $email_val . '" required>
					</div>
					<div class="mb-3">
						<label for="telp" class="form-label">Telepon</label>
						<input type="text" class="form-control" id="telp" name="telp" value="' . $telp_val . '" required>
					</div>
					<button type="submit" class="btn btn-primary">' . $submit_button_text . '</button>
					<a href="index.php" class="btn btn-secondary">Batal</a>
				</form>
			</div>
		</div>';
	}
}

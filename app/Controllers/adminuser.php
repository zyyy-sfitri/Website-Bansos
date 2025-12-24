<?php
namespace App\Controllers;

use App\Models\adminuserModel;
use App\Models\NotifikasiModel;

class adminuser extends BaseController
{
    protected $adminuserModel;

    public function __construct()
    {
        $this->adminuserModel = new adminuserModel();
    }


    public function index(): string
    {
        $current = $this->request->getVar('page_user') ?? 1;
        $cari = $this->request->getVar('cari');
        $perPage = 50;

       
        $query = $this->adminuserModel->where('status !=', 'disetujui')->orderBy('id_user', 'DESC');

        if ($cari) {
            $query->like('nama', $cari);
        }

        $adminuser = $query->paginate($perPage, 'user');
        $pager = $this->adminuserModel->pager;

        $data = [
            'title'         => 'Daftar Pengajuan',
            'adminuser'     => $adminuser,
            'pager'         => $pager,
            'current'       => $current,
            'cari'          => $cari,
            'total_apps'    => $this->getTotalApplications(),
            'pending_count' => $this->getPendingCount(),
            'approved_count' => $this->getApprovedCount(),
            'rejected_count' => $this->getRejectedCount()
        ];

        return view('adminuser/pengajuan', $data);
    }

    
public function dashboard()
{
    $notifModel = new NotifikasiModel();

    $jumlahNotif = $notifModel
        ->where('target_role', 'admin')
        ->where('status', 'baru')
        ->countAllResults();

    return view('admin/dashboard', [
        'jumlahNotif' => $jumlahNotif
    ]);
}



public function penerima()
{
    $cari = $this->request->getVar('cari');
    $perPage = 100;

    if ($cari) {
        $adminuser = $this->adminuserModel
            ->like('nama', $cari)
            ->where('status', 'disetujui')
            ->orderBy('id_user', 'DESC')
            ->paginate($perPage, 'adminuser');

        $pager = $this->adminuserModel->pager;

        
        if (empty($adminuser)) {
            session()->setFlashdata('pesan', 'Data tidak ditemukan.');
        }

    } else {
        $adminuser = $this->adminuserModel
            ->where('status', 'disetujui')
            ->orderBy('id_user', 'DESC')
            ->paginate($perPage, 'adminuser');

        $pager = $this->adminuserModel->pager;
    }

    $data = [
        'title'         => 'Daftar Penerima Bansos',
        'adminuser'     => $adminuser,
        'pager'         => $pager,
        'cari'          => $cari,
        'total_apps'    => $this->getTotalApplications(),
        'pending_count' => $this->getPendingCount(),
        'approved_count' => $this->getApprovedCount(),
        'rejected_count' => $this->getRejectedCount()
    ];

    return view('adminuser/penerima', $data);
}

    public function setujui($id_user)
    {

        $this->adminuserModel->update($id_user, [
            'status' => 'disetujui',
            'status_proses' => 'persetujuan'
        ]);

        $user = $this->adminuserModel->getadminuser($id_user);

        session()->setFlashdata('pesan', 'Pengajuan berhasil disetujui');
        return redirect()->to('/adminuser');
    }

    public function tolak($id_user)
    {
        $this->adminuserModel->update($id_user, [
            'status' => 'ditolak',
            'status_proses' => 'ditolak'
        ]);

        $user = $this->adminuserModel->getadminuser($id_user);

        session()->setFlashdata('pesan', 'Pengajuan berhasil ditolak');
        return redirect()->to('/adminuser');
    }

    public function edit($id_user)
    {
        $data = [
            'title'       => 'Ubah Data Pengajuan',
            'validation'  => \Config\Services::validation(),
            'adminuser'   => $this->adminuserModel->getadminuser($id_user)
        ];

        return view('adminuser/edit', $data);
    }

    public function edit_penerima($id_user)
    {
        $adminuser = $this->adminuserModel->getadminuser($id_user);

        if (!$adminuser) {
            return redirect()->to('/adminuser/penerima')->with('error', 'Data user tidak ditemukan');
        }

        $data = [
            'title'       => 'Ubah Data Penerima',
            'validation'  => \Config\Services::validation(),
            'adminuser'   => $adminuser,
            'StatusUser'  => $adminuser
        ];

        return view('adminuser/edit_penerima', $data);
    }


    public function update($id_user)
    {
        if (!$this->validate([
            'nama' => [
                'rules'  => 'required',
                'errors' => ['required' => 'Nama harus diisi']
            ],
        ])) {
            return redirect()->back()->withInput();
        }

        $this->adminuserModel->save([
            'id_user' => $id_user,
            'nama'    => $this->request->getVar('nama'),
            'nik'     => $this->request->getVar('nik'),
            'status'  => $this->request->getVar('status'),
            'tanggal' => $this->request->getVar('tanggal'),
        ]);

        session()->setFlashdata('pesan', 'Data Berhasil Diupdate');
        return redirect()->to('/adminuser');
    }

    public function hapus($id_user)
    {
        $this->adminuserModel->delete($id_user);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to('/adminuser');
    } 

    public function status($id_user)
    {
        $adminModel = new adminuserModel();

        $user = $adminModel->getadminuser($id_user);
        $steps = [
            'pengajuan_masuk' => 'Pendaftaran',
            'verifikasi'      => 'Verifikasi Dokumen',
            'survei'          => 'Survei Lapangan',
            'validasi'        => 'Validasi Data',
            'persetujuan'     => 'Persetujuan',
            'pencairan'       => 'Pencairan Bantuan'
        ];

        $current = $user['status_proses'] ?? 'pengajuan_masuk';
        $found = false;
        $timeline = [];

        foreach ($steps as $key => $label) {
            if ($current === 'ditolak') {
                if ($key === $current) {
                    $circle = 'pending';
                    $statusText = 'DITOLAK';
                    $badge = 'ditolak';
                    $found = true;
                } elseif (!$found) {
                    $circle = 'active';
                    $statusText = 'SELESAI';
                    $badge = 'selesai';
                } else {
                    $circle = '';
                    $statusText = 'MENUNGGU';
                    $badge = 'proses';
                }
            } else {
                if ($key === $current) {
                    $circle = 'pending';
                    $statusText = 'PROSES';
                    $badge = 'proses';
                    $found = true;
                } elseif (!$found) {
                    $circle = 'active';
                    $statusText = 'SELESAI';
                    $badge = 'selesai';
                } else {
                    $circle = '';
                    $statusText = 'MENUNGGU';
                    $badge = 'proses';
                }
            }

            $timeline[] = [
                'key' => $key,
                'label' => $label,
                'circle' => $circle,
                'statusText' => $statusText,
                'badge' => $badge,
                'date' => date("d F Y")
            ];
        }

        $data = [
            'user' => $user,
            'StatusUser' => $user,
            'timeline' => $timeline,
            
        ];

        return view('user/status', $data);
    }

   public function unduh($id_user)
{
    $user = $this->adminuserModel->getadminuser($id_user);

    if (!$user) {
        throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }

    if ($user['status_proses'] !== 'selesai') {
        return redirect()->back()->with('error', 'Surat keterangan hanya dapat diunduh setelah proses pencairan selesai.');
    }

   
    if (class_exists('\Dompdf\Dompdf')) {
        $dompdf = new \Dompdf\Dompdf();
        $dompdf->set_option('isRemoteEnabled', true);

        $html = "
        <html>
        <head>
            <style>
                body { font-family: inter, sans-serif; margin: 40px; }
                .kop { text-align: center; font-size: 14px; }
                .header { text-align: center; margin-bottom: 30px; }
                .header h1 { font-size: 24px; margin: 0; }
                .header p { font-size: 14px; margin: 5px 0; }
                .content { margin: 20px 0; }
                .content colon { text-align: center; width: 10px;}
                .field { margin-bottom: 10px; }
                .label { font-weight: bold; display: inline-block; width: 150px; }
                .footer { margin-top: 50px; text-align: right; font-size: 12px; }
            </style>
        </head>
        <body>
 <div class='kop'>
        <strong>PEMERINTAH KABUPATEN/KOTA CILACAP </strong><br>
        <strong>KECAMATAN KESUGIHAN </strong><br>
        <strong>DESA/KELURAHAN MERPATI INDAH</strong><br>
        Alamat : Jl. JALAN JALAN SAMPE BOGOR<br>
        Telp : (+88) 9876543455677 | Kode Pos : 976543223455
    </div>
<hr>
            <div class='header'>
                <h1>SURAT KETERANGAN PENGAMBILAN BANSOS</h1>
                <p>Kantor Kesugihan</p>
            </div>
            <div class='content'>
                <div class='field'>
                    <span class='label'>Nama Lengkap</span> 
                    <span class='colon'>:</span>
                    {$user['nama']}
                </div>
                <div class='field'>
                    <span class='label'>NIK</span> 
                    <span class='colon'>:</span>
                    {$user['nik']}
                </div>
                <div class='field'>
                    <span class='label'>Status</span> 
                    <span class='colon'>:</span>
                    {$user['status_proses']}
                </div>
                <div class='field'>
                    <span class='label'>Program</span> 
                    <span class='colon'>:</span>
                    Bantuan Sembako
                </div>
                <div class='field'>
                    <span class='label'>Jumlah</span> 
                    <span class='colon'>:</span>
                    Sembako Lengkap
                </div>
                <div class='field'>
                    <span class='label'>Periode</span> 
                    <span class='colon'>:</span>
                    3 Bulan
                </div>
            </div>
             <!-- Keterangan resmi -->
    <div class='intro'>
        Berdasarkan dokumen dan data yang telah diajukan oleh yang bersangkutan, surat keterangan ini diterbitkan untuk keperluan permohonan bantuan sosial pemerintah. 
        Demikian surat keterangan ini dibuat dengan sebenar-benarnya dan dapat dipergunakan sebagaimana mestinya.
    </div>

    <!-- Footer / Tanda tangan -->
    <div class='footer'>

        Kepala Kantor Kecamatan Kesugihan<br><br><br>
    <u>(___________________)</u>
    </div>

        <div class='footer'>
                Dicetak pada: " . date('d-m-Y') . "
        </div>

          
        </body>
        </html>";

        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        $safeNik = preg_replace('/[^A-Za-z0-9_\-]/', '', $user['nik']);
        $filename = "Surat_{$safeNik}.pdf";

        return $this->response->setHeader('Content-Type', 'application/pdf')
                              ->setHeader('Content-Disposition', 'attachment; filename="' . $filename . '"')
                              ->setBody($dompdf->output());
    } else {
      
        $content = "SURAT KETERANGAN PERMOHONAN BANSOS\n\n"
                 . "Nama Lengkap : {$user['nama']}\n"
                 . "NIK          : {$user['nik']}\n"
                 . "Email        : {$user['email']}\n"
                 . "Alamat       : {$user['alamat']}\n"
                 . "Status       : {$user['status_proses']}\n\n"
                 . "Dicetak pada: " . date('d-m-Y') . "\n";

        $safeNik = preg_replace('/[^A-Za-z0-9_\-]/', '', $user['nik']);
        $filename = "Surat_{$safeNik}.txt";

        return $this->response->download($filename, $content);
    }
}


    public function getTotalApplications()
    {
        return $this->adminuserModel->countAll();
    }

    public function getPendingCount()
    {
        return $this->adminuserModel->where('status', 'pending')->countAllResults();
    }

    public function getApprovedCount()
    {
        return $this->adminuserModel->where('status', 'disetujui')->countAllResults();
    }

    public function getRejectedCount()
    {
        return $this->adminuserModel->where('status', 'ditolak')->countAllResults();
    }

   public function upload()
{
    $data = [
        'title' => 'Upload Data User',
        'adminuser' => $this->adminuserModel->findAll() 
    ];

    $uploadsMap = [];
    $uploadModelPath = APPPATH . 'Models/UploadModel.php';
    if (file_exists($uploadModelPath)) {
        $uploadModel = new \App\Models\UploadModel();
        $allUploads = $uploadModel->findAll();
        foreach ($allUploads as $u) {
            $uploadsMap[$u['id_user']] = $u;
        }
    }

    $data['upload'] = $uploadsMap;

    return view('adminuser/upload', $data);
}


}

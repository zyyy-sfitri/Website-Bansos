<?php

namespace App\Controllers;
use App\Models\AdminuserModel;

class Adminstatus extends BaseController
{
    protected $adminuserModel;

    public function __construct()
    {
        $this->adminuserModel = new AdminuserModel();
    }

   public function status($id)
{
    if (!session()->get('logged_in')) {
        return redirect()->to('/login')
            ->with('error', 'Anda harus login terlebih dahulu.');
    }

    $user = $this->adminuserModel->find($id);

    if (!$user) {
        throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(
            "User tidak ditemukan"
        );
    }

    $status = $user['status_proses'] ?? 'pengajuan_masuk';


    $progress = match ($status) {
        'pengajuan_masuk' => 0,
        'verifikasi'      => 20,
        'survei'          => 50,
        'validasi'        => 70,
        'persetujuan'     => 95,
        'pencairan',
        'selesai'         => 100,
        'ditolak'         => 100,
        default            => 0,
    };

   $data = [
    'StatusUser' => $user, 
    'user' => [
        'nama' => session()->get('nama'),
        'nik'  => session()->get('nik'),
        'email'=> session()->get('email'),
        'role' => session()->get('role'),
    ],
    'progress' => $progress
];


    return view('user/status', $data);
}


    public function nextStep($id)
    {
        $user = $this->adminuserModel->find($id);
        if (!$user) {
            return redirect()->to('/adminuser/penerima')->with('error', 'User tidak ditemukan');
        }

        $currentStatus = $user['status_proses'];
        $nextStatus = $this->getNextStatus($currentStatus);

        if ($nextStatus) {
            $this->adminuserModel->update($id, ['status_proses' => $nextStatus]);
            return redirect()->to('/adminuser/edit_penerima/' . $id)->with('pesan', 'Status diperbarui ke ' . $nextStatus);
        } else {
            return redirect()->to('/adminuser/edit_penerima/' . $id)->with('error', 'Tidak dapat memperbarui status');
        }
    }

    
    public function completeProcess($id)
    {
        $user = $this->adminuserModel->find($id);
        if (!$user) {
            return redirect()->to('/adminuser/penerima')->with('error', 'User tidak ditemukan');
        }

        $this->adminuserModel->update($id, ['status_proses' => 'selesai']);
        return redirect()->to('/adminuser/edit_penerima/' . $id)->with('pesan', 'Proses pencairan telah diselesaikan');
    }

    public function reject($id)
    {
        $this->adminuserModel->update($id, ['status_proses' => 'ditolak']);
        return redirect()->to('/adminuser/edit_penerima/' . $id)->with('pesan', 'Pengajuan ditolak');
    }

    private function getNextStatus($currentStatus)
    {
        $steps = [
            'pengajuan_masuk' => 'verifikasi',
            'verifikasi' => 'survei',
            'survei' => 'validasi',
            'validasi' => 'persetujuan',
            'persetujuan' => 'pencairan',
            'pencairan' => null 
        ];

        return $steps[$currentStatus] ?? null;
    }

    public function edit_penerima($id)
    {
        $StatusUser = $this->adminuserModel->find($id);

        if(!$StatusUser){
             return redirect()->to(base_url('adminuser/penerima'))->with('error', 'Data user tidak ditemukan');
        }


        return view('adminuser/edit_penerima', [
            'StatusUser' => $StatusUser
        ]);
    }

 


   

    
}

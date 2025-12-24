<?php

namespace App\Controllers;

use App\Models\NotifikasiModel;

class AdminNotifikasi extends BaseController
{
    public function index()
    {
        $model = new NotifikasiModel();

        $data['notifikasi'] = $model
            ->where('target_role', 'admin')
            ->orderBy('created_at', 'DESC')
            ->findAll();

        $data['unread_count'] = $model
            ->where('target_role', 'admin')
            ->where('status', 'baru')
            ->countAllResults();

        // tandai dibaca
        $model->where('target_role', 'admin')
              ->where('status', 'baru')
              ->set(['status' => 'dibaca'])
              ->update();

        return view('admin/notifikasi', $data);
    }

    public function getUnreadCount()
    {
        if (!session()->get('logged_in') || session()->get('role') !== 'admin') {
            return $this->response->setStatusCode(403);
        }

        $model = new \App\Models\NotifikasiModel();
        $count = $model
            ->where('target_role', 'admin')
            ->where('status', 'baru')
            ->countAllResults();

        return $this->response->setJSON(['unread_count' => $count]);
    }

      protected function loadAdminNotif()
    {
        $model = new NotifikasiModel();

        return [
            'unread_count' => $model
                ->where('target_role', 'admin')
                ->where('status', 'baru')
                ->countAllResults()
        ];
    }

    public function hapus($id)
    {
        $model = new NotifikasiModel();
        $model->delete($id);

        return redirect()->back();
    }

    public function hapusSemua()
    {
        $model = new NotifikasiModel();
        $model->where('target_role', 'admin')->delete();

        return redirect()->back();
    }
}

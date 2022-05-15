<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Cashout;
use App\Models\Contact;
use App\Models\Campaign;
use App\Models\Category;
use App\Models\Donation;
use App\Models\Subscriber;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        if (auth()->user()->hasRole('admin')) {

            // jumlah kategori
            $jumlahKategori = Category::count();
            // jumlah project
            $jumlahProject = Campaign::count();
            // project pending
            $jumlahProjectPending = Campaign::where('status', 'pending')->count();
            // kontak masuk baru
            $jumlahKontakMasuk = Contact::whereDate('created_at', date('Y-m-d'))->count();
            // total nominal donasi
            $totalDonasi = Donation::where('status', 'confirmed')->sum('nominal');
            // total donasi yg belum di konfirmasi
            $jumlahDonasiBelumDikonfirmasi = Donation::where('status', 'not confirmed')->count();
            // jumlah donasi yang sudah dikonfirmasi
            $jumlahDonasiDikonfirmasi = Donation::where('status', 'confirmed')->count();
            // total cashout_amount yang  sukses dicairkan
            $totalProjectDicairkan = Cashout::where('status', 'success')->sum('cashout_amount');

            // * range 1 tahun
            $range = range(1, 12);
            $listBulan = [];
            $listDonasi = [];
            $listPencairan = [];

            foreach ($range as $bulan) {
                $donasi = Donation::whereMonth('created_at', $bulan)
                    ->whereYear('created_at', date('Y'))
                    ->where('status', 'confirmed')
                    ->sum('nominal');
                $pencairan = Cashout::whereMonth('created_at', $bulan)
                    ->whereYear('created_at', date('Y'))
                    ->where('status', 'success')
                    ->sum('cashout_amount');

                $listBulan[] = format_bulan($bulan);
                $listDonasi[] = $donasi;
                $listPencairan[] = $pencairan;
            }


            // * range 1 bulan
            $projekPopuler = Campaign::withCount('donations')
                // ->where('created_at', 'LIKE', date('Y-m'). '%')
                ->orderByDesc('donations_count')
                ->limit(10)
                ->get();

            $topDonatur = User::withCount('donations', 'campaigns')
                ->donatur()
                // ->where('created_at', 'LIKE', date('Y-m'). '%')
                ->orderByDesc('donations_count')
                ->orderByDesc('campaigns_count')
                ->limit(10)
                ->get();

            $listNamaUser = ['Donatur', 'Subscriber'];
            $listJumlahUser = [
                User::donatur()->count(),
                Subscriber::count()
                // pengguna bulan ini
                // User::donatur()->where('created_at', 'LIKE', date('Y-m') . '%')->count(),
                // Subscriber::where('created_at', 'LIKE', date('Y-m') . '%')->count()

            ];

            // range 1 hari
            $listNotifikasi = [
                'donatur' => User::donatur()->get(), // ->whereDate('created_at', date('Y-m-d'))
                'subscriber' => Subscriber::get(), // whereDate('created_at', date('Y-m-d'))->
                'contact' => Contact::get(), // whereDate('created_at', date('Y-m-d'))->
                'donation' => Donation::get(), // whereDate('created_at', date('Y-m-d'))->
                'cashout' => Cashout::get(), // whereDate('created_at', date('Y-m-d'))->
            ];

            $countNotifikasi = collect($listNotifikasi)->map(fn ($item) => $item->count())->sum();

            return view('dashboard', \compact(
                'jumlahKategori',
                'jumlahProject',
                'jumlahProjectPending',
                'jumlahKontakMasuk',
                'totalDonasi',
                'jumlahDonasiBelumDikonfirmasi',
                'jumlahDonasiDikonfirmasi',
                'totalProjectDicairkan',
                'listBulan',
                'listDonasi',
                'listPencairan',
                'projekPopuler',
                'topDonatur',
                'listNamaUser',
                'listJumlahUser',
                'listNotifikasi',
                'countNotifikasi',
            ));
        }

        $jumlahProjek = Campaign::donatur()->count();
        $jumlahProjekPending = Campaign::donatur()->where('status', 'pending')->count();
        $totalDonasi = Donation::donatur()->where('status', 'confirmed')->sum('nominal');
        $totalProjekDicairkan = Cashout::donatur()->where('status', 'success')->sum('cashout_amount');

        // * range 1 tahun
        $range = range(1, 12);
        $listBulan = [];
        $listDonasi = [];
        $listPencairan = [];

        foreach ($range as $bulan) {
            $donasi = Donation::donatur()
                ->whereMonth('created_at', $bulan)
                ->whereYear('created_at', date('Y'))
                ->where('status', 'confirmed')
                ->sum('nominal');
            $pencairan = Cashout::donatur()
                ->whereMonth('created_at', $bulan)
                ->whereYear('created_at', date('Y'))
                ->where('status', 'success')
                ->sum('cashout_amount');

            $listBulan[] = format_bulan($bulan);
            $listDonasi[] = $donasi;
            $listPencairan[] = $pencairan;
        }

        // * range 1 bulan
        $projekPopuler = Campaign::withCount('donations')
            ->donatur()
            // ->where('created_at', 'LIKE', date('Y-m'). '%')
            ->orderByDesc('donations_count')
            ->limit(10)
            ->get();

        return view('dashboard_donatur', compact(
            'jumlahProjek',
            'jumlahProjekPending',
            'totalDonasi',
            'totalProjekDicairkan',
            'listBulan',
            'listDonasi',
            'listPencairan',
            'projekPopuler',
        ));
    }
}

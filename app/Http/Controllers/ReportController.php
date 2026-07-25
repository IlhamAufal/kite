<?php

namespace App\Http\Controllers;

use App\Models\PemasukanBahanBaku;
use App\Models\PemakaianBahanBaku;
use App\Models\MutasiBahanBaku;
use App\Models\PemasukanHasilProduksi;
use App\Models\PengeluaranHasilProduksi;
use App\Models\MutasiHasilProduksi;
use App\Models\PencatatanPenyesuaian;
use App\Models\PebChangeLog;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        return view('report.index');
    }

    public function pemasukanBahanBaku(Request $request)
    {
        $query = PemasukanBahanBaku::query();

        if ($request->filled('from_date') && $request->filled('to_date')) {
            $query->whereBetween('tgl_rekam', [$request->from_date, $request->to_date]);
        }

        $data = $query->orderBy('tgl_rekam', 'desc')->paginate(50)->withQueryString();

        return view('reports.pemasukan_bahan_baku', compact('data'));
    }

    public function pemakaianBahanBaku(Request $request)
    {
        $query = PemakaianBahanBaku::query();

        if ($request->filled('from_date') && $request->filled('to_date')) {
            $query->whereBetween('tgl_pengeluaran', [$request->from_date, $request->to_date]);
        }

        $data = $query->orderBy('tgl_pengeluaran', 'desc')->paginate(50)->withQueryString();

        return view('reports.pemakaian_bahan_baku', compact('data'));
    }

    public function mutasiBahanBaku(Request $request)
    {
        $query = MutasiBahanBaku::query();

        if ($request->filled('month') && $request->filled('year')) {
            $query->where('bulan', $request->month)
                  ->where('tahun', $request->year);
        }

        $data = $query->orderBy('kode_barang', 'asc')->paginate(50)->withQueryString();

        return view('reports.mutasi_bahan_baku', compact('data'));
    }

    public function pemasukanHasilProduksi(Request $request)
    {
        $query = PemasukanHasilProduksi::query();

        if ($request->filled('from_date') && $request->filled('to_date')) {
            $query->whereBetween('dokumen_tanggal', [$request->from_date, $request->to_date]);
        }

        $data = $query->orderBy('dokumen_tanggal', 'desc')->paginate(50)->withQueryString();

        return view('reports.pemasukan_hasil_produksi', compact('data'));
    }

    public function pengeluaranHasilProduksi(Request $request)
    {
        $query = PengeluaranHasilProduksi::query();

        if ($request->filled('from_date') && $request->filled('to_date')) {
            $query->whereBetween('bk_pengeluaran_tanggal', [$request->from_date, $request->to_date]);
        }

        $data = $query->orderBy('bk_pengeluaran_tanggal', 'desc')->paginate(50)->withQueryString();

        return view('reports.pengeluaran_hasil_produksi', compact('data'));
    }

    public function mutasiHasilProduksi(Request $request)
    {
        $query = MutasiHasilProduksi::query();

        if ($request->filled('month') && $request->filled('year')) {
            $query->where('bulan', $request->month)
                  ->where('tahun', $request->year);
        }

        $data = $query->orderBy('kode_barang', 'asc')->paginate(50)->withQueryString();

        return view('reports.mutasi_hasil_produksi', compact('data'));
    }

    public function pencatatanPenyesuaian(Request $request)
    {
        $query = PencatatanPenyesuaian::query();

        if ($request->filled('from_date') && $request->filled('to_date')) {
            $query->whereBetween('delivery_date', [$request->from_date, $request->to_date]);
        }

        $data = $query->orderBy('delivery_date', 'desc')->paginate(50)->withQueryString();

        return view('reports.pencatatan_penyesuaian', compact('data'));
    }

    public function pebChangeLog(Request $request)
    {
        $query = PebChangeLog::query();

        if ($request->filled('from_date') && $request->filled('to_date')) {
            $query->whereBetween('datetimechange', [$request->from_date . ' 00:00:00', $request->to_date . ' 23:59:59']);
        }

        $data = $query->orderBy('datetimechange', 'desc')->paginate(50)->withQueryString();

        return view('reports.peb_change_log', compact('data'));
    }
}

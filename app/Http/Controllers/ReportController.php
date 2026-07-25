<?php

namespace App\Http\Controllers;

use App\Exports\MutasiBahanBakuExport;
use App\Exports\MutasiHasilProduksiExport;
use App\Exports\PebChangeLogExport;
use App\Exports\PemakaianBahanBakuExport;
use App\Exports\PemasukanBahanBakuExport;
use App\Exports\PemasukanHasilProduksiExport;
use App\Exports\PencatatanPenyesuaianExport;
use App\Exports\PengeluaranHasilProduksiExport;
use App\Models\MutasiBahanBaku;
use App\Models\MutasiHasilProduksi;
use App\Models\PebChangeLog;
use App\Models\PemakaianBahanBaku;
use App\Models\PemasukanBahanBaku;
use App\Models\PemasukanHasilProduksi;
use App\Models\PencatatanPenyesuaian;
use App\Models\PengeluaranHasilProduksi;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

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

        if ($download = $request->download) {
            if ($download === 'xlsx') {
                return Excel::download(new PemasukanBahanBakuExport($request->from_date, $request->to_date), 'pemasukan-bahan-baku.xlsx');
            }
            $data = $query->orderBy('tgl_rekam', 'desc')->get();
            $rows = $data->map(fn($r, $i) => [
                $i + 1,
                $r->tgl_rekam?->format('d/m/Y'),
                $r->doc_type,
                $r->nomor_pib,
                $r->tanggal_pib?->format('d/m/Y'),
                $r->kode_hs,
                $r->gr_number,
                $r->gr_date?->format('d/m/Y'),
                $r->id_product,
                $r->name_product,
                $r->uom,
                $r->qty,
                $r->currency,
                $r->amount,
                $r->warehouse,
                $r->penerima_subkontrak,
                $r->country,
            ]);
            $pdf = Pdf::loadView('pdf.report', [
                'title' => 'Laporan Pemasukan Bahan Baku',
                'subtitle' => 'Data impor bahan baku (PIB & GR)',
                'columns' => ['No', 'Tgl Rekam', 'Jenis Dokumen', 'Nomor PIB', 'Tanggal PIB', 'Kode HS', 'GR Number', 'GR Date', 'Kode BB', 'Nama Barang', 'Satuan', 'Jumlah', 'Mata Uang', 'Nilai Barang', 'Gudang', 'Penerima Subkontrak', 'Negara Asal'],
                'rows' => $rows,
            ]);
            return $pdf->download('pemasukan-bahan-baku.pdf');
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

        if ($download = $request->download) {
            if ($download === 'xlsx') {
                return Excel::download(new PemakaianBahanBakuExport($request->from_date, $request->to_date), 'pemakaian-bahan-baku.xlsx');
            }
            $data = $query->orderBy('tgl_pengeluaran', 'desc')->get();
            $rows = $data->map(fn($r, $i) => [
                $i + 1,
                $r->no_pengeluaran,
                $r->tgl_pengeluaran?->format('d/m/Y'),
                $r->id_product,
                $r->name_product,
                $r->uom,
                $r->qty_usage,
                $r->jumlah_disubkontrakkan,
                $r->penerima_subkontrak,
                $r->warehouse,
            ]);
            $pdf = Pdf::loadView('pdf.report', [
                'title' => 'Laporan Pemakaian Bahan Baku',
                'subtitle' => 'Data pemakaian bahan baku di produksi',
                'columns' => ['No', 'No Pengeluaran', 'Tgl Pengeluaran', 'Kode Barang', 'Nama Barang', 'Satuan', 'Jml Digunakan', 'Jml Disubkontrakkan', 'Penerima Subkontrak', 'Gudang'],
                'rows' => $rows,
            ]);
            return $pdf->download('pemakaian-bahan-baku.pdf');
        }

        $data = $query->orderBy('tgl_pengeluaran', 'desc')->paginate(50)->withQueryString();
        return view('reports.pemakaian_bahan_baku', compact('data'));
    }

    public function mutasiBahanBaku(Request $request)
    {
        $query = MutasiBahanBaku::query();

        if ($request->filled('month') && $request->filled('year')) {
            $query->where('bulan', $request->month)->where('tahun', $request->year);
        }

        if ($download = $request->download) {
            if ($download === 'xlsx') {
                return Excel::download(new MutasiBahanBakuExport($request->month, $request->year), 'mutasi-bahan-baku.xlsx');
            }
            $data = $query->orderBy('kode_barang')->get();
            $rows = $data->map(fn($r, $i) => [
                $i + 1,
                $r->kode_barang,
                $r->nama_barang,
                $r->satuan,
                $r->saldo_awal,
                $r->pemasukan,
                $r->pemasukan_lain,
                $r->pengeluaran,
                $r->pengeluaran_lain,
                $r->saldo_akhir,
                $r->gudang,
            ]);
            $pdf = Pdf::loadView('pdf.report', [
                'title' => 'Laporan Mutasi Bahan Baku',
                'subtitle' => 'Saldo bulanan bahan baku (awal + masuk - keluar = akhir)',
                'columns' => ['No', 'Kode Barang', 'Nama Barang', 'Satuan', 'Saldo Awal', 'Pemasukan', 'Pemasukan Lain', 'Pengeluaran', 'Pengeluaran Lain', 'Saldo Akhir', 'Gudang'],
                'rows' => $rows,
            ]);
            return $pdf->download('mutasi-bahan-baku.pdf');
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

        if ($download = $request->download) {
            if ($download === 'xlsx') {
                return Excel::download(new PemasukanHasilProduksiExport($request->from_date, $request->to_date), 'pemasukan-hasil-produksi.xlsx');
            }
            $data = $query->orderBy('dokumen_tanggal', 'desc')->get();
            $rows = $data->map(fn($r, $i) => [
                $i + 1,
                $r->dokumen_nomor,
                $r->dokumen_tanggal?->format('d/m/Y'),
                $r->kode_barang,
                $r->nama_barang,
                $r->satuan,
                $r->jumlah_produksi,
                $r->jumlah_subkon,
                $r->gudang,
            ]);
            $pdf = Pdf::loadView('pdf.report', [
                'title' => 'Laporan Pemasukan Hasil Produksi',
                'subtitle' => 'Data hasil produksi masuk gudang',
                'columns' => ['No', 'Dokumen Nomor', 'Dokumen Tanggal', 'Kode Barang', 'Nama Barang', 'Satuan', 'Jml Produksi', 'Jml Subkontrak', 'Gudang'],
                'rows' => $rows,
            ]);
            return $pdf->download('pemasukan-hasil-produksi.pdf');
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

        if ($download = $request->download) {
            if ($download === 'xlsx') {
                return Excel::download(new PengeluaranHasilProduksiExport($request->from_date, $request->to_date), 'pengeluaran-hasil-produksi.xlsx');
            }
            $data = $query->orderBy('bk_pengeluaran_tanggal', 'desc')->get();
            $rows = $data->map(fn($r, $i) => [
                $i + 1,
                $r->peb_nomor,
                $r->peb_tanggal?->format('d/m/Y'),
                $r->bk_pengeluaran_nomor,
                $r->bk_pengeluaran_tanggal?->format('d/m/Y'),
                $r->pembeli,
                $r->negara_tujuan,
                $r->kode_barang,
                $r->nama_barang,
                $r->satuan,
                $r->jumlah,
                $r->mata_uang,
                $r->nilai_barang,
                $r->net_weight,
                $r->gross_weight,
                $r->total_kg_net,
                $r->total_kg_gross,
            ]);
            $pdf = Pdf::loadView('pdf.report', [
                'title' => 'Laporan Pengeluaran Hasil Produksi',
                'subtitle' => 'Data barang jadi diekspor (PEB)',
                'columns' => ['No', 'PEB Nomor', 'PEB Tanggal', 'BK Pengeluaran Nomor', 'BK Pengeluaran Tanggal', 'Pembeli', 'Negara Tujuan', 'Kode Barang', 'Nama Barang', 'Satuan', 'Jumlah', 'Mata Uang', 'Nilai Barang', 'Net Weight', 'Gross Weight', 'Total Kg Net', 'Total Kg Gross'],
                'rows' => $rows,
            ]);
            return $pdf->download('pengeluaran-hasil-produksi.pdf');
        }

        $data = $query->orderBy('bk_pengeluaran_tanggal', 'desc')->paginate(50)->withQueryString();
        return view('reports.pengeluaran_hasil_produksi', compact('data'));
    }

    public function mutasiHasilProduksi(Request $request)
    {
        $query = MutasiHasilProduksi::query();

        if ($request->filled('month') && $request->filled('year')) {
            $query->where('bulan', $request->month)->where('tahun', $request->year);
        }

        if ($download = $request->download) {
            if ($download === 'xlsx') {
                return Excel::download(new MutasiHasilProduksiExport($request->month, $request->year), 'mutasi-hasil-produksi.xlsx');
            }
            $data = $query->orderBy('kode_barang')->get();
            $rows = $data->map(fn($r, $i) => [
                $i + 1,
                $r->bulan,
                $r->tahun,
                $r->kode_barang,
                $r->nama_barang,
                $r->satuan,
                $r->saldo_awal,
                $r->pemasukan,
                $r->pemasukan_other,
                $r->pengeluaran,
                $r->pengeluaran_other,
                $r->saldo_akhir,
                $r->gudang,
            ]);
            $pdf = Pdf::loadView('pdf.report', [
                'title' => 'Laporan Mutasi Hasil Produksi',
                'subtitle' => 'Saldo bulanan barang jadi (awal + masuk - keluar = akhir)',
                'columns' => ['No', 'Bulan', 'Tahun', 'Kode Barang', 'Nama Barang', 'Satuan', 'Saldo Awal', 'Pemasukan', 'Pemasukan Other', 'Pengeluaran', 'Pengeluaran Other', 'Saldo Akhir', 'Gudang'],
                'rows' => $rows,
            ]);
            return $pdf->download('mutasi-hasil-produksi.pdf');
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

        if ($download = $request->download) {
            if ($download === 'xlsx') {
                return Excel::download(new PencatatanPenyesuaianExport($request->from_date, $request->to_date), 'pencatatan-penyesuaian.xlsx');
            }
            $data = $query->orderBy('delivery_date', 'desc')->get();
            $rows = $data->map(fn($r, $i) => [
                $i + 1,
                $r->peb_baru,
                $r->peb_lama,
                $r->packingslipid,
                $r->delivery_date?->format('d/m/Y'),
                $r->cust_name,
                $r->county,
                $r->item_id,
                $r->item_name,
                $r->unit,
                $r->qty,
                $r->currency_code,
                $r->amount,
            ]);
            $pdf = Pdf::loadView('pdf.report', [
                'title' => 'Laporan Pencatatan Penyesuaian',
                'subtitle' => 'Koreksi/perubahan dokumen PEB',
                'columns' => ['No', 'PEB Baru', 'PEB Lama', 'Packing Slip', 'Delivery Date', 'Pembeli', 'Negara', 'Kode Barang', 'Nama Barang', 'Satuan', 'Jumlah', 'Mata Uang', 'Nilai'],
                'rows' => $rows,
            ]);
            return $pdf->download('pencatatan-penyesuaian.pdf');
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

        if ($download = $request->download) {
            if ($download === 'xlsx') {
                return Excel::download(new PebChangeLogExport($request->from_date, $request->to_date), 'peb-change-log.xlsx');
            }
            $data = $query->orderBy('datetimechange', 'desc')->get();
            $rows = $data->map(fn($r, $i) => [
                $i + 1,
                $r->datetimechange?->format('d/m/Y H:i:s'),
                $r->internalpackingslipid,
                $r->packingslipid,
                $r->pebdatebaru?->format('d/m/Y'),
                $r->pebdatelama?->format('d/m/Y'),
                $r->userid,
                $r->dataareaid,
                $r->recversion,
                $r->partition_col,
                $r->recid,
            ]);
            $pdf = Pdf::loadView('pdf.report', [
                'title' => 'Laporan PEB Change Log',
                'subtitle' => 'History perubahan dokumen PEB',
                'columns' => ['No', 'Datetime Change', 'Internal Packing Slip', 'Packing Slip ID', 'PEB Date Baru', 'PEB Date Lama', 'User ID', 'Data Area', 'Rec Version', 'Partition', 'Rec ID'],
                'rows' => $rows,
            ]);
            return $pdf->download('peb-change-log.pdf');
        }

        $data = $query->orderBy('datetimechange', 'desc')->paginate(50)->withQueryString();
        return view('reports.peb_change_log', compact('data'));
    }
}

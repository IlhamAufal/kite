<?php

namespace App\Http\Controllers;

use App\Models\MutasiBahanBaku;
use App\Models\MutasiHasilProduksi;
use App\Models\PebChangeLog;
use App\Models\PemakaianBahanBaku;
use App\Models\PemasukanBahanBaku;
use App\Models\PemasukanHasilProduksi;
use App\Models\PencatatanPenyesuaian;
use App\Models\PengeluaranHasilProduksi;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    use HandlesReportFilters;

    public function index()
    {
        return view('report.index');
    }

    public function pemasukanBahanBaku(Request $request)
    {
        $query = PemasukanBahanBaku::query();
        $this->applyDateFilter($query, $request, 'tgl_rekam');
        return $this->renderOrExport($request, $query->orderBy('tgl_rekam', 'desc'), [
            'view' => 'reports.pemasukan_bahan_baku',
            'title' => 'Laporan Pemasukan Bahan Baku',
            'subtitle' => 'Data impor bahan baku (PIB & GR)',
            'columns' => ['No', 'Tgl Rekam', 'Jenis Dokumen', 'Nomor PIB', 'Tanggal PIB', 'Kode HS', 'GR Number', 'GR Date', 'Kode BB', 'Nama Barang', 'Satuan', 'Jumlah', 'Mata Uang', 'Nilai Barang', 'Gudang', 'Penerima Subkontrak', 'Negara Asal'],
            'exportClass' => \App\Exports\PemasukanBahanBakuExport::class,
            'filename' => 'pemasukan-bahan-baku',
            'map' => fn($r, $i) => [
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
            ],
        ]);
    }

    public function pemakaianBahanBaku(Request $request)
    {
        $query = PemakaianBahanBaku::query();
        $this->applyDateFilter($query, $request, 'tgl_pengeluaran');
        return $this->renderOrExport($request, $query->orderBy('tgl_pengeluaran', 'desc'), [
            'view' => 'reports.pemakaian_bahan_baku',
            'title' => 'Laporan Pemakaian Bahan Baku',
            'subtitle' => 'Data pemakaian bahan baku di produksi',
            'columns' => ['No', 'No Pengeluaran', 'Tgl Pengeluaran', 'Kode Barang', 'Nama Barang', 'Satuan', 'Jml Digunakan', 'Jml Disubkontrakkan', 'Penerima Subkontrak', 'Gudang'],
            'exportClass' => \App\Exports\PemakaianBahanBakuExport::class,
            'filename' => 'pemakaian-bahan-baku',
            'map' => fn($r, $i) => [
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
            ],
        ]);
    }

    public function mutasiBahanBaku(Request $request)
    {
        $query = MutasiBahanBaku::query();
        $this->applyMonthFilter($query, $request);
        return $this->renderOrExport($request, $query->orderBy('kode_barang'), [
            'view' => 'reports.mutasi_bahan_baku',
            'title' => 'Laporan Mutasi Bahan Baku',
            'subtitle' => 'Saldo bulanan bahan baku (awal + masuk - keluar = akhir)',
            'columns' => ['No', 'Kode Barang', 'Nama Barang', 'Satuan', 'Saldo Awal', 'Pemasukan', 'Pemasukan Lain', 'Pengeluaran', 'Pengeluaran Lain', 'Saldo Akhir', 'Gudang'],
            'exportClass' => \App\Exports\MutasiBahanBakuExport::class,
            'filename' => 'mutasi-bahan-baku',
            'map' => fn($r, $i) => [
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
            ],
        ]);
    }

    public function pemasukanHasilProduksi(Request $request)
    {
        $query = PemasukanHasilProduksi::query();
        $this->applyDateFilter($query, $request, 'dokumen_tanggal');
        return $this->renderOrExport($request, $query->orderBy('dokumen_tanggal', 'desc'), [
            'view' => 'reports.pemasukan_hasil_produksi',
            'title' => 'Laporan Pemasukan Hasil Produksi',
            'subtitle' => 'Data hasil produksi masuk gudang',
            'columns' => ['No', 'Dokumen Nomor', 'Dokumen Tanggal', 'Kode Barang', 'Nama Barang', 'Satuan', 'Jml Produksi', 'Jml Subkontrak', 'Gudang'],
            'exportClass' => \App\Exports\PemasukanHasilProduksiExport::class,
            'filename' => 'pemasukan-hasil-produksi',
            'map' => fn($r, $i) => [
                $i + 1,
                $r->dokumen_nomor,
                $r->dokumen_tanggal?->format('d/m/Y'),
                $r->kode_barang,
                $r->nama_barang,
                $r->satuan,
                $r->jumlah_produksi,
                $r->jumlah_subkon,
                $r->gudang,
            ],
        ]);
    }

    public function pengeluaranHasilProduksi(Request $request)
    {
        $query = PengeluaranHasilProduksi::query();
        $this->applyDateFilter($query, $request, 'bk_pengeluaran_tanggal');
        return $this->renderOrExport($request, $query->orderBy('bk_pengeluaran_tanggal', 'desc'), [
            'view' => 'reports.pengeluaran_hasil_produksi',
            'title' => 'Laporan Pengeluaran Hasil Produksi',
            'subtitle' => 'Data barang jadi diekspor (PEB)',
            'columns' => ['No', 'PEB Nomor', 'PEB Tanggal', 'BK Pengeluaran Nomor', 'BK Pengeluaran Tanggal', 'Pembeli', 'Negara Tujuan', 'Kode Barang', 'Nama Barang', 'Satuan', 'Jumlah', 'Mata Uang', 'Nilai Barang', 'Net Weight', 'Gross Weight', 'Total Kg Net', 'Total Kg Gross'],
            'exportClass' => \App\Exports\PengeluaranHasilProduksiExport::class,
            'filename' => 'pengeluaran-hasil-produksi',
            'map' => fn($r, $i) => [
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
            ],
        ]);
    }

    public function mutasiHasilProduksi(Request $request)
    {
        $query = MutasiHasilProduksi::query();
        $this->applyMonthFilter($query, $request);
        return $this->renderOrExport($request, $query->orderBy('kode_barang'), [
            'view' => 'reports.mutasi_hasil_produksi',
            'title' => 'Laporan Mutasi Hasil Produksi',
            'subtitle' => 'Saldo bulanan barang jadi (awal + masuk - keluar = akhir)',
            'columns' => ['No', 'Bulan', 'Tahun', 'Kode Barang', 'Nama Barang', 'Satuan', 'Saldo Awal', 'Pemasukan', 'Pemasukan Other', 'Pengeluaran', 'Pengeluaran Other', 'Saldo Akhir', 'Gudang'],
            'exportClass' => \App\Exports\MutasiHasilProduksiExport::class,
            'filename' => 'mutasi-hasil-produksi',
            'map' => fn($r, $i) => [
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
            ],
        ]);
    }

    public function pencatatanPenyesuaian(Request $request)
    {
        $query = PencatatanPenyesuaian::query();
        $this->applyDateFilter($query, $request, 'delivery_date');
        return $this->renderOrExport($request, $query->orderBy('delivery_date', 'desc'), [
            'view' => 'reports.pencatatan_penyesuaian',
            'title' => 'Laporan Pencatatan Penyesuaian',
            'subtitle' => 'Koreksi/perubahan dokumen PEB',
            'columns' => ['No', 'PEB Baru', 'PEB Lama', 'Packing Slip', 'Delivery Date', 'Pembeli', 'Negara', 'Kode Barang', 'Nama Barang', 'Satuan', 'Jumlah', 'Mata Uang', 'Nilai'],
            'exportClass' => \App\Exports\PencatatanPenyesuaianExport::class,
            'filename' => 'pencatatan-penyesuaian',
            'map' => fn($r, $i) => [
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
            ],
        ]);
    }

    public function pebChangeLog(Request $request)
    {
        $query = PebChangeLog::query();
        if ($request->filled('from_date') && $request->filled('to_date')) {
            $query->whereBetween('datetimechange', [$request->from_date . ' 00:00:00', $request->to_date . ' 23:59:59']);
        }
        return $this->renderOrExport($request, $query->orderBy('datetimechange', 'desc'), [
            'view' => 'reports.peb_change_log',
            'title' => 'Laporan PEB Change Log',
            'subtitle' => 'History perubahan dokumen PEB',
            'columns' => ['No', 'Datetime Change', 'Internal Packing Slip', 'Packing Slip ID', 'PEB Date Baru', 'PEB Date Lama', 'User ID', 'Data Area', 'Rec Version', 'Partition', 'Rec ID'],
            'exportClass' => \App\Exports\PebChangeLogExport::class,
            'filename' => 'peb-change-log',
            'map' => fn($r, $i) => [
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
            ],
        ]);
    }
}

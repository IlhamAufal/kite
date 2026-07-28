# IT Inventory KITE

**Sistem Pelaporan dan Pencatatan Persediaan Barang — PT. Yupi Indo Jelly Gum Tbk**

Aplikasi web internal untuk mengelola data inventori KITE (Kemudahan Impor Tujuan Ekspor) yang dilaporkan ke Bea Cukai. Sistem ini berfungsi sebagai data bridge antara ERP lama (Microsoft Dynamics AX via SQL Server) dan database MySQL, serta menerima data dari SAP S/4HANA Cloud melalui middleware.

---

## Tech Stack

| Layer | Teknologi |
|-------|-----------|
| Framework | Laravel 9 (PHP 8.0+) |
| Database (Primary) | MySQL / MariaDB 10.4+ (`yp_kite`) |
| Database (Source) | SQL Server (AX ERP views) |
| Frontend | Blade + Tailwind CSS 3 + Alpine.js 3 |
| Build Tool | Vite 4 |
| Auth | Session-based (bcrypt hashed password) |
| Export | Laravel Excel (maatwebsite/excel) + DomPDF (barryvdh/laravel-dompdf) |
| HTTP Client | Guzzle 7 |
| Queue | Laravel Queue (database driver) |
| Server | Apache (XAMPP) |

---

## Architecture

```
┌─────────────────────────────────────────────────────────────────┐
│                         SUMBER DATA                              │
├────────────────────────────┬────────────────────────────────────┤
│  SQL Server (AX ERP)       │  SAP Middleware (REST POST)        │
│  - yijKite* views          │  - POST /api/parsing?cat={cat}     │
│  - [YpKiteUser] tables     │  - Basic Auth                      │
└──────────────┬─────────────┴──────────────┬─────────────────────┘
               │ Sync Batch (Queue Job)      │ Inbound API
               ▼                             ▼
┌─────────────────────────────────────────────────────────────────┐
│              KITE APPLICATION (Laravel 9)                        │
│                                                                 │
│  Controllers/                                                   │
│  ├── AuthController         (Login, Logout, Session)            │
│  ├── ReportController       (8 laporan KITE + export)           │
│  ├── DatalogController      (Audit log viewer)                  │
│  ├── Api/ParsingController  (REST receiver dari middleware)     │
│  └── Api/SyncController     (Sync SQL Server → MySQL)           │
│                                                                 │
│  Services/                                                      │
│  ├── IngestService          (Sanitize, Validate, Upsert)        │
│  └── KiteSyncService        (SQL Server query + mapping)        │
│                                                                 │
│  Jobs/                                                          │
│  └── SyncKiteJob            (Background batch sync)             │
│                                                                 │
│  Models/ (8 KITE + User + LogUser)                              │
│  Exports/ (Excel + PDF per report)                              │
└──────────────────────────────┬──────────────────────────────────┘
                               │
                               ▼
┌─────────────────────────────────────────────────────────────────┐
│                     MySQL (yp_kite)                              │
│  ├── pemasukan_bahan_baku        ├── pemasukan_hasil_produksi   │
│  ├── pemakaian_bahan_baku        ├── pengeluaran_hasil_produksi │
│  ├── mutasi_bahan_baku           ├── pencatatan_penyesuaian     │
│  ├── mutasi_hasil_produksi       ├── peb_change_log             │
│  ├── user                        └── loguser                    │
└─────────────────────────────────────────────────────────────────┘
```

---

## Fitur

### Laporan KITE (8 Report)
- **Pemasukan Bahan Baku** — Data impor bahan baku (PIB & GR)
- **Pemakaian Bahan Baku** — Pemakaian bahan baku di produksi
- **Mutasi Bahan Baku** — Saldo bulanan bahan baku
- **Pemasukan Hasil Produksi** — Hasil produksi masuk gudang
- **Pengeluaran Hasil Produksi** — Barang jadi diekspor (PEB)
- **Mutasi Hasil Produksi** — Saldo bulanan barang jadi
- **Pencatatan Penyesuaian** — Koreksi/perubahan dokumen PEB
- **PEB Change Log** — History perubahan dokumen PEB

Semua report mendukung filter (date range / bulan+tahun), pagination, dan export ke **Excel** dan **PDF**.

### Authentication & Security
- Login session-based dengan password bcrypt
- Session timeout 30 menit (auto-logout)
- Login audit trail (IP, timestamp, status)
- CSRF protection

### API Parsing (Inbound)
- Endpoint REST untuk menerima data dari SAP middleware
- Basic Auth (`SAP_USER` / password)
- Validasi, sanitasi control characters, truncation per field
- Upsert logic per kategori (insert/update/skip)
- Response per-row status

### Sync KITE (SQL Server → MySQL)
- Background batch sync via Laravel Queue
- Offset pagination (ROW_NUMBER pattern)
- Support mode date range dan month range
- Progress tracking, stop/cancel mechanism
- Delete range functionality

---

## Prerequisites

- PHP >= 8.0.2
- Composer
- Node.js >= 16 & npm
- MySQL / MariaDB (XAMPP recommended)
- SQL Server (opsional, untuk Sync KITE)
- PHP Extensions:
  - `pdo_mysql`
  - `pdo_sqlsrv` (untuk koneksi SQL Server)
  - `mbstring`, `xml`, `zip`, `gd`

---

## Installation

### 1. Clone Repository

```bash
git clone https://github.com/IlhamAufal/kite.git kite
cd kite
```

### 2. Install Dependencies

```bash
composer install
npm install
```

### 3. Environment Configuration

```bash
cp .env.example .env
php artisan key:generate
```

### 4. Database Setup

Buat database `yp_kite` di MySQL, kemudian jalankan migration dan seeder:

```bash
php artisan migrate
php artisan db:seed
```

Atau import langsung dari SQL dump:

```bash
mysql -u root yp_kite < yp_kite.sql
```

### 5. Build Frontend Assets

Development (hot reload):
```bash
npm run dev
```

Production build:
```bash
npm run build
```

### 6. Run Application

Jika menggunakan XAMPP, pastikan project berada di `C:\xampp\htdocs\kite` dan akses via:
```
http://localhost/kite/public
```

Atau gunakan built-in server:
```bash
php artisan serve
```
Akses di `http://localhost:8000`

### 7. Queue Worker (untuk Sync background jobs)

```bash
php artisan queue:work --queue=default --tries=3
```

> **Note:** Queue worker harus tetap berjalan selama proses sync. Di production, gunakan Supervisor atau Windows Task Scheduler.

---

## Default Login

| User ID | Password | Company |
|---------|----------|---------|
| `admin01` | `admin123` | PT. Yupi Indo Jelly Gum |

> Password di-hash dengan bcrypt. Lihat `database/seeders/UserSeeder.php` untuk detail.

---

## Project Structure

```
kite/
├── app/
│   ├── Console/            # Artisan commands
│   ├── Exceptions/         # Error handlers
│   ├── Exports/            # Excel/PDF export classes (9 files)
│   ├── Http/
│   │   ├── Controllers/    # Auth, Report, Datalog, API controllers
│   │   ├── Middleware/     # Auth, Session timeout, Basic Auth API
│   │   └── Kernel.php
│   ├── Models/             # Eloquent models (10 models)
│   ├── Services/           # Business logic (Ingest, Sync)
│   └── Jobs/               # Queue jobs (SyncKite)
├── config/                 # Laravel + custom configs
├── database/
│   ├── migrations/         # Schema definitions (10 tables)
│   └── seeders/            # Sample data (5 rows per table)
├── resources/
│   ├── views/
│   │   ├── layouts/        # Main layout + partials (sidebar, filter)
│   │   ├── auth/           # Login page
│   │   ├── reports/        # 8 report views
│   │   ├── sync/           # Sync dashboard
│   │   ├── pdf/            # PDF export template
│   │   └── datalog/        # Audit log views
│   ├── css/app.css         # Tailwind entry point
│   └── js/app.js           # JS entry point
├── routes/
│   ├── web.php             # Web routes (auth, reports, sync UI)
│   └── api.php             # API routes (parsing, sync endpoints)
├── public/                 # Public assets
├── storage/                # Logs, cache, sessions
├── yp_kite.sql             # Database dump (legacy import)
├── api-sync-rebase-guide.md # Spesifikasi teknis API & Sync
├── composer.json
├── package.json
├── vite.config.js
└── tailwind.config.js
```

---

## Available Routes

### Web (Session Auth)

| Method | URI | Fungsi |
|--------|-----|--------|
| GET | `/login` | Halaman login |
| POST | `/login` | Proses login |
| POST | `/logout` | Logout |
| GET | `/` | Dashboard |
| GET | `/reports/pemasukan-bahan-baku` | Report Pemasukan BB |
| GET | `/reports/pemakaian-bahan-baku` | Report Pemakaian BB |
| GET | `/reports/mutasi-bahan-baku` | Report Mutasi BB |
| GET | `/reports/pemasukan-hasil-produksi` | Report Pemasukan HP |
| GET | `/reports/pengeluaran-hasil-produksi` | Report Pengeluaran HP |
| GET | `/reports/mutasi-hasil-produksi` | Report Mutasi HP |
| GET | `/reports/pencatatan-penyesuaian` | Report Pencatatan |
| GET | `/reports/peb-change-log` | Report PEB Change Log |
| GET | `/datalog` | Audit log viewer |
| GET | `/sync/kite` | Sync KITE dashboard |

### API (Basic Auth / Session)

| Method | URI | Auth | Fungsi |
|--------|-----|------|--------|
| POST | `/api/parsing?cat={category}` | Basic Auth | Terima data dari middleware |
| POST | `/api/parsing?cat=DEL` | Basic Auth | Delete data by key_number |
| POST | `/api/sync/kite/start` | Session | Mulai sync job |
| GET | `/api/sync/kite/status/{jobId}` | Session | Poll progress |
| POST | `/api/sync/kite/stop/{jobId}` | Session | Cancel sync |
| GET | `/api/sync/kite/count-source` | Session | Count dari SQL Server |
| GET | `/api/sync/kite/count-db` | Session | Count dari MySQL |
| POST | `/api/sync/kite/delete-range` | Session | Hapus data by range |

---

## Development

### Useful Commands

```bash
# Run dev server with hot reload
npm run dev
php artisan serve

# Run queue worker
php artisan queue:work

# Clear caches
php artisan config:clear
php artisan cache:clear
php artisan view:clear

# Run tests
php artisan test

# Fresh migration + seed
php artisan migrate:fresh --seed

# List all routes
php artisan route:list
```

### Code Style

- PHP: PSR-12 (Laravel Pint)
- Frontend: Tailwind utility classes, Alpine.js for interactivity
- Models: No timestamps (`$timestamps = false`), explicit `$fillable` and `$casts`
- Controllers: Thin controllers, business logic in Services

---

## Database Connections

| Connection | Host | Database | Purpose |
|------------|------|----------|---------|
| `mysql` (default) | localhost | yp_kite | Primary — KITE reports & auth |
| `sqlsrv` | localhost | (AX DB) | Source — SQL Server AX views (read-only) |

> SQL Server akan dipindah ke `10.42.2.32` di production. Ubah `DB_SQLSRV_HOST` di `.env`.

---

## Deployment Notes

- Pastikan PHP extension `pdo_sqlsrv` terinstall untuk koneksi SQL Server
- Queue worker harus running (gunakan Supervisor di Linux atau NSSM di Windows)
- Set `APP_DEBUG=false` dan `APP_ENV=production` di production
- Run `php artisan config:cache` dan `php artisan route:cache` untuk performa
- Build assets: `npm run build`
- Storage link: `php artisan storage:link`

---

## License

Internal use only — PT. Yupi Indo Jelly Gum Tbk.

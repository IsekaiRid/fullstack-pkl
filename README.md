## 🏫📢 News Portal Sekolah — Fullstack Vue & Laravel

**News Sekolah** adalah sebuah aplikasi berbasis web yang bertujuan untuk menyajikan informasi sekolah, termasuk daftar sekolah unggulan dan berita terbaru. Aplikasi ini dibangun menggunakan pendekatan *Fullstack* dengan:

* **Frontend**: Vue.js 3 (Composition API / Options API)
* **Backend**: Laravel + RESTful API
* **Database**: MySQL

---

## ✨ Fitur Unggulan

### 👨‍🏫 Halaman Depan

* Menampilkan **3 sekolah unggulan** dari daftar.
* Navigasi ke halaman detail sekolah.
* Menampilkan berita terbaru dengan tampilan menarik.

### 📰 Berita Sekolah

* Daftar berita dengan `v-for`.
* Halaman **detail berita** lengkap dengan gambar, isi, dan tanggal.

### 🔎 Detail Sekolah

* Informasi lengkap seperti: logo, deskripsi, alamat, dan kontak sekolah.
* Terhubung langsung dari API Laravel (`/api/schools/:id`).

---

## 🧱 Struktur Proyek

### Backend (Laravel)

```
📁 app/
  └── Models/School.php
  └── Models/News.php
📁 routes/
  └── api.php
  // Endpoint: /api/schools, /api/news, etc.
📁 storage/app/public/news/
  // Gambar berita
```

### Frontend (Vue.js)

```
📁 components/
  └── Sekolah.vue       // Card sekolah
  └── NewsComponen.vue  // Card berita
📁 views/
  └── Home.vue          // Halaman utama
  └── DetailBerita.vue  // Detail berita
  └── DetailSekolah.vue // Detail sekolah
📁 router/
  └── index.js
```

---

## 🔗 Contoh API Endpoint

* `GET /api/schools` → Ambil semua sekolah
* `GET /api/schools/{id}` → Detail 1 sekolah
* `GET /api/news` → Semua berita
* `GET /api/news/{id}` → Detail berita

---

## 🎨 Desain UI

* Responsif dan ringan
* Menggunakan CSS `scoped` pada setiap komponen
* Komponen reusable: `SekolahCard`, `NewsCard`
* UX diutamakan: loading state, error handling, dan transisi

---

## 🚀 Rencana Pengembangan

* [ ] Autentikasi admin (login + dashboard berita)
* [ ] Tambah & edit berita dari panel admin
* [ ] Pagination dan pencarian berita
* [ ] Penilaian & rating sekolah

---

## 👨‍💻 Developer Notes

> Dibuat untuk belajar dan pengembangan pribadi. Cocok untuk siswa SMK atau pemula yang ingin memahami bagaimana frontend dan backend saling berkomunikasi.

---

Kalau kamu mau saya bantu buatkan `README.md` dalam bentuk file atau versi markdown lengkap, tinggal bilang saja ya!

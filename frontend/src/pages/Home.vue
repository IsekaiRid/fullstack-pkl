<template>
  <div>
    <Header />

    <!-- Sekolah -->
    <div class="content" v-if="satuSekolah.length > 0" id="tentang">
      <SekolahCard
        v-for="(item, index) in satuSekolah"
        :key="index"
        :id="item.id_schools"
        :nama="item.nama"
        :deskripsi="item.deskripsi"
        :alamat="item.alamat"
        :logo="item.logo"
      />
    </div>
    <div class="not-found" v-else>
      <p>Belum ada data sekolah yang tersedia.</p>
    </div>

    <div class="content" id="berita">
      <!-- Berita -->
      <div class="berita-wrapper">
        <div v-if="isLoading" class="loading">
          <p>Memuat berita...</p>
        </div>

        <div v-else>
          <h1>Berita Terkini</h1>

          <div v-if="daftarBerita.length">
            <NewsCard
              v-for="item in tigaBerita"
              :key="item.id_news"
              :id_news="item.id_news"
              :judul="item.judul"
              :isi="item.isi"
              :gambar="item.gambar"
              :tanggal="item.tanggal"
            />
          </div>
          <div v-else class="loading">
            <p>Tidak ada berita tersedia.</p>
          </div>
        </div>
      </div>
    </div>

    <!-- Galeri -->
    <div class="content" id="galeri">
      <div class="galeri-wrapper">
        <div v-if="isLoading" class="loading">
          <p>Memuat gambar...</p>
        </div>

        <div v-else>
          <h1>Galeri</h1>

          <div v-if="daftarGalery.length" class="display">
            <GaleryCard
              class="display"
              v-for="item in tigaGambar"
              :key="item.id_galery"
              :id="item.id_galery"
              :gambar="item.gambar"
              :deskripsi="item.deskripsi"
            />
          </div>

          <div v-else class="loading">
            <p>Tidak ada berita tersedia.</p>
          </div>
          <div></div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import SekolahCard from "../components/Sekolah.vue";
import Header from "../components/Header.vue";
import NewsCard from "../components/NewsComponen.vue";
import GaleryCard from "../components/Galery.vue";

export default {
  components: {
    SekolahCard,
    Header,
    NewsCard,
    GaleryCard,
  },
  data() {
    return {
      daftarSekolah: [],
      daftarBerita: [],
      daftarGalery: [],
    };
  },
  computed: {
    satuSekolah() {
      return this.daftarSekolah.slice(0, 1); // tampilkan hanya 3 pertama
    },
    tigaBerita() {
      return this.daftarBerita.slice(0, 3); // tampilkan hanya 3 pertama
    },
    tigaGambar() {
      return this.daftarGalery.slice(0, 3); // tampilkan hanya 3 pertama
    },
  },
  mounted() {
    fetch("http://127.0.0.1:8000/api/schools")
      .then((res) => res.json())
      .then((data) => {
        this.daftarSekolah = data;
      })
      .catch((err) => {
        console.error("Gagal ambil data sekolah:", err);
      });
    fetch("http://127.0.0.1:8000/api/news")
      .then((res) => {
        if (!res.ok) throw new Error("Gagal mengambil data");
        return res.json();
      })
      .then((data) => {
        this.daftarBerita = data;
      })
      .catch((err) => {
        console.error("Gagal ambil data berita:", err);
      });
    fetch("http://127.0.0.1:8000/api/galery")
      .then((res) => {
        if (!res.ok) throw new Error("Gagal mengambil gambar");
        return res.json();
      })
      .then((data) => {
        this.daftarGalery = data;
      })
      .catch((err) => {
        console.error("Gagal ambil data gambar:", err);
      });
  },
};
</script>

<style scoped>
.not-found {
  text-align: center;
  color: #999;
  font-style: italic;
  margin-top: 40px;
}

.content {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  gap: 16px;
  padding: 16px;
  margin-bottom: 20px;
}

h1 {
  text-align: center;
  padding-top: 40px;
  padding-bottom: 10px;
}

.lihat-semua {
  text-align: center;
  margin-bottom: 20px;
}

.lihat-semua a {
  color: #1e88e5;
  text-decoration: none;
  font-weight: bold;
}

.berita-wrapper {
  padding: 16px;
  max-width: 900px;
  margin: 0 auto;
}

.loading {
  text-align: center;
  color: gray;
  margin-top: 20px;
}

.display {
  display: flex;
  flex-direction: row;
  gap: 1rem;
}

@media (max-width: 1024px) {
  .content,
  .display {
    flex-direction: row;
    flex-wrap: wrap;
    justify-content: center;
  }

  .berita-wrapper {
    padding: 12px;
  }
  .galeri-wrapper {
    padding: 12px;
  }
}

@media (max-width: 768px) {
  .content,
  .display {
    flex-direction: column;
    align-items: center;
    gap: 12px;
  }

  h1 {
    font-size: 20px;
    padding-top: 40px;
    padding-bottom: 8px;
  }

  .berita-wrapper {
    padding: 8px;
  }
  .galeri-wrapper {
    padding: 8px;
  }
}
</style>

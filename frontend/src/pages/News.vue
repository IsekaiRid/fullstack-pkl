<template lang="html">
    <Header />
    <div class="berita-wrapper">
        <div v-if="isLoading" class="loading">
            <p>Memuat berita...</p>
        </div>

        <div v-else-if="daftarBerita.length">
            <NewsCard v-for="item in tigaBerita" :key="item.id_news" :id_news="item.id_news" :judul="item.judul"
                :isi="item.isi" :gambar="item.gambar" :tanggal="item.tanggal" />
        </div>

        <div v-else class="loading">
            <p>Tidak ada berita tersedia.</p>
        </div>
    </div>
</template>

<script>
import NewsCard from '../components/NewsComponen.vue';
import Header from "../components/Header.vue";


export default {
    components: {
        NewsCard,
        Header,
    },
    data() {
        return {
            daftarBerita: []
        };
    },
     computed: {
    tigaBerita() {
      return this.daftarBerita.slice(0, 3); // tampilkan hanya 3 pertama
    },
  },
    mounted() {
        fetch('http://127.0.0.1:8000/api/news')
            .then(res => {
                if (!res.ok) throw new Error('Gagal mengambil data');
                return res.json();
            })
            .then(data => {
                this.daftarBerita = data;
            })
            .catch(err => {
                console.error('Gagal ambil data berita:', err);
            });
    }
};
</script>

<style scoped lang="css">
.berita-wrapper {
    padding: 16px;
    margin: 0 auto;
}

.loading {
    text-align: center;
    color: gray;
    margin-top: 20px;
}
</style>

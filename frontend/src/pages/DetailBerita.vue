<template>
    <Header />
    <div class="detail-berita">
        <div v-if="berita">
            <h1 class="judul">{{ berita.judul }}</h1>
            <p class="tanggal">📅 {{ formattedDate }}</p>
            <img src="../assets/berita.jpg" alt="Gambar Berita" class="gambar" />
            <p class="isi">{{ berita.isi }}</p>
        </div>
        <div v-else-if="error">
            <p class="error">❌ {{ error }}</p>
        </div>
        <div v-else>
            <p class="loading">Memuat detail berita...</p>
        </div>
    </div>
</template>

<script>
import Header from '../components/Header.vue';

export default {
    components: { Header },
    data() {
        return {
            berita: null,
            error: null
        };
    },
    computed: {
        formattedDate() {
            if (!this.berita) return "";
            const options = { year: "numeric", month: "long", day: "numeric" };
            return new Date(this.berita.tanggal).toLocaleDateString("id-ID", options);
        }
    },
    mounted() {
        const id = this.$route.params.id;
        fetch(`http://127.0.0.1:8000/api/news/${id}`)
            .then((res) => {
                if (!res.ok) throw new Error("Berita tidak ditemukan");
                return res.json();
            })
            .then((data) => {
                this.berita = data;
            })
            .catch((err) => {
                this.error = err.message;
                console.error("Gagal ambil detail berita:", err);
            });
    }
};
</script>

<style scoped>
.detail-berita {
    max-width: 800px;
    margin: 32px auto;
    padding: 20px;
}

.judul {
    font-size: 28px;
    font-weight: bold;
    margin-bottom: 10px;
}

.tanggal {
    color: #888;
    font-size: 14px;
    margin-bottom: 20px;
}

.gambar {
    width: 100%;
    max-height: 400px;
    object-fit: cover;
    border-radius: 8px;
    margin-bottom: 20px;
}

.isi {
    font-size: 16px;
    line-height: 1.6;
    white-space: pre-line;
}

.loading,
.error {
    text-align: center;
    font-size: 18px;
    color: #666;
}
</style>

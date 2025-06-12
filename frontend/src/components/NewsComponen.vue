<template>
  <div class="news">
    <div class="news-card">
      <img src="../assets/berita.jpg" alt="Gambar Berita" class="news-image" />
      <div class="news-content">
        <h3 class="news-title">{{ judul }}</h3>
        <p class="news-date">📅 {{ formattedDate }}</p>
        <p class="news-snippet">{{ snippet }}...</p>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "NewsCard",
  props: {
    id_news: {
      type: [Number, String],
      required: true,
    },
    judul: String,
    isi: String,
    gambar: String,
    tanggal: String,
  },
  computed: {
    snippet() {
      return this.isi.length > 120 ? this.isi.slice(0, 120) : this.isi;
    },
    formattedDate() {
      const options = { year: "numeric", month: "long", day: "numeric" };
      return new Date(this.tanggal).toLocaleDateString("id-ID", options);
    },
  },
};
</script>

<style scoped>
.news {
  display: flex;
  justify-content: center;
}

.news-card {
 display: flex; /* Biar kontennya sejajar horizontal */
  flex-direction: row;
  align-items: center;
  gap: 12px;
  border: 1px solid #ddd;
  border-radius: 12px;
  background: #fff;
  cursor: pointer;
  padding: 10px;
  margin-bottom: 12px;
  box-shadow: 2px 2px 8px rgba(0, 0, 0, 0.1);
}
.news-card:hover {
  transform: translateY(-5px) scale(1.02);
  box-shadow: 0 8px 20px rgba(0,0,0,0.15);
}
.news-image {
  width: 180px;
  height: 150px;
  object-fit: cover;
}
.news-content {
  padding: 16px;
  flex: 1;
}
.news-title {
  margin: 0;
  font-size: 18px;
  font-weight: bold;
  color: #333;
}
.news-date {
  font-size: 14px;
  color: #888;
  margin: 8px 0;
}
.news-snippet {
  font-size: 15px;
  color: #555;
}
</style>

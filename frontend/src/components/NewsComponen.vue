<template>
  <div class="news-card" @click="goToDetail">
    <img src="../assets/berita.jpg" alt="Gambar Berita" class="news-image" />
    <div class="news-content">
      <h3 class="news-title">{{ judul }}</h3>
      <p class="news-date">📅 {{ formattedDate }}</p>
      <p class="news-snippet">{{ snippet }}...</p>
    </div>
  </div>
</template>

<script>
export default {
  name: "NewsCard",
  props: {
    id_news: {
      type: [Number, String],
      required: true
    },
    judul: String,
    isi: String,
    gambar: String,
    tanggal: String
  },
  computed: {
    snippet() {
      return this.isi.length > 120 ? this.isi.slice(0, 120) : this.isi;
    },
    formattedDate() {
      const options = { year: "numeric", month: "long", day: "numeric" };
      return new Date(this.tanggal).toLocaleDateString("id-ID", options);
    }
  },
  methods: {
    goToDetail() {
      this.$router.push(`/berita/${this.id_news}`);
    }
  }
};
</script>

<style scoped>
.news-card {
  display: flex;
  border: 1px solid #ddd;
  border-radius: 12px;
  overflow: hidden;
  margin: 16px 0;
  cursor: pointer;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
  transition: transform 0.2s ease;
}
.news-card:hover {
  transform: scale(1.01);
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

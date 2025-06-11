<template>
  <div>
    <Header />

    <div class="container">
      <div v-if="sekolah" class="card-detail">
        <img src="../assets/default.jpg" alt="Logo Sekolah" class="school-logo" />
        <h2 class="school-name">{{ sekolah.nama }}</h2>
        <p class="school-description">{{ sekolah.deskripsi }}</p>
        <div class="school-info">
          <p><strong>Alamat:</strong> {{ sekolah.alamat }}</p>
          <p><strong>Kontak:</strong> {{ sekolah.kontak }}</p>
        </div>
      </div>

      <div v-else class="loading">
        <p>Loading data sekolah...</p>
      </div>
    </div>
  </div>
</template>

<script>
import Header from '../components/Header.vue';

export default {
  components: { Header },
  data() {
    return {
      sekolah: null
    };
  },
  mounted() {
    const id = this.$route.params.id;
    fetch(`http://127.0.0.1:8000/api/schools/${id}`)
      .then(res => {
        if (!res.ok) throw new Error("Respon tidak OK");
        return res.json();
      })
      .then(data => {
        this.sekolah = data;
      })
      .catch(err => {
        console.error('Gagal ambil data detail sekolah:', err);
      });
  }
};
</script>

<style scoped>
.container {
  display: flex;
  justify-content: center;
  margin-top: 30px;
  padding: 0 20px;
}

.card-detail {
  background-color: #f9f9f9;
  border-radius: 16px;
  padding: 24px;
  max-width: 600px;
  width: 100%;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
  text-align: center;
}

.school-logo {
  width: 120px;
  height: auto;
  border-radius: 8px;
  margin-bottom: 20px;
}

.school-name {
  margin-bottom: 10px;
  font-size: 24px;
  color: #333;
}

.school-description {
  font-size: 16px;
  color: #666;
  margin-bottom: 20px;
}

.school-info p {
  font-size: 15px;
  margin: 6px 0;
  color: #444;
}

.loading {
  text-align: center;
  font-style: italic;
  color: gray;
}
</style>

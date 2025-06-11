<template>
  <div class="card" @click="handleClick">
    <img src="../assets/default.jpg" alt="Logo Sekolah" class="logo" />
    <h3>{{ nama }}</h3>
    <p>{{ deskripsi }}</p>
  </div>
</template>

<script>
export default {
  props: {
    id: {
      type: [Number, String],
      required: true
    },
    nama: String,
    deskripsi: String,
    logo: String
  },
  methods: {
    handleClick() {
      this.$router.push(`/sekolah/${this.id}`);
    }
  }
};
</script>


<style scoped>
.card {
  border: 1px solid #ddd;
  border-radius: 12px;
  padding: 16px;
  max-width: 400px;
  box-shadow: 2px 2px 10px #ccc;
}

.logo {
  width: 100px;
  height: 100px;
  object-fit: cover; /* Biar gambar tetap rapi */
  border-radius: 8px;
  display: block;
  margin: 0 auto 12px;
}

.card:hover {
  transform: scale(1.03);
}
</style>

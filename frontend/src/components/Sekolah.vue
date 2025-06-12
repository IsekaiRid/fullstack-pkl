<template>
  <div class="tentang">
    <div class="card">
      <div class="card-content">
        <div class="text">
          <h3>{{ nama }}</h3>
          <p>{{ deskripsi }}</p>
        </div>
        <img
          :src="logoUrl"
          alt="Logo Sekolah"
          class="logo"
          @error="fallbackImage"
          @click="handleClick"
        />
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    id: {
      type: [Number, String],
      required: true,
    },
    nama: String,
    deskripsi: String,
    logo: String,
  },
  computed: {
    logoUrl() {
      if (this.logo && this.logo.startsWith("http")) {
        return this.logo;
      }
      if (this.logo) {
        return `/images/${this.logo}`;
      }
      return require("@/assets/default.jpg");
    },
  },
  methods: {
    handleClick() {
      this.$router.push(`/sekolah/${this.id}`);
    },
    fallbackImage(event) {
      event.target.src = require("@/assets/default.jpg");
    },
  },
};
</script>

<style scoped>
.tentang {
  max-width: 1440px;
  min-height: 670px;
}

.card {
  padding: 16px;
  cursor: pointer;
  transition: transform 0.2s ease;
}

.card-content {
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 16px;
}

.text {
  flex: 1;
}

.logo {
  width: 500px;
  height: auto;
  object-fit: cover;
  border-radius: 8px;
  padding-top: 70px;
}

.logo:hover {
  transform: scale(1.03);
}

h3 {
  padding-bottom: 50px;
  padding-top: 50px;
  font-weight: 900;
  font-size: 36px;
  font-family: Arial, Helvetica, sans-serif;
}

p {
  padding-top: 60px;
  font-size: 25px;
  text-align: justify;
}
</style>

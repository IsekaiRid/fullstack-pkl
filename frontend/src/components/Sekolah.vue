<template>
  <div class="tentang">
    <div class="card">
      <div class="card-content">
        <div class="text">
          <h3>{{ nama }}</h3>
          <p>{{ deskripsi }} SMK Sangkuriang 1 Cimahi berlokasi di {{ alamat }}</p>
        </div>
        <img
          :src="logoUrl"
          alt="Logo Sekolah"
          class="logo"
          @error="fallbackImage"
        />
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    id: [Number, String],
    nama: String,
    deskripsi: String,
    alamat: String, // ✅ Tambahan properti alamat dari API
    logo: String,
  },
  computed: {
    logoUrl() {
      if (this.logo?.startsWith("http")) {
        return this.logo;
      }
      return this.logo ? `/images/${this.logo}` : require("@/assets/default.jpg");
    },
  },
  methods: {
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
  object-fit: cover;
  border-radius: 8px;
  padding-top: 70px;
  transition: transform 0.2s ease;
}

.logo:hover {
  transform: translateY(-5px) scale(1.02);
}

h3 {
  padding: 50px 0;
  font-size: 36px;
  font-weight: 900;
  font-family: Arial, Helvetica, sans-serif;
}

p {
  padding-top: 30px;
  font-size: 25px;
  text-align: justify;
}

/* Tablet */
@media (max-width: 1024px) {
  h3 {
    font-size: 28px;
  }

  p {
    font-size: 16px;
  }

  .logo {
    width: 250px;
  }
}

/* Mobile */
@media (max-width: 768px) {
  .card-content {
    flex-direction: column-reverse;
    text-align: center;
  }

  h3 {
    font-size: 24px;
    padding: 10px 0 5px;
  }

  p {
    font-size: 15px;
    padding-top: 5px;
  }

  .logo {
    width: 200px;
    margin-bottom: 20px;
  }
}
</style>

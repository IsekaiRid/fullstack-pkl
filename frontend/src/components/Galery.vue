
<template>
  <div class="card_coponent">
    <div class="card" @click="handleClick">
      <img :src="logoUrl" alt="Gambar Berita" class="news-image" @error="fallbackImage"/>
      <div class="content">
        <p>{{ deskripsi }}</p>
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
    deskripsi: String,
    gambar: String, // Ini penting!
  },
  computed: {
    logoUrl() {
      if (this.gambar && this.gambar.startsWith("http")) {
        return this.gambar;
      }
      if (this.gambar) {
        return `/images/${this.gambar}`; // Pastikan folder public/images/
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


<style lang="css" scoped>
p{
  text-align: justify;
}

.card {
  border: 1px solid #ddd;
  border-radius: 12px;
  background: #fff;
  cursor: pointer;
  padding: 10px;
  margin-bottom: 12px;
  box-shadow: 2px 2px 8px rgba(0, 0, 0, 0.1);
  display: flex;
  align-items: center;
  flex-direction: column;
}

.news-image {
  width: 100px;
  height: 100px;
  object-fit: cover;
  border-radius: 8px;
  flex-shrink: 0;
}

.content {
  flex: 1;
  font-size: 14px;
  color: #444;
  text-align: left;
  padding: 8px;
}

.card_coponent{
  width: 300px;
}

.card_coponent:hover{
  transform: translateY(-5px) scale(1.02);
  box-shadow: 0 8px 20px rgba(0,0,0,0.15);
}

</style>
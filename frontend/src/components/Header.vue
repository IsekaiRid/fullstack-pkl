<template>
  <header class="header">
    <div class="logo-container">
      <img src="../assets/logosekolah.png" alt="Logo" class="logo" />
      <h1 class="judul">SMK SANGKURIANG 1 CIMAHI</h1>
    </div>

    <div class="menu-icon" :class="{ open: menuOpen }" @click="toggleMenu">
      {{ menuOpen ? "✖" : "☰" }}
    </div>

    <nav
      class="menu"
      :class="{ open: menuOpen }"
      v-show="isMobile ? menuOpen : true"
    >
      <ul>
        <li><a href="#tentang">Tentang</a></li>
        <li><a href="#berita">Berita</a></li>
        <li><a href="#galeri">Galeri</a></li>
      </ul>
    </nav>
  </header>
</template>

<script>
export default {
  name: "HeaderBar",
  data() {
    return {
      menuOpen: false,
      isMobile: false,
    };
  },
  methods: {
    toggleMenu() {
      this.menuOpen = !this.menuOpen;
    },
    checkMobile() {
      this.isMobile = window.innerWidth <= 768;
      if (!this.isMobile) this.menuOpen = false;
    },
  },
  mounted() {
    this.checkMobile();
    window.addEventListener("resize", this.checkMobile);
  },
  beforeDestroy() {
    window.removeEventListener("resize", this.checkMobile);
  },
};
</script>

<style scoped>
.header {
  position: fixed;
  z-index: 1000;
    top: 0;
  left: 0;
  right: 0;
  display: flex;
  justify-content: space-between;
  align-items: center;
  background-color: #1565c0;
  padding: 10px 20px;
  color: white;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
}

.logo-container {
  display: flex;
  align-items: center;
}

.logo {
  height: 40px;
  margin-right: 10px;
}

.judul {
  font-size: 1.2rem;
}

.menu {
  display: flex;
  transition: all 0.3s ease-in-out;
}

.menu ul {
  display: flex;
  gap: 20px;
  list-style: none;
  padding: 0;
  margin: 0;

  /* Animasi memudar masuk */
  opacity: 0;
  animation: fadeIn 1s forwards;
}

/* Keyframes untuk efek fade in */
@keyframes fadeIn {
  to {
    opacity: 1;
  }
}

.menu a {
  color: white;
  text-decoration: none;
  font-weight: 500;
  transition: color 0.3s;
}

.menu a:hover {
  text-decoration: underline;
  color: #ffeb3b;
}

.menu-icon {
  font-size: 26px;
  cursor: pointer;
  display: none;
  transition: transform 0.3s ease;
  z-index: 200;
  position: relative;
  color: white;
  opacity: 0;
  animation: fadeIn 1s forwards;
}

.menu-icon.open {
  transform: rotate(90deg) scale(1.2);
}

/* Responsive - Mobile */
@media (max-width: 768px) {
  .menu {
    display: block;
    position: absolute;
    top: 70px;
    right: 9px;
    background-color:	#1976d2;
    width: 120px;
    border-radius: 12px;
    box-shadow: 0 12px 24px rgba(0, 0, 0, 0.25);
    overflow: hidden;
    opacity: 0;
    transform: translateY(-10px);
    pointer-events: none;
    transition: opacity 0.4s ease, transform 0.4s ease;
    opacity: 0;
    animation: fadeIn 1s forwards;
  }

  .menu.open {
    opacity: 1;
    transform: translateY(0);
    pointer-events: auto;
  }

  .menu ul {
    flex-direction: column;
    gap: 12px;
    padding: 18px;
  }

  .menu-icon {
    display: block;
  }
}
</style>

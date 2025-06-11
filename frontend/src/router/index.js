
import { createRouter, createWebHistory } from 'vue-router'
import Home from '../pages/Home.vue';
// import Sekolah from '../components/Sekolah.vue';
import DetailSekolah from '../pages/DetailSekolah.vue';
import News from '../pages/News.vue'
import Detailberita from '../pages/DetailBerita.vue'


const routes = [
  {
    path: "/",
    name: "Home",
    component: Home,
  },
  {
    path: "/sekolah/:id",
    name: "DetailSekolah",
    component: DetailSekolah,
    props: true,
  },
  {
    path: "/berita/:id",
    name: "DetailBerita",
    component: Detailberita,
    props: true,
  },
  {
    path: "/News",
    name: "Berita",
    component: News,
  }
]

const router = createRouter({
  history: createWebHistory(),
  routes,
})


export default router;


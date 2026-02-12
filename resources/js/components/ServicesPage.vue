<template>
  <div class="services-page">
    <Header />

    <section class="services-page__hero">
      <div class="container">
        <h1 class="services-page__title">Услуги</h1>
        <p class="services-page__subtitle">Комплексные решения для клининга</p>
      </div>
    </section>

    <section class="services-page__list">
      <div class="container">
        <div v-if="services && services.length > 0" class="services-page__grid">
          <div 
            v-for="service in services" 
            :key="service.id"
            class="services-page__card"
            @click="goToService(service.slug)"
          >
            <div class="services-page__card-icon">
              <svg v-if="!service.icon" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
              </svg>
              <img v-else :src="service.icon" :alt="service.title" />
            </div>
            <h3 class="services-page__card-title">{{ service.title }}</h3>
            <p class="services-page__card-description">{{ getServiceDescription(service) }}</p>
            <a :href="`/uslugi/${service.slug}`" @click.stop="goToService(service.slug)" class="services-page__card-link">Подробнее →</a>
          </div>
        </div>
        <div v-else class="services-page__empty">
          <p>Услуги временно недоступны</p>
        </div>
      </div>
    </section>
  </div>
</template>

<script setup>
import { computed } from 'vue';
import Header from './Header.vue';

const props = defineProps({
  services: {
    type: Array,
    default: () => []
  }
});

const getServiceDescription = (service) => {
  if (service.short_description) return service.short_description;
  if (service.description) {
    return service.description.length > 150 
      ? service.description.substring(0, 150) + '...' 
      : service.description;
  }
  return 'Подробная информация об услуге';
};

const goToService = (slug) => {
  window.location.href = `/uslugi/${slug}`;
};
</script>

<style scoped>
.services-page {
  min-height: 100vh;
  background: #f9fafb;
}

.container {
  width: 100%;
  max-width: 1280px;
  margin: 0 auto;
  padding: 0 1rem;
}

@media (min-width: 640px) {
  .container {
    padding: 0 1.5rem;
  }
}

@media (min-width: 1024px) {
  .container {
    padding: 0 2rem;
  }
}

.services-page__hero {
  padding: 6rem 1rem 4rem;
  padding-top: calc(100px + 6rem);
  background: #1e40af;
  color: white;
  text-align: center;
}

.services-page__title {
  font-size: 3.5rem;
  font-weight: 700;
  margin-bottom: 1rem;
}

.services-page__subtitle {
  font-size: 1.25rem;
  color: #e5e7eb;
}

.services-page__list {
  padding: 4rem 1rem;
}

.services-page__grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
  gap: 2rem;
  max-width: 1200px;
  margin: 0 auto;
}

.services-page__card {
  background: white;
  border-radius: 0.5rem;
  padding: 2rem;
  box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
  transition: transform 0.3s ease, box-shadow 0.3s ease;
  cursor: pointer;
}

.services-page__card:hover {
  transform: translateY(-5px);
  box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
}

.services-page__card-icon {
  width: 80px;
  height: 80px;
  background: #dbeafe;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  margin: 0 auto 1.5rem;
}

.services-page__card-icon svg {
  width: 40px;
  height: 40px;
  color: #2563eb;
}

.services-page__card-icon img {
  width: 60px;
  height: 60px;
  object-fit: contain;
}

.services-page__card-title {
  font-size: 1.5rem;
  font-weight: 700;
  color: #111827;
  margin-bottom: 1rem;
  text-align: center;
}

.services-page__card-description {
  color: #6b7280;
  margin-bottom: 1.5rem;
  text-align: center;
  line-height: 1.6;
}

.services-page__card-link {
  display: block;
  text-align: center;
  color: #2563eb;
  font-weight: 600;
  text-decoration: none;
  transition: color 0.3s;
}

.services-page__card-link:hover {
  color: #1d4ed8;
}

.services-page__empty {
  text-align: center;
  padding: 4rem 1rem;
  color: #6b7280;
}

@media (max-width: 768px) {
  .services-page__title {
    font-size: 2.5rem;
  }

  .services-page__grid {
    grid-template-columns: 1fr;
  }
}
</style>

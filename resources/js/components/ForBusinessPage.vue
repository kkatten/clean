<template>
  <div class="for-business-page">
    <Header />

    <section class="for-business-page__hero">
      <div class="container">
        <h1 class="for-business-page__title">{{ pageTitle }}</h1>
        <p v-if="introContent" class="for-business-page__subtitle">{{ introContent }}</p>
      </div>
    </section>

    <section class="for-business-page__content">
      <div class="container">
        <div class="for-business-page__info">
          <div class="for-business-page__info-item">
            <div class="for-business-page__info-icon">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
              </svg>
            </div>
            <h3>Торговые центры и БЦ</h3>
            <p>Комплексное обслуживание коммерческих объектов</p>
          </div>

          <div class="for-business-page__info-item">
            <div class="for-business-page__info-icon">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
              </svg>
            </div>
            <h3>Долгосрочные договоры</h3>
            <p>Стабильное сотрудничество на выгодных условиях</p>
          </div>

          <div class="for-business-page__info-item">
            <div class="for-business-page__info-icon">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
              </svg>
            </div>
            <h3>Обслуживание входных зон</h3>
            <p>Грязезащитные покрытия и регулярная уборка</p>
          </div>

          <div class="for-business-page__info-item">
            <div class="for-business-page__info-icon">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
              </svg>
            </div>
            <h3>Фасады и остекление</h3>
            <p>Мойка фасадов до 16 м и профессиональная очистка стекол</p>
          </div>
        </div>

        <div class="for-business-page__cta">
          <a href="/kontakty" class="for-business-page__cta-btn">
            {{ ctaText }}
          </a>
        </div>
      </div>
    </section>
  </div>
</template>

<script setup>
import { computed } from 'vue';
import Header from './Header.vue';

const props = defineProps({
  page: {
    type: Object,
    default: null
  }
});

const pageTitle = computed(() => {
  return props.page?.title || 'Для бизнеса';
});

const introContent = computed(() => {
  return props.page?.blocks?.intro?.content || null;
});

const ctaText = computed(() => {
  return props.page?.blocks?.cta?.text || 'Получить коммерческое предложение';
});
</script>

<style scoped>
.for-business-page {
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

.for-business-page__hero {
  padding: 6rem 1rem 4rem;
  padding-top: calc(100px + 6rem);
  background: #1e40af;
  color: white;
  text-align: center;
}

.for-business-page__title {
  font-size: 3.5rem;
  font-weight: 700;
  margin-bottom: 1rem;
}

.for-business-page__subtitle {
  font-size: 1.25rem;
  color: #e5e7eb;
  max-width: 800px;
  margin: 0 auto;
  line-height: 1.6;
}

.for-business-page__content {
  padding: 4rem 1rem;
}

.for-business-page__info {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
  gap: 2rem;
  max-width: 1200px;
  margin: 0 auto 4rem;
}

.for-business-page__info-item {
  background: white;
  border-radius: 0.5rem;
  padding: 2.5rem;
  box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
  text-align: center;
  transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.for-business-page__info-item:hover {
  transform: translateY(-5px);
  box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
}

.for-business-page__info-icon {
  width: 80px;
  height: 80px;
  background: #dbeafe;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  margin: 0 auto 1.5rem;
}

.for-business-page__info-icon svg {
  width: 40px;
  height: 40px;
  color: #2563eb;
}

.for-business-page__info-item h3 {
  font-size: 1.5rem;
  font-weight: 700;
  color: #111827;
  margin-bottom: 1rem;
}

.for-business-page__info-item p {
  color: #6b7280;
  line-height: 1.6;
}

.for-business-page__cta {
  text-align: center;
}

.for-business-page__cta-btn {
  display: inline-block;
  padding: 1.25rem 3rem;
  background: #1e40af;
  color: white;
  border-radius: 0.375rem;
  font-size: 1.25rem;
  font-weight: 600;
  text-decoration: none;
  transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.for-business-page__cta-btn:hover {
  transform: translateY(-2px);
  box-shadow: 0 10px 20px rgba(37, 99, 235, 0.4);
}

@media (max-width: 768px) {
  .for-business-page__title {
    font-size: 2.5rem;
  }

  .for-business-page__info {
    grid-template-columns: 1fr;
  }
}
</style>

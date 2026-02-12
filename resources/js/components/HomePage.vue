<template>
  <div class="home-page">
    <Header />

    <section class="home-hero">
      <div class="container home-hero__container">
        <div class="home-hero__badge">
          <div class="home-hero__badge-icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
          </div>
          <span>Профессиональная химчистка в Кирове</span>
        </div>

        <h1 class="home-hero__title">{{ pageTitle }}</h1>

        <p class="home-hero__subtitle">
          Коммерческий клининг для ТЦ, офисов и коммерческих помещений.<br />
          Свои мощности, без субподрядчиков, полный цикл услуг
        </p>

        <div class="home-hero__buttons">
          <a href="tel:+78332776264" class="home-hero__btn home-hero__btn-primary">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
            </svg>
            77-62-64
          </a>
          <button @click="scrollToForm" class="home-hero__btn home-hero__btn-secondary">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
            </svg>
            Заказать химчистку
          </button>
        </div>

        <div class="home-hero__features">
          <div class="home-hero__feature">
            <div class="home-hero__feature-icon">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
              </svg>
            </div>
            <span>Гарантия качества</span>
          </div>
          <div class="home-hero__feature">
            <div class="home-hero__feature-icon">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
              </svg>
            </div>
            <span>Быстрый выезд</span>
          </div>
          <div class="home-hero__feature">
            <div class="home-hero__feature-icon">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
              </svg>
            </div>
            <span>Доступные цены</span>
          </div>
          <div class="home-hero__feature">
            <div class="home-hero__feature-icon">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
              </svg>
            </div>
            <span>Экологичные средства</span>
          </div>
        </div>
      </div>
    </section>

    <section v-if="utpBlock" class="home-utp">
      <div class="container">
        <h2 class="home-utp__title">{{ utpBlock.text || utpBlock.title }}</h2>
      </div>
    </section>

    <section id="why-us" v-if="whyUsBlock" class="home-why-us">
      <div class="container">
        <h2 class="home-why-us__title">{{ whyUsBlock.title }}</h2>
        <div class="home-why-us__grid">
          <div 
            v-for="(item, index) in whyUsBlock.items" 
            :key="index"
            class="home-why-us__card"
          >
            <div class="home-why-us__card-icon">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
              </svg>
            </div>
            <span>{{ item }}</span>
          </div>
        </div>
      </div>
    </section>

    <section id="services" v-if="services && services.length > 0" class="home-services">
      <div class="container">
        <h2 class="home-services__title">Основные услуги</h2>
        <div class="home-services__grid">
          <div 
            v-for="service in services" 
            :key="service.id"
            class="home-services__card"
            @click="goToService(service.slug)"
          >
            <div class="home-services__card-icon">
              <svg v-if="!service.icon" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
              </svg>
              <img v-else :src="service.icon" :alt="service.title" />
            </div>
            <h3 class="home-services__card-title">{{ service.title }}</h3>
            <p class="home-services__card-description">{{ getServiceDescription(service) }}</p>
            <a :href="`/uslugi/${service.slug}`" @click.stop="goToService(service.slug)" class="home-services__card-link">Подробнее →</a>
          </div>
        </div>
      </div>
    </section>

    <section id="for-business" v-if="forWhoBlock" class="home-for-who">
      <div class="container">
        <h2 class="home-for-who__title">{{ forWhoBlock.title }}</h2>
        <div class="home-for-who__grid">
          <div 
            v-for="(item, index) in forWhoBlock.items" 
            :key="index"
            class="home-for-who__card"
          >
            <div class="home-for-who__card-icon">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
              </svg>
            </div>
            <span>{{ item }}</span>
          </div>
        </div>
      </div>
    </section>

    <section id="lead-form-section" class="home-lead-form">
      <div class="container">
        <h2 class="home-lead-form__title">Оставить заявку</h2>
        <div class="home-lead-form__form-wrapper">
          <form @submit.prevent="submitLeadForm" class="home-lead-form__form">
            <input type="hidden" name="_token" :value="csrfToken" />
            <input type="hidden" name="source" value="main_form" />
            
            <div class="home-lead-form__field">
              <label class="home-lead-form__label">Имя <span class="home-lead-form__required">*</span></label>
              <input 
                v-model="leadForm.name"
                type="text" 
                name="name" 
                required 
                maxlength="255"
                class="home-lead-form__input"
                placeholder="Ваше имя"
              />
            </div>
            
            <div class="home-lead-form__field">
              <label class="home-lead-form__label">Телефон <span class="home-lead-form__required">*</span></label>
              <input 
                v-model="leadForm.phone"
                type="tel" 
                name="phone" 
                required 
                maxlength="50"
                class="home-lead-form__input"
                placeholder="+7 (___) ___-__-__"
              />
            </div>
            
            <div class="home-lead-form__field">
              <label class="home-lead-form__label">Email</label>
              <input 
                v-model="leadForm.email"
                type="email" 
                name="email"
                class="home-lead-form__input"
                placeholder="your@email.com"
              />
            </div>
            
            <div class="home-lead-form__field">
              <label class="home-lead-form__label">Сообщение</label>
              <textarea 
                v-model="leadForm.message"
                name="message" 
                maxlength="2000"
                rows="4"
                class="home-lead-form__textarea"
                placeholder="Опишите вашу задачу..."
              ></textarea>
            </div>
            
            <button 
              type="submit" 
              :disabled="leadFormLoading"
              class="home-lead-form__submit"
            >
              <span v-if="!leadFormLoading">Отправить заявку</span>
              <span v-else>Отправка...</span>
            </button>
            
            <div v-if="leadFormSuccess" class="home-lead-form__message home-lead-form__message--success">
              Заявка успешно отправлена! Мы свяжемся с вами в ближайшее время.
            </div>
            
            <div v-if="leadFormError" class="home-lead-form__message home-lead-form__message--error">
              {{ leadFormError }}
            </div>
          </form>
        </div>
      </div>
    </section>

    <section id="contacts" class="home-contacts">
      <div class="container">
        <h2 class="home-contacts__title">Контакты</h2>
        <div class="home-contacts__grid">
          <div class="home-contacts__item">
            <div class="home-contacts__item-icon">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
              </svg>
            </div>
            <h3 class="home-contacts__item-title">Телефон</h3>
            <a href="tel:+78332776264" class="home-contacts__item-value">77-62-64</a>
            <a href="tel:+79229776264" class="home-contacts__item-value">+7 (922) 977-62-64</a>
          </div>
          
          <div class="home-contacts__item">
            <div class="home-contacts__item-icon">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
              </svg>
            </div>
            <h3 class="home-contacts__item-title">Адрес</h3>
            <p class="home-contacts__item-value">ул. Романа Ердякова 50 стр 2</p>
            <p class="home-contacts__item-value">г. Киров</p>
          </div>
          
          <div class="home-contacts__item">
            <div class="home-contacts__item-icon">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
              </svg>
            </div>
            <h3 class="home-contacts__item-title">Мессенджеры</h3>
            <a href="https://t.me/cleankirov43" target="_blank" class="home-contacts__item-value">Telegram: @cleankirov43</a>
            <a href="https://vk.ru/clean.kirov" target="_blank" class="home-contacts__item-value">VK: clean.kirov</a>
          </div>
        </div>
      </div>
    </section>
  </div>
</template>

<script setup>
import { computed, onMounted, watch, ref, reactive } from 'vue';
import Header from './Header.vue';

const props = defineProps({
  page: {
    type: Object,
    default: null
  },
  services: {
    type: Array,
    default: () => []
  }
});

const pageTitle = computed(() => {
  return props.page?.title || 'ЧИСТЫЙ КИРОВ';
});

const metaDescription = computed(() => {
  return props.page?.meta_description || 'Коммерческий клининг в Кирове';
});

watch(() => props.page?.meta_description, (newDesc) => {
  if (newDesc) {
    let metaDesc = document.querySelector('meta[name="description"]');
    if (!metaDesc) {
      metaDesc = document.createElement('meta');
      metaDesc.setAttribute('name', 'description');
      document.head.appendChild(metaDesc);
    }
    metaDesc.setAttribute('content', newDesc);
  }
}, { immediate: true });

const utpBlock = computed(() => {
  return props.page?.blocks?.utp || null;
});

const whyUsBlock = computed(() => {
  return props.page?.blocks?.why_us || null;
});

const forWhoBlock = computed(() => {
  return props.page?.blocks?.for_who || null;
});

const scrollToForm = () => {
  const formSection = document.getElementById('lead-form-section');
  if (formSection) {
    formSection.scrollIntoView({ behavior: 'smooth', block: 'start' });
  }
};

const getServiceDescription = (service) => {
  if (service.short_description) return service.short_description;
  if (service.description) {
    return service.description.length > 100 
      ? service.description.substring(0, 100) + '...' 
      : service.description;
  }
  return 'Подробная информация об услуге';
};

const goToService = (slug) => {
  window.location.href = `/uslugi/${slug}`;
};

const csrfToken = ref('');
const leadFormLoading = ref(false);
const leadFormSuccess = ref(false);
const leadFormError = ref('');

const leadForm = reactive({
  name: '',
  phone: '',
  email: '',
  message: ''
});

onMounted(() => {
  const token = document.querySelector('meta[name="csrf-token"]');
  if (token) {
    csrfToken.value = token.getAttribute('content');
  }
});

const submitLeadForm = async () => {
  leadFormLoading.value = true;
  leadFormSuccess.value = false;
  leadFormError.value = '';
  
  try {
    const formData = new FormData();
    formData.append('_token', csrfToken.value);
    formData.append('source', 'main_form');
    formData.append('name', leadForm.name);
    formData.append('phone', leadForm.phone);
    formData.append('email', leadForm.email);
    formData.append('message', leadForm.message);
    
    const response = await fetch('/zayavka', {
      method: 'POST',
      body: formData,
      headers: {
        'X-Requested-With': 'XMLHttpRequest'
      }
    });
    
    if (response.ok) {
      leadFormSuccess.value = true;
      leadForm.name = '';
      leadForm.phone = '';
      leadForm.email = '';
      leadForm.message = '';
      
      setTimeout(() => {
        leadFormSuccess.value = false;
      }, 5000);
    } else {
      const data = await response.json();
      leadFormError.value = data.message || 'Произошла ошибка при отправке заявки';
    }
  } catch (err) {
    leadFormError.value = 'Произошла ошибка при отправке заявки. Попробуйте позже.';
  } finally {
    leadFormLoading.value = false;
  }
};
</script>

<style scoped>
.home-page {
  min-height: 100vh;
  margin-top: 0;
  padding-top: 0;
}

.container {
  width: 100%;
  max-width: 1440px;
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

/* Hero секция */
.home-hero {
  position: relative;
  min-height: 100vh;
  background: #1e40af;
  overflow: hidden;
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 2rem 0;
  padding-top: calc(1.5rem * 2 + 1.5rem + 28px);
  margin-top: 0;
}

.home-hero__container {
  text-align: center;
  max-width: 1200px;
}

.home-hero__badge {
  display: inline-flex;
  align-items: center;
  gap: 0.5rem;
  padding: 0.75rem 1.5rem;
  background: transparent;
  border: 1px solid rgba(255, 255, 255, 0.3);
  border-radius: 0.375rem;
  margin-bottom: 2rem;
}

.home-hero__badge-icon {
  width: 20px;
  height: 20px;
  color: #ffffff;
}

.home-hero__badge span {
  color: #ffffff;
  font-size: 0.875rem;
  font-weight: 500;
}

.home-hero__title {
  font-size: 4rem;
  font-weight: 700;
  color: white;
  text-transform: uppercase;
  letter-spacing: 0.05em;
  margin-bottom: 1.5rem;
  line-height: 1.1;
}

.home-hero__subtitle {
  font-size: 1.25rem;
  color: #e0e7ff;
  margin-bottom: 3rem;
  line-height: 1.6;
}

.home-hero__buttons {
  display: flex;
  gap: 1rem;
  justify-content: center;
  margin-bottom: 4rem;
}

.home-hero__btn {
  display: flex;
  align-items: center;
  gap: 0.75rem;
  padding: 1rem 2rem;
  border-radius: 0.375rem;
  font-weight: 600;
  font-size: 1.125rem;
  text-decoration: none;
  transition: all 0.3s;
  border: none;
  cursor: pointer;
}

.home-hero__btn svg {
  width: 24px;
  height: 24px;
}

.home-hero__btn-primary {
  background: #2563eb;
  color: white;
}

.home-hero__btn-primary:hover {
  background: #1d4ed8;
  box-shadow: 0 4px 12px rgba(37, 99, 235, 0.4);
}

.home-hero__btn-secondary {
  background: white;
  color: #1e40af;
  border: 2px solid white;
}

.home-hero__btn-secondary:hover {
  background: #f8fafc;
  border-color: #e0e7ff;
}

.home-hero__features {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 1rem;
  max-width: 1000px;
  margin: 0 auto;
}

.home-hero__feature {
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 0.75rem;
  padding: 1.5rem;
  background: rgba(255, 255, 255, 0.1);
  border: 1px solid rgba(255, 255, 255, 0.2);
  border-radius: 0.375rem;
}

.home-hero__feature-icon {
  width: 32px;
  height: 32px;
  color: white;
}

.home-hero__feature span {
  color: white;
  font-size: 0.875rem;
  font-weight: 500;
  text-align: center;
}

/* УТП секция */
.home-utp {
  padding: 4rem 1rem;
  background: white;
  text-align: center;
}

.home-utp__title {
  font-size: 3rem;
  font-weight: 700;
  color: #111827;
  max-width: 1000px;
  margin: 0 auto;
  line-height: 1.2;
}

/* Услуги секция */
.home-services {
  padding: 4rem 1rem;
  background: #f9fafb;
}

.home-services__title {
  font-size: 2.5rem;
  font-weight: 700;
  text-align: center;
  color: #111827;
  margin-bottom: 3rem;
}

.home-services__grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
  gap: 2rem;
  max-width: 1400px;
  margin: 0 auto;
}

.home-services__card {
  background: white;
  border-radius: 0.5rem;
  padding: 2rem;
  border: 1px solid #e5e7eb;
  box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
  transition: transform 0.3s ease, box-shadow 0.3s ease, border-color 0.3s;
  cursor: pointer;
}

.home-services__card:hover {
  transform: translateY(-2px);
  box-shadow: 0 4px 12px rgba(30, 64, 175, 0.15);
  border-color: #2563eb;
}

.home-services__card-icon {
  width: 64px;
  height: 64px;
  background: #eff6ff;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  margin: 0 auto 1.5rem;
  border: 1px solid #dbeafe;
}

.home-services__card-icon svg {
  width: 32px;
  height: 32px;
  color: #2563eb;
}

.home-services__card-icon img {
  width: 48px;
  height: 48px;
  object-fit: contain;
}

.home-services__card-title {
  font-size: 1.25rem;
  font-weight: 700;
  color: #111827;
  margin-bottom: 0.75rem;
  text-align: center;
}

.home-services__card-description {
  color: #6b7280;
  margin-bottom: 1rem;
  text-align: center;
  line-height: 1.6;
}

.home-services__card-link {
  display: block;
  text-align: center;
  color: #1e40af;
  font-weight: 600;
  text-decoration: none;
  transition: color 0.3s;
}

.home-services__card-link:hover {
  color: #1e3a8a;
}

/* Почему мы секция */
.home-why-us {
  padding: 4rem 1rem;
  background: #f9fafb;
}

.home-why-us__title {
  font-size: 2.5rem;
  font-weight: 700;
  text-align: center;
  color: #111827;
  margin-bottom: 3rem;
}

.home-why-us__grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
  gap: 2rem;
  max-width: 1400px;
  margin: 0 auto;
}

.home-why-us__card {
  background: white;
  border-radius: 0.5rem;
  padding: 2rem;
  border: 1px solid #e5e7eb;
  box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
  display: flex;
  align-items: center;
  gap: 1rem;
  transition: transform 0.3s ease, box-shadow 0.3s ease, border-color 0.3s;
}

.home-why-us__card:hover {
  transform: translateY(-2px);
  box-shadow: 0 4px 12px rgba(30, 64, 175, 0.15);
  border-color: #2563eb;
}

.home-why-us__card-icon {
  width: 48px;
  height: 48px;
  background: #eff6ff;
  border-radius: 50%;
  border: 1px solid #dbeafe;
  display: flex;
  align-items: center;
  justify-content: center;
  flex-shrink: 0;
}

.home-why-us__card-icon svg {
  width: 24px;
  height: 24px;
  color: #2563eb;
}

.home-why-us__card span {
  font-size: 1.125rem;
  font-weight: 600;
  color: #111827;
}

/* Для кого работаем секция */
.home-for-who {
  padding: 4rem 1rem;
  background: white;
}

.home-for-who__title {
  font-size: 2.5rem;
  font-weight: 700;
  text-align: center;
  color: #111827;
  margin-bottom: 3rem;
}

.home-for-who__grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
  gap: 2rem;
  max-width: 1400px;
  margin: 0 auto;
}

.home-for-who__card {
  background: white;
  border: 1px solid #e5e7eb;
  border-radius: 0.5rem;
  padding: 2rem;
  text-align: center;
  transition: transform 0.3s ease, box-shadow 0.3s ease, border-color 0.3s;
}

.home-for-who__card:hover {
  transform: translateY(-2px);
  box-shadow: 0 4px 12px rgba(30, 64, 175, 0.15);
  border-color: #2563eb;
}

.home-for-who__card-icon {
  width: 64px;
  height: 64px;
  background: #eff6ff;
  border: 1px solid #dbeafe;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  margin: 0 auto 1rem;
}

.home-for-who__card-icon svg {
  width: 32px;
  height: 32px;
  color: #2563eb;
}

.home-for-who__card span {
  font-size: 1.125rem;
  font-weight: 600;
  color: #111827;
}

/* Форма заявки секция */
.home-lead-form {
  padding: 4rem 1rem;
  background: #1e40af;
}

.home-lead-form__title {
  font-size: 2.5rem;
  font-weight: 700;
  text-align: center;
  color: white;
  margin-bottom: 3rem;
}

.home-lead-form__form-wrapper {
  max-width: 600px;
  margin: 0 auto;
}

.home-lead-form__form {
  background: white;
  border-radius: 0.5rem;
  padding: 2rem;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
}

.home-lead-form__field {
  margin-bottom: 1.5rem;
}

.home-lead-form__label {
  display: block;
  font-weight: 600;
  color: #111827;
  margin-bottom: 0.5rem;
}

.home-lead-form__required {
  color: #ef4444;
}

.home-lead-form__input,
.home-lead-form__textarea {
  width: 100%;
  padding: 0.75rem;
  border: 2px solid #e5e7eb;
  border-radius: 0.5rem;
  font-size: 1rem;
  transition: border-color 0.3s;
}

.home-lead-form__input:focus,
.home-lead-form__textarea:focus {
  outline: none;
  border-color: #1e40af;
}

.home-lead-form__textarea {
  resize: vertical;
  min-height: 100px;
}

.home-lead-form__submit {
  width: 100%;
  padding: 1rem;
  background: #1e40af;
  color: white;
  border: none;
  border-radius: 0.375rem;
  font-size: 1.125rem;
  font-weight: 600;
  cursor: pointer;
  transition: background 0.3s;
}

.home-lead-form__submit:hover:not(:disabled) {
  background: #1e3a8a;
}

.home-lead-form__submit:disabled {
  opacity: 0.5;
  cursor: not-allowed;
}

.home-lead-form__message {
  margin-top: 1rem;
  padding: 1rem;
  border-radius: 0.5rem;
}

.home-lead-form__message--success {
  background: #d1fae5;
  color: #065f46;
  border: 1px solid #6ee7b7;
}

.home-lead-form__message--error {
  background: #fee2e2;
  color: #991b1b;
  border: 1px solid #fca5a5;
}

/* Контакты секция */
.home-contacts {
  padding: 4rem 1rem;
  background: #1f2937;
  color: white;
}

.home-contacts__title {
  font-size: 2.5rem;
  font-weight: 700;
  text-align: center;
  margin-bottom: 3rem;
}

.home-contacts__grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
  gap: 2rem;
  max-width: 1200px;
  margin: 0 auto;
}

.home-contacts__item {
  background: rgba(255, 255, 255, 0.1);
  border-radius: 1rem;
  padding: 2rem;
  text-align: center;
}

.home-contacts__item-icon {
  width: 64px;
  height: 64px;
  background: rgba(59, 130, 246, 0.2);
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  margin: 0 auto 1.5rem;
}

.home-contacts__item-icon svg {
  width: 32px;
  height: 32px;
  color: #60a5fa;
}

.home-contacts__item-title {
  font-size: 1.25rem;
  font-weight: 700;
  margin-bottom: 1rem;
}

.home-contacts__item-value {
  display: block;
  color: #d1d5db;
  margin-bottom: 0.5rem;
  text-decoration: none;
  transition: color 0.3s;
}

.home-contacts__item-value:hover {
  color: #60a5fa;
}

@media (max-width: 768px) {
  .home-hero__title {
    font-size: 2.5rem;
  }

  .home-hero__subtitle {
    font-size: 1rem;
  }

  .home-hero__buttons {
    flex-direction: column;
  }

  .home-hero__features {
    grid-template-columns: repeat(2, 1fr);
  }

  .home-utp__title {
    font-size: 2rem;
  }
  
  .home-services__grid,
  .home-why-us__grid,
  .home-for-who__grid {
    grid-template-columns: 1fr;
  }
  
  .home-contacts__grid {
    grid-template-columns: 1fr;
  }
}
</style>

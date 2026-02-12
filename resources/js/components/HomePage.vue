<template>
  <div class="min-h-screen mt-0 pt-0">
    <Header />

    <section class="relative min-h-screen bg-[#1e40af] overflow-hidden flex items-center justify-center py-8 pt-[calc(1.5rem*2+1.5rem+28px)] mt-0">
      <div class="max-w-[1440px] mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-[1200px] mx-auto text-center">
        <div class="inline-flex items-center gap-2 px-6 py-3 bg-transparent border border-[rgba(255,255,255,0.3)] rounded-[0.375rem] mb-8">
          <div class="w-5 h-5 text-white">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
          </div>
          <span class="text-white text-sm font-medium">Профессиональная химчистка в Кирове</span>
        </div>

        <h1 class="text-[4rem] max-md:text-[2.5rem] font-bold text-white uppercase tracking-[0.05em] mb-6 leading-[1.1]">{{ pageTitle }}</h1>

        <p class="text-[1.25rem] max-md:text-base text-[#e0e7ff] mb-12 leading-[1.6]">
          Коммерческий клининг для ТЦ, офисов и коммерческих помещений.<br />
          Свои мощности, без субподрядчиков, полный цикл услуг
        </p>

        <div class="flex flex-col max-md:flex-col md:flex-row gap-4 justify-center mb-16">
          <a href="tel:+78332776264" class="flex items-center gap-3 px-8 py-4 bg-[#2563eb] text-white rounded-[0.375rem] font-semibold text-lg no-underline transition-all duration-300 hover:bg-[#1d4ed8] hover:shadow-[0_4px_12px_rgba(37,99,235,0.4)]">
            <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
            </svg>
            77-62-64
          </a>
          <button @click="scrollToForm" class="flex items-center gap-3 px-8 py-4 bg-white text-[#1e40af] border-2 border-white rounded-[0.375rem] font-semibold text-lg transition-all duration-300 hover:bg-[#f8fafc] hover:border-[#e0e7ff]">
            <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
            </svg>
            Заказать химчистку
          </button>
        </div>

        <div class="grid grid-cols-2 max-md:grid-cols-2 md:grid-cols-4 gap-4 max-w-[1000px] mx-auto">
          <div class="flex flex-col items-center gap-3 p-6 bg-[rgba(255,255,255,0.1)] border border-[rgba(255,255,255,0.2)] rounded-[0.375rem]">
            <div class="w-8 h-8 text-white">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
              </svg>
            </div>
            <span class="text-white text-sm font-medium text-center">Гарантия качества</span>
          </div>
          <div class="flex flex-col items-center gap-3 p-6 bg-[rgba(255,255,255,0.1)] border border-[rgba(255,255,255,0.2)] rounded-[0.375rem]">
            <div class="w-8 h-8 text-white">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
              </svg>
            </div>
            <span class="text-white text-sm font-medium text-center">Быстрый выезд</span>
          </div>
          <div class="flex flex-col items-center gap-3 p-6 bg-[rgba(255,255,255,0.1)] border border-[rgba(255,255,255,0.2)] rounded-[0.375rem]">
            <div class="w-8 h-8 text-white">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
              </svg>
            </div>
            <span class="text-white text-sm font-medium text-center">Доступные цены</span>
          </div>
          <div class="flex flex-col items-center gap-3 p-6 bg-[rgba(255,255,255,0.1)] border border-[rgba(255,255,255,0.2)] rounded-[0.375rem]">
            <div class="w-8 h-8 text-white">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
              </svg>
            </div>
            <span class="text-white text-sm font-medium text-center">Экологичные средства</span>
          </div>
        </div>
        </div>
      </div>
    </section>

    <section v-if="utpBlock" class="py-16 bg-white text-center">
      <div class="max-w-[1440px] mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-[3rem] max-md:text-[2rem] font-bold text-[#111827] max-w-[1000px] mx-auto leading-[1.2]">{{ utpBlock.text || utpBlock.title }}</h2>
      </div>
    </section>

    <section id="why-us" v-if="whyUsBlock" class="py-16 bg-[#f9fafb]">
      <div class="max-w-[1440px] mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-[2.5rem] font-bold text-center text-[#111827] mb-12">{{ whyUsBlock.title }}</h2>
        <div class="grid grid-cols-1 max-md:grid-cols-1 md:grid-cols-[repeat(auto-fit,minmax(250px,1fr))] gap-8 max-w-[1400px] mx-auto">
          <div 
            v-for="(item, index) in whyUsBlock.items" 
            :key="index"
            class="bg-white rounded-[0.5rem] p-8 border border-[#e5e7eb] shadow-[0_1px_3px_rgba(0,0,0,0.05)] flex items-center gap-4 transition-all duration-300 ease-in-out hover:-translate-y-[2px] hover:shadow-[0_4px_12px_rgba(30,64,175,0.15)] hover:border-[#2563eb]"
          >
            <div class="w-12 h-12 bg-[#eff6ff] rounded-full border border-[#dbeafe] flex items-center justify-center flex-shrink-0">
              <svg class="w-6 h-6 text-[#2563eb]" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
              </svg>
            </div>
            <span class="text-[1.125rem] font-semibold text-[#111827]">{{ item }}</span>
          </div>
        </div>
      </div>
    </section>

    <section id="services" v-if="services && services.length > 0" class="py-16 bg-[#f9fafb]">
      <div class="max-w-[1440px] mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-[2.5rem] font-bold text-center text-[#111827] mb-12">Основные услуги</h2>
        <div class="grid grid-cols-1 max-md:grid-cols-1 md:grid-cols-[repeat(auto-fit,minmax(280px,1fr))] gap-8 max-w-[1400px] mx-auto">
          <div 
            v-for="service in services" 
            :key="service.id"
            class="bg-white rounded-[0.5rem] p-8 border border-[#e5e7eb] shadow-[0_1px_3px_rgba(0,0,0,0.05)] transition-all duration-300 ease-in-out cursor-pointer hover:-translate-y-[2px] hover:shadow-[0_4px_12px_rgba(30,64,175,0.15)] hover:border-[#2563eb]"
            @click="goToService(service.slug)"
          >
            <div class="w-16 h-16 bg-[#eff6ff] rounded-full border border-[#dbeafe] flex items-center justify-center mx-auto mb-6">
              <svg v-if="!service.icon" class="w-8 h-8 text-[#2563eb]" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
              </svg>
              <img v-else :src="service.icon" :alt="service.title" class="w-12 h-12 object-contain" />
            </div>
            <h3 class="text-[1.25rem] font-bold text-[#111827] mb-3 text-center">{{ service.title }}</h3>
            <p class="text-[#6b7280] mb-4 text-center leading-[1.6]">{{ getServiceDescription(service) }}</p>
            <a :href="`/uslugi/${service.slug}`" @click.stop="goToService(service.slug)" class="block text-center text-[#1e40af] font-semibold no-underline transition-colors duration-300 hover:text-[#1e3a8a]">Подробнее →</a>
          </div>
        </div>
      </div>
    </section>

    <section id="for-business" v-if="forWhoBlock" class="py-16 bg-white">
      <div class="max-w-[1440px] mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-[2.5rem] font-bold text-center text-[#111827] mb-12">{{ forWhoBlock.title }}</h2>
        <div class="grid grid-cols-1 max-md:grid-cols-1 md:grid-cols-[repeat(auto-fit,minmax(200px,1fr))] gap-8 max-w-[1400px] mx-auto">
          <div 
            v-for="(item, index) in forWhoBlock.items" 
            :key="index"
            class="bg-white border border-[#e5e7eb] rounded-[0.5rem] p-8 text-center transition-all duration-300 ease-in-out hover:-translate-y-[2px] hover:shadow-[0_4px_12px_rgba(30,64,175,0.15)] hover:border-[#2563eb]"
          >
            <div class="w-16 h-16 bg-[#eff6ff] border border-[#dbeafe] rounded-full flex items-center justify-center mx-auto mb-4">
              <svg class="w-8 h-8 text-[#2563eb]" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
              </svg>
            </div>
            <span class="text-[1.125rem] font-semibold text-[#111827]">{{ item }}</span>
          </div>
        </div>
      </div>
    </section>

    <section id="lead-form-section" class="py-16 bg-[#1e40af]">
      <div class="max-w-[1440px] mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-[2.5rem] font-bold text-center text-white mb-12">Оставить заявку</h2>
        <div class="max-w-[600px] mx-auto">
          <form @submit.prevent="submitLeadForm" class="bg-white rounded-[0.5rem] p-8 shadow-[0_4px_12px_rgba(0,0,0,0.1)]">
            <input type="hidden" name="_token" :value="csrfToken" />
            <input type="hidden" name="source" value="main_form" />
            
            <div class="mb-6">
              <label class="block font-semibold text-[#111827] mb-2">Имя <span class="text-[#ef4444]">*</span></label>
              <input 
                v-model="leadForm.name"
                type="text" 
                name="name" 
                required 
                maxlength="255"
                class="w-full px-3 py-3 border-2 border-[#e5e7eb] rounded-[0.5rem] text-base transition-colors focus:outline-none focus:border-[#1e40af]"
                placeholder="Ваше имя"
              />
            </div>
            
            <div class="mb-6">
              <label class="block font-semibold text-[#111827] mb-2">Телефон <span class="text-[#ef4444]">*</span></label>
              <input 
                v-model="leadForm.phone"
                type="tel" 
                name="phone" 
                required 
                maxlength="50"
                class="w-full px-3 py-3 border-2 border-[#e5e7eb] rounded-[0.5rem] text-base transition-colors focus:outline-none focus:border-[#1e40af]"
                placeholder="+7 (___) ___-__-__"
              />
            </div>
            
            <div class="mb-6">
              <label class="block font-semibold text-[#111827] mb-2">Email</label>
              <input 
                v-model="leadForm.email"
                type="email" 
                name="email"
                class="w-full px-3 py-3 border-2 border-[#e5e7eb] rounded-[0.5rem] text-base transition-colors focus:outline-none focus:border-[#1e40af]"
                placeholder="your@email.com"
              />
            </div>
            
            <div class="mb-6">
              <label class="block font-semibold text-[#111827] mb-2">Сообщение</label>
              <textarea 
                v-model="leadForm.message"
                name="message" 
                maxlength="2000"
                rows="4"
                class="w-full px-3 py-3 border-2 border-[#e5e7eb] rounded-[0.5rem] text-base transition-colors focus:outline-none focus:border-[#1e40af] resize-y min-h-[100px]"
                placeholder="Опишите вашу задачу..."
              ></textarea>
            </div>
            
            <button 
              type="submit" 
              :disabled="leadFormLoading"
              class="w-full py-4 bg-[#1e40af] text-white rounded-[0.375rem] text-[1.125rem] font-semibold cursor-pointer transition-colors hover:bg-[#1e3a8a] disabled:opacity-50 disabled:cursor-not-allowed"
            >
              <span v-if="!leadFormLoading">Отправить заявку</span>
              <span v-else>Отправка...</span>
            </button>
            
            <div v-if="leadFormSuccess" class="mt-4 p-4 rounded-[0.5rem] bg-[#d1fae5] text-[#065f46] border border-[#6ee7b7]">
              Заявка успешно отправлена! Мы свяжемся с вами в ближайшее время.
            </div>
            
            <div v-if="leadFormError" class="mt-4 p-4 rounded-[0.5rem] bg-[#fee2e2] text-[#991b1b] border border-[#fca5a5]">
              {{ leadFormError }}
            </div>
          </form>
        </div>
      </div>
    </section>

    <section id="contacts" class="py-16 bg-[#1f2937] text-white">
      <div class="max-w-[1440px] mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-[2.5rem] font-bold text-center mb-12">Контакты</h2>
        <div class="grid grid-cols-1 max-md:grid-cols-1 md:grid-cols-[repeat(auto-fit,minmax(280px,1fr))] gap-8 max-w-[1200px] mx-auto">
          <div class="bg-[rgba(255,255,255,0.1)] rounded-2xl p-8 text-center">
            <div class="w-16 h-16 bg-[rgba(59,130,246,0.2)] rounded-full flex items-center justify-center mx-auto mb-6">
              <svg class="w-8 h-8 text-[#60a5fa]" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
              </svg>
            </div>
            <h3 class="text-[1.25rem] font-bold mb-4">Телефон</h3>
            <a href="tel:+78332776264" class="block text-[#d1d5db] mb-2 no-underline transition-colors duration-300 hover:text-[#60a5fa]">77-62-64</a>
            <a href="tel:+79229776264" class="block text-[#d1d5db] no-underline transition-colors duration-300 hover:text-[#60a5fa]">+7 (922) 977-62-64</a>
          </div>
          
          <div class="bg-[rgba(255,255,255,0.1)] rounded-2xl p-8 text-center">
            <div class="w-16 h-16 bg-[rgba(59,130,246,0.2)] rounded-full flex items-center justify-center mx-auto mb-6">
              <svg class="w-8 h-8 text-[#60a5fa]" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
              </svg>
            </div>
            <h3 class="text-[1.25rem] font-bold mb-4">Адрес</h3>
            <p class="text-[#d1d5db] mb-2">ул. Романа Ердякова 50 стр 2</p>
            <p class="text-[#d1d5db]">г. Киров</p>
          </div>
          
          <div class="bg-[rgba(255,255,255,0.1)] rounded-2xl p-8 text-center">
            <div class="w-16 h-16 bg-[rgba(59,130,246,0.2)] rounded-full flex items-center justify-center mx-auto mb-6">
              <svg class="w-8 h-8 text-[#60a5fa]" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
              </svg>
            </div>
            <h3 class="text-[1.25rem] font-bold mb-4">Мессенджеры</h3>
            <a href="https://t.me/cleankirov43" target="_blank" class="block text-[#d1d5db] mb-2 no-underline transition-colors duration-300 hover:text-[#60a5fa]">Telegram: @cleankirov43</a>
            <a href="https://vk.ru/clean.kirov" target="_blank" class="block text-[#d1d5db] no-underline transition-colors duration-300 hover:text-[#60a5fa]">VK: clean.kirov</a>
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

<template>
  <div class="min-h-screen bg-[#f9fafb]">
    <Header />

    <section class="py-24 px-4 pt-[calc(100px+6rem)] bg-[#1e40af] text-white text-center">
      <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-[3.5rem] max-md:text-[2.5rem] font-bold">{{ pageTitle }}</h1>
      </div>
    </section>

    <section class="py-16 px-4">
      <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 max-w-[1200px] mx-auto">
          <div class="flex flex-col gap-8">
            <div class="bg-white rounded-[0.5rem] p-8 shadow-[0_1px_3px_rgba(0,0,0,0.1)] text-center">
              <div class="w-16 h-16 bg-[#dbeafe] rounded-full flex items-center justify-center mx-auto mb-6">
                <svg class="w-8 h-8 text-[#1e40af]" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                </svg>
              </div>
              <h3 class="text-[1.25rem] font-bold text-[#111827] mb-4">Телефон</h3>
              <a href="tel:+78332776264" class="block text-[#6b7280] mb-2 no-underline transition-colors duration-300 hover:text-[#1e40af]">77-62-64</a>
              <a href="tel:+79229776264" class="block text-[#6b7280] no-underline transition-colors duration-300 hover:text-[#1e40af]">+7 (922) 977-62-64</a>
            </div>
            
            <div class="bg-white rounded-[0.5rem] p-8 shadow-[0_1px_3px_rgba(0,0,0,0.1)] text-center">
              <div class="w-16 h-16 bg-[#dbeafe] rounded-full flex items-center justify-center mx-auto mb-6">
                <svg class="w-8 h-8 text-[#1e40af]" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                </svg>
              </div>
              <h3 class="text-[1.25rem] font-bold text-[#111827] mb-4">Адрес</h3>
              <p class="text-[#6b7280] mb-2">ул. Романа Ердякова 50 стр 2</p>
              <p class="text-[#6b7280]">г. Киров</p>
            </div>
            
            <div class="bg-white rounded-[0.5rem] p-8 shadow-[0_1px_3px_rgba(0,0,0,0.1)] text-center">
              <div class="w-16 h-16 bg-[#dbeafe] rounded-full flex items-center justify-center mx-auto mb-6">
                <svg class="w-8 h-8 text-[#1e40af]" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                </svg>
              </div>
              <h3 class="text-[1.25rem] font-bold text-[#111827] mb-4">Мессенджеры</h3>
              <a href="https://t.me/cleankirov43" target="_blank" class="block text-[#6b7280] mb-2 no-underline transition-colors duration-300 hover:text-[#1e40af]">Telegram: @cleankirov43</a>
              <a href="https://vk.ru/clean.kirov" target="_blank" class="block text-[#6b7280] no-underline transition-colors duration-300 hover:text-[#1e40af]">VK: clean.kirov</a>
            </div>
          </div>

          <div class="bg-white rounded-[0.5rem] p-10 shadow-[0_1px_3px_rgba(0,0,0,0.1)]">
            <h2 class="text-[2rem] font-bold text-[#111827] mb-8 text-center">Оставить заявку</h2>
            <form @submit.prevent="submitLeadForm">
              <input type="hidden" name="_token" :value="csrfToken" />
              <input type="hidden" name="source" value="contacts" />
              
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
                class="w-full py-4 bg-[#1e40af] text-white rounded-[0.5rem] text-[1.125rem] font-semibold cursor-pointer transition-colors hover:bg-[#1e3a8a] disabled:opacity-50 disabled:cursor-not-allowed"
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
      </div>
    </section>
  </div>
</template>

<script setup>
import { computed, onMounted, ref, reactive } from 'vue';
import Header from './Header.vue';

const props = defineProps({
  page: {
    type: Object,
    default: null
  },
  contactInfos: {
    type: Object,
    default: () => ({})
  }
});

const pageTitle = computed(() => {
  return props.page?.title || 'Контакты';
});

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
    formData.append('source', 'contacts');
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

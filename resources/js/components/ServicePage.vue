<template>
  <div class="min-h-screen bg-[#f9fafb]">
    <Header />

    <section class="py-24 px-4 pt-[calc(100px+6rem)] bg-[#1e40af] text-white text-center">
      <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-[3.5rem] max-md:text-[2.5rem] font-bold mb-4">{{ serviceTitle }}</h1>
        <p v-if="serviceShortDescription" class="text-[1.25rem] text-[#e5e7eb] max-w-[800px] mx-auto leading-[1.6]">{{ serviceShortDescription }}</p>
      </div>
    </section>

    <section class="py-16 px-4">
      <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8">
        <div v-if="serviceDescription" class="bg-white rounded-[0.5rem] p-12 max-md:p-8 max-md:px-6 mb-8 shadow-[0_1px_3px_rgba(0,0,0,0.1)]">
          <h2 class="text-[2rem] max-md:text-[1.5rem] font-bold text-[#111827] mb-6 pb-4 border-b-2 border-[#e5e7eb]">Что делаем</h2>
          <div class="text-[#6b7280] leading-[1.8] text-[1.125rem]">
            <p v-for="(paragraph, index) in descriptionParagraphs" :key="index" class="mb-4">{{ paragraph }}</p>
          </div>
        </div>

        <div v-if="serviceForWho" class="bg-white rounded-[0.5rem] p-12 max-md:p-8 max-md:px-6 mb-8 shadow-[0_1px_3px_rgba(0,0,0,0.1)]">
          <h2 class="text-[2rem] max-md:text-[1.5rem] font-bold text-[#111827] mb-6 pb-4 border-b-2 border-[#e5e7eb]">Для кого</h2>
          <div class="text-[#6b7280] leading-[1.8] text-[1.125rem]">
            <p v-for="(paragraph, index) in forWhoParagraphs" :key="index" class="mb-4">{{ paragraph }}</p>
          </div>
        </div>

        <div v-if="serviceWhatIncluded && serviceWhatIncluded.length > 0" class="bg-white rounded-[0.5rem] p-12 max-md:p-8 max-md:px-6 mb-8 shadow-[0_1px_3px_rgba(0,0,0,0.1)]">
          <h2 class="text-[2rem] max-md:text-[1.5rem] font-bold text-[#111827] mb-6 pb-4 border-b-2 border-[#e5e7eb]">Что входит</h2>
          <ul class="list-none p-0 m-0">
            <li v-for="(item, index) in serviceWhatIncluded" :key="index" class="flex items-start gap-4 py-4 border-b border-[#f3f4f6] last:border-b-0">
              <div class="w-6 h-6 bg-[#dbeafe] rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                <svg class="w-3.5 h-3.5 text-[#1e40af]" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
              </div>
              <span class="text-[#374151] text-[1.125rem] leading-[1.6]">{{ item }}</span>
            </li>
          </ul>
        </div>
      </div>
    </section>

    <section id="lead-form-section" class="py-16 px-4 bg-[#1e40af]">
      <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-[2.5rem] font-bold text-center text-white mb-12">Оставить заявку</h2>
        <div class="max-w-[600px] mx-auto">
          <form @submit.prevent="submitLeadForm" class="bg-white rounded-[0.5rem] p-10 shadow-[0_20px_25px_rgba(0,0,0,0.1)]">
            <input type="hidden" name="_token" :value="csrfToken" />
            <input type="hidden" name="source" value="service" />
            <input type="hidden" name="service_id" :value="serviceId" />
            
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
    </section>
  </div>
</template>

<script setup>
import { computed, onMounted, ref, reactive } from 'vue';
import Header from './Header.vue';

const props = defineProps({
  service: {
    type: Object,
    required: true
  }
});

const serviceTitle = computed(() => {
  return props.service?.title || 'Услуга';
});

const serviceShortDescription = computed(() => {
  return props.service?.short_description || null;
});

const serviceDescription = computed(() => {
  return props.service?.description || null;
});

const serviceForWho = computed(() => {
  return props.service?.for_who || null;
});

const descriptionParagraphs = computed(() => {
  if (!serviceDescription.value) return [];
  const text = serviceDescription.value.trim();
  
  if (text.includes('\n\n')) {
    return text.split(/\n\n+/).map(p => p.trim()).filter(p => p);
  }
  
  const sentences = text.match(/[^.!?]+[.!?]+/g) || [text];
  return sentences.map(s => s.trim()).filter(s => s.length > 0);
});

const forWhoParagraphs = computed(() => {
  if (!serviceForWho.value) return [];
  const text = serviceForWho.value.trim();
  
  if (text.includes('\n\n')) {
    return text.split(/\n\n+/).map(p => p.trim()).filter(p => p);
  }
  
  const sentences = text.match(/[^.!?]+[.!?]+/g) || [text];
  return sentences.map(s => s.trim()).filter(s => s.length > 0);
});

const serviceWhatIncluded = computed(() => {
  return props.service?.what_included || [];
});

const serviceId = computed(() => {
  return props.service?.id || null;
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
    formData.append('source', 'service');
    if (serviceId.value) {
      formData.append('service_id', serviceId.value);
    }
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

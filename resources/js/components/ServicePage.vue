<template>
  <div class="service-page">
    <Header />

    <section class="service-page__hero">
      <div class="container">
        <h1 class="service-page__title">{{ serviceTitle }}</h1>
        <p v-if="serviceShortDescription" class="service-page__subtitle">{{ serviceShortDescription }}</p>
      </div>
    </section>

    <section class="service-page__content">
      <div class="container">
        <div v-if="serviceDescription" class="service-page__block">
          <h2 class="service-page__block-title">Что делаем</h2>
          <div class="service-page__block-content">
            <p v-for="(paragraph, index) in descriptionParagraphs" :key="index">{{ paragraph }}</p>
          </div>
        </div>

        <div v-if="serviceForWho" class="service-page__block">
          <h2 class="service-page__block-title">Для кого</h2>
          <div class="service-page__block-content">
            <p v-for="(paragraph, index) in forWhoParagraphs" :key="index">{{ paragraph }}</p>
          </div>
        </div>

        <div v-if="serviceWhatIncluded && serviceWhatIncluded.length > 0" class="service-page__block">
          <h2 class="service-page__block-title">Что входит</h2>
          <div class="service-page__block-content">
            <ul class="service-page__list">
              <li v-for="(item, index) in serviceWhatIncluded" :key="index" class="service-page__list-item">
                <div class="service-page__list-icon">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                  </svg>
                </div>
                <span>{{ item }}</span>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </section>

    <section id="lead-form-section" class="service-page__lead-form">
      <div class="container">
        <h2 class="service-page__lead-form-title">Оставить заявку</h2>
        <div class="service-page__lead-form-wrapper">
          <form @submit.prevent="submitLeadForm" class="service-page__lead-form-form">
            <input type="hidden" name="_token" :value="csrfToken" />
            <input type="hidden" name="source" value="service" />
            <input type="hidden" name="service_id" :value="serviceId" />
            
            <div class="service-page__lead-form-field">
              <label class="service-page__lead-form-label">Имя <span class="service-page__lead-form-required">*</span></label>
              <input 
                v-model="leadForm.name"
                type="text" 
                name="name" 
                required 
                maxlength="255"
                class="service-page__lead-form-input"
                placeholder="Ваше имя"
              />
            </div>
            
            <div class="service-page__lead-form-field">
              <label class="service-page__lead-form-label">Телефон <span class="service-page__lead-form-required">*</span></label>
              <input 
                v-model="leadForm.phone"
                type="tel" 
                name="phone" 
                required 
                maxlength="50"
                class="service-page__lead-form-input"
                placeholder="+7 (___) ___-__-__"
              />
            </div>
            
            <div class="service-page__lead-form-field">
              <label class="service-page__lead-form-label">Email</label>
              <input 
                v-model="leadForm.email"
                type="email" 
                name="email"
                class="service-page__lead-form-input"
                placeholder="your@email.com"
              />
            </div>
            
            <div class="service-page__lead-form-field">
              <label class="service-page__lead-form-label">Сообщение</label>
              <textarea 
                v-model="leadForm.message"
                name="message" 
                maxlength="2000"
                rows="4"
                class="service-page__lead-form-textarea"
                placeholder="Опишите вашу задачу..."
              ></textarea>
            </div>
            
            <button 
              type="submit" 
              :disabled="leadFormLoading"
              class="service-page__lead-form-submit"
            >
              <span v-if="!leadFormLoading">Отправить заявку</span>
              <span v-else>Отправка...</span>
            </button>
            
            <div v-if="leadFormSuccess" class="service-page__lead-form-message service-page__lead-form-message--success">
              Заявка успешно отправлена! Мы свяжемся с вами в ближайшее время.
            </div>
            
            <div v-if="leadFormError" class="service-page__lead-form-message service-page__lead-form-message--error">
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

<style scoped>
.service-page {
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

/* Hero секция */
.service-page__hero {
  padding: 6rem 1rem 4rem;
  padding-top: calc(100px + 6rem);
  background: #1e40af;
  color: white;
  text-align: center;
}

.service-page__title {
  font-size: 3.5rem;
  font-weight: 700;
  margin-bottom: 1rem;
}

.service-page__subtitle {
  font-size: 1.25rem;
  color: #e5e7eb;
  max-width: 800px;
  margin: 0 auto;
  line-height: 1.6;
}

/* Контент */
.service-page__content {
  padding: 4rem 1rem;
}

.service-page__block {
  background: white;
  border-radius: 0.5rem;
  padding: 3rem;
  margin-bottom: 2rem;
  box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
}

.service-page__block-title {
  font-size: 2rem;
  font-weight: 700;
  color: #111827;
  margin-bottom: 1.5rem;
  padding-bottom: 1rem;
  border-bottom: 2px solid #e5e7eb;
}

.service-page__block-content {
  color: #6b7280;
  line-height: 1.8;
  font-size: 1.125rem;
}

.service-page__block-content p {
  margin-bottom: 1rem;
}

.service-page__list {
  list-style: none;
  padding: 0;
  margin: 0;
}

.service-page__list-item {
  display: flex;
  align-items: flex-start;
  gap: 1rem;
  padding: 1rem 0;
  border-bottom: 1px solid #f3f4f6;
}

.service-page__list-item:last-child {
  border-bottom: none;
}

.service-page__list-icon {
  width: 24px;
  height: 24px;
  background: #dbeafe;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  flex-shrink: 0;
  margin-top: 0.25rem;
}

.service-page__list-icon svg {
  width: 14px;
  height: 14px;
  color: #1e40af;
}

.service-page__list-item span {
  color: #374151;
  font-size: 1.125rem;
  line-height: 1.6;
}

/* Форма заявки */
.service-page__lead-form {
  padding: 4rem 1rem;
  background: #1e40af;
}

.service-page__lead-form-title {
  font-size: 2.5rem;
  font-weight: 700;
  text-align: center;
  color: white;
  margin-bottom: 3rem;
}

.service-page__lead-form-wrapper {
  max-width: 600px;
  margin: 0 auto;
}

.service-page__lead-form-form {
  background: white;
  border-radius: 0.5rem;
  padding: 2.5rem;
  box-shadow: 0 20px 25px rgba(0, 0, 0, 0.1);
}

.service-page__lead-form-field {
  margin-bottom: 1.5rem;
}

.service-page__lead-form-label {
  display: block;
  font-weight: 600;
  color: #111827;
  margin-bottom: 0.5rem;
}

.service-page__lead-form-required {
  color: #ef4444;
}

.service-page__lead-form-input,
.service-page__lead-form-textarea {
  width: 100%;
  padding: 0.75rem;
  border: 2px solid #e5e7eb;
  border-radius: 0.5rem;
  font-size: 1rem;
  transition: border-color 0.3s;
}

.service-page__lead-form-input:focus,
.service-page__lead-form-textarea:focus {
  outline: none;
  border-color: #1e40af;
}

.service-page__lead-form-textarea {
  resize: vertical;
  min-height: 100px;
}

.service-page__lead-form-submit {
  width: 100%;
  padding: 1rem;
  background: #1e40af;
  color: white;
  border: none;
  border-radius: 0.5rem;
  font-size: 1.125rem;
  font-weight: 600;
  cursor: pointer;
  transition: background 0.3s;
}

.service-page__lead-form-submit:hover:not(:disabled) {
  background: #1e3a8a;
}

.service-page__lead-form-submit:disabled {
  opacity: 0.5;
  cursor: not-allowed;
}

.service-page__lead-form-message {
  margin-top: 1rem;
  padding: 1rem;
  border-radius: 0.5rem;
}

.service-page__lead-form-message--success {
  background: #d1fae5;
  color: #065f46;
  border: 1px solid #6ee7b7;
}

.service-page__lead-form-message--error {
  background: #fee2e2;
  color: #991b1b;
  border: 1px solid #fca5a5;
}

@media (max-width: 768px) {
  .service-page__title {
    font-size: 2.5rem;
  }

  .service-page__block {
    padding: 2rem 1.5rem;
  }

  .service-page__block-title {
    font-size: 1.5rem;
  }
}
</style>

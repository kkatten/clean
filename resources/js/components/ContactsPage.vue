<template>
  <div class="contacts-page">
    <Header />

    <section class="contacts-page__hero">
      <div class="container">
        <h1 class="contacts-page__title">{{ pageTitle }}</h1>
      </div>
    </section>

    <section class="contacts-page__content">
      <div class="container">
        <div class="contacts-page__grid">
          <div class="contacts-page__info">
            <div class="contacts-page__info-item">
              <div class="contacts-page__info-icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                </svg>
              </div>
              <h3 class="contacts-page__info-title">Телефон</h3>
              <a href="tel:+78332776264" class="contacts-page__info-value">77-62-64</a>
              <a href="tel:+79229776264" class="contacts-page__info-value">+7 (922) 977-62-64</a>
            </div>
            
            <div class="contacts-page__info-item">
              <div class="contacts-page__info-icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                </svg>
              </div>
              <h3 class="contacts-page__info-title">Адрес</h3>
              <p class="contacts-page__info-value">ул. Романа Ердякова 50 стр 2</p>
              <p class="contacts-page__info-value">г. Киров</p>
            </div>
            
            <div class="contacts-page__info-item">
              <div class="contacts-page__info-icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                </svg>
              </div>
              <h3 class="contacts-page__info-title">Мессенджеры</h3>
              <a href="https://t.me/cleankirov43" target="_blank" class="contacts-page__info-value">Telegram: @cleankirov43</a>
              <a href="https://vk.ru/clean.kirov" target="_blank" class="contacts-page__info-value">VK: clean.kirov</a>
            </div>
          </div>

          <div class="contacts-page__form-wrapper">
            <h2 class="contacts-page__form-title">Оставить заявку</h2>
            <form @submit.prevent="submitLeadForm" class="contacts-page__form">
              <input type="hidden" name="_token" :value="csrfToken" />
              <input type="hidden" name="source" value="contacts" />
              
              <div class="contacts-page__form-field">
                <label class="contacts-page__form-label">Имя <span class="contacts-page__form-required">*</span></label>
                <input 
                  v-model="leadForm.name"
                  type="text" 
                  name="name" 
                  required 
                  maxlength="255"
                  class="contacts-page__form-input"
                  placeholder="Ваше имя"
                />
              </div>
              
              <div class="contacts-page__form-field">
                <label class="contacts-page__form-label">Телефон <span class="contacts-page__form-required">*</span></label>
                <input 
                  v-model="leadForm.phone"
                  type="tel" 
                  name="phone" 
                  required 
                  maxlength="50"
                  class="contacts-page__form-input"
                  placeholder="+7 (___) ___-__-__"
                />
              </div>
              
              <div class="contacts-page__form-field">
                <label class="contacts-page__form-label">Email</label>
                <input 
                  v-model="leadForm.email"
                  type="email" 
                  name="email"
                  class="contacts-page__form-input"
                  placeholder="your@email.com"
                />
              </div>
              
              <div class="contacts-page__form-field">
                <label class="contacts-page__form-label">Сообщение</label>
                <textarea 
                  v-model="leadForm.message"
                  name="message" 
                  maxlength="2000"
                  rows="4"
                  class="contacts-page__form-textarea"
                  placeholder="Опишите вашу задачу..."
                ></textarea>
              </div>
              
              <button 
                type="submit" 
                :disabled="leadFormLoading"
                class="contacts-page__form-submit"
              >
                <span v-if="!leadFormLoading">Отправить заявку</span>
                <span v-else>Отправка...</span>
              </button>
              
              <div v-if="leadFormSuccess" class="contacts-page__form-message contacts-page__form-message--success">
                Заявка успешно отправлена! Мы свяжемся с вами в ближайшее время.
              </div>
              
              <div v-if="leadFormError" class="contacts-page__form-message contacts-page__form-message--error">
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

<style scoped>
.contacts-page {
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

.contacts-page__hero {
  padding: 6rem 1rem 4rem;
  padding-top: calc(100px + 6rem);
  background: #1e40af;
  color: white;
  text-align: center;
}

.contacts-page__title {
  font-size: 3.5rem;
  font-weight: 700;
}

.contacts-page__content {
  padding: 4rem 1rem;
}

.contacts-page__grid {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 3rem;
  max-width: 1200px;
  margin: 0 auto;
}

.contacts-page__info {
  display: flex;
  flex-direction: column;
  gap: 2rem;
}

.contacts-page__info-item {
  background: white;
  border-radius: 0.5rem;
  padding: 2rem;
  box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
  text-align: center;
}

.contacts-page__info-icon {
  width: 64px;
  height: 64px;
  background: #dbeafe;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  margin: 0 auto 1.5rem;
}

.contacts-page__info-icon svg {
  width: 32px;
  height: 32px;
  color: #1e40af;
}

.contacts-page__info-title {
  font-size: 1.25rem;
  font-weight: 700;
  color: #111827;
  margin-bottom: 1rem;
}

.contacts-page__info-value {
  display: block;
  color: #6b7280;
  margin-bottom: 0.5rem;
  text-decoration: none;
  transition: color 0.3s;
}

.contacts-page__info-value:hover {
  color: #1e40af;
}

.contacts-page__form-wrapper {
  background: white;
  border-radius: 0.5rem;
  padding: 2.5rem;
  box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
}

.contacts-page__form-title {
  font-size: 2rem;
  font-weight: 700;
  color: #111827;
  margin-bottom: 2rem;
  text-align: center;
}

.contacts-page__form-field {
  margin-bottom: 1.5rem;
}

.contacts-page__form-label {
  display: block;
  font-weight: 600;
  color: #111827;
  margin-bottom: 0.5rem;
}

.contacts-page__form-required {
  color: #ef4444;
}

.contacts-page__form-input,
.contacts-page__form-textarea {
  width: 100%;
  padding: 0.75rem;
  border: 2px solid #e5e7eb;
  border-radius: 0.5rem;
  font-size: 1rem;
  transition: border-color 0.3s;
}

.contacts-page__form-input:focus,
.contacts-page__form-textarea:focus {
  outline: none;
  border-color: #1e40af;
}

.contacts-page__form-textarea {
  resize: vertical;
  min-height: 100px;
}

.contacts-page__form-submit {
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

.contacts-page__form-submit:hover:not(:disabled) {
  background: #1e3a8a;
}

.contacts-page__form-submit:disabled {
  opacity: 0.5;
  cursor: not-allowed;
}

.contacts-page__form-message {
  margin-top: 1rem;
  padding: 1rem;
  border-radius: 0.5rem;
}

.contacts-page__form-message--success {
  background: #d1fae5;
  color: #065f46;
  border: 1px solid #6ee7b7;
}

.contacts-page__form-message--error {
  background: #fee2e2;
  color: #991b1b;
  border: 1px solid #fca5a5;
}

@media (max-width: 768px) {
  .contacts-page__title {
    font-size: 2.5rem;
  }

  .contacts-page__grid {
    grid-template-columns: 1fr;
  }
}
</style>

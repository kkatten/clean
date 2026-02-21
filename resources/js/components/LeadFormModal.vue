<template>
  <Teleport to="body">
    <Transition name="modal">
      <div v-if="isOpen" class="fixed inset-0 z-[2000] flex items-end justify-center" @click.self="close">
        <div class="absolute inset-0 bg-black/50" @click="close"></div>
        <div class="relative w-full max-w-[600px] max-h-[90vh] overflow-y-auto bg-white rounded-t-2xl shadow-2xl p-8 transition-transform duration-300">
          <button @click="close" class="absolute top-4 right-4 w-10 h-10 flex items-center justify-center rounded-full bg-[#f3f4f6] hover:bg-[#e5e7eb] text-[#6b7280] cursor-pointer">
            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
          </button>
          <h2 class="text-[1.75rem] font-bold text-[#111827] mb-6">Оставить заявку</h2>
          <form @submit.prevent="submit" class="space-y-6">
            <input type="hidden" name="_token" :value="csrfToken" />
            <input type="hidden" name="source" value="modal_form" />
            <div>
              <label class="block font-semibold text-[#111827] mb-2">Имя <span class="text-[#ef4444]">*</span></label>
              <input v-model="form.name" type="text" name="name" required maxlength="255" class="w-full px-3 py-3 border-2 border-[#e5e7eb] rounded-[0.5rem] text-base focus:outline-none focus:border-[#1e40af]" placeholder="Ваше имя" />
            </div>
            <div>
              <label class="block font-semibold text-[#111827] mb-2">Телефон <span class="text-[#ef4444]">*</span></label>
              <input v-model="form.phone" type="tel" name="phone" required maxlength="50" class="w-full px-3 py-3 border-2 border-[#e5e7eb] rounded-[0.5rem] text-base focus:outline-none focus:border-[#1e40af]" placeholder="+7 (___) ___-__-__" />
            </div>
            <div>
              <label class="block font-semibold text-[#111827] mb-2">Email</label>
              <input v-model="form.email" type="email" name="email" class="w-full px-3 py-3 border-2 border-[#e5e7eb] rounded-[0.5rem] text-base focus:outline-none focus:border-[#1e40af]" placeholder="your@email.com" />
            </div>
            <div>
              <label class="block font-semibold text-[#111827] mb-2">Сообщение</label>
              <textarea v-model="form.message" name="message" maxlength="2000" rows="4" class="w-full px-3 py-3 border-2 border-[#e5e7eb] rounded-[0.5rem] text-base focus:outline-none focus:border-[#1e40af] resize-y min-h-[100px]" placeholder="Опишите вашу задачу..."></textarea>
            </div>
            <button type="submit" :disabled="loading" class="w-full py-4 bg-[#1e40af] text-white rounded-[0.375rem] text-[1.125rem] font-semibold cursor-pointer transition-colors hover:bg-[#1e3a8a] disabled:opacity-50 disabled:cursor-not-allowed">
              <span v-if="!loading">Отправить заявку</span>
              <span v-else>Отправка...</span>
            </button>
            <div v-if="success" class="p-4 rounded-[0.5rem] bg-[#d1fae5] text-[#065f46] border border-[#6ee7b7]">Заявка успешно отправлена!</div>
            <div v-if="error" class="p-4 rounded-[0.5rem] bg-[#fee2e2] text-[#991b1b] border border-[#fca5a5]">{{ error }}</div>
          </form>
        </div>
      </div>
    </Transition>
  </Teleport>
</template>

<script setup>
import { ref, reactive, onMounted, onUnmounted, watch } from 'vue';

const props = defineProps({
  modelValue: { type: Boolean, default: false }
});

const emit = defineEmits(['update:modelValue']);

const isOpen = ref(false);
const savedScrollY = ref(0);
const csrfToken = ref('');
const loading = ref(false);
const success = ref(false);
const error = ref('');

const form = reactive({ name: '', phone: '', email: '', message: '' });

function lockBodyScroll() {
  savedScrollY.value = window.scrollY ?? window.pageYOffset;
  document.documentElement.style.overflow = 'hidden';
  document.documentElement.style.touchAction = 'none';
  document.body.style.overflow = 'hidden';
  document.body.style.touchAction = 'none';
}

function unlockBodyScroll() {
  document.documentElement.style.overflow = '';
  document.documentElement.style.touchAction = '';
  document.body.style.overflow = '';
  document.body.style.touchAction = '';
}

watch(() => props.modelValue, (v) => { isOpen.value = v; }, { immediate: true });
watch(isOpen, (v) => {
  emit('update:modelValue', v);
  if (v) lockBodyScroll();
  else unlockBodyScroll();
});

const close = () => {
  isOpen.value = false;
  emit('update:modelValue', false);
};

const handleOpenEvent = () => {
  isOpen.value = true;
};

onMounted(() => {
  const token = document.querySelector('meta[name="csrf-token"]');
  if (token) csrfToken.value = token.getAttribute('content');
  window.addEventListener('open-lead-form', handleOpenEvent);
});

onUnmounted(() => {
  window.removeEventListener('open-lead-form', handleOpenEvent);
  if (isOpen.value) unlockBodyScroll();
});

const submit = async () => {
  loading.value = true;
  success.value = false;
  error.value = '';
  try {
    const fd = new FormData();
    fd.append('_token', csrfToken.value);
    fd.append('source', 'modal_form');
    fd.append('name', form.name);
    fd.append('phone', form.phone);
    fd.append('email', form.email);
    fd.append('message', form.message);
    const res = await fetch('/order', { method: 'POST', body: fd, headers: { 'X-Requested-With': 'XMLHttpRequest' } });
    if (res.ok) {
      success.value = true;
      form.name = form.phone = form.email = form.message = '';
      setTimeout(() => { success.value = false; close(); }, 2000);
    } else {
      const data = await res.json();
      error.value = data.message || 'Ошибка отправки';
    }
  } catch {
    error.value = 'Ошибка. Попробуйте позже.';
  } finally {
    loading.value = false;
  }
};

defineExpose({ open: () => { isOpen.value = true; } });
</script>

<style scoped>
.modal-enter-active, .modal-leave-active { transition: opacity 0.3s ease; }
.modal-enter-from, .modal-leave-to { opacity: 0; }
.modal-enter-active .relative, .modal-leave-active .relative { transition: transform 0.3s ease; }
.modal-enter-from .relative, .modal-leave-to .relative { transform: translateY(100%); }
</style>

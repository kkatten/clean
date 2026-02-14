<template>
  <div class="min-h-screen w-full min-w-0 overflow-x-hidden bg-[#f9fafb]">
    <Header />

    <section class="py-24 px-4 pt-[calc(100px+6rem)] bg-[#1e40af] text-white text-center">
      <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-[3.5rem] max-md:text-[2.5rem] font-bold mb-4">{{ serviceTitle }}</h1>
        <p v-if="serviceShortDescription" class="text-[1.25rem] text-[#e5e7eb] max-w-[800px] mx-auto leading-[1.6]">{{ serviceShortDescription }}</p>
      </div>
    </section>

    <section class="py-16 px-4 bg-white">
      <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16 items-start">
          <div>
            <div class="inline-flex items-center gap-2 px-4 py-2 bg-[#EEF0FF] rounded-full mb-6">
              <svg class="w-5 h-5 text-[#414070]" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
              </svg>
              <span class="text-[#414070] text-sm font-medium">{{ serviceTitle }}</span>
            </div>

            <div v-if="serviceDescription" class="mb-8">
              <h2 class="text-[2rem] md:text-[2.5rem] font-bold text-[#333333] mb-6 leading-tight">Что делаем</h2>
              <div class="text-[#6b7280] leading-[1.8] text-[1.125rem]">
                <p v-for="(paragraph, index) in descriptionParagraphs" :key="index" class="mb-4">{{ paragraph }}</p>
              </div>
            </div>

            <div v-if="serviceForWho" class="mb-8">
              <h2 class="text-[1.5rem] font-bold text-[#333333] mb-4">Для кого</h2>
              <div class="text-[#6b7280] leading-[1.8] text-[1.125rem]">
                <p v-for="(paragraph, index) in forWhoParagraphs" :key="index" class="mb-4">{{ paragraph }}</p>
              </div>
            </div>

            <div v-if="serviceWhatIncluded && serviceWhatIncluded.length > 0" class="mb-10">
              <h2 class="text-[1.5rem] font-bold text-[#333333] mb-4">Что входит</h2>
              <ul class="list-none p-0 m-0 space-y-3">
                <li v-for="(item, index) in serviceWhatIncluded" :key="index" class="flex items-start gap-3">
                  <div class="w-6 h-6 bg-[#dbeafe] rounded-full flex items-center justify-center flex-shrink-0 mt-0.5">
                    <svg class="w-3.5 h-3.5 text-[#1e40af]" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                  </div>
                  <span class="text-[#374151] text-[1.125rem] leading-[1.6]">{{ item }}</span>
                </li>
              </ul>
            </div>

            <button @click="openLeadModal" type="button" class="inline-flex items-center gap-2 py-4 px-8 bg-[#5E44EF] text-white rounded-[0.5rem] font-semibold text-[1rem] transition-all hover:bg-[#4d36dd] hover:shadow-[0_8px_20px_rgba(94,68,239,0.35)] cursor-pointer border-0">
              <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
              </svg>
              Оставить заявку
            </button>
          </div>

          <div class="relative">
            <div class="border-2 border-[#2563eb] rounded-lg p-3 bg-white shadow-[0_10px_40px_rgba(0,0,0,0.08)]">
              <div class="aspect-[4/3] bg-[#e5e7eb] rounded-sm min-h-[280px] flex items-center justify-center">
                <span class="text-[#9ca3af] text-xs">Плейсхолдер</span>
              </div>
              <div class="absolute -bottom-2 -right-2 w-14 h-14 rounded-full bg-[#EEF0FF] flex items-center justify-center shadow-md z-20 border-2 border-white">
                <svg class="w-8 h-8 text-[#414070]" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                </svg>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</template>

<script setup>
import { computed } from 'vue';
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

const openLeadModal = () => {
  window.dispatchEvent(new CustomEvent('open-lead-form'));
};
</script>

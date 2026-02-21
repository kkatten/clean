<template>
  <div class="min-h-screen w-full min-w-0 overflow-x-hidden bg-[#f9fafb]">
    <Header />

    <section class="py-24 px-4 pt-[calc(100px+6rem)] bg-[#1e40af] text-white text-center">
      <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-[3.5rem] max-md:text-[2.5rem] font-bold mb-4">{{ pageTitle }}</h1>
        <p v-if="heroIntro1" class="text-[1.25rem] text-[#e5e7eb] max-w-[800px] mx-auto leading-[1.6] mb-6">{{ heroIntro1 }}</p>
        <p v-if="heroIntro2" class="text-[1.1rem] text-[#bfdbfe] max-w-[700px] mx-auto leading-[1.6]">{{ heroIntro2 }}</p>
      </div>
    </section>

    <section class="py-16 px-4 bg-white">
      <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16 items-center">
          <div>
            <div class="inline-flex items-center gap-2 px-4 py-2 bg-[#EEF0FF] rounded-full mb-6">
              <svg class="w-5 h-5 text-[#414070]" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
              </svg>
              <span class="text-[#414070] text-sm font-medium">О компании</span>
            </div>
            <h2 v-if="whoWeAreTitle" class="text-[2rem] md:text-[2.5rem] font-bold text-[#333333] mb-8 leading-tight">
              {{ whoWeAreTitle }}
            </h2>
            <ul v-if="whoWeAreItems.length" class="space-y-6 mb-10">
              <li v-for="(item, index) in whoWeAreItems" :key="index" class="flex gap-4">
                <div class="w-12 h-12 rounded-full flex items-center justify-center flex-shrink-0" :class="iconBgClass(index)">
                  <svg class="w-6 h-6" :class="iconColorClass(index)" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                  </svg>
                </div>
                <div>
                  <h3 class="font-bold text-[#333333] text-lg mb-1">{{ item.title }}</h3>
                  <p class="text-[#6b7280] text-sm leading-relaxed">{{ item.description }}</p>
                </div>
              </li>
            </ul>
            <button @click="openLeadModal" type="button" class="inline-flex items-center gap-2 py-4 px-8 bg-[#5E44EF] text-white rounded-[0.5rem] font-semibold text-[1rem] transition-all hover:bg-[#4d36dd] hover:shadow-[0_8px_20px_rgba(94,68,239,0.35)] cursor-pointer border-0">
              <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
              </svg>
              Оставить заявку на услуги
            </button>
          </div>
          <div class="relative">
            <div class="border-2 border-[#2563eb] rounded-lg p-3 bg-white shadow-[0_10px_40px_rgba(0,0,0,0.08)]">
              <div class="aspect-[4/3] bg-[#e5e7eb] rounded-sm min-h-[280px] flex items-center justify-center overflow-hidden">
                <img v-if="aboutImageUrl" :src="aboutImageUrl" alt="О компании" class="w-full h-full object-cover" />
                <span v-else class="text-[#9ca3af] text-xs">Плейсхолдер</span>
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

    <section class="py-16 px-4 bg-[#1e40af]">
      <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <button @click="openLeadModal" type="button" class="inline-flex items-center gap-2 py-4 px-8 bg-white text-[#1e40af] rounded-[0.5rem] font-semibold text-[1rem] transition-all hover:bg-[#f3f4f6] hover:shadow-lg cursor-pointer border-0">
          Оставить заявку на услуги
        </button>
      </div>
    </section>

    <Footer />
    <DocumentModal />
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
  return props.page?.title || 'О компании';
});

const blocks = computed(() => {
  return props.page?.blocks || {};
});

const heroIntro1 = computed(() => blocks.value?.hero_intro_1 || '');
const heroIntro2 = computed(() => blocks.value?.hero_intro_2 || '');

const whoWeAreTitle = computed(() => blocks.value?.who_we_are?.title || 'Кто мы');
const whoWeAreItems = computed(() => {
  const items = blocks.value?.who_we_are?.items;
  return Array.isArray(items) ? items : [];
});

const aboutImageUrl = computed(() => {
  if (blocks.value?.image_url) return blocks.value.image_url;
  if (blocks.value?.image) {
    const path = (blocks.value.image || '').replace(/^\/+/, '');
    return (typeof window !== 'undefined' ? window.location.origin : '') + '/storage/' + path;
  }
  return null;
});

const iconBgClass = (index) => {
  const classes = ['bg-[#DFF2DF]', 'bg-[#EEF0FF]', 'bg-[#EFF6FF]'];
  return classes[index % classes.length];
};
const iconColorClass = (index) => {
  const classes = ['text-[#166534]', 'text-[#414070]', 'text-[#1e40af]'];
  return classes[index % classes.length];
};

const openLeadModal = () => {
  window.dispatchEvent(new CustomEvent('open-lead-form'));
};
</script>

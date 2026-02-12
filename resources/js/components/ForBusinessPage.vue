<template>
  <div class="min-h-screen bg-[#f9fafb]">
    <Header />

    <section class="py-24 px-4 pt-[calc(100px+6rem)] bg-[#1e40af] text-white text-center">
      <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-[3.5rem] max-md:text-[2.5rem] font-bold mb-4">{{ pageTitle }}</h1>
        <p v-if="introContent" class="text-[1.25rem] text-[#e5e7eb] max-w-[800px] mx-auto leading-[1.6]">{{ introContent }}</p>
      </div>
    </section>

    <section class="py-16 px-4">
      <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-[repeat(auto-fit,minmax(280px,1fr))] gap-8 max-w-[1200px] mx-auto mb-16">
          <div class="bg-white rounded-[0.5rem] p-10 shadow-[0_1px_3px_rgba(0,0,0,0.1)] text-center transition-all duration-300 ease-in-out hover:-translate-y-[5px] hover:shadow-[0_10px_25px_rgba(0,0,0,0.15)]">
            <div class="w-20 h-20 bg-[#dbeafe] rounded-full flex items-center justify-center mx-auto mb-6">
              <svg class="w-10 h-10 text-[#2563eb]" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
              </svg>
            </div>
            <h3 class="text-[1.5rem] font-bold text-[#111827] mb-4">Торговые центры и БЦ</h3>
            <p class="text-[#6b7280] leading-[1.6]">Комплексное обслуживание коммерческих объектов</p>
          </div>

          <div class="bg-white rounded-[0.5rem] p-10 shadow-[0_1px_3px_rgba(0,0,0,0.1)] text-center transition-all duration-300 ease-in-out hover:-translate-y-[5px] hover:shadow-[0_10px_25px_rgba(0,0,0,0.15)]">
            <div class="w-20 h-20 bg-[#dbeafe] rounded-full flex items-center justify-center mx-auto mb-6">
              <svg class="w-10 h-10 text-[#2563eb]" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
              </svg>
            </div>
            <h3 class="text-[1.5rem] font-bold text-[#111827] mb-4">Долгосрочные договоры</h3>
            <p class="text-[#6b7280] leading-[1.6]">Стабильное сотрудничество на выгодных условиях</p>
          </div>

          <div class="bg-white rounded-[0.5rem] p-10 shadow-[0_1px_3px_rgba(0,0,0,0.1)] text-center transition-all duration-300 ease-in-out hover:-translate-y-[5px] hover:shadow-[0_10px_25px_rgba(0,0,0,0.15)]">
            <div class="w-20 h-20 bg-[#dbeafe] rounded-full flex items-center justify-center mx-auto mb-6">
              <svg class="w-10 h-10 text-[#2563eb]" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
              </svg>
            </div>
            <h3 class="text-[1.5rem] font-bold text-[#111827] mb-4">Обслуживание входных зон</h3>
            <p class="text-[#6b7280] leading-[1.6]">Грязезащитные покрытия и регулярная уборка</p>
          </div>

          <div class="bg-white rounded-[0.5rem] p-10 shadow-[0_1px_3px_rgba(0,0,0,0.1)] text-center transition-all duration-300 ease-in-out hover:-translate-y-[5px] hover:shadow-[0_10px_25px_rgba(0,0,0,0.15)]">
            <div class="w-20 h-20 bg-[#dbeafe] rounded-full flex items-center justify-center mx-auto mb-6">
              <svg class="w-10 h-10 text-[#2563eb]" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
              </svg>
            </div>
            <h3 class="text-[1.5rem] font-bold text-[#111827] mb-4">Фасады и остекление</h3>
            <p class="text-[#6b7280] leading-[1.6]">Мойка фасадов до 16 м и профессиональная очистка стекол</p>
          </div>
        </div>

        <div class="text-center">
          <a href="/kontakty" class="inline-block py-5 px-12 bg-[#1e40af] text-white rounded-[0.375rem] text-[1.25rem] font-semibold no-underline transition-all duration-300 ease-in-out hover:-translate-y-[2px] hover:shadow-[0_10px_20px_rgba(37,99,235,0.4)]">
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


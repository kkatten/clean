<template>
  <div class="min-h-screen w-full min-w-0 overflow-x-hidden bg-[#f9fafb]">
    <Header />

    <section class="py-24 px-4 pt-[calc(100px+6rem)] bg-[#1e40af] text-white text-center">
      <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-[3.5rem] max-md:text-[2.5rem] font-bold mb-4">{{ pageTitle }}</h1>
        <p class="text-[1.25rem] text-[#e5e7eb] max-w-[800px] mx-auto leading-[1.6] mb-6">
          Клининговая компания полного цикла в Кирове. Работаем с коммерческими и частными клиентами — от регулярной уборки до мойки фасадов и химчистки.
        </p>
        <p class="text-[1.1rem] text-[#bfdbfe] max-w-[700px] mx-auto leading-[1.6]">
          Собственные мощности, без субподрядчиков. Адрес: ул. Романа Ердякова 50 стр 2.
        </p>
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
            <h2 class="text-[2rem] md:text-[2.5rem] font-bold text-[#333333] mb-8 leading-tight">
              Кто мы
            </h2>
            <ul class="space-y-6 mb-10">
              <li class="flex gap-4">
                <div class="w-12 h-12 rounded-full bg-[#DFF2DF] flex items-center justify-center flex-shrink-0">
                  <svg class="w-6 h-6 text-[#166534]" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path>
                  </svg>
                </div>
                <div>
                  <h3 class="font-bold text-[#333333] text-lg mb-1">Клининг полного цикла</h3>
                  <p class="text-[#6b7280] text-sm leading-relaxed">Работаем в Кирове с коммерческими и частными клиентами. От пола внутри до фасада снаружи — регулярная уборка, мойка остекления, химчистка ковров и мебели, грязезащитные покрытия. Весь город в зоне досягаемости.</p>
                </div>
              </li>
              <li class="flex gap-4">
                <div class="w-12 h-12 rounded-full bg-[#EEF0FF] flex items-center justify-center flex-shrink-0">
                  <svg class="w-6 h-6 text-[#414070]" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                  </svg>
                </div>
                <div>
                  <h3 class="font-bold text-[#333333] text-lg mb-1">Без субподрядчиков</h3>
                  <p class="text-[#6b7280] text-sm leading-relaxed">Собственные бригады и техника. Цех по стирке ковров, производство и обслуживание входных ковров, оборудование для мойки фасадов до 16 м. Закрываем клининг под ключ — один подрядчик, предсказуемый результат.</p>
                </div>
              </li>
              <li class="flex gap-4">
                <div class="w-12 h-12 rounded-full bg-[#EFF6FF] flex items-center justify-center flex-shrink-0">
                  <svg class="w-6 h-6 text-[#1e40af]" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                  </svg>
                </div>
                <div>
                  <h3 class="font-bold text-[#333333] text-lg mb-1">Работаем в Кирове</h3>
                  <p class="text-[#6b7280] text-sm leading-relaxed">ул. Романа Ердякова 50 стр 2. Обслуживаем торговые центры, офисы, БЦ, квартиры — весь город в зоне досягаемости. Индивидуальный подход, долгосрочные договоры.</p>
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

    <section class="py-16 px-4 bg-[#1e40af]">
      <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <button @click="openLeadModal" type="button" class="inline-flex items-center gap-2 py-4 px-8 bg-white text-[#1e40af] rounded-[0.5rem] font-semibold text-[1rem] transition-all hover:bg-[#f3f4f6] hover:shadow-lg cursor-pointer border-0">
          Оставить заявку на услуги
        </button>
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
  return props.page?.title || 'О компании';
});

const blocks = computed(() => {
  return props.page?.blocks || {};
});

const openLeadModal = () => {
  window.dispatchEvent(new CustomEvent('open-lead-form'));
};
</script>

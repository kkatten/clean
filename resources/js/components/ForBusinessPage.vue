<template>
  <div class="min-h-screen w-full min-w-0 overflow-x-hidden bg-[#f9fafb]">
    <Header />

    <section class="py-24 px-4 pt-[calc(100px+6rem)] bg-[#1e40af] text-white text-center">
      <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-[3.5rem] max-md:text-[2.5rem] font-bold mb-4">{{ pageTitle }}</h1>
        <p v-if="introContent" class="text-[1.25rem] text-[#e5e7eb] max-w-[800px] mx-auto leading-[1.6] mb-6">{{ introContent }}</p>
        <p class="text-[1.1rem] text-[#bfdbfe] max-w-[700px] mx-auto leading-[1.6]">
          Торговые центры, бизнес-центры, офисы — комплексное обслуживание. Регулярная уборка, мойка фасадов, химчистка ковров, грязезащита. Долгосрочные договоры, гибкие условия.
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
              <span class="text-[#414070] text-sm font-medium">Коммерческий клининг в Кирове</span>
            </div>
            <h2 class="text-[2rem] md:text-[2.5rem] font-bold text-[#333333] mb-8 leading-tight">
              Свои мощности, без субподряда — полный цикл услуг
            </h2>
            <ul class="space-y-6 mb-10">
              <li class="flex gap-4">
                <div class="w-12 h-12 rounded-full bg-[#DFF2DF] flex items-center justify-center flex-shrink-0">
                  <svg class="w-6 h-6 text-[#166534]" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path>
                  </svg>
                </div>
                <div>
                  <h3 class="font-bold text-[#333333] text-lg mb-1">Свои мощности</h3>
                  <p class="text-[#6b7280] text-sm leading-relaxed">Цех по стирке ковров, производство и обслуживание входных ковров, оборудование для мойки фасадов до 16 м. Химчистка мебели, грязезащитные покрытия — аренда и продажа. Всё под контролем — качество и сроки в наших руках.</p>
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
                  <p class="text-[#6b7280] text-sm leading-relaxed">Собственные бригады и техника. Закрываем клининг под ключ без посредников. Один подрядчик — предсказуемый результат, единая ответственность.</p>
                </div>
              </li>
              <li class="flex gap-4">
                <div class="w-12 h-12 rounded-full bg-[#EFF6FF] flex items-center justify-center flex-shrink-0">
                  <svg class="w-6 h-6 text-[#1e40af]" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                  </svg>
                </div>
                <div>
                  <h3 class="font-bold text-[#333333] text-lg mb-1">Долгосрочные договоры</h3>
                  <p class="text-[#6b7280] text-sm leading-relaxed">Работаем с ТЦ, БЦ, офисами на постоянной основе. Обслуживание входных зон, фасады, остекление. Индивидуальные условия и фиксированные ставки.</p>
                </div>
              </li>
            </ul>
            <button @click="openLeadModal" type="button" class="inline-flex items-center gap-2 py-4 px-8 bg-[#5E44EF] text-white rounded-[0.5rem] font-semibold text-[1rem] transition-all hover:bg-[#4d36dd] hover:shadow-[0_8px_20px_rgba(94,68,239,0.35)] cursor-pointer border-0">
              <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
              </svg>
              {{ ctaText }}
            </button>
          </div>
          <div class="relative">
            <div class="border-2 border-[#2563eb] rounded-lg p-3 bg-white shadow-[0_10px_40px_rgba(0,0,0,0.08)]">
              <div class="aspect-[4/3] bg-[#e5e7eb] rounded-sm min-h-[280px] flex items-center justify-center">
                <span class="text-[#9ca3af] text-xs">Плейсхолдер</span>
              </div>
              <div class="absolute -bottom-2 -right-2 w-14 h-14 rounded-full bg-[#EEF0FF] flex items-center justify-center shadow-md z-20 border-2 border-white">
                <svg class="w-8 h-8 text-[#414070]" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path>
                </svg>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="py-16 bg-[#f9fafb]">
      <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-[2rem] md:text-[2.5rem] font-bold text-[#111827] text-center mb-12">Для кого работаем</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
          <div class="bg-white rounded-lg p-8 border border-[#e5e7eb] shadow-[0_1px_3px_rgba(0,0,0,0.05)] text-center transition-all hover:shadow-md hover:border-[#2563eb]">
            <div class="w-16 h-16 bg-[#eff6ff] rounded-full flex items-center justify-center mx-auto mb-4">
              <svg class="w-8 h-8 text-[#2563eb]" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
              </svg>
            </div>
            <h3 class="font-bold text-[#111827] mb-2">Торговые центры</h3>
            <p class="text-[#6b7280] text-sm">Ежедневная уборка, мойка фасадов, грязезащитные покрытия, уход за входными зонами.</p>
          </div>
          <div class="bg-white rounded-lg p-8 border border-[#e5e7eb] shadow-[0_1px_3px_rgba(0,0,0,0.05)] text-center transition-all hover:shadow-md hover:border-[#2563eb]">
            <div class="w-16 h-16 bg-[#eff6ff] rounded-full flex items-center justify-center mx-auto mb-4">
              <svg class="w-8 h-8 text-[#2563eb]" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
              </svg>
            </div>
            <h3 class="font-bold text-[#111827] mb-2">Офисы и БЦ</h3>
            <p class="text-[#6b7280] text-sm">Регулярная уборка, химчистка ковров и мебели, мытьё окон. Удобное время — до или после рабочего дня.</p>
          </div>
          <div class="bg-white rounded-lg p-8 border border-[#e5e7eb] shadow-[0_1px_3px_rgba(0,0,0,0.05)] text-center transition-all hover:shadow-md hover:border-[#2563eb]">
            <div class="w-16 h-16 bg-[#eff6ff] rounded-full flex items-center justify-center mx-auto mb-4">
              <svg class="w-8 h-8 text-[#2563eb]" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
              </svg>
            </div>
            <h3 class="font-bold text-[#111827] mb-2">Бизнес</h3>
            <p class="text-[#6b7280] text-sm">Кафе, рестораны, магазины — уборка помещений, мойка витрин, поддержание чистоты.</p>
          </div>
          <div class="bg-white rounded-lg p-8 border border-[#e5e7eb] shadow-[0_1px_3px_rgba(0,0,0,0.05)] text-center transition-all hover:shadow-md hover:border-[#2563eb]">
            <div class="w-16 h-16 bg-[#eff6ff] rounded-full flex items-center justify-center mx-auto mb-4">
              <svg class="w-8 h-8 text-[#2563eb]" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
              </svg>
            </div>
            <h3 class="font-bold text-[#111827] mb-2">Квартиры</h3>
            <p class="text-[#6b7280] text-sm">Химчистка мебели и ковров, генеральная уборка после ремонта. Разовые и регулярные заказы.</p>
          </div>
        </div>
      </div>
    </section>

    <section class="py-16 bg-white">
      <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-[2rem] md:text-[2.5rem] font-bold text-[#111827] text-center mb-12">Услуги для бизнеса</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
          <div class="bg-[#f9fafb] rounded-lg p-6 border border-[#e5e7eb]">
            <div class="aspect-[16/10] bg-[#e5e7eb] rounded-md mb-4 flex items-center justify-center">
              <span class="text-[#9ca3af] text-xs">Плейсхолдер</span>
            </div>
            <h3 class="font-bold text-[#111827] mb-2">Регулярная уборка</h3>
            <p class="text-[#6b7280] text-sm">Ежедневная или еженедельная уборка офисов, коридоров, санузлов. Вывоз мусора, протирка мебели, мытьё полов.</p>
          </div>
          <div class="bg-[#f9fafb] rounded-lg p-6 border border-[#e5e7eb]">
            <div class="aspect-[16/10] bg-[#e5e7eb] rounded-md mb-4 flex items-center justify-center">
              <span class="text-[#9ca3af] text-xs">Плейсхолдер</span>
            </div>
            <h3 class="font-bold text-[#111827] mb-2">Мойка фасадов и остекления</h3>
            <p class="text-[#6b7280] text-sm">Промывка витрин, фасадов до 16 м высотой. Своё оборудование, промышленные альпинисты.</p>
          </div>
          <div class="bg-[#f9fafb] rounded-lg p-6 border border-[#e5e7eb]">
            <div class="aspect-[16/10] bg-[#e5e7eb] rounded-md mb-4 flex items-center justify-center">
              <span class="text-[#9ca3af] text-xs">Плейсхолдер</span>
            </div>
            <h3 class="font-bold text-[#111827] mb-2">Грязезащитные покрытия</h3>
            <p class="text-[#6b7280] text-sm">Входные зоны, коврики — аренда и продажа. Регулярная чистка, замена. Снижение износа полов.</p>
          </div>
        </div>
        <div class="text-center mt-12">
          <a href="/services" class="inline-flex items-center gap-2 py-4 px-8 bg-[#1e40af] text-white rounded-[0.5rem] font-semibold no-underline transition-all hover:bg-[#1d4ed8]">Смотреть все услуги →</a>
        </div>
      </div>
    </section>

    <section class="py-16 bg-[#1e40af] text-white">
      <div class="max-w-[800px] mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-[2rem] font-bold mb-6">Готовы обсудить проект?</h2>
        <p class="text-[#e5e7eb] mb-8 leading-relaxed">Оставьте заявку — подготовим коммерческое предложение под ваши задачи.</p>
        <button @click="openLeadModal" type="button" class="inline-flex items-center gap-2 py-4 px-8 bg-white text-[#1e40af] rounded-[0.5rem] font-semibold transition-all hover:bg-[#f3f4f6] cursor-pointer border-0">{{ ctaText }}</button>
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
  return props.page?.title || 'Для бизнеса';
});

const introContent = computed(() => {
  return props.page?.blocks?.intro?.content || null;
});

const ctaText = computed(() => {
  return props.page?.blocks?.cta?.text || 'Получить коммерческое предложение';
});

const openLeadModal = () => {
  window.dispatchEvent(new CustomEvent('open-lead-form'));
};
</script>


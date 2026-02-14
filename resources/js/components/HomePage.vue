<template>
  <div class="min-h-screen w-full min-w-0 mt-0 pt-0 overflow-x-hidden">
    <Header />

    <section class="relative min-h-screen overflow-hidden flex items-center justify-center py-8 pt-[calc(1.5rem*2+1.5rem+28px)] mt-0">
      <div class="absolute inset-0 bg-[#374151]"></div>
      <div class="absolute inset-0 bg-[#1e40af]/90"></div>
      <div class="relative z-10 max-w-[1440px] mx-auto px-4 sm:px-6 lg:px-8 w-full">
        <div class="max-w-[1200px] mx-auto text-center">
        <div class="inline-flex items-center gap-2 px-6 py-3 bg-transparent border border-[rgba(255,255,255,0.3)] rounded-[0.375rem] mb-8">
          <div class="w-5 h-5 text-white">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
          </div>
          <span class="text-white text-sm font-medium">Клининг для торговых центров, офисов и БЦ</span>
        </div>

        <h1 class="text-[4rem] max-md:text-[2.5rem] font-bold text-white uppercase tracking-[0.05em] mb-6 leading-[1.1]">{{ pageTitle }}</h1>

        <p class="text-[1.25rem] max-md:text-base text-[#e0e7ff] mb-12 leading-[1.6]">
          Торговые центры, офисы, бизнес-центры — комплексное обслуживание в Кирове.<br />
          Свои мощности, без субподрядчиков, долгосрочные договоры.
        </p>

        <div class="flex flex-col max-md:flex-col md:flex-row gap-4 justify-center mb-16">
          <a href="tel:+78332776264" class="flex items-center gap-3 px-8 py-4 bg-[#2563eb] text-white rounded-[0.375rem] font-semibold text-lg no-underline transition-all duration-300 hover:bg-[#1d4ed8] hover:shadow-[0_4px_12px_rgba(37,99,235,0.4)] hover:scale-105">
            <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
            </svg>
            77-62-64
          </a>
          <button @click="openLeadModal" class="flex items-center gap-3 px-8 py-4 bg-white text-[#1e40af] border-2 border-white rounded-[0.375rem] font-semibold text-lg transition-all duration-300 hover:bg-[#f8fafc] hover:border-[#e0e7ff] hover:scale-105 cursor-pointer">
            <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
            </svg>
            Заказать клининг
          </button>
        </div>

        <div class="grid grid-cols-2 max-md:grid-cols-2 md:grid-cols-4 gap-4 max-w-[1000px] mx-auto">
          <div class="flex flex-col items-center gap-3 p-6 bg-[rgba(255,255,255,0.1)] border border-[rgba(255,255,255,0.2)] rounded-[0.375rem]">
            <div class="w-8 h-8 text-white">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
              </svg>
            </div>
            <span class="text-white text-sm font-medium text-center">Гарантия качества</span>
          </div>
          <div class="flex flex-col items-center gap-3 p-6 bg-[rgba(255,255,255,0.1)] border border-[rgba(255,255,255,0.2)] rounded-[0.375rem]">
            <div class="w-8 h-8 text-white">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
              </svg>
            </div>
            <span class="text-white text-sm font-medium text-center">Быстрый выезд</span>
          </div>
          <div class="flex flex-col items-center gap-3 p-6 bg-[rgba(255,255,255,0.1)] border border-[rgba(255,255,255,0.2)] rounded-[0.375rem]">
            <div class="w-8 h-8 text-white">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
              </svg>
            </div>
            <span class="text-white text-sm font-medium text-center">Доступные цены</span>
          </div>
          <div class="flex flex-col items-center gap-3 p-6 bg-[rgba(255,255,255,0.1)] border border-[rgba(255,255,255,0.2)] rounded-[0.375rem]">
            <div class="w-8 h-8 text-white">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
              </svg>
            </div>
            <span class="text-white text-sm font-medium text-center">Экологичные средства</span>
          </div>
        </div>
        </div>
      </div>
    </section>

    <section v-if="utpBlock" class="py-16 bg-white">
      <div class="max-w-[1440px] w-full mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16 items-center">
          <!-- Левая колонка: текст -->
          <div>
            <div class="inline-flex items-center gap-2 px-4 py-2 bg-[#EEF0FF] rounded-full mb-6">
              <svg class="w-5 h-5 text-[#414070]" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
              </svg>
              <span class="text-[#414070] text-sm font-medium">Почему выбирают нас</span>
            </div>
            <h2 class="text-[2rem] md:text-[2.5rem] font-bold text-[#333333] mb-8 leading-tight">
              Коммерческий клининг в Кирове
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
                  <p class="text-[#6b7280] text-sm leading-relaxed">Цех, оборудование, ковры. Всё под контролем — качество и сроки в наших руках.</p>
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
                  <p class="text-[#6b7280] text-sm leading-relaxed">Собственные бригады и техника. Один подрядчик — предсказуемый результат.</p>
                </div>
              </li>
            </ul>
            <button @click="openLeadModal" type="button" class="inline-flex items-center gap-2 py-4 px-8 bg-[#5E44EF] text-white rounded-[0.5rem] font-semibold text-[1rem] transition-all hover:bg-[#4d36dd] hover:shadow-[0_8px_20px_rgba(94,68,239,0.35)] cursor-pointer border-0">
              <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
              </svg>
              Заказать клининг
            </button>
          </div>
          <!-- Правая колонка: placeholder -->
          <div class="rounded-lg overflow-hidden shadow-[0_10px_40px_rgba(0,0,0,0.08)]">
            <div class="aspect-[4/3] bg-[#e5e7eb] min-h-[280px]"></div>
          </div>
        </div>
      </div>
    </section>

    <section id="why-us" v-if="whyUsBlock" class="py-16 bg-[#f9fafb]">
      <div class="max-w-[1440px] mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-[2.5rem] font-bold text-center text-[#111827] mb-4">{{ whyUsBlock.title }}</h2>
        <p class="text-[#6b7280] text-center text-lg max-w-[640px] mx-auto mb-12 leading-relaxed">Собственное производство, современное оборудование и опытные специалисты — работаем без посредников и субподрядчиков.</p>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-6 max-w-[1400px] mx-auto">
          <div 
            v-for="(item, index) in whyUsBlock.items" 
            :key="index"
            class="bg-white rounded-lg p-6 border border-[#e5e7eb] shadow-[0_1px_3px_rgba(0,0,0,0.05)] transition-all duration-300 ease-in-out hover:-translate-y-[2px] hover:shadow-[0_4px_12px_rgba(30,64,175,0.15)] hover:border-[#2563eb]"
          >
            <div class="aspect-[4/3] bg-[#e5e7eb] rounded-md mb-5"></div>
            <span class="text-[1.125rem] font-semibold text-[#111827] block mb-2">{{ typeof item === 'object' ? item.title : item }}</span>
            <p v-if="typeof item === 'object' && item.description" class="text-[#6b7280] text-sm leading-relaxed">{{ item.description }}</p>
          </div>
        </div>
        <p class="text-center mt-8">
          <a href="/o-kompanii" class="inline-flex items-center gap-2 text-[#1e40af] font-semibold no-underline hover:text-[#1d4ed8]">Подробнее о компании →</a>
        </p>
      </div>
    </section>

    <section id="services" class="py-16 bg-white">
      <div class="max-w-[1440px] mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-[2.5rem] font-bold text-center text-[#111827] mb-4">Основные услуги</h2>
        <p class="text-[#6b7280] text-center text-lg max-w-[640px] mx-auto mb-12 leading-relaxed">Полный спектр клининговых работ — от регулярной уборки до химчистки и мойки фасадов. Подберём решение под ваши задачи.</p>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-6 max-w-[1400px] mx-auto">
          <div 
            v-for="(item, index) in serviceExamples" 
            :key="index"
            class="bg-white rounded-lg p-6 border border-[#e5e7eb] shadow-[0_1px_3px_rgba(0,0,0,0.05)] transition-all duration-300 ease-in-out hover:-translate-y-[2px] hover:shadow-[0_4px_12px_rgba(30,64,175,0.15)] hover:border-[#2563eb]"
          >
            <div class="aspect-[4/3] bg-[#e5e7eb] rounded-md mb-5"></div>
            <span class="text-[1.125rem] font-semibold text-[#111827] block mb-2">{{ item.title }}</span>
            <p class="text-[#6b7280] text-sm leading-relaxed">{{ item.description }}</p>
          </div>
        </div>
        <p class="text-center mt-8">
          <a href="/uslugi" class="inline-flex items-center gap-2 text-[#1e40af] font-semibold no-underline hover:text-[#1d4ed8]">Подробнее обо всех услугах →</a>
        </p>
      </div>
    </section>

    <section id="for-who" v-if="forWhoBlock" class="py-16 bg-[#f9fafb]">
      <div class="max-w-[1440px] mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-[2.5rem] font-bold text-center text-[#111827] mb-4">{{ forWhoBlock.title }}</h2>
        <p class="text-[#6b7280] text-center text-lg max-w-[640px] mx-auto mb-12 leading-relaxed">Частные клиенты, офисы, торговые площадки — находим подход к каждому заказчику.</p>
        <div class="grid grid-cols-1 max-md:grid-cols-1 md:grid-cols-[repeat(auto-fit,minmax(200px,1fr))] gap-8 max-w-[1400px] mx-auto">
          <a
            v-for="(item, index) in forWhoBlock.items"
            :key="index"
            :href="item === 'Бизнес' ? '/dlya-biznesa' : '/uslugi'"
            class="bg-white border border-[#e5e7eb] rounded-lg p-6 text-center transition-all duration-300 ease-in-out hover:-translate-y-[2px] hover:shadow-[0_4px_12px_rgba(30,64,175,0.15)] hover:border-[#2563eb] no-underline block"
          >
            <div class="w-32 h-32 sm:w-40 sm:h-40 bg-[#e5e7eb] rounded-lg mx-auto mb-4 flex items-center justify-center">
              <span class="text-[#9ca3af] text-xs">Плейсхолдер</span>
            </div>
            <span class="text-[1.125rem] font-semibold text-[#111827]">{{ item }}</span>
          </a>
        </div>
        <p class="text-center mt-8">
          <a href="/dlya-biznesa" class="inline-flex items-center gap-2 text-[#1e40af] font-semibold no-underline hover:text-[#1d4ed8]">Подробнее о клининге для бизнеса →</a>
        </p>
      </div>
    </section>

    <section id="lead-form-section" class="py-16 bg-[#1e40af]">
      <div class="max-w-[1440px] mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-[2.5rem] font-bold text-center text-white mb-12">Оставить заявку</h2>
        <div class="max-w-[600px] mx-auto">
          <form @submit.prevent="submitLeadForm" class="bg-white rounded-[0.5rem] p-8 shadow-[0_4px_12px_rgba(0,0,0,0.1)]">
            <input type="hidden" name="_token" :value="csrfToken" />
            <input type="hidden" name="source" value="main_form" />
            
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
              class="w-full py-4 bg-[#1e40af] text-white rounded-[0.375rem] text-[1.125rem] font-semibold cursor-pointer transition-colors hover:bg-[#1e3a8a] disabled:opacity-50 disabled:cursor-not-allowed"
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

    <section id="contacts" class="py-16 bg-[#1f2937] text-white">
      <div class="max-w-[1440px] mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-[2.5rem] font-bold text-center mb-12">Контакты</h2>
        <div class="grid grid-cols-1 max-md:grid-cols-1 md:grid-cols-[repeat(auto-fit,minmax(280px,1fr))] gap-8 max-w-[1200px] mx-auto">
          <div class="bg-[rgba(255,255,255,0.1)] rounded-2xl p-8 text-center">
            <div class="w-16 h-16 bg-[rgba(59,130,246,0.2)] rounded-full flex items-center justify-center mx-auto mb-6">
              <svg class="w-8 h-8 text-[#60a5fa]" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
              </svg>
            </div>
            <h3 class="text-[1.25rem] font-bold mb-4">Телефон</h3>
            <a href="tel:+78332776264" class="block text-[#d1d5db] mb-2 no-underline transition-colors duration-300 hover:text-[#60a5fa]">77-62-64</a>
            <a href="tel:+79229776264" class="block text-[#d1d5db] no-underline transition-colors duration-300 hover:text-[#60a5fa]">+7 (922) 977-62-64</a>
          </div>
          
          <div class="bg-[rgba(255,255,255,0.1)] rounded-2xl p-8 text-center">
            <div class="w-16 h-16 bg-[rgba(59,130,246,0.2)] rounded-full flex items-center justify-center mx-auto mb-6">
              <svg class="w-8 h-8 text-[#60a5fa]" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
              </svg>
            </div>
            <h3 class="text-[1.25rem] font-bold mb-4">Адрес</h3>
            <p class="text-[#d1d5db] mb-2">ул. Романа Ердякова 50 стр 2</p>
            <p class="text-[#d1d5db]">г. Киров</p>
          </div>
          
          <div class="bg-[rgba(255,255,255,0.1)] rounded-2xl p-8 text-center">
            <div class="w-16 h-16 bg-[rgba(59,130,246,0.2)] rounded-full flex items-center justify-center mx-auto mb-6">
              <svg class="w-8 h-8 text-[#60a5fa]" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
              </svg>
            </div>
            <h3 class="text-[1.25rem] font-bold mb-4">Мессенджеры</h3>
            <a href="https://t.me/cleankirov43" target="_blank" class="block text-[#d1d5db] mb-2 no-underline transition-colors duration-300 hover:text-[#60a5fa]">Telegram: @cleankirov43</a>
            <a href="https://vk.ru/clean.kirov" target="_blank" class="block text-[#d1d5db] no-underline transition-colors duration-300 hover:text-[#60a5fa]">VK: clean.kirov</a>
          </div>
        </div>
        <div class="mt-12 max-w-[1200px] mx-auto">
          <div class="rounded-2xl overflow-hidden border border-[rgba(255,255,255,0.15)] shadow-lg aspect-[21/9] min-h-[250px]">
            <iframe
              src="https://www.openstreetmap.org/export/embed.html?bbox=49.65%2C58.59%2C49.68%2C58.61&layer=mapnik&marker=58.598%2C49.666"
              width="100%"
              height="100%"
              frameborder="0"
              allowfullscreen
              loading="lazy"
              referrerpolicy="no-referrer-when-downgrade"
              class="block w-full h-full min-h-[250px]"
              title="Карта: ул. Романа Ердякова 50 стр 2, Киров"
            ></iframe>
          </div>
          <p class="mt-4 text-center">
            <a href="https://yandex.ru/maps/43/kirov/house/ulitsa_romana_erdiakova_50s2/Z04YcAVmSkwOQFtvfXt0dX5lZg==/?ll=49.665897%2C58.598276&z=17" target="_blank" rel="noopener" class="text-[#93c5fd] no-underline hover:underline text-sm">Открыть в Яндекс.Картах</a>
          </p>
        </div>
      </div>
    </section>
  </div>
</template>

<script setup>
import { computed, onMounted, watch, ref, reactive } from 'vue';
import Header from './Header.vue';

const props = defineProps({
  page: {
    type: Object,
    default: null
  },
  services: {
    type: Array,
    default: () => []
  }
});

const pageTitle = computed(() => {
  return props.page?.title || 'ЧИСТЫЙ КИРОВ';
});

const metaDescription = computed(() => {
  return props.page?.meta_description || 'Коммерческий клининг в Кирове';
});

watch(() => props.page?.meta_description, (newDesc) => {
  if (newDesc) {
    let metaDesc = document.querySelector('meta[name="description"]');
    if (!metaDesc) {
      metaDesc = document.createElement('meta');
      metaDesc.setAttribute('name', 'description');
      document.head.appendChild(metaDesc);
    }
    metaDesc.setAttribute('content', newDesc);
  }
}, { immediate: true });

const utpBlock = computed(() => {
  return props.page?.blocks?.utp || null;
});

const whyUsBlock = computed(() => {
  return props.page?.blocks?.why_us || null;
});

const forWhoBlock = computed(() => {
  return props.page?.blocks?.for_who || null;
});

const serviceExamples = [
  { title: 'Уборка торговых точек', description: 'Комплексное обслуживание магазинов и торговых площадей.' },
  { title: 'Мойка фасадов', description: 'Промывка витрин и фасадов до 16 м, своё оборудование.' },
  { title: 'Уборка офисов', description: 'Регулярная уборка офисных помещений и БЦ.' },
  { title: 'Коммерческий клининг', description: 'Обслуживание ТЦ, складов, производственных зон.' },
  { title: 'Химчистка мебели', description: 'Чистка диванов, кресел, ковров профессиональными средствами.' }
];

const openLeadModal = () => {
  window.dispatchEvent(new CustomEvent('open-lead-form'));
};

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
    formData.append('source', 'main_form');
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

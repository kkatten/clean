<template>
  <div class="min-h-screen bg-[#f9fafb]">
    <Header />

    <section class="py-24 px-4 pt-[calc(100px+6rem)] bg-[#1e40af] text-white text-center">
      <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-[3.5rem] max-md:text-[2.5rem] font-bold mb-4">Услуги</h1>
        <p class="text-[1.25rem] text-[#e5e7eb]">Комплексные решения для клининга</p>
      </div>
    </section>

    <section class="py-16 px-4">
      <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8">
        <div v-if="services && services.length > 0" class="grid grid-cols-1 md:grid-cols-[repeat(auto-fit,minmax(300px,1fr))] gap-8 max-w-[1200px] mx-auto">
          <div 
            v-for="service in services" 
            :key="service.id"
            class="bg-white rounded-[0.5rem] p-8 shadow-[0_1px_3px_rgba(0,0,0,0.1)] transition-all duration-300 ease-in-out cursor-pointer hover:-translate-y-[5px] hover:shadow-[0_10px_25px_rgba(0,0,0,0.15)]"
            @click="goToService(service.slug)"
          >
            <div class="w-20 h-20 bg-[#dbeafe] rounded-full flex items-center justify-center mx-auto mb-6">
              <svg v-if="!service.icon" class="w-10 h-10 text-[#2563eb]" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
              </svg>
              <img v-else :src="service.icon" :alt="service.title" class="w-[60px] h-[60px] object-contain" />
            </div>
            <h3 class="text-[1.5rem] font-bold text-[#111827] mb-4 text-center">{{ service.title }}</h3>
            <p class="text-[#6b7280] mb-6 text-center leading-[1.6]">{{ getServiceDescription(service) }}</p>
            <a :href="`/uslugi/${service.slug}`" @click.stop="goToService(service.slug)" class="block text-center text-[#2563eb] font-semibold no-underline transition-colors duration-300 hover:text-[#1d4ed8]">Подробнее →</a>
          </div>
        </div>
        <div v-else class="text-center py-16 px-4 text-[#6b7280]">
          <p>Услуги временно недоступны</p>
        </div>
      </div>
    </section>
  </div>
</template>

<script setup>
import { computed } from 'vue';
import Header from './Header.vue';

const props = defineProps({
  services: {
    type: Array,
    default: () => []
  }
});

const getServiceDescription = (service) => {
  if (service.short_description) return service.short_description;
  if (service.description) {
    return service.description.length > 150 
      ? service.description.substring(0, 150) + '...' 
      : service.description;
  }
  return 'Подробная информация об услуге';
};

const goToService = (slug) => {
  window.location.href = `/uslugi/${slug}`;
};
</script>


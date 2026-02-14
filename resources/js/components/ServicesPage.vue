<template>
  <div class="min-h-screen w-full min-w-0 overflow-x-hidden bg-[#f9fafb]">
    <Header />

    <section class="py-24 px-4 pt-[calc(100px+6rem)] bg-[#1e40af] text-white text-center">
      <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-[3.5rem] max-md:text-[2.5rem] font-bold mb-4">Услуги</h1>
        <p class="text-[1.25rem] max-md:text-[1.1rem] text-[#e5e7eb] max-w-[800px] mx-auto leading-[1.6]">Регулярная уборка офисов и торговых центров, мойка фасадов и остекления, химчистка ковров и мебели, грязезащитные покрытия — подберём решение под ваши задачи.</p>
      </div>
    </section>

    <section class="py-16 px-4">
      <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8">
        <div v-if="services && services.length > 0" class="grid grid-cols-1 md:grid-cols-[repeat(auto-fit,minmax(300px,1fr))] gap-8 max-w-[1200px] mx-auto">
          <div 
            v-for="service in services" 
            :key="service.id"
            class="bg-white rounded-lg p-6 border border-[#e5e7eb] shadow-[0_1px_3px_rgba(0,0,0,0.05)] transition-all duration-300 ease-in-out cursor-pointer hover:-translate-y-[2px] hover:shadow-[0_4px_12px_rgba(30,64,175,0.15)] hover:border-[#2563eb]"
            @click="goToService(service.slug)"
          >
            <div class="w-16 h-16 bg-[#e5e7eb] rounded-lg mx-auto mb-5"></div>
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


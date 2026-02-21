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
          <a
            v-for="service in services"
            :key="service.id"
            :href="`/services/${service.slug}`"
            @click.prevent="goToService(service.slug)"
            class="bg-white rounded-lg p-6 border border-[#e5e7eb] shadow-[0_1px_3px_rgba(0,0,0,0.05)] transition-all duration-300 ease-in-out cursor-pointer hover:-translate-y-[2px] hover:shadow-[0_4px_12px_rgba(30,64,175,0.15)] hover:border-[#2563eb] no-underline block"
          >
            <div class="aspect-[4/3] bg-[#e5e7eb] rounded-lg mb-5 overflow-hidden">
              <img v-if="service.image_url" :src="service.image_url" :alt="service.title" class="w-full h-full object-cover" />
            </div>
            <h3 class="text-[1.5rem] font-bold text-[#111827] mb-2 text-center">{{ service.title }}</h3>
            <p v-if="service.price != null" class="text-[#1e40af] font-semibold text-center mb-2">от {{ formatPrice(service.price) }} ₽</p>
            <p class="text-[#6b7280] mb-4 text-center leading-[1.6]">{{ getServiceDescription(service) }}</p>
            <span class="block text-center text-[#2563eb] font-semibold transition-colors duration-300 hover:text-[#1d4ed8]">Подробнее →</span>
          </a>
        </div>
        <div v-else class="text-center py-16 px-4 text-[#6b7280]">
          <p>Услуги временно недоступны</p>
        </div>
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
  services: {
    type: Array,
    default: () => []
  }
});

const getServiceDescription = (service) => {
  if (service.meta_description) return service.meta_description;
  if (service.short_description) return service.short_description;
  if (service.for_who) return service.for_who.length > 120 ? service.for_who.substring(0, 120) + '…' : service.for_who;
  return 'Подробная информация об услуге';
};

const formatPrice = (value) => {
  const n = Number(value);
  if (Number.isNaN(n)) return '—';
  return new Intl.NumberFormat('ru-RU', { minimumFractionDigits: 0, maximumFractionDigits: 0 }).format(n);
};

const goToService = (slug) => {
  window.location.href = `/services/${slug}`;
};
</script>


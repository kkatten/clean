<template>
  <header :class="['fixed top-0 left-0 right-0 z-[1000] py-6 transition-all duration-300 ease-in-out', isScrolled ? 'bg-[rgba(30,64,175,0.8)] backdrop-blur-[20px]' : 'bg-[rgba(30,64,175,0.7)] backdrop-blur-[10px]']">
    <div class="flex justify-between items-center max-w-[1440px] w-full mx-auto px-4 sm:px-6 lg:px-8">
      <a href="/" class="flex items-center gap-2 no-underline cursor-pointer transition-opacity duration-300 hover:opacity-80">
        <div class="w-7 h-7 max-md:w-5 max-md:h-5 text-white">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
          </svg>
        </div>
        <span class="text-white font-semibold text-xl max-md:text-sm">Чистый Киров</span>
      </a>
      <nav class="hidden md:flex gap-6 ml-auto mr-8">
        <a href="/" class="text-white no-underline text-lg font-medium transition-colors duration-300 hover:text-[#bfdbfe]">Главная</a>
        <a href="/o-kompanii" class="text-white no-underline text-lg font-medium transition-colors duration-300 hover:text-[#bfdbfe]">О компании</a>
        <a href="/uslugi" class="text-white no-underline text-lg font-medium transition-colors duration-300 hover:text-[#bfdbfe]">Услуги</a>
        <a href="/dlya-biznesa" class="text-white no-underline text-lg font-medium transition-colors duration-300 hover:text-[#bfdbfe]">Для бизнеса</a>
        <a href="/kontakty" class="text-white no-underline text-lg font-medium transition-colors duration-300 hover:text-[#bfdbfe]">Контакты</a>
      </nav>
      <div class="flex items-center gap-4 max-md:gap-3">
        <button @click.prevent="openLeadModal" class="hidden md:flex items-center gap-2 py-2.5 px-5 bg-[rgba(255,255,255,0.1)] text-white border border-[rgba(255,255,255,0.25)] rounded-[0.375rem] font-semibold text-sm cursor-pointer transition-all duration-300 hover:bg-[rgba(255,255,255,0.2)] hover:border-[rgba(255,255,255,0.4)] hover:-translate-y-0.5">
          <svg class="w-[18px] h-[18px]" viewBox="0 0 24 24" fill="none" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
          </svg>
          Заявка
        </button>
        <a href="tel:+78332776264" class="hidden md:flex items-center gap-2 py-2.5 px-5 bg-[rgba(255,255,255,0.1)] text-white border border-[rgba(255,255,255,0.25)] rounded-[0.375rem] font-semibold text-sm no-underline transition-all duration-300 hover:bg-[rgba(255,255,255,0.2)] hover:border-[rgba(255,255,255,0.4)] hover:-translate-y-0.5">
          <svg class="w-[18px] h-[18px]" viewBox="0 0 24 24" fill="none" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
          </svg>
          77-62-64
        </a>
        <button @click="toggleMobileMenu" class="md:hidden flex items-center justify-center w-10 h-10 bg-transparent border-0 text-white cursor-pointer p-0">
          <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
          </svg>
        </button>
      </div>
    </div>

    <div v-if="isMobileMenuOpen" class="fixed top-0 left-0 right-0 bottom-0 bg-black/50 z-[999] opacity-100 transition-opacity duration-300 ease-in-out md:hidden" @click="closeMobileMenu"></div>
    
    <div :class="['fixed top-0 right-0 w-full h-screen bg-[#1e40af] z-[1000] transition-transform duration-300 ease-in-out flex flex-col shadow-[-2px_0_10px_rgba(0,0,0,0.3)] md:hidden', isMobileMenuOpen ? 'translate-x-0' : 'translate-x-full']">
      <div class="flex items-center justify-between p-6 border-b border-white/10">
        <a href="/" @click="closeMobileMenu" class="flex items-center gap-2 no-underline">
          <div class="w-7 h-7 text-white">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
            </svg>
          </div>
          <span class="text-white font-semibold text-xl">Чистый Киров</span>
        </a>
        <button @click="closeMobileMenu" class="flex items-center justify-center w-8 h-8 bg-transparent border-0 text-white cursor-pointer p-0">
          <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
          </svg>
        </button>
      </div>
      
      <nav class="flex-1 py-8 px-6 flex flex-col gap-6 overflow-y-auto">
        <a href="/" @click="closeMobileMenu" class="text-white no-underline text-xl font-semibold py-3 transition-colors duration-300 hover:text-[#bfdbfe]">Главная</a>
        <a href="/o-kompanii" @click="closeMobileMenu" class="text-white no-underline text-xl font-semibold py-3 transition-colors duration-300 hover:text-[#bfdbfe]">О компании</a>
        <a href="/uslugi" @click="closeMobileMenu" class="text-white no-underline text-xl font-semibold py-3 transition-colors duration-300 hover:text-[#bfdbfe]">Услуги</a>
        <a href="/dlya-biznesa" @click="closeMobileMenu" class="text-white no-underline text-xl font-semibold py-3 transition-colors duration-300 hover:text-[#bfdbfe]">Для бизнеса</a>
        <a href="/kontakty" @click="closeMobileMenu" class="text-white no-underline text-xl font-semibold py-3 transition-colors duration-300 hover:text-[#bfdbfe]">Контакты</a>
      </nav>
      
      <div class="p-6 border-t border-white/10 space-y-4">
        <button @click="closeMobileMenu(); openLeadModal();" class="flex items-center justify-center gap-3 w-full py-4 bg-transparent text-white border-2 border-white rounded-lg font-semibold text-base cursor-pointer transition-all duration-300 hover:bg-white/10">
          <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
          </svg>
          Заявка
        </button>
        <a href="tel:+78332776264" class="flex items-center justify-center gap-3 w-full py-4 bg-transparent text-white border-2 border-white rounded-lg font-semibold text-base no-underline transition-all duration-300 hover:bg-white/10">
          <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
          </svg>
          77-62-64
        </a>
      </div>
    </div>

    <LeadFormModal ref="leadModalRef" />
  </header>
</template>

<script setup>
import { ref, onMounted, onUnmounted } from 'vue';
import LeadFormModal from './LeadFormModal.vue';

const leadModalRef = ref(null);

const openLeadModal = () => {
  if (leadModalRef.value) leadModalRef.value.open();
};

const isScrolled = ref(false);
const isMobileMenuOpen = ref(false);

const handleScroll = () => {
  isScrolled.value = window.scrollY > 50;
};

const toggleMobileMenu = () => {
  isMobileMenuOpen.value = !isMobileMenuOpen.value;
  if (isMobileMenuOpen.value) {
    document.body.style.overflow = 'hidden';
  } else {
    document.body.style.overflow = '';
  }
};

const closeMobileMenu = () => {
  isMobileMenuOpen.value = false;
  document.body.style.overflow = '';
};

const handleMobileNav = (sectionId) => {
  closeMobileMenu();
  setTimeout(() => {
    scrollToSection(sectionId);
  }, 300);
};

const goToHome = () => {
  if (window.location.pathname !== '/') {
    window.location.href = '/';
  } else {
    window.scrollTo({ top: 0, behavior: 'smooth' });
  }
};

const scrollToSection = (sectionId) => {
  if (sectionId === 'lead-form-section') {
    openLeadModal();
    return;
  }

  if (window.location.pathname !== '/') {
    window.location.href = sectionId ? `/#${sectionId}` : '/';
    return;
  }

  if (sectionId === '') {
    window.scrollTo({ top: 0, behavior: 'smooth' });
    return;
  }

  const element = document.getElementById(sectionId);
  if (element) {
    const headerHeight = 100;
    const elementPosition = element.getBoundingClientRect().top + window.pageYOffset;
    const offsetPosition = elementPosition - headerHeight;

    window.scrollTo({
      top: offsetPosition,
      behavior: 'smooth'
    });
  }
};

onMounted(() => {
  window.addEventListener('scroll', handleScroll);
  handleScroll();

  if (window.location.hash) {
    const hash = window.location.hash.substring(1);
    setTimeout(() => {
      scrollToSection(hash);
    }, 100);
  }
});

onUnmounted(() => {
  window.removeEventListener('scroll', handleScroll);
});
</script>

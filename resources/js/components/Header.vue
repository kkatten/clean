<template>
  <header :class="['header', { 'header--scrolled': isScrolled }]">
    <div class="header__container">
      <a href="/" @click.prevent="goToHome" class="header__logo">
        <div class="header__logo-icon">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
          </svg>
        </div>
        <span class="header__logo-text">Чистый Киров</span>
      </a>
      <nav class="header__nav">
        <a href="/" @click.prevent="scrollToSection('')" class="header__nav-link">Главная</a>
        <a href="#why-us" @click.prevent="scrollToSection('why-us')" class="header__nav-link">Почему мы</a>
        <a href="#services" @click.prevent="scrollToSection('services')" class="header__nav-link">Услуги</a>
        <a href="#for-business" @click.prevent="scrollToSection('for-business')" class="header__nav-link">Для бизнеса</a>
        <a href="#contacts" @click.prevent="scrollToSection('contacts')" class="header__nav-link">Контакты</a>
      </nav>
      <div class="header__actions">
        <button @click.prevent="scrollToSection('lead-form-section')" class="header__order-btn">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
          </svg>
          Заявка
        </button>
        <a href="tel:+78332776264" class="header__phone-btn">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
        </svg>
        77-62-64
        </a>
        <button @click="toggleMobileMenu" class="header__mobile-toggle">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
          </svg>
        </button>
      </div>
    </div>

    <div v-if="isMobileMenuOpen" class="mobile-menu__overlay" @click="closeMobileMenu"></div>
    
    <div :class="['mobile-menu', { 'mobile-menu--open': isMobileMenuOpen }]">
      <div class="mobile-menu__header">
        <a href="/" @click.prevent="handleMobileNav('')" class="mobile-menu__logo">
          <div class="mobile-menu__logo-icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
            </svg>
          </div>
          <span class="mobile-menu__logo-text">Чистый Киров</span>
        </a>
        <button @click="closeMobileMenu" class="mobile-menu__close">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
          </svg>
        </button>
      </div>
      
      <nav class="mobile-menu__nav">
        <a href="/" @click.prevent="handleMobileNav('')" class="mobile-menu__link">Главная</a>
        <a href="#why-us" @click.prevent="handleMobileNav('why-us')" class="mobile-menu__link">Почему мы</a>
        <a href="#services" @click.prevent="handleMobileNav('services')" class="mobile-menu__link">Услуги</a>
        <a href="#for-business" @click.prevent="handleMobileNav('for-business')" class="mobile-menu__link">Для бизнеса</a>
        <a href="#contacts" @click.prevent="handleMobileNav('contacts')" class="mobile-menu__link">Контакты</a>
      </nav>
      
      <div class="mobile-menu__footer">
        <a href="tel:+78332776264" class="mobile-menu__phone">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
          </svg>
          77-62-64
        </a>
      </div>
    </div>
  </header>
</template>

<script setup>
import { ref, onMounted, onUnmounted } from 'vue';

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
  if (window.location.pathname !== '/') {
    window.location.href = `/#${sectionId}`;
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

<style scoped>
.header {
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  z-index: 1000;
  padding: 1.5rem 0;
  background: rgba(30, 64, 175, 0.7);
  backdrop-filter: blur(10px);
  box-shadow: none;
  transition: all 0.3s ease;
}

.header--scrolled {
  background: rgba(30, 64, 175, 0.8);
  backdrop-filter: blur(20px);
  box-shadow: none;
}

.container {
  width: 100%;
  max-width: 1440px;
  margin: 0 auto;
  padding: 0 1rem;
}

@media (min-width: 640px) {
  .container {
    padding: 0 1.5rem;
  }
}

@media (min-width: 1024px) {
  .container {
    padding: 0 2rem;
  }
}

.header__container {
  display: flex;
  justify-content: space-between;
  align-items: center;
  width: 100%;
  max-width: 1440px;
  margin: 0 auto;
  padding: 0 1rem;
}

@media (min-width: 640px) {
  .header__container {
    padding: 0 1.5rem;
  }
}

@media (min-width: 1024px) {
  .header__container {
    padding: 0 2rem;
  }
}

.header__logo {
  display: flex;
  align-items: center;
  gap: 0.5rem;
  text-decoration: none;
  cursor: pointer;
  transition: opacity 0.3s;
}

.header__logo:hover {
  opacity: 0.8;
}

.header__logo-icon {
  width: 28px;
  height: 28px;
  color: #ffffff;
}

.header__logo-text {
  color: white;
  font-weight: 600;
  font-size: 1.25rem;
}

.header__nav {
  display: flex;
  gap: 1.5rem;
  margin-left: auto;
  margin-right: 2rem;
}

.header__nav-link {
  color: white;
  text-decoration: none;
  font-size: 1.125rem;
  font-weight: 500;
  transition: color 0.3s;
}

.header__nav-link:hover {
  color: #bfdbfe;
}

.header__actions {
  display: flex;
  align-items: center;
  gap: 1rem;
}

.header__order-btn {
  display: flex;
  align-items: center;
  gap: 0.5rem;
  padding: 0.625rem 1.25rem;
  background: rgba(255, 255, 255, 0.1);
  color: white;
  border: 1px solid rgba(255, 255, 255, 0.25);
  border-radius: 0.375rem;
  font-weight: 600;
  font-size: 0.875rem;
  cursor: pointer;
  transition: all 0.3s;
}

.header__order-btn:hover {
  background: rgba(255, 255, 255, 0.2);
  border-color: rgba(255, 255, 255, 0.4);
  transform: translateY(-1px);
}

.header__order-btn svg {
  width: 18px;
  height: 18px;
}

.header__phone-btn {
  display: flex;
  align-items: center;
  gap: 0.5rem;
  padding: 0.625rem 1.25rem;
  background: rgba(255, 255, 255, 0.1);
  color: white;
  border: 1px solid rgba(255, 255, 255, 0.25);
  border-radius: 0.375rem;
  font-weight: 600;
  font-size: 0.875rem;
  text-decoration: none;
  transition: all 0.3s;
}

.header__phone-btn:hover {
  background: rgba(255, 255, 255, 0.2);
  border-color: rgba(255, 255, 255, 0.4);
  transform: translateY(-1px);
}

.header__phone-btn svg {
  width: 18px;
  height: 18px;
}

.header__mobile-toggle {
  display: none;
  align-items: center;
  justify-content: center;
  width: 40px;
  height: 40px;
  background: transparent;
  border: none;
  color: white;
  cursor: pointer;
  padding: 0;
}

.header__mobile-toggle svg {
  width: 24px;
  height: 24px;
}

.mobile-menu__overlay {
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background: rgba(0, 0, 0, 0.5);
  z-index: 999;
  opacity: 0;
  transition: opacity 0.3s ease;
}

.mobile-menu__overlay {
  opacity: 1;
}

.mobile-menu {
  position: fixed;
  top: 0;
  right: 0;
  width: 100%;
  height: 100vh;
  background: #1e40af;
  z-index: 1000;
  transform: translateX(100%);
  transition: transform 0.3s ease;
  display: flex;
  flex-direction: column;
  box-shadow: -2px 0 10px rgba(0, 0, 0, 0.3);
}

.mobile-menu--open {
  transform: translateX(0);
}

.mobile-menu__header {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 1.5rem;
  border-bottom: 1px solid rgba(255, 255, 255, 0.1);
}

.mobile-menu__logo {
  display: flex;
  align-items: center;
  gap: 0.5rem;
  text-decoration: none;
}

.mobile-menu__logo-icon {
  width: 28px;
  height: 28px;
  color: #ffffff;
}

.mobile-menu__logo-text {
  color: white;
  font-weight: 600;
  font-size: 1.25rem;
}

.mobile-menu__close {
  display: flex;
  align-items: center;
  justify-content: center;
  width: 32px;
  height: 32px;
  background: transparent;
  border: none;
  color: white;
  cursor: pointer;
  padding: 0;
}

.mobile-menu__close svg {
  width: 24px;
  height: 24px;
}

.mobile-menu__nav {
  flex: 1;
  padding: 2rem 1.5rem;
  display: flex;
  flex-direction: column;
  gap: 1.5rem;
  overflow-y: auto;
}

.mobile-menu__link {
  color: white;
  text-decoration: none;
  font-size: 1.25rem;
  font-weight: 600;
  padding: 0.75rem 0;
  transition: color 0.3s;
}

.mobile-menu__link:hover {
  color: #bfdbfe;
}

.mobile-menu__footer {
  padding: 1.5rem;
  border-top: 1px solid rgba(255, 255, 255, 0.1);
}

.mobile-menu__phone {
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 0.75rem;
  width: 100%;
  padding: 1rem;
  background: transparent;
  color: white;
  border: 2px solid white;
  border-radius: 0.5rem;
  font-weight: 600;
  font-size: 1rem;
  text-decoration: none;
  transition: all 0.3s;
}

.mobile-menu__phone:hover {
  background: rgba(255, 255, 255, 0.1);
}

.mobile-menu__phone svg {
  width: 20px;
  height: 20px;
}

@media (max-width: 768px) {
  .header__container {
    padding: 0 1rem;
  }

  .header__nav {
    display: none;
  }

  .header__order-btn {
    display: none;
  }

  .header__phone-btn {
    display: none;
  }

  .header__logo-text {
    font-size: 0.875rem;
  }

  .header__logo-icon {
    width: 20px;
    height: 20px;
  }

  .header__mobile-toggle {
    display: flex;
  }

  .header__actions {
    gap: 0.75rem;
  }
}

@media (min-width: 769px) {
  .mobile-menu__overlay,
  .mobile-menu {
    display: none;
  }
}
</style>

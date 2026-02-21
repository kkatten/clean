<template>
  <footer class="border-t border-[rgba(255,255,255,0.15)] bg-[#1f2937] py-4">
    <div class="max-w-[1440px] mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex flex-wrap items-center justify-between gap-4">
        <div class="text-[#d1d5db] text-sm leading-relaxed">
          <p class="m-0">© 2026 Чистый Киров. Все права защищены.</p>
          <p class="m-0 mt-1">ИНН: 434562304420 ОГРН: 311434502000180</p>
        </div>
        <div class="flex flex-wrap justify-end gap-x-6 gap-y-2 text-sm">
          <button type="button" class="text-[#d1d5db] bg-transparent border-0 p-0 cursor-pointer hover:text-[#93c5fd] transition-colors duration-200 font-inherit" @click="openDoc('privacy')">Политика конфиденциальности</button>
          <button type="button" class="text-[#d1d5db] bg-transparent border-0 p-0 cursor-pointer hover:text-[#93c5fd] transition-colors duration-200 font-inherit" @click="openDoc('terms')">Условия использования</button>
        </div>
      </div>
    </div>
  </footer>
</template>

<script setup>
function openDoc(doc) {
  window.dispatchEvent(new CustomEvent('open-document', { detail: { doc } }));
}
</script>

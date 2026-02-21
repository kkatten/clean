<template>
  <Teleport to="body">
    <Transition name="document-fade">
      <div
        v-if="visible"
        class="document-modal-backdrop"
        @click.self="close"
      >
        <div class="document-modal-box" role="dialog" aria-labelledby="document-modal-title">
          <div class="document-modal-header">
            <h2 id="document-modal-title" class="document-modal-title">Документ</h2>
            <button type="button" class="document-modal-close" aria-label="Закрыть" @click="close">×</button>
          </div>
          <div class="document-modal-body">
            <div v-if="loading" class="document-modal-loading">Загрузка...</div>
            <div v-else class="document-modal-content document-body-styles" v-html="content"></div>
          </div>
        </div>
      </div>
    </Transition>
  </Teleport>
</template>

<script setup>
import { ref, onMounted, onUnmounted } from 'vue';

const visible = ref(false);
const loading = ref(false);
const content = ref('');

let openHandler = null;

function open(doc) {
  visible.value = true;
  loading.value = true;
  content.value = '';
  fetch(`/documents/content/${doc}`)
    .then((r) => r.text())
    .then((html) => {
      content.value = html;
    })
    .catch(() => {
      content.value = '<p>Не удалось загрузить документ.</p>';
    })
    .finally(() => {
      loading.value = false;
    });
}

function close() {
  visible.value = false;
}

onMounted(() => {
  openHandler = (e) => {
    const doc = e.detail?.doc;
    if (doc && ['privacy', 'terms', 'personal_data'].includes(doc)) {
      open(doc);
    }
  };
  window.addEventListener('open-document', openHandler);
});

onUnmounted(() => {
  if (openHandler) {
    window.removeEventListener('open-document', openHandler);
  }
});
</script>

<style scoped>
.document-modal-backdrop {
  position: fixed;
  inset: 0;
  z-index: 9999;
  background: rgba(0, 0, 0, 0.35);
  backdrop-filter: blur(4px);
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 2rem 1rem;
  box-sizing: border-box;
}

.document-modal-box {
  max-width: 720px;
  width: 100%;
  max-height: calc(100vh - 4rem);
  background: #fff;
  border-radius: 12px;
  box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
  overflow: hidden;
  display: flex;
  flex-direction: column;
}

.document-modal-header {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 1rem 1.5rem;
  border-bottom: 1px solid #e5e7eb;
  flex-shrink: 0;
}

.document-modal-title {
  font-weight: 700;
  font-size: 1.125rem;
  color: #111827;
  margin: 0;
  font-family: system-ui, -apple-system, sans-serif;
}

.document-modal-close {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  width: 2rem;
  height: 2rem;
  border: none;
  background: #f3f4f6;
  color: #374151;
  border-radius: 6px;
  cursor: pointer;
  font-size: 1.25rem;
  line-height: 1;
  transition: background 0.2s;
}

.document-modal-close:hover {
  background: #e5e7eb;
  color: #111827;
}

.document-modal-body {
  padding: 1.5rem 2rem 2rem;
  overflow-y: auto;
  flex: 1;
}

.document-modal-loading {
  color: #6b7280;
  font-family: system-ui, -apple-system, sans-serif;
}

.document-fade-enter-active,
.document-fade-leave-active {
  transition: opacity 0.2s ease;
}

.document-fade-enter-from,
.document-fade-leave-to {
  opacity: 0;
}
</style>

<style>
.document-body-styles {
  font-family: system-ui, -apple-system, sans-serif;
  color: #374151;
  font-size: 1rem;
  line-height: 1.6;
}

.document-body-styles h1 {
  font-size: 1.5rem;
  font-weight: 700;
  color: #111827;
  margin: 0 0 1.25rem;
}

.document-body-styles h2 {
  font-size: 1.125rem;
  font-weight: 700;
  color: #111827;
  margin: 1.25rem 0 0.5rem;
}

.document-body-styles h3 {
  font-size: 1rem;
  font-weight: 700;
  color: #111827;
  margin: 1rem 0 0.35rem;
}

.document-body-styles p {
  margin: 0 0 0.75rem;
}

.document-body-styles ul {
  margin: 0 0 0.75rem;
  padding-left: 1.5rem;
}

.document-body-styles a {
  color: #2563eb;
  text-decoration: underline;
}

.document-body-styles a:hover {
  color: #1d4ed8;
}
</style>

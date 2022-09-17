<template>
  <div>
    <template v-for="(link, key) in links" :key="key">
      <Link
        :href="link.url"
        v-html="link.label"
        as="button"
        class="py-1 px-3 rounded border hover:bg-blue-800 hover:text-white mr-1"
        :class="[
          link.active ? 'bg-blue-800 text-white' : 'bg-blue-200',
          link.url === null ? 'opacity-60' : '',
        ]"
        :disabled="link.url == null"
      />
    </template>
  </div>
</template>

<script setup>
import { Link } from "@inertiajs/inertia-vue3";
defineProps({
  links: Array,
});
</script>


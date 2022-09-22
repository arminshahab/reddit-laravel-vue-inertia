<template>
  <div class="w-full bg-white shadow-md border rounded-lg">
    <h2 class="font-semibold text-lg p-6 bg-indigo-700 text-white rounded-lg">
      <slot name="title" />
    </h2>

    <ul role="list" class="divide-y divide-slate-300 p-4">
      <li
        v-for="community in communities"
        :key="community.id"
        class="py-2 sm:py-4"
      >
        <div class="flex items-center space-x-4">
          <Link
            :href="route('frontend.communities.show', community.slug)"
            class="text-slate-800 font-semibold truncate text-sm"
          >
            {{ community.name }}
          </Link>
          <div class="">posts({{ community.posts_count }})</div>
        </div>
      </li>
    </ul>
  </div>
</template>

<script setup>
import { Link } from "@inertiajs/inertia-vue3";

defineProps({
  communities: Object,
});
</script>

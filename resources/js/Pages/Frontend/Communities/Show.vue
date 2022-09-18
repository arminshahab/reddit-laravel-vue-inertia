<template>
  <guest-layout>
    <div class="flex justify-end m-2 p-2">
      <Link
        v-if="$page.props.auth.auth_check"
        :href="route('communities.posts.create', community.slug)"
        class="px-6 py-2 rounded bg-indigo-600 text-white hover:bg-indigo-700"
        >Create Post</Link
      >
    </div>
    <p>Show Page {{ community.name }}</p>
  </guest-layout>
</template>

<script setup>
import GuestLayout from "@/Layouts/GuestLayout.vue";
import { Link } from "@inertiajs/inertia-vue3";

defineProps({
  community: Object,
});
</script>

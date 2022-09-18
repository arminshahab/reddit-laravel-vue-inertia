<template>
  <guest-layout>
    <template #header>
      <div class="flex items-center justify-between">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          r/{{ community.name }}
        </h2>
        <Link
          v-if="$page.props.auth.auth_check"
          :href="route('communities.posts.create', community.slug)"
          class="px-6 py-2 rounded bg-indigo-600 text-white hover:bg-indigo-700"
          >Create Post</Link
        >
      </div>
    </template>
    <section class="m-2 p-2 flex">
      <div class="w-8/12">
        <PostCard
          v-for="post in posts.data"
          :post="post"
          :community="community.name"
          :key="post.id"
        />
        <Pagination :links="posts.meta.links" />
      </div>
      <div class="w-4/12">
        <div class="mx-2 p-2 bg-slate-500 text-white">
          <h2>Latest communities</h2>
        </div>
      </div>
    </section>
  </guest-layout>
</template>

<script setup>
import GuestLayout from "@/Layouts/GuestLayout.vue";
import { Link } from "@inertiajs/inertia-vue3";
import PostCard from "@/Components/PostCard.vue";
import Pagination from '@/Components/Pagination.vue';

defineProps({
  community: Object,
  posts: Object,
});
</script>

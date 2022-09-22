<template>
  <div class="flex flex-col bg-slate-200 p-3 h-full items-center space-y-4">
    <Link
      :href="route('post.upvote', post.slug)"
      as="button"
      method="post"
      preserve-scroll
      class="hover:text-blue-600"
      :class="[
        post.postVotes[0] && post.postVotes[0].vote == 1
          ? 'text-blue-500'
          : 'text-slate-400',
      ]"
    >
      <svg
        xmlns="http://www.w3.org/2000/svg"
        fill="none"
        viewBox="0 0 24 24"
        stroke-width="3"
        stroke="currentColor"
        class="w-6 h-6"
      >
        <path
          stroke-linecap="round"
          stroke-linejoin="round"
          d="M4.5 10.5L12 3m0 0l7.5 7.5M12 3v18"
        />
      </svg>
    </Link>
    <p
      class="text-xl font-bold"
      :class="[
        post.postVotes[0] && post.postVotes[0].vote == 1
          ? 'text-blue-500': '',
        post.postVotes[0] && post.postVotes[0].vote == -1
          ? 'text-red-500'
          : 'text-slate-400',
      ]"
    >
      {{ post.votes }}
    </p>
    <Link
      :href="route('post.downvote', post.slug)"
      as="button"
      method="post"
      preserve-scroll
      class="hover:text-red-600"
      :class="[
        post.postVotes[0] && post.postVotes[0].vote == -1
          ? 'text-red-500'
          : 'text-slate-400',
      ]"
    >
      <svg
        xmlns="http://www.w3.org/2000/svg"
        fill="none"
        viewBox="0 0 24 24"
        stroke-width="3"
        stroke="currentColor"
        class="w-6 h-6"
      >
        <path
          stroke-linecap="round"
          stroke-linejoin="round"
          d="M19.5 13.5L12 21m0 0l-7.5-7.5M12 21V3"
        />
      </svg>
    </Link>
  </div>
</template>

<script setup>
import { Link } from "@inertiajs/inertia-vue3";
defineProps({
  post: Object,
});
</script>

<style></style>

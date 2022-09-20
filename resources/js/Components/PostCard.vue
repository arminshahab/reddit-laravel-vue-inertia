<template>
  <div class="flex p-3 shadow-lg border bg-white mb-3 border-gray-200 rounded">
    <div class="text-sm mr-3">
      <PostVote :post="post" />
    </div>
    <div>
      <div>
        <span class="text-sm font-semibold mr-3">r/{{ community }}</span>
        <span class="text-sm"
          >Post by: <span class="font-bold">{{ post.username }}</span></span
        >
      </div>
      <h1 class="my-3 font-bold text-2xl">
        {{ post.title }}
      </h1>
      <p class="text-sm">
        {{ post.description }}
      </p>
      <div class="flex my-4 items-center">
        <span class="mr-3">Comments(3)</span>
        <Link
          :href="
            route('frontend.communities.posts.show', [community, post.slug])
          "
          class="px-4 py-1.5 rounded bg-indigo-500 text-white hover:bg-indigo-600 hover:text-white"
        >
          Read More >
        </Link>
      </div>
    </div>
  </div>
</template>

<script setup>
import { Link } from "@inertiajs/inertia-vue3";
import PostVote from "@/Components/PostVote.vue";

defineProps({
  post: Object,
  community: String,
});
</script>

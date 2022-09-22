<template>
  <div class="flex shadow-lg border bg-white mb-3 border-gray-200 rounded">
    <div class="text-sm mr-3">
      <PostVote :post="post" />
    </div>
    <div class="p-2">
      <div>
        <Link
          :href="route('frontend.communities.show', community)"
          class="text-sm font-semibold mr-3"
          >r/{{ community }}</Link
        >
        <span class="text-sm"
          >Post by: <span class="font-bold">{{ post.username }}</span>
          <span class="mx-3">{{post.created_at}}</span
        ></span>
      </div>
      <Link
        :href="route('frontend.communities.posts.show', [community, post.slug])"
      >
        <h1 class="my-6 font-bold text-2xl">{{ post.title }}</h1>
      </Link>
      <p class="text-sm">
        {{ post.description }}
      </p>
      <div class="flex my-4 items-center">
        <span class="mr-3">Comments({{ post.comments_count }})</span>
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

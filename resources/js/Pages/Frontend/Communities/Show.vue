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
    <section class="m-2 p-2 flex flex-col md:flex-row">
      <div class="w-full md:w-8/12">
        <PostCard
          v-for="post in posts.data"
          :post="post"
          :community="community.slug"
          :key="post.id"
        />
        <Pagination :links="posts.meta.links" />
      </div>
      <div class="w-full md:w-4/12">
        <div class="mx-2">
          <div class="mb-4">
            <h2
              class="font-semibold text-lg p-6 bg-indigo-700 text-white rounded-t-lg"
            >
              About {{ community.name }}
            </h2>
            <p class="bg-white p-4 rounded-b-lg">{{ community.description }}</p>
          </div>
          <CommunityList :communities="communities.data">
            <template #title> Latest Communities </template>
          </CommunityList>
        </div>
      </div>
    </section>
  </guest-layout>
</template>

<script setup>
import GuestLayout from "@/Layouts/GuestLayout.vue";
import { Link } from "@inertiajs/inertia-vue3";
import PostCard from "@/Components/PostCard.vue";
import Pagination from "@/Components/Pagination.vue";
import CommunityList from "@/Components/CommunityList.vue";

defineProps({
  community: Object,
  posts: Object,
  communities: Object,
});
</script>

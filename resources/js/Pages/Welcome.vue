<template>
  <guest-layout>
    <section class="m-2 p-2 flex flex-col md:flex-row">
      <div class="w-full md:w-8/12">
        <PostCard
          v-for="post in posts.data"
          :post="post"
          :community="post.community_slug"
          :key="post.id"
        />
      </div>
      <div class="w-full md:w-4/12">
        <div class="mx-2 p-2">
          <CommunityList :communities="communities.data">
            <template #title> Top Communities </template>
          </CommunityList>
        </div>
      </div>
    </section>
  </guest-layout>
</template>

<script setup>
import GuestLayout from "@/Layouts/GuestLayout.vue";
import PostCard from "@/Components/PostCard.vue";
import Pagination from "@/Components/Pagination.vue";
import CommunityList from "@/Components/CommunityList.vue";

defineProps({
  communities: Object,
  posts: Object,
});
</script>

<template>
  <guest-layout>
    <section class="m-2 p-2 flex flex-col md:flex-row">
      <div class="w-full md:w-8/12">
        <div class="p-3 bg-white">
          <h2 class="font-semibold text-2xl">
            <Link :href="route('frontend.communities.show', community.slug)">
              r/{{ community.name }}
            </Link>
          </h2>
        </div>
        <div class="p-3 pb-5 bg-white">
          <div class="flex justify-between">
            <div class="text-sm text-slate-400 mt-2">
              Posted by {{ post.data.username }}
            </div>
            <div v-if="$page.props.auth.auth_check && post.data.owner">
              <Link
                :href="
                  route('communities.posts.edit', [
                    community.slug,
                    post.data.slug,
                  ])
                "
                class="
                  bg-blue-500
                  text-white
                  px-3
                  py-1
                  rounded
                  hover:bg-blue-600
                  mr-3
                "
                >edit</Link
              >
              <Link
                :href="
                  route('communities.posts.destroy', [
                    community.slug,
                    post.data.slug,
                  ])
                "
                as="button"
                method="delete"
                class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600"
                >delete</Link
              >
            </div>
          </div>
          <h1 class="font-semibold text-black text-3xl">
            {{ post.data.title }}
          </h1>
          <p class="text-slate-700">{{ post.data.description }}</p>
          <a
            :href="post.data.url"
            class="font-semibold text-blue-500 text-sm"
            >{{ post.data.url }}</a
          >
        </div>
      </div>
      <div class="w-full md:w-4/12">
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
defineProps({
  community: Object,
  post: Object,
});
</script>

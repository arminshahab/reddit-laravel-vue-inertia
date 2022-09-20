<script setup>
import GuestLayout from "@/Layouts/GuestLayout.vue";
import { Link, useForm } from "@inertiajs/inertia-vue3";

const props = defineProps({
  community: Object,
  post: Object,
});

const form = useForm({
  content: "",
});

const submit = () => {
  form.post(
    route("frontend.posts.comments", [
      props.community.slug,
      props.post.data.slug,
    ]),
    { onSuccess: () => form.reset("content") }
  );
};
</script>

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
                class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600 mr-3"
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

          <p class="mt-5 text-xl font-bold">Comments</p>
          <div
            class="my-3"
            v-for="(comment, index) in post.data.comments"
            :key="index"
          >
            <p>
              <span class="text-slate-500 text-sm">Comment by </span>
              <span class="font-bold">{{ comment.username }}</span>
            </p>
            <p class="px-5 py-2 rounded-lg bg-slate-200 max-w-sm">
              {{ comment.content }}
            </p>
            <hr class="my-2" />
          </div>
          <!-- Post Comment -->
          <form
            class="m-2 max-w-sm p-2"
            @submit.prevent="submit"
            v-if="$page.props.auth.auth_check"
          >
            <div class="mt-2">
              <label for="comment" class="text-xl">Your Comment</label>
              <textarea
                class="my-3 p-3 block w-full border text-sm outline-none"
                rows="5"
                placeholder="Your Comment here..."
                v-model="form.content"
              ></textarea>
              <button
                class="px-5 py-2 bg-blue-500 rounded-lg text-white hover:bg-blue-600"
              >
                Comment
              </button>
            </div>
          </form>
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

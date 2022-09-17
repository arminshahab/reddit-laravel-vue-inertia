<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";

defineProps({
  communities: Object,
});
</script>

<template>
  <AuthenticatedLayout>
    <Head title="communites" />
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        All Communities
      </h2>
    </template>

    <div class="relative overflow-x-auto px-20 my-3">
      <div class="my-3 flex justify-end">
        <Link
          :href="route('communities.create')"
          class="
            px-5
            py-2
            rounded
            bg-blue-500
            text-white
            hover:bg-blue-700
          "
        >
          Add Community
        </Link>
      </div>
      <table class="w-full text-left text-sm text-gray-500">
        <thead class="bg-gray-50 text-xs uppercase text-gray-700">
          <tr>
            <th scope="col" class="py-3 px-6">name</th>
            <th scope="col" class="py-3 px-6">slug</th>
            <th scope="col" class="py-3 px-6">Actions</th>
          </tr>
        </thead>
        <tbody>
          <tr
            v-for="community in communities"
            :key="community.id"
            class="border-b bg-white"
          >
            <th
              scope="row"
              class="whitespace-nowrap py-4 px-6 font-medium text-gray-900"
            >
              {{ community.name }}
            </th>
            <td class="py-4 px-6">{{ community.slug }}</td>
            <td class="py-4 px-6">
              <button class="text-green-500">Edit</button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </AuthenticatedLayout>
</template>



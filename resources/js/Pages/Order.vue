<script setup lang="ts">
import { Head } from '@inertiajs/vue3'
import AppLayout from '@/Layouts/AppLayout.vue'
</script>

<template>
  <Head title="Start a Project" />
  <AppLayout>
    <section class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
      <h1 class="text-3xl font-bold">Start a project</h1>
      <p class="mt-4 text-gray-600">Tell me about your project goals, timeline, and budget. I’ll get back within 24 hours.</p>
      <form class="mt-8 space-y-4">
        <div>
          <label class="block text-sm font-medium">Name</label>
          <input type="text" class="mt-1 w-full rounded-md border px-3 py-2" placeholder="Your name" />
        </div>
        <div>
          <label class="block text-sm font-medium">Email</label>
          <input type="email" class="mt-1 w-full rounded-md border px-3 py-2" placeholder="you@example.com" />
        </div>
        <div>
          <label class="block text-sm font-medium">Project brief</label>
          <textarea class="mt-1 w-full rounded-md border px-3 py-2" rows="5" placeholder="Describe your idea and requirements" />
        </div>
        <button type="button" class="inline-flex items-center justify-center rounded-md bg-black px-5 py-2.5 text-white text-sm font-medium">Send</button>
      </form>
    </section>
  </AppLayout>
</template>
